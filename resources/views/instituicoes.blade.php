@extends('admin.layout')

@section('conteudo')
    <!-- Header -->
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
    
    <!-- Page content -->
    <div class="container-fluid mt--6">
      <div class="row">
        <div class="col">
          <div class="card">
            <!-- Card header -->
            <div class="card-header border-0">
              <h3 class="mb-0">Universidade</h3>
            </div>
            <!-- Light table -->
            <div class="table-responsive">
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col" class="sort" data-sort="name">Nome</th>
                    <th scope="col" class="sort" data-sort="budget">Localização</th>
                    <th scope="col" class="sort" data-sort="completion">Acções</th>
                    <th scope="col"></th>
                  </tr>
                </thead>
                <tbody class="list">
                  @foreach($dados as $dados)
                  <tr>
                  
                    <th scope="row">
                      <div class="media align-items-center">
                        <div class="media-body">
                          <span class="name mb-0 text-sm">{{ $dados->nome_universidade }}</span>
                        </div>
                      </div>
                    </th>
                  
                    <td class="budget">{{ $dados->localizacao }}</td>
                    @can('editar', $dados)
                      <td>
                        <div class="avatar-group">
                          <button type="button" class="btn btn-sm btn-success"><i class="fas fa-edit"></i>  Editar</button>
                          <button type="button" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i>  Apagar</button>
                          <button type="button" class="btn btn-sm btn-dark"><i class="fas fa-eye"></i>  <a href="" style="color: white" title="">Detalhes</a> </button>
                        </div>
                      </td>
                    @endcan
                    <td class="text-right">
                      <div class="dropdown">
                        <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <i class="fas fa-ellipsis-v"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                          <a class="dropdown-item" href="#">Action</a>
                          <a class="dropdown-item" href="#">Another action</a>
                          <a class="dropdown-item" href="#">Something else here</a>
                        </div>
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
                  <li class="page-item disabled">
                    <a class="page-link" href="#" tabindex="-1">
                      <i class="fas fa-angle-left"></i>
                      <span class="sr-only">Previous</span>
                    </a>
                  </li>
                  <li class="page-item active">
                    <a class="page-link" href="#">1</a>
                  </li>
                  <li class="page-item">
                    <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
                  </li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item">
                    <a class="page-link" href="#">
                      <i class="fas fa-angle-right"></i>
                      <span class="sr-only">Next</span>
                    </a>
                  </li>
                </ul>
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
        $('#action_button').val("Add");
        $('#action').val("Add");
        $('#formModal').modal('show');
      });

      $('#sample_form').on('submit', function(event){
        
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
    })

      $('#create_record').click(function(){
        $('.modal-title').text("Add Novo Usuario");
        $('#action_button').val("Add");
        $('#action').val("Add");
        $('#formModal').modal('show');
      });

    })
</script> 
@endsection