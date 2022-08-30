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

    <script>
        @if(Session::has('message'))
            $.growl({
                icon: " {{Session::get('icon')}} ",
                title: " {{Session::get('title')}} ",
                message: " {{Session::get('message')}} ",
                url: ''
            },{
                element: 'body',
                type: "{{Session::get('type')}}",
                allow_dismiss: true,
                placement: {
                    from: 'top',
                    align: 'right'
                },
                offset: {
                    x: 30,
                    y: 30
                },
                spacing: 10,
                z_index: 999999,
                delay: 3000,
                timer: 1000,
                url_target: '_blank',
                mouse_over: false,
                animate: {
                    enter: 'animated bounceInRight',
                    exit: 'animated bounceOutRight'
                },
                icon_type: 'class',
                template: '<div data-growl="container" class="alert" style="width:470px" role="alert">' +
                '<span style="font-weight: bold;font-size:16px"data-growl="icon"></span>' +
                '<span style="font-weight: bold;font-size:14px" data-growl="title"></span><br />' +
                '<span style="font-weight: bold;font-size:16px" data-growl="message"></span>' +
                '<a href="#" data-growl="url"></a>' +
                '</div>'
            });
        @endif
    </script>
  </body>
</html>
