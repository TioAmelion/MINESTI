  <nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">      
      <!-- Brand -->
      @include("admin.includes.logo")

      <div class="navbar-inner">
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
          <!-- Nav items -->
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link @isset($dashboard){{$dashboard}}@endisset" href="{{ url('dashboard') }}">
                <i class="ni ni-chart-pie-35 text-primary"></i>
                <span class="nav-link-text"><h3>Dashboard</h3></span>
              </a>
            </li>            
            <li class="nav-item">
              <a class="nav-link @isset($provincia){{$provincia}}@endisset" href="{{ url('provincias') }}">
                <i class="ni ni-pin-3 text-danger"></i>
                <span class="nav-link-text"><h3>Províncias</h3></span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link @isset($estudante){{$estudante}}@endisset" href="{{ url('estudantes') }}">
                <i class="ni ni-hat-3 text-yellow"></i>
                <span class="nav-link-text"><h3>Estudantes</h3></span>
              </a>
            </li>
            
            <li class="nav-item">
              <a class="nav-link @isset($instituicao) {{ $instituicao }} @endisset" href="{{ route('universidade.index') }}">
                <i class="ni ni-istanbul text-danger"></i>
                <span class="nav-link-text"><h3>Instituições</h3></span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link @isset($curso){{$curso}}@endisset" href="{{ url('cursos') }}">
                <i class="ni ni-single-copy-04 text-warning"></i>
                <span class="nav-link-text"><h3>Cursos</h3></span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link @isset($utilizador){{$utilizador}}@endisset" href="{{ route('user.index') }}">
                <i class="ni ni-circle-08 text-dark"></i>
                <span class="nav-link-text"><h3>Utilizadores</h3></span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link @isset($provincia){{$provincia}}@endisset" href="{{ url('provincias') }}">
                <i class="fas fa-eye text-danger"></i>
                <span class="nav-link-text"><h3>Funções</h3></span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link @isset($provincia){{$provincia}}@endisset" href="{{ url('provincias') }}">
                <i class="ni ni-bullet-list-67 text-primary"></i>
                <span class="nav-link-text"><h3>Permissões</h3></span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link @isset($estudante){{$estudante}}@endisset" href="{{ url('formacao') }}">
                <i class="ni ni-hat-3 text-warning"></i>
                <span class="nav-link-text"><h3>Formações</h3></span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link @isset($estudante){{$estudante}}@endisset" href="{{ url('perfil') }}">
                <i class="ni ni-circle-08 text-dark"></i>
                <span class="nav-link-text"><h3>Perfil</h3></span>
              </a>
            </li>
          </ul>      
        </div>
      </div>
    </div>
  </nav>