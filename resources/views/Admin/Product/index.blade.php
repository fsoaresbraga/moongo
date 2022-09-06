@extends('Admin.Layout.app')
@section('title', 'Produtos Moongo')
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
          <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
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
                    <a href="{{route("admin.product.create")}}" class="btn btn-inverse-warning btn-fw mb-4">Cadastrar Produto</a>
                </div>
                @if(count($products) == 0)
                    <div class="col-md-12">
                        <div class="alert alert-warning background-warning">
                            <strong>Atenção!</strong>
                            <code style="color:black"> Nenhum Produto Cadastrado</code>
                        </div>
                    </div>
                @else
                    <div class="dt-responsive table-responsive">
                        <table id="footer-search" class="table  table-bordered nowrap">
                            <thead>
                                <tr>
                                    <th class="nosort">SKU</th>
                                    <th >Descrição </th>
                                    <th >Marca</th>
                                    <th>Categoria</th>
                                    <th class="nosort">Custo</th>
                                    <th class="nosort">Preço Venda</th>
                                    <th class="nosort">Custo Última Compra</th>
                                    <th class="nosort">Qtd. Entrada</th>
                                    <th class="nosort">Qtd. Saída</th>
                                    <th class="nosort" >Estoque</th>
                                    <th class="nosort">Opção</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($products as $product)
                                    <tr>
                                        <td>{{$product->sku}}</td>
                                        <td>{{$product->title}}</td>
                                        <td>{{($product->brand)}}</td>
                                        <td>{{$product->category}}</td>
                                        <td>R$ {{number_format($product->cost, 2, ',', '.')}}</td>
                                        <td>R$ {{number_format($product->sale_price, 2, ',', '.')}}</td>
                                        <td>R$ {{number_format($product->last_purchase_cost, 2, ',', '.')}}</td>
                                        <td>{{$product->entry}}</td>
                                        <td>{{$product->way_out}}</td>
                                        <td style="font-weight: bold; color: {{($product->total > "10" ? '#27953d' : '#fc424a')}}">{{$product->total}}</td>
                                        <td>
                                            <a href="{{route('admin.product.show', $product->id)}}" class="btn btn-outline-secondary btn-icon-text"> <i class="mdi mdi-file-check btn-icon-append"></i></a>
                                            @php
                                             /*<a href="#" onclick="deleteProduct('{{$product->id}}')" class="btn btn-outline-danger btn-icon-text"> <i class="mdi mdi mdi-delete btn-icon-append"></i></a>*/
                                            @endphp
                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th class="nosort">SKU</th>
                                    <th >Descrição </th>
                                    <th >Marca</th>
                                    <th>Categoria</th>
                                    <th class="nosort">Custo</th>
                                    <th class="nosort">Preço Venda</th>
                                    <th class="nosort">Custo Última Compra</th>
                                    <th class="nosort">Qtd. Entrada</th>
                                    <th class="nosort">Qtd. Saída</th>
                                    <th class="nosort" >Estoque</th>
                                    <th class="nosort">Opção</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>

                @endif
            </div>
          </div>
        </div>
      </div>
    </div>
</div>
@endsection
