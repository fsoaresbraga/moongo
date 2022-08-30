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
                    <h1>tabela aqui</h1>

                @endif
            </div>
          </div>
        </div>
      </div>
    </div>
</div>
@endsection
