<!DOCTYPE html>
<html lang="pt_br">
    @include('Admin.Layout.Components.head')
  <body>
    <div class="loader" ><img src="{{asset('admin/assets/images/loading.gif')}}"></div>
    <div class="container-scroller">

      @include('Admin.Layout.Components.sidebar')

      <div class="container-fluid page-body-wrapper">

        @include('Admin.Layout.Components.navbar')
       
        <div class="main-panel">

            @yield('content')

           @include('Admin.Layout.Components.footer')
        </div>
      </div>
    </div>
    @include('Admin.Layout.Components.scripts')
  </body>
</html>