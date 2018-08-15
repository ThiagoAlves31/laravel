@extends('adminlte::page')

@section('title','Fazer Saque')

@section('content-header')
    <h1>Transferir Saldo (Informe o recebedor)</h1>

    <ol class="breadcrumb">
        <li><a href="">Dashboard</a></li>
        <li><a href="">Saldo</a></li>
        <li><a href="">Deposito</a></li>
    </ol>
@stop

@section('content')
<div class="box">
        <div class="box-header">
            <h3>Fazer Transferência</h3>
        </div>
        <div class="box-body">
           @include('admin.includes.alerts')
            <form method="POST" action="{{ route('confirm.transfer') }}">
                {{ csrf_field() }}
                
                <div class="form-group">
                    <input type="text" placeholder="Nome ou email do destinatário" name="value" class="form-control">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success">Escolher</button>
                </div>
            </form
        </div>
    </div>
@stop