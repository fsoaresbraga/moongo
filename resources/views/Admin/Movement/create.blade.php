@extends('Admin.Layout.app')
@section('title', 'Nova Movimentação Moongo')
@section('content')
<div class="content-wrapper">
    <div class="page-header">
        <div class="row">
            <div class="col-12">
                <h3 class="page-title">Nova Movimentação </h3>
            </div>
        </div>

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{route('admin.movement.index')}}">Movimentações</a></li>
            <li class="breadcrumb-item active" aria-current="page">Nova Movimentação</li>
            </ol>
        </nav>

    </div>
    <!-- 
        'product_id', 'bar_code', 'quantity', 'expiration', 'cost'-->
    <div class="row">
      <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <form action="{{route('admin.movement.store')}}" method="POST" class="forms-sample">
                @csrf
                <div class="row">

                    <div class="col-md-6">
                        <div class="form-group @if($errors->has('origin')) is-invalid  @endif">

                            <label>Origem</label>
                            <select class="js-example-basic-single form-control"  name="origin">
                                <option value="#" disabled selected>informe uma Origem</option>
                                @foreach($origins as $origin)
                                    <option value="{{$origin->id}}">{{$origin->name}}</option>
                                @endforeach
                            </select>
                            @if($errors->has('origin'))
                                <div class="invalid-feedback">{{ $errors->first('origin') }}</div>
                            @endif
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="form-group @if($errors->has('destination')) is-invalid  @endif">
                            <label>Destino</label>
                            <select class="js-example-basic-single form-control"  name="destination">
                                <option value="#" disabled selected>informe um Destino</option>
                                @foreach($destinations as $destination)
                                    <option value="{{$destination->id}}">{{$destination->name}}</option>
                                @endforeach
                            </select>
                            @if($errors->has('destination'))
                                <div class="invalid-feedback">{{ $errors->first('destination') }}</div>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group @if($errors->has('category_movement')) is-invalid  @endif">
                            <label>Categoria Movimentação</label>
                            <select class="js-example-basic-single form-control"  name="category_movement">
                                <option value="#" disabled selected>informe um Destino</option>
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                            @if($errors->has('category_movement'))
                                <div class="invalid-feedback">{{ $errors->first('category_movement') }}</div>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group @if($errors->has('type_movement')) is-invalid  @endif">
                            <label>Tipo Movimentação</label>
                            <select class="js-example-basic-single form-control"  name="type_movement">
                                <option value="#" disabled selected>informe um Destino</option>
                                @foreach($types as $type)
                                    <option value="{{$type->id}}">{{$type->name}}</option>
                                @endforeach
                            </select>
                            @if($errors->has('type_movement'))
                                <div class="invalid-feedback">{{ $errors->first('type_movement') }}</div>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group @if($errors->has('products')) is-invalid  @endif">
                            <label>Produto</label>
                            <select class="js-example-basic-single form-control"  name="products">
                                <option value="#" disabled selected>informe um Produto</option>
                                @foreach($products as $product)
                                    <option value="{{$product->id}}">{{$product->title}}</option>
                                @endforeach
                            </select>
                            @if($errors->has('products'))
                                <div class="invalid-feedback">{{ $errors->first('products') }}</div>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="bar_code">Código de Barras</label>
                            <input type="text" name="bar_code" class="form-control @if($errors->has('bar_code')) is-invalid  @endif" id="bar_code" placeholder="Código de Barras" value="{{old('bar_code')}}">
                            @if($errors->has('bar_code'))
                                <div class="invalid-feedback">{{ $errors->first('bar_code') }}</div>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="quantity">Quantidade</label>
                            <input type="number" name="quantity" class="form-control @if($errors->has('quantity')) is-invalid  @endif" id="quantity" placeholder="Quantidade" value="{{old('quantity')}}">
                            @if($errors->has('quantity'))
                                <div class="invalid-feedback">{{ $errors->first('quantity') }}</div>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="date_expiration">Data de Vencimento</label>
                            <input type="text" name="date_expiration" class="form-control date" id="date_expiration" placeholder="Data de Vencimento" value="{{old('date_expiration')}}">
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="cost">Custo</label>
                            <input type="text" name="cost" class="form-control money" id="cost" placeholder="Custo" value="{{old('cost')}}">
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <button type="submit" class="btn btn-inverse-success btn-fw btn-lg">Criar Movimentação</button>
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
