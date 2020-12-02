
    
  
          <div class="card">
            <!-- Card header -->
            <div class="card-header border-0">
              <h3 class="mb-0">{{ $user->name }}</h3>
            </div>
            <!-- Light table -->
            <div class="table-responsive">
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col" class="sort" data-sort="name">Função no Sistema</th>
                    <th scope="col" class="sort" data-sort="status">Descrição</th>
                    <th scope="col" class="sort" data-sort="completion">Acçoes</th>
                    <th scope="col"></th>
                  </tr>
                </thead>
                <tbody class="list">
                  @foreach($papeis as $papel)
                  <tr>
                  
                    <th scope="row">
                      <div class="media align-items-center">
                        <div class="media-body">
                          <span class="name mb-0 text-sm">{{ $papel->nome_papel }}</span>
                        </div>
                      </div>
                    </th>
                    <td>
                      <span class="badge badge-dot mr-4">
                        <i class="bg-warning"></i>
                        <span class="status">{{ $papel->descricao }}</span>
                      </span>
                    </td>
                    <td>
                      <div class="avatar-group">
                        <button type="button" class="btn btn-sm btn-success"><i class="fas fa-edit"></i>  Editar</button>
                        <button type="button" class="btn btn-sm btn-danger"><i class="fas fa-trash" style="color: black"></i>  Apagar</button>
                        <button type="button" class="btn btn-sm btn-dark"><i class="fas fa-eye"></i>  <a href="" title="">Função</a> </button>
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
      