@extends('adminlte::page')

@section('title','Fazer Saque')

@section('content-header')
    <h1>Confirmar Transferência</h1>

    <ol class="breadcrumb">
        <li><a href="">Dashboard</a></li>
        <li><a href="">Saldo</a></li>
        <li><a href="">Deposito</a></li>
    </ol>
@stop

@section('content')
<div class="box">
        <div class="box-header">
            <h3>Confirmar Transferência Saldo</h3>
        </div>
        <div class="box-body">
           @include('admin.includes.alerts')

            <p><strong>Recebedor:</strong>{{ $query->name }}</p>

            <form method="POST" action="{{ route('transfer.store') }}">
                {{ csrf_field() }}
                <input type="hidden" name="sender_id" value="{{ $query->id }}">
                <div class="form-group">
                    <input type="text" placeholder="Valor:" name="balance" class="form-control">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success">Transferir</button>
                </div>
            </form
        </div>
    </div>
@stop