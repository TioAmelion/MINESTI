<!DOCTYPE html>
<html lang="PT-pt">

<head>
  @include("admin.includes.head")
</head>

<body>
  <!--side nav-->
  @include("admin.includes.sidenav")

  <!-- Main content -->
  <div class="main-content" id="panel">
    
    @yield('conteudo')
  </div>

  @include("admin.includes.script")
</body>

</html>
