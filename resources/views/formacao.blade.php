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
                  <li class="breadcrumb-item"><a href="#">Formações do estudante</a></li>
                </ol>
              </nav>
            </div>
            <div class="col-lg-6 col-5 text-right">
            <button type="button" name="create_record" id="create_record" class="btn btn-sm btn-neutral"><i class="ni ni-single-02"></i> Nova Formação</button>
            <a href="#" class="btn btn-sm btn-neutral">Filtrar</a>
            </div>
          </div>
        </div>
      </div>
    </div>
    
    <!-- Page content -->
    <div class="container-fluid mt--6">

      <div class="row">
        <div class="col"> <br> <br> <br> <br>
        <div class="card">
          <h3 class="card-header bg-dark text-white">Licenciatura</h3>
          <div class="card-body bg-dark">
            <h2 class="card-title text-white">UAN-FC - Ciências da computação</h2>
            <p class="card-text text-white">Licenciatura em Ciências da computação, no ano de 2017.</p>
            <a href="#" class="btn btn-primary">Concluída</a>
          </div>
        </div>
        <div class="card">
          <h3 class="card-header bg-dark text-white">Mestrado</h3>
          <div class="card-body bg-dark">
            <h2 class="card-title text-white">UCAN - Ciências da computação</h2>
            <p class="card-text text-white">Licenciatura em Ciências da computação, no ano de 2017.</p>
            <a href="#" class="btn btn-warning">Pendente</a>
          </div>
        </div>
        <div class="card">
          <h3 class="card-header bg-dark text-white">Dotoramento</h3>
          <div class="card-body bg-dark">
            <h2 class="card-title text-white">UK - Ciências da computação</h2>
            <p class="card-text text-white">Licenciatura em Ciências da computação, no ano de 2017.</p>
            <a href="#" class="btn btn-warning">Pendente</a>
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

    <script src="assets/vendor/jquery/dist/jquery.min.js"></script>
    <script>
  //   $(document).ready(function(){

  //     $('#create_record').click(function(){
  //       $('.modal-title').text("Add Nova Universidade");
  //       $('#action_button').val("Add");
  //       $('#action').val("Add");
  //       $('#formModal').modal('show');
  //     });

  //     $('#sample_form').on('submit', function(event){
  //   event.preventDefault();

  //   if($('#action').val() == 'Add')
  //   {
  //     $.ajax({
  //       url: "{{ route('universidade.store') }}",
  //       method: "POST",
  //       data: new FormData(this),
  //       contentType: false,
  //       cache: false,
  //       processData: false,
  //       dataType: "json",
  //       success: function(data)
  //       {
  //         var html = '';
  //         if(data.errors)
  //         {
  //           html = '<div class="alert alert-warning">';
  //           for(var count = 0; count < data.errors.length; count++)
  //           {
  //             html += '<p>' + data.errors[count] + '</p>';
  //           }
  //           html += '</div>';
  //         }
  //         if(data.success)
  //         {
  //           html = '<div class="alert alert-warning">' + data.success + '</div>';

  //           $('#sample_form')[0].reset();
  //         }
  //         $('#form_result').html(html);
  //       }
  //     })
  //   }

  // if($('#action_button').val() == "Editar"){
  //    $.ajax({
  //       url:"{{ route('universidade.update') }}",
  //       method:"POST",
  //       data:new FormData(this),
  //       contentType: false,
  //       cache: false,
  //       processData: false,
  //       dataType:"json",
  //       success:function(data)
  //       {
  //         var html = '';
  //         if(data.errors)
  //        {
  //           html = '<div class="alert alert-warning">';
  //           for(var count = 0; count < data.errors.length; count++)
  //           {
  //            html += '<p>' + data.errors[count] + '</p>';
  //           }

  //           html += '</div>';
  //          }

  //          if(data.success)
  //          {
  //             html = '<div class="alert alert-warning">' + data.success + '</div>';
  //             $('#sample_form')[0].reset();
  //          }

  //          $('#form_result').html(html);
  //         }
  //      });
  //     }
  // });

  // $(document).on('click', '.edit', function(){
  //   var id = $(this).attr('id');
  //   $('#form_result').html('');

  //   $.ajax({
  //     url: "/universidade/"+id+"/edit",
  //     dataType: "json",
  //     success: function(html){

  //       $('#nome_universidade').val(html.data.nome_universidade);
  //       $('#apelido').val(html.data.apelido);
  //       $('#localizacao').val(html.data.localizacao);

        // $('#store_image').html("<img src={{URL::to('/')}}/images/" + html.data.image + " width='70' class='img-thumbnail' />");

        // $('#store_image').append("<input type='hidden' name='hidden_image' value='" + html.data.image + "' />");

  //       $('#hidden_id').val(html.data.id);
  //       $('.modal-title').text("Editar Universidade");
  //       $('#action_button').val("Editar");
  //       $('#action').val("Editar"); 
  //       $('#formModal').modal('show');
  //     }
  //   })
  // });

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

    // })
</script> 
@endsection