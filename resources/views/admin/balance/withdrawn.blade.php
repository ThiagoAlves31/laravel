@extends('adminlte::page')

@section('title','Fazer Saque')

@section('content-header')
    <h1>Fazer Retirada</h1>

    <ol class="breadcrumb">
        <li><a href="">Dashboard</a></li>
        <li><a href="">Saldo</a></li>
        <li><a href="">Deposito</a></li>
    </ol>
@stop

@section('content')
<div class="box">
        <div class="box-header">
            <h3>Fazer Retirada</h3>
        </div>
        <div class="box-body">
           @include('admin.includes.alerts')
            <form method="POST" action="{{ route('withdrawn.store') }}">
                {{ csrf_field() }}
                
                <div class="form-group">
                    <input type="text" placeholder="Valor Da Retirada" name="value" class="form-control">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success">Sacar</button>
                </div>
            </form
        </div>
    </div>
@stop