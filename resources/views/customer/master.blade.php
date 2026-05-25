<!DOCTYPE html><!--
* CoreUI - Free Bootstrap Admin Template
* @version v5.4.0
* @link https://coreui.io/product/free-bootstrap-admin-template/
* Copyright (c) 2026 creativeLabs Łukasz Holeczek
* Licensed under MIT (https://github.com/coreui/coreui-free-bootstrap-admin-template/blob/main/LICENSE)
-->
<html lang="en">
  <head>
    <base href="./">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="description" content="CoreUI - Open Source Bootstrap Admin Template">
    <meta name="author" content="Łukasz Holeczek">
    <meta name="keyword" content="Bootstrap,Admin,Template,Open,Source,jQuery,CSS,HTML,RWD,Dashboard">
    <title>CoreUI Free Bootstrap Admin Template</title>
    @include('customer.style')
  </head>
  <body>
    @include('customer.sidebar')
    <div class="wrapper d-flex flex-column min-vh-100">
      @include('customer.header')
      @yield('content')
      @include('customer.footer')
    </div>
    @include('customer.script')

  </body>
</html>