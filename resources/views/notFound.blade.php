@extends('Layout.app')
@section('content')

    <div class="container">
        <div class="main-home-area pb-0 mt-5">
            <div class="location-area">
                <div class="media">
                    <img src="{{asset('assets/img/logo.png')}}" alt="img" width="110px">
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
           <div class="col-12">
                <div class="alert alert-warning" role="alert">
                    Nenhum motorista Encontrado.
                </div>
           </div>
        </div>
    </div>

@endsection
