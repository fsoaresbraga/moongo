<!DOCTYPE html>
<html lang="pt_Br">
    @include('App.Layout.Components.head')
<body class='sc5'>

    <!-- preloader area start -->
    <div class="preloader" id="preloader">
        <div class="preloader-inner">
            <div id="wave1">
            </div>
            <div class="spinner">
                <div class="dot1"></div>
                <div class="dot2"></div>
            </div>
        </div>
    </div>
    <!-- preloader area end -->
    @yield('content')


    @include('App.Layout.Components.scripts')
</body>
</html>
