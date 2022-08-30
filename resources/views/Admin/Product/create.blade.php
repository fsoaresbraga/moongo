@extends('Admin.Layout.app')
@section('title', 'Novo Produto Moongo')
@section('content')
<div class="content-wrapper">
    <div class="page-header">
        <div class="row">
            <div class="col-12">
                <h3 class="page-title">Novo Produto </h3>
            </div>
        </div>

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{route('admin.product.index')}}">Produtos</a></li>
            <li class="breadcrumb-item active" aria-current="page">Novo produto</li>
            </ol>
        </nav>

    </div>

    <div class="row">
      <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <form action="{{route('admin.product.store')}}" method="POST" class="forms-sample">
                @csrf
                <div class="row">

                    <div class="col-md-6">
                        <div class="form-group @if($errors->has('brand')) is-invalid  @endif">

                            <label>Marca</label>
                            <select class="js-example-basic-single form-control"  name="brand">
                                <option value="#" disabled selected>informe uma Marca</option>
                                @foreach($brands as $brand)
                                    <option value="{{$brand->id}}">{{$brand->name}}</option>
                                @endforeach
                            </select>
                            @if($errors->has('brand'))
                                <div class="invalid-feedback">{{ $errors->first('brand') }}</div>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group @if($errors->has('category')) is-invalid  @endif">
                            <label>Categoria</label>
                            <select class="js-example-basic-single form-control"  name="category">
                                <option value="#" disabled selected>informe uma Categoria</option>
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                            @if($errors->has('category'))
                                <div class="invalid-feedback">{{ $errors->first('category') }}</div>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="sku">SKU</label>
                            <input type="text" name="sku" class="form-control @if($errors->has('sku')) is-invalid  @endif" id="sku" placeholder="SKU" value="{{old('sku')}}">
                            @if($errors->has('sku'))
                                <div class="invalid-feedback">{{ $errors->first('sku') }}</div>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="title">Título </label>
                            <input type="text" name="title" class="form-control @if($errors->has('title')) is-invalid  @endif" id="title" placeholder="Título" value="{{old('title')}}">
                            @if($errors->has('title'))
                                <div class="invalid-feedback">{{ $errors->first('title') }}</div>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="cost">Custo</label>
                            <input type="text" name="cost" class="form-control money" id="cost" placeholder="Custo" value="{{old('cost')}}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="last_purchase_cost">Custo Última Compra</label>
                            <input type="text" name="last_purchase_cost" class="form-control money" id="last_purchase_cost" placeholder="Custo Última Compra" value="{{old('last_purchase_cost')}}">
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="sale_price">Preço Venda</label>
                            <input type="text" name="sale_price" class="form-control money" id="sale_price" placeholder="Preço Venda" value="{{old('sale_price')}}">
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <button type="submit" class="btn btn-inverse-success btn-fw btn-lg">Criar Produto</button>
                        </div>
                    </div>
                </div>
            </form>
          </div>
        </div>
      </div>
    </div>
</div>
@endsection
