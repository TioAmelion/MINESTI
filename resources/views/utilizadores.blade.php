@extends('admin.layout')

@section('conteudo')
  <div class="header bg-primary pb-6">
    <div class="container-fluid">
      <div class="header-body">
        <div class="row align-items-center py-4">
          <div class="col-lg-6 col-7">
            <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
              <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                <li class="breadcrumb-item"><a href="#"><i class="ni ni-circle-08"></i></a></li>
                <li class="breadcrumb-item"><a href="#">Utilizadores</a></li>
              </ol>
            </nav>
          </div>
          <div class="col-lg-6 col-5 text-right">
          <button type="button" name="create_record" id="create_record" class="btn btn-sm btn-neutral"><i class="ni ni-single-02"></i> Novo Usuario</button>
          <a href="#" class="btn btn-sm btn-neutral">Filtrar</a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="container-fluid mt--6">
    <div class="row">
      <div class="col">
        <div class="card">
          <!-- Card header -->
          <div class="card-header border-0">
            <h3 class="mb-0">Utilizadores do Sistema</h3>
          </div>
          <!-- Light table -->
          <div class="table-responsive">
            <table class="table align-items-center table-flush">
              <thead class="thead-light">
                <tr>
                  <th class="mb-0"><h4>Nome Utilizador</h4></th>
                  <th class="mb-0"><h4>Email</h4></th>
                  <th class="mb-0"><h4>Opções</h4></th>
                  <th scope="col"></th>
                </tr>
              </thead>
              <tbody class="list">
                @foreach($user as $users)
                    <tr>
                      <th scope="row">
                        <div class="media align-items-center">
                          <a href="#" class="avatar bg-primary rounded-circle mr-3">
                            {{ substr( $users->name, 0, 2 ) }}
                          </a>
                          <div class="media-body">
                            <span class="name mb-0 text-sm"><h3 class="mb-0">{{ $users->name }}</h3></span>
                          </div>
                        </div>
                      </th>
                    
                      <td class="budget"><h3 class="mb-0">{{ $users->email }}</h3></td>
                      <td>
                        <div class="avatar-group">
                          <button type="button" name="edit" id="{{$users->id}}" class="edit btn btn-sm btn-success"><i class="fas fa-edit"></i>  Editar</button>
                          <button type="button" id="apagar" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i>  Apagar</button>
                          <button type="button" name="create_role" id="create_role" class="btn btn-sm btn-dark"><i class="ni ni-single-02" value=""></i>  Add Funcão</button>
                          <button type="button" class="btn btn-sm btn-warning"><a href="{{ route('user.show', $users->id) }}" style="color: white" title=""><i class="fas fa-eye"></i> Funções</a></button>
                        </div>
                      </td> 
                    </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          <!-- Card footer -->
          <div class="card-footer py-4">
            <nav aria-label="...">
              <ul class="pagination justify-content-end mb-0">
                <li>{{ $user->links() }}</li>
            </nav>
          </div>
        </div>
      </div>
    </div>
    <!-- Footer -->
    @include("admin.includes.footer")
  </div>

  <div id="formModal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Add Novo Usuario</h4>
        </div>
            
        <div class="modal-body">
          <span id="form_result"></span>
          <form method="POST" name="sample_form" id="sample_form">
            @csrf
            <div class="form-group row">
              <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>
              <div class="col-md-6">
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
            </div>

            <div class="form-group row">
              <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
              <div class="col-md-6">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                @error('email')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
            </div>

            <div class="form-group row">
              <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
              <div class="col-md-6">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                @error('password')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
            </div>

            <div class="form-group row mb-0">
              <div class="col-md-7 offset-md-4">
                <input type="hidden" name="action" id="action">
                <input type="hidden" name="hidden_id" id="hidden_id"/>
                <input type="submit" name="action_button" id="action_button" class="btn btn-primary" value="Adicionar" />
                <input type="submit" class="btn btn-danger" data-dismiss="modal" value="Cancelar">
                <input type="button" id="pass"  class="btn btn-success" value="Alterar Password">
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <div id="formModalRole" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Add Nova Funcão</h4>
        </div>
            
        <div class="modal-body">
          <form method="POST" name="sample_form" id="sample_form">
            @csrf
            <div id="form_result">
            </div>
            <div class="form-group row">
              <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>
              <div class="col-md-6">
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
            </div>

            <div class="form-group row">
              <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
              <div class="col-md-6">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                @error('email')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
            </div>

            <div class="form-group row">
              <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
              <div class="col-md-6">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                @error('password')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
            </div>

            <div class="form-group row mb-0">
              <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary">
                  {{ __('Registar') }}
                </button>
                <button type="submit" class="btn btn-danger" data-dismiss="modal">
                  {{ __('Cancelar') }}
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <script src="assets/vendor/jquery/dist/jquery.min.js"></script>
  <script>
    $(document).ready(function(){

      $('#create_record').click(function(){
        $('.modal-title').text("Add Novo Usuario");
        $('#action_button').val("Adicionar");
        $('#action').val("Adicionar");
        $('#pass').hide();
        $('#formModal').modal('show');
      });

      $('#sample_form').on('submit', function(event){
          
        if($('#action').val() == 'Adicionar'){

          event.preventDefault();
           $.ajax({
            url:"{{ route('user.store') }}",
            method:"POST",
            data: new FormData(this),
            contentType: false,
            cache:false,
            processData: false,
            dataType:"json",
            success:function(data)
            {
             var html = '';
             if(data.errors)
             {
              html = '<div class="alert alert-danger">';
              for(var count = 0; count < data.errors.length; count++)
              {
               html += '<p>' + data.errors[count] + '</p>';
              }
              html += '</div>';
             }

             if(data.success)
             {
              html = '<div class="alert alert-success">' + data.success + '</div>';
              $('#sample_form')[0].reset();
              $('#user_table').DataTable().ajax.reload();
             }
             $('#form_result').html(html);
            }
           })
          }

         if($('#action_button').val() == "Edit"){
           $.ajax({
              url:"{{ route('user.update') }}",
              method:"POST",
              data:new FormData(this),
              contentType: false,
              cache: false,
              processData: false,
              dataType:"json",
              success:function(data)
              {
                var html = '';
                if(data.errors)
               {
                  html = '<div class="alert alert-danger">';
                  for(var count = 0; count < data.errors.length; count++)
                  {
                   html += '<p>' + data.errors[count] + '</p>';
                  }

                  html += '</div>';
                 }

                 if(data.success)
                 {
                    html = '<div class="alert alert-success">' + data.success + '</div>';
                    $('#sample_form')[0].reset();
                 }

                 $('#form_result').html(html);
                }
             });
          }
      })

      //EDITAR USER
      
      $("#pass").click(function(){
        $("#password").attr('disabled', false)
      })

      $(document).on('click', '.edit', function(){
        var id = $(this).attr('id');
        $('#form_result').html('');

        $.ajax({
          url: "/user/"+id+"/edit",
          dataType: "json",
          success: function(html){

            $('#name').val(html.data.name);
            $('#email').val(html.data.email);

            $('#hidden_id').val(html.data.id);
            $('#password').attr('disabled', true);
            $('.modal-title').text("Editar Dados do Usuario");
            $('#action_button').val("Edit");
            $('#action').val("Edit");
            $('#formModal').modal('show');
          }
        })
      });

    })
  </script> 
@endsection