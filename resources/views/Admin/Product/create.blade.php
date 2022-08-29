@extends('Admin.Layout.app')
@section('content')
@extends('Admin.Layout.app')
@section('content')
<div class="content-wrapper">
    <div class="page-header">
    <div class="row">
        <div class="col-12">
            <h3 class="page-title"> Novo Produto </h3>
        </div>
        
    </div>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Deshboard</a></li>
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
                        <div class="form-group">

                            <label>Marca</label>
                            <select class="js-example-basic-single @if($errors->has('brand')) is-invalid  @endif"  name="brand">
                                <option value="#" disabled selected>informe uma Marca</option>
                                <option value="AL">Alabama</option>
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
                        <div class="form-group">
                            <label>Categoria</label>
                            <select class="js-example-basic-single form-control  @if($errors->has('category')) is-invalid  @endif"  name="category">
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
                            <label for="cost_price">Preço de Custo </label>
                            <input type="text" name="cost_price" class="form-control money" id="cost_price" placeholder="Preço de Custo" value="{{old('cost_price')}}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="average_cost">Custo Médio </label>
                            <input type="text" name="average_cost" class="form-control money" id="average_cost" placeholder="Custo Médio" value="{{old('average_cost')}}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="price">Preço </label>
                            <input type="text" name="price" class="form-control money" id="price" placeholder="Preço" value="{{old('price')}}">
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
