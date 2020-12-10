@extends('admin.layout')

@section('conteudo')
  <!-- Main content -->
  <div class="main-content" id="panel">
    <!-- Header -->
    <!-- Header -->
    <div class="header pb-6 d-flex align-items-center" style="min-height: 500px; background-image: url(../assets/img/theme/profile-cover.jpg); background-size: cover; background-position: center top;">
      <!-- Mask -->
      <span class="mask bg-gradient-default opacity-8"></span>
      <!-- Header container -->
      <div class="container-fluid d-flex align-items-center">
        <div class="row">
          <div class="col-lg-7 col-md-10">
            <h1 class="display-2 text-white">Olá, Osvaldo</h1>
            <p class="text-white mt-0 mb-5">Esta é a sua página de perfil. Você pode editar seus dados pessoais aqui!</p>
            <a href="#!" class="btn btn-neutral">Editar perfil</a>
          </div>
        </div>
      </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--6">
      <div class="row">
        <div class="col-xl-4 order-xl-2">
          <div class="card card-profile">
            <img src="../assets/img/theme/img-1-1000x600.jpg" alt="Image placeholder" class="card-img-top">
            <div class="row justify-content-center">
              <div class="col-lg-3 order-lg-2">
                <div class="card-profile-image">
                  <a href="#">
                    <img src="../assets/img/theme/team-4.jpg" class="rounded-circle">
                  </a>
                </div>
              </div>
            </div>
            <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
              <!-- <div class="d-flex justify-content-between">
                <a href="#" class="btn btn-sm btn-info  mr-4 ">Connect</a>
                <a href="#" class="btn btn-sm btn-default float-right">Message</a>
              </div> -->
            </div>
            <div class="card-body pt-0">
              <div class="row">
                <div class="col">
                  <div class="card-profile-stats d-flex justify-content-center">
                    <div>
                      <span class="heading">0</span>
                      <span class="description">Licenciatura</span>
                    </div>
                    <div>
                      <span class="heading">0</span>
                      <span class="description">Mestrado</span>
                    </div>
                    <div>
                      <span class="heading">89</span>
                      <span class="description">Dotoramento</span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="text-center">
                <h5 class="h3">
                  Osvaldo Cipriano<span class="font-weight-light">, 27</span>
                </h5>
                <div class="h5 font-weight-300">
                  <i class="ni location_pin mr-2"></i>Luanda, Angola
                </div>
                <div class="h5 mt-4">
                  <!-- <i class="ni business_briefcase-24 mr-2"></i>Solution Manager - Creative Tim Officer -->
                </div>
                <div>
                  <!-- <i class="ni education_hat mr-2"></i>University of Computer Science -->
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-8 order-xl-1">
          <div class="card">
            <div class="card-header">
              <div class="row align-items-center">
                <div class="col-8">
                  <h3 class="mb-0">Editar perfil </h3>
                </div>
                <div class="col-4 text-right">
                  <a href="#!" class="btn btn-sm btn-primary">Definições</a>
                </div>
              </div>
            </div>
            <div class="card-body">
              <form>
                <h6 class="heading-small text-muted mb-4">Informação</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username">Nome usuario</label>
                        <input type="text" id="input-username" class="form-control" placeholder="Username" value="osvaldo.cipriano">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-email">Email</label>
                        <input type="email" id="input-email" class="form-control" placeholder="osvaldo@example.com">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-first-name">Nome do estudante</label>
                        <input type="text" id="input-first-name" class="form-control" placeholder="Nome do estudante" value="Osvaldo Cipriano">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-last-name">Nº BI</label>
                        <input type="text" id="input-last-name" class="form-control" placeholder="Número do bilhete" value="05845LA5790216">
                      </div>
                    </div>
                  </div>
                </div>
                <hr class="my-4" />
                <!-- Address -->
                <h6 class="heading-small text-muted mb-4">INFORMAÇÕES DE CONTATO</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-address">Endereço</label>
                        <input id="input-address" class="form-control" placeholder="Home Address" value="Palanca, rua F1, casa nª 19" type="text">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label class="form-control-label" for="input-city">País</label>
                        <input type="text" id="input-city" class="form-control" placeholder="Angola">
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <!-- <div class="form-group">
                        <label class="form-control-label" for="input-country">País</label>
                        <input type="text" id="input-country" class="form-control" placeholder="Country" value="United States">
                      </div> -->
                    </div>
                    <div class="col-lg-4">
                      <div class="form-group">
                        <!-- <label class="form-control-label" for="input-country">Postal code</label>
                        <input type="number" id="input-postal-code" class="form-control" placeholder="Postal code"> -->
                      </div>
                    </div>
                  </div>
                </div>
                <hr class="my-4" />
                <!-- Description -->
                <h6 class="heading-small text-muted mb-4">Sobre min</h6>
                <div class="pl-lg-4">
                  <div class="form-group">
                    <label class="form-control-label">Sobre min</label>
                    <textarea rows="4" class="form-control" placeholder="A few words about you ...">Descrição do estudante</textarea>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection
