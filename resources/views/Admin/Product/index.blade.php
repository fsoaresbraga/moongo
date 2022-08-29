@extends('Admin.Layout.app')
@section('content')
@extends('Admin.Layout.app')
@section('content')
<div class="content-wrapper">
    <div class="page-header">
    <div class="row">
        <div class="col-12">
            <h3 class="page-title"> Produtos </h3>
        </div>
        
    </div>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Deshboard</a></li>
          <li class="breadcrumb-item active" aria-current="page">Produtos</li>
        </ol>
      </nav>
    </div>
    <div class="row">
      <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <div class="row">
                <div class="col-12">
                    <a href="{{route("admin.product.create")}}" class="btn btn-inverse-warning btn-fw">Cadastrar Produto</a>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>
@endsection
@endsection