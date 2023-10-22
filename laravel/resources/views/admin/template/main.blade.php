<!DOCTYPE html><!--
* CoreUI - Free Bootstrap Admin Template
* @version v4.2.2
* @link https://coreui.io/product/free-bootstrap-admin-template/
* Copyright (c) 2023 creativeLabs Łukasz Holeczek
* Licensed under MIT (https://github.com/coreui/coreui-free-bootstrap-admin-template/blob/main/LICENSE)
--><!-- Breadcrumb-->
<html lang="en">
  @include('admin.template.header')
  <body>
    @include('admin.template.sidebar')
    <div class="wrapper d-flex flex-column min-vh-100 bg-light">
      @include('admin.template.sidebarheader')
      <div class="body flex-grow-1 px-3">
        <div class="container-lg">
          @yield('content')
        </div>
      </div>
      @include('admin.template.footer')
    </div>
  </body>
</html>
<script>
  global.on("click","#btn-logout",()=>{
        localStorage.clear();
        sessionStorage.clear();
        window.location.href = base_url+"/login";
    });
</script>
@yield('footcode')