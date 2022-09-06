@extends('Admin.Layout.app')
@section('title', 'Movimentações Moongo')
@section('content')
<div class="content-wrapper">
    <div class="page-header">
    <div class="row">
        <div class="col-12">
            <h3 class="page-title"> Movimentações </h3>
        </div>

    </div>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
          <li class="breadcrumb-item active" aria-current="page">Movimentações</li>
        </ol>
      </nav>
    </div>
    <div class="row">
      <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <div class="row">
                <div class="col-12">
                    <a href="{{route("admin.movement.create")}}" class="btn btn-inverse-warning btn-fw mb-4">Cadastrar Movimentação</a>
                </div>
                @if(count($movements) == 0)
                    <div class="col-md-12">
                        <div class="alert alert-warning background-warning">
                            <strong>Atenção!</strong>
                            <code style="color:black"> Nenhuma Movimentação Cadastrada</code>
                        </div>
                    </div>
                @else

                <div class="dt-responsive table-responsive">
                    <table id="movement-search" class="table table-bordered nowrap">
                        <thead>
                            <tr>
                                <th>Cód. de Barras</th>
                                <th >Produto</th>
                                <th >Usu. Mov</th>
                                <th>Mov</th>
                                <th class="nosort">Tipo Mov</th>
                                <th class="nosort">Qtd</th>
                                <th class="nosort">Custo</th>
                                <th class="nosort">Opção</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($movements as $movement)
                                <tr>
                                    <td>{{$movement->product->sku}}</td>
                                    <td>{{$movement->product->title}}</td>
                                    <td>
                                        {{$movement->user->name }} 
                                        {!!$movement->user->administrator ?  ' 
                                            <small class="administrator badge badge-success">Adm</small>' 
                                        : 
                                            ' <small class="motorist badge badge-warning">Mot</small>'
                                        !!}
                                    </td>
                                    <td>
                                        @if($movement->origin->name == "Carro" && $movement->destination->name == "Estoque")
                                            Carro -> Estoque
                                        @elseif($movement->origin->name == "Carro" && $movement->destination->name == "Perda")
                                            Carro -> Perda
                                        @elseif($movement->origin->name == "Carro" && $movement->destination->name == "Venda")
                                            Carro -> Venda
                                        @elseif($movement->origin->name == "Compra" && $movement->destination->name == "Estoque")
                                            Compra -> Estoque   
                                        @elseif($movement->origin->name == "Estoque" && $movement->destination->name == "Carro")
                                            Estoque -> Carro
                                        @elseif($movement->origin->name == "Estoque" && $movement->destination->name == "Perda")
                                            Estoque -> Perda
                                        @endif
                                    </td>
                                    <td style="font-weight: bold; color: {{($movement->typeMovement->name == "Entrada" ? '#27953d' : '#fc424a')}}" >{{($movement->typeMovement->name)}}</td>
                                    <td>{{$movement->quantity}}</td>
                                    <td>0</td>
                                    <td>
                                        @php
                                            /*
                                                <a href="{{route('admin.movement.show', $movement->id)}}" class="btn btn-outline-secondary btn-icon-text"> <i class="mdi mdi-file-check btn-icon-append"></i></a>
                                            */
                                        @endphp
                                        
                                        <a href="#" onclick="deleteMovement('{{$movement->id}}')" class="btn btn-outline-danger btn-icon-text deleteMovementClass"> <i class="mdi mdi mdi-delete btn-icon-append"></i></a>
                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Cód. de Barras</th>
                                <th>Produto</th>
                                <th class="nosort">Usu. Mov</th>
                                <th>Mov</th>
                                <th class="nosort">Tipo Mov</th>
                                <th class="nosort">Qtd</th>
                                <th class="nosort">Custo</th>
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
