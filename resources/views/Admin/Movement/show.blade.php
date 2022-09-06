@extends('Admin.Layout.app')
@section('title', 'Editar Movimentação Moongo')
@section('content')
<div class="content-wrapper">
    <div class="page-header">
        <div class="row">
            <div class="col-12">
                <h3 class="page-title">Editar Movimentação </h3>
            </div>
        </div>

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{route('admin.movement.index')}}">Movimentações</a></li>
            <li class="breadcrumb-item active" aria-current="page">Editar Movimentação</li>
            </ol>
        </nav>

    </div>

    <div class="row">
      <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <form action="{{route('admin.movement.edit', $movement->id)}}" method="POST" class="forms-sample">
                @csrf
                <div class="row">

                    <div class="col-md-6">
                        <div class="form-group @if($errors->has('movement')) is-invalid  @endif">
                            <label>Movimentação</label>
                            <select class="js-example-basic-single form-control @if($errors->has('movement')) is-invalid  @endif"  name="movement">
                                <option value="#" disabled selected></option>
                                <option 
                                    value="Carro -> Perca"
                                    {{
                                        $movement->origin->name == "Carro" &&
                                        $movement->destination->name == "Perda" ? 'selected' : ''
                                     }}
                                >
                                        Carro -> Perca
                                </option>

                                <option 
                                    {{
                                        $movement->origin->name == "Carro" &&
                                        $movement->destination->name == "Venda" ? 'selected' : ''
                                    }}
                                    value="Carro -> Venda"
                                >
                                    Carro -> Venda
                                </option>

                                <option 
                                    {{
                                        $movement->origin->name == "Compra" &&
                                        $movement->destination->name == "Estoque" ? 'selected' : ''
                                    }}
                                    value="Compra -> Estoque"
                                >
                                    Compra -> Estoque
                                </option>

                                <option 
                                    {{
                                        $movement->origin->name == "Estoque" && 
                                        $movement->destination->name == "Carro" ? 'selected' : ''
                                    }}
                                    value="Estoque -> Carro"
                                >
                                    Estoque -> Carro
                                </option>

                                <option 
                                    {{
                                        $movement->origin->name == "Estoque" && 
                                        $movement->destination->name == "Perda" ? 'selected' : ''
                                    }}
                                    value="Estoque -> Perca"
                                >
                                    Estoque -> Perca
                                </option>
                            </select>
                            
                            @if($errors->has('movement'))
                                <div class="invalid-feedback">{{ $errors->first('movement') }}</div>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group @if($errors->has('product')) is-invalid  @endif">
                            <label>Produto</label>
                            <select class="js-example-basic-single form-control @if($errors->has('product')) is-invalid  @endif"  name="product">
                                <option value="#" disabled selected></option>
                                @foreach($products as $product)
                                    <option value="{{$product->id}}" {{$product->id == $movement->product_id ? "selected": ""}}>{{$product->title}}</option>
                                @endforeach
                            </select>
                            @if($errors->has('product'))
                                <div class="invalid-feedback">{{ $errors->first('product') }}</div>
                            @endif
                        </div>
                    </div>


                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="quantity">Quantidade</label>
                            <input type="number" name="quantity" class="form-control @if($errors->has('quantity')) is-invalid  @endif" id="quantity_edit" value="{{$movement->quantity}}">
                            @if($errors->has('quantity'))
                                <div class="invalid-feedback">{{ $errors->first('quantity') }}</div>
                            @endif
                        </div>
                    </div>
                    @php
                    /*
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="date_expiration_edit">Data de Vencimento</label>
                            <input type="text" name="date_expiration" class="form-control date @if($errors->has('date_expiration')) is-invalid  @endif" id="date_expiration_edit" placeholder="Data de Vencimento" value="{{date('d/m/Y', strtotime($movement->expiration))}}">
                            @if($errors->has('date_expiration'))
                                <div class="invalid-feedback">{{ $errors->first('date_expiration') }}</div>
                            @endif
                        </div>
                    </div>
                    */
                    @endphp
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="cost_edit">Custo</label>
                            <input type="text" name="cost" class="form-control money" id="cost_edit" value="{{$movement->cost}}">
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <button type="submit" class="btn btn-inverse-success btn-fw btn-lg">Editar Movimentação</button>
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
