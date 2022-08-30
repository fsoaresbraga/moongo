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
                                <th >Produto </th>
                                <th class="nosort">Código de Barras</th>
                                <th >Origen</th>
                                <th>Destino</th>
                                <th class="nosort">Categoria Movimentação</th>
                                <th class="nosort">Tipo Movimentação</th>
                                <th class="nosort">Data de Validade</th>
                                <th class="nosort">Custo</th>
                                <th class="nosort">Opção</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($movements as $movement)
                                <tr>
                                    <td>{{$movement->product->title}}</td>
                                    <td>{{$movement->bar_code}}</td>
                                    <td>{{($movement->origin->name)}}</td>
                                    <td>{{($movement->destination->name)}}</td>
                                    <td>{{($movement->categoryMovement->name)}}</td>
                                    <td>{{($movement->typeMovement->name)}}</td>
                                    <td>{{(date('d/m/Y', strtotime($movement->expiration)))}}</td>
                                    <td>0</td>
                                    <td>
                                        <a href="{{route('admin.movement.show', $movement->id)}}" class="btn btn-outline-secondary btn-icon-text"> Editar <i class="mdi mdi-file-check btn-icon-append"></i></a>
                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th >Produto </th>
                                <th class="nosort">Código de Barras</th>
                                <th >Origen</th>
                                <th>Destino</th>
                                <th class="nosort">Categoria Movimentação</th>
                                <th class="nosort">Tipo Movimentação</th>
                                <th class="nosort">Data de Validade</th>
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
