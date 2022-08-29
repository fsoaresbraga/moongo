@extends('Layout.app')
@section('content')


    <div class="container">
        <div class="main-home-area pb-0 mt-5">
            <div class="location-area">
                <div class="media">
                    <img src="{{asset('assets/img/logo.png')}}" alt="img" width="110px">
                    <div class="media-body">
                        <span>Motorista:  <b>{{$user->name}}</b></span>
                    </div>
                </div>
                <a class="notification-btn" href="{{route('cart.view', $user->hash)}}"><img src="{{asset('assets/img/icon/svg/bag.svg')}}" alt="icon" width="35px">
                    <span class="count-cart" id="count-cart">0</span>
                </a>
            </div>
            @php /*@include('search')*/@endphp
        </div>
    </div>
    <div class="container">
        <div class="row">
            @foreach($user->products as $product)
                <div class="col-6">
                    <div class="single-product-wrap">
                        <div class="thumb">
                            <a href="#">
                                <img src="{{asset('assets/img/'.$product->image)}}" alt="img">
                            </a>
                        </div>
                        <div class="details">

                            <h6 class="title"><a href="#">{{\Illuminate\Support\Str::limit($product->title, $limit = 25, $end = '...') }}</a></h6>
                            <div class="ratting">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <span>({{$product->rating}})</span>
                            </div>
                            <h6 class="price"><span>R$ {{number_format($product->price, 2, ',', ' ')}} </span></h6>
                            <!--<a href="" class="btn-small btn-base w-100">Comprar</a>-->
                            @if ($product->pivot->quantity == 0)
                            <div class="w-100"><i class="far fa-frown"></i> Sem Estoque</div>
                            @else
                                <button class="btn-small btn-base w-100" id="btn_prod_{{$product->id}}" onclick="addToCart('{{$product->id}}', '{{$user->id}}')"><i class="fas fa-shopping-bag"></i> ADD</button>
                            @endif
                                
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>

@endsection
