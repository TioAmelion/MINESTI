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
            <button type="button" name="create_record" id="create_record" class="btn btn-sm btn-neutral"><i class="ni ni-single-02"></i> Nova Universidade</button>
            <a href="#" class="btn btn-sm btn-neutral">Faculdades</a>
            </div>
          </div>
        </div>
      </div>
    </div>
    
    <!-- Page content -->
    <div class="container-fluid mt--6">

      <div class="row">
        <div class="col">
          <div class="card bg-default shadow">
            <div class="card-header bg-transparent border-0">
              <h3 class="text-white mb-0">Universidades</h3>
            </div>
            <div class="table-responsive">
              <table class="table align-items-center table-dark table-flush">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col" class="sort" data-sort="name">Nome</th>
                    <th scope="col" class="sort" data-sort="budget">Apelido</th>
                    <th scope="col" class="sort" data-sort="status">Localização</th>
                    <th scope="col">Opções</th>
                    <th scope="col"></th>
                  </tr>
                </thead>
                <tbody class="list">
                  @foreach($dados as $dados)
                  <tr>
                    <th scope="row">
                      <div class="media align-items-center">
                        <a href="#" class="avatar rounded-circle mr-3">
                          <img alt="Image placeholder" src="../assets/img/theme/bootstrap.jpg">
                        </a>
                        <div class="media-body">
                          <span class="name mb-0 text-sm">{{ $dados->nome_universidade }}</span>
                        </div>
                      </div>
                    </th>
                    <td class="budget">
                      {{ $dados->apelido }}
                    </td>
                    <td>
                      <span class="badge badge-dot mr-4">
                        <span class="status">{{ $dados->localizacao }}</span>
                      </span>
                    </td>
                    <td>
                      <div class="avatar-group">
                        <button type="button" class="edit btn btn-outline-success" name="edit" id="{{ $dados->id }}">Editar</button>
                        <button type="button" class="btn btn-outline-danger">Apagar</button>
                        <button type="button" name="{{ $dados->id }}" id="create_faculdade" class="adicionar_f btn btn-outline-warning">Faculdade</button>
                      </div>
                    </td>
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
          </div>
        </div>
      </div>
      <!-- Footer -->
      @include("admin.includes.footer")
    </div>

    <div id="formModal" class="modal fade" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content bg-dark">
          <div class="modal-header">
            <button type="button" class="close" name="close" id="close" data-dismiss="modal" style=" color: black; opacity: 20"></button>
            <h4 class="modal-title text-warning">Add New Record</h4>
          </div>
          <div class="modal-body">
            <span id="form_result"></span>
            <form method="post" id="sample_form" class="form-horizontal" enctype="multipart/form-data">
              @csrf
              <div class="form-group">
                <label class="control-label col-md-6 text-warning">Nome Universidade :</label>
                <div class="col-md-10">
                  <input type="text" name="nome_universidade" id="nome_universidade" class="form-control" />
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-6 text-warning">Apelido :</label>
                <div class="col-md-10">
                  <input type="text" name="apelido" id="apelido" class="form-control" />
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-6 text-warning">Localização :</label>
                <div class="col-md-10">
                  <input type="text" name="localizacao" id="localizacao" class="form-control" />
                </div>
              </div>
              <!-- <div class="form-group">
                <label class="control-label col-md-4">Select Profile image :</label>
                <div class="col-md-8">
                  <input type="file" name="image" id="image" />
                  <span id="store_image"></span>
                </div>
              </div> -->
              <br />
              <div class="form-group" align="center">
                <input type="hidden" name="action" id="action">
                <input type="hidden" name="hidden_id" id="hidden_id"/>
                <input type="submit" name="action_button" id="action_button" class="btn btn-warning" value="Add" /> 
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

    <div id="formFaculdade" class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content bg-dark">
          <div class="modal-header">
            <h5 class="modal-title text-warning" id="exampleModalLabel">New message</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form method="post" id="sample_form_f" class="form-horizontal" enctype="multipart/form-data">
              @csrf
              <span id="form_result"></span>
              <div class="form-group">
                <div class="input-group input-group-merge input-group-alternative mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-user text-warning"></i></span>
                  </div>
                  <input class="form-control" id="nome_faculdade" name="nome_faculdade" placeholder="Nome da Faculdade" type="text" value="{{ old('nome_faculdade') }}" autocomplete="off">
                </div>
              </div>
              <div class="form-group">
                <div class="input-group input-group-merge input-group-alternative mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-user text-warning"></i></span>
                  </div>
                  <input class="form-control" type="text" name="city" list="universidade" placeholder="selecione uma universidade" autocomplete="off">
                  <datalist id="universidade">
                    <option id="nome_uni" value=""></option>
                  </datalist>
                </div>
            </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
            <input type="submit" name="action_button_f" id="action_button_f" class="btn btn-warning" value="Add_f" />
            <input type="hidden" name="action_f" id="action_f">
            <input type="hidden" name="hidden_id_f" id="hidden_id_f"/>
          </div>
        </div>
      </div>
    </div>

    <script src="assets/vendor/jquery/dist/jquery.min.js"></script>
    <script>
    $(document).ready(function(){

      $('#create_record').click(function(){
        $('.modal-title').text("Add Nova Universidade");
        $('#action_button').val("Add");
        $('#action').val("Add");
        $('#formModal').modal('show');
      });

      $('#create_faculdade').click(function(){
        $('.modal-title').text("Add Nova Faculdade");
        $('#action_button_f').val("Add_f");
        $('#action_f').val("Add_f"); 
        $('#formFaculdade').modal('show');
      });

      $('#sample_form').on('submit', function(event){
      event.preventDefault();

      //CADASTRAR UNIVERSIDADE
      if($('#action').val() == 'Add'){
        $.ajax({
          url: "{{ route('universidade.store') }}",
          method: "POST",
          data: new FormData(this),
          contentType: false,
          cache: false,
          processData: false,
          dataType: "json",
          success: function(data)
          {
            var html = '';
            if(data.errors)
            {
              html = '<div class="alert alert-warning">';
              for(var count = 0; count < data.errors.length; count++)
              {
                html += '<p>' + data.errors[count] + '</p>';
              }
              html += '</div>';
            }
            if(data.success)
            {
              html = '<div class="alert alert-warning">' + data.success + '</div>';

              $('#sample_form')[0].reset();
            }
            $('#form_result').html(html);
          }
        })
      }

      //ATUALIZAR UNIVERSIDADE
      if($('#action_button').val() == "Editar"){
         $.ajax({
            url:"{{ route('universidade.update') }}",
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
                html = '<div class="alert alert-warning">';
                for(var count = 0; count < data.errors.length; count++)
                {
                 html += '<p>' + data.errors[count] + '</p>';
                }

                html += '</div>';
               }

               if(data.success)
               {
                  html = '<div class="alert alert-warning">' + data.success + '</div>';
                  $('#sample_form')[0].reset();
               }

               $('#form_result').html(html);
              }
           });
          }

      });

      $('#sample_form_f').on('submit', function(event){
        event.preventDefault();

        //CADASTRAR FACULDADE
      if($('#action_f').val() == 'Add_f'){
        $.ajax({
          url: "{{ route('faculdade.store') }}",
          method: "POST",
          data: new FormData(this),
          contentType: false, 
          cache: false,
          processData: false,
          dataType: "json",
          success: function(data)
          {
            var html = '';
            if(data.errors)
            {
              html = '<div class="alert alert-warning">';
              for(var count = 0; count < data.errors.length; count++)
              {
                html += '<p>' + data.errors[count] + '</p>';
              }
              html += '</div>';
            }
            if(data.success)
            {
              html = '<div class="alert alert-warning">' + data.success + '</div>';

              $('#sample_form')[0].reset();
            }
            $('#form_result_f').html(html);
          }
        })
      }
      });

      //RECUPERAR ID UNIVERSIDADE
      $(document).on('click', '.adicionar_f', function(){
        var id = $(this).attr('name');
        var html;
        $('#form_result_f').html('');

        $.ajax({
          url: "{{ route('faculdade.index') }}",
          dataType: "json",
          success: function(data){

            $('#hidden_id_f').val(data.id);
            for(var count = 0; count < data.data.length; count++)
              {
                console.log(data.data.nome_universidade)
                html += '<p>' + data.nome_universidade + '</p>';
              }
              $('#nome_uni').html(html)
            } 
        })
      });

      // EDITAR UNIVERSIDADE
      $(document).on('click', '.edit', function(){
        var id = $(this).attr('id');
        $('#form_result').html('');

        $.ajax({
          url: "/universidade/"+id+"/edit",
          dataType: "json",
          success: function(html){

            $('#nome_universidade').val(html.data.nome_universidade);
            $('#apelido').val(html.data.apelido);
            $('#localizacao').val(html.data.localizacao);

            // $('#store_image').html("<img src={{URL::to('/')}}/images/" + html.data.image + " width='70' class='img-thumbnail' />");

            // $('#store_image').append("<input type='hidden' name='hidden_image' value='" + html.data.image + "' />");

            $('#hidden_id').val(html.data.id);
            $('.modal-title').text("Editar Universidade");
            $('#action_button').val("Editar");
            $('#action').val("Editar"); 
            $('#formModal').modal('show');
          }
        })
      });

  // var user_id;

  // $(document).on('click', '.delete', function(){
  //   user_id = $(this).attr('id');
  //   $('#confirmModal').modal('show');
  // });

  // $('#ok_button').click(function(){
  //   $.ajax({
  //     url: ""
  //     beforeSend: function(){
  //       $('#ok_button').text('Deleting...');
  //     },
  //     success: function(data){

  //       setTimeout(function(){
  //         $('#confirmModal').modal('hide');
  //         $('#user_table').DataTable().ajax.reload();

  //       }, 2000);
  //     }
  //   })
  // });

    })
</script> 
@endsection