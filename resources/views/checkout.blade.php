@extends('Layout.app')
@section('content')
<div class="container">
    <div class="cart-page-area">
        <h6 class="page-title text-center">Pagamento PIX</h6>

        <div class="row">
            <div class="col-12 text-center">
                <img src="{{asset('images/qrcodes/'.$movement->image)}}" width="300px">
            </div>
        
            <div class="col-12 mt-4 text-center">
                <p id="linkPix">{{$movement->link}}</p>

                <a class="btn btn-base w-100 mt copyPix" data-copy-text="{{$movement->link}}"><i class="fas fa-money-bill"></i> COPIAR CHAVE PIX</a>
            </div>
        </div>
        
        <a class="btn w-100 d-none" id="paymentOk"  
            style="
            color: #fff;
            border: solid 1px #198754;
            background: #198754;
            margin-top: 14px;"  

            href="{{route('home', $user->hash)}}">

            <i class="fas fa-check"></i> Concluir Pagamento
        </a>
        </div>
    </div>
</div>

<style>

</style>

<script>
   
</script>
@endsection
