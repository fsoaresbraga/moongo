@extends('App.Layout.app')
@section('content')
    <!-- preloader area start -->
<div class="container">
    <div class="cart-page-area">
        <a class="btn back-page-btn" href="{{route('home', $user->hash)}}"><i class="fas fa-angle-left"></i></a>
        <input type="hidden" name="user" id="user" value="{{$user->id}}">
        <h6 class="page-title text-center">Carrinho</h6>
        <div id="containerCart"></div>

    </div>
</div>

<div class="order-cart-area">
    <form class="order-cart">
        <ul>
            <li class="total">Total<span id="valueTotal">--</span></li>
        </ul>
        <a class="btn btn-white w-100 submitPayment" href="#"> Finalizar com PIX</a>
    </form>
</div>
<script>

</script>
@endsection
