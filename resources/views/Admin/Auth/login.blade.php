
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login Moongo</title>

    <link rel="stylesheet" href="{{asset('admin/vendors/mdi/css/materialdesignicons.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin/vendors/css/vendor.bundle.base.css')}}">
    <link rel="stylesheet" href="{{asset('admin/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('admin/vendors/notification/notification.css')}}">

    <link rel="shortcut icon" href="{{asset('admin/assets/images/favicon.ico')}}" />
  </head>
  <body>
    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="row w-100">
          <div class="content-wrapper full-page-wrapper d-flex align-items-center auth login-bg">
            <div class="card col-lg-4 mx-auto">
              <div class="card-body px-5 py-5">
                <h3 class="card-title text-start mb-3">Login</h3>
                <form action="{{route('admin.login.authenticate')}}" method="post">
                    {{ csrf_field() }}
                  <div class="form-group">
                    <label>E-mail*</label>
                    <input type="email" name="email" class="form-control @if($errors->has('email')) is-invalid  @endif" placeholder="E-mail" value="{{old('email')}}">
                    @if($errors->has('email'))
                        <div class="invalid-feedback">{{ $errors->first('email') }}</div>
                    @endif
                  </div>
                  <div class="form-group">
                    <label>Senha *</label>
                    <input type="password" name="password" placeholder="Senha" class="form-control p_input @if($errors->has('password')) is-invalid  @endif">
                    @if($errors->has('password'))
                        <div class="invalid-feedback">{{ $errors->first('password') }}</div>
                    @endif
                  </div>
                  <div class="text-center">
                    <button type="submit" class="btn btn-warning btn-block enter-btn w-100 text-black">Logar</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <script src="{{asset('admin/vendors/js/vendor.bundle.base.js')}}"></script>
    <script src="{{asset('admin/js/hoverable-collapse.js')}}"></script>
    <script src="{{asset('admin/js/bootstrap-growl.min.js')}}"></script>
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
