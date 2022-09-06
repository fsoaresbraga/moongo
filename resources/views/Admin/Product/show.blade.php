@extends('Admin.Layout.app')
@section('title', 'Editar Produto Moongo')
@section('content')
<div class="content-wrapper">
    <div class="page-header">
        <div class="row">
            <div class="col-12">
                <h3 class="page-title">Editar Produto </h3>
            </div>
        </div>

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{route('admin.product.index')}}">Produtos</a></li>
            <li class="breadcrumb-item active" aria-current="page">Editar produto</li>
            </ol>
        </nav>

    </div>

    <div class="row">
      <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <form action="{{route('admin.product.edit', $product->id)}}" method="POST" class="forms-sample">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="edit-sku">SKU</label>
                            <input type="text" name="sku" class="form-control @if($errors->has('sku')) is-invalid  @endif" id="edit-sku" placeholder="SKU" value="{{$product->sku}}">
                            @if($errors->has('sku'))
                                <div class="invalid-feedback">{{ $errors->first('sku') }}</div>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="edit-description">Descrição </label>
                            <input type="text" name="description" class="form-control @if($errors->has('description')) is-invalid  @endif" id="dit-description" placeholder="Descrição" value="{{$product->description}}">
                            @if($errors->has('description'))
                                <div class="invalid-feedback">{{ $errors->first('description') }}</div>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group @if($errors->has('brand')) is-invalid  @endif">
                            <label>Marca</label>
                            <select class="js-example-basic-single form-control"  name="brand">
                                <option value="#" disabled selected>informe uma Marca</option>
                                @foreach($brands as $brand)
                                    <option value="{{$brand->id}}" {{$brand->id == $product->brand_id ? "selected" : ""}}>{{$brand->name}}</option>
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
                                    <option value="{{$category->id}}" {{$category->id == $product->category_id ? "selected" : ""}}>{{$category->name}}</option>
                                @endforeach
                            </select>
                            @if($errors->has('category'))
                                <div class="invalid-feedback">{{ $errors->first('category') }}</div>
                            @endif
                        </div>
                    </div>

                    
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="edit-cost">Custo</label>
                            <input type="text" name="cost" class="form-control money" id="edit-cost" placeholder="Custo" value="{{$product->cost}}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="edit-last_purchase_cost">Custo Última Compra</label>
                            <input type="text" name="last_purchase_cost" class="form-control money" id="edit-last_purchase_cost" placeholder="Custo Última Compra" value="{{$product->last_purchase_cost}}">
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="edit-sale_price">Preço Venda</label>
                            <input type="text" name="sale_price" class="form-control money" id="edit-sale_price" placeholder="Preço Venda" value="{{$product->sale_price}}">
                        </div>
                    </div>
                    <div class="col-md-12 form-group">
                        <div class="form-check form-check-warning">
                            <label class="form-check-label">
                            <input type="checkbox" name="status" value="1"class="form-check-input" {{$product->status ? "checked" : ""}}> Produto Ativo? <i class="input-helper"></i></label>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <button type="submit" class="btn btn-inverse-success btn-fw btn-lg">Editar Produto</button>
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
