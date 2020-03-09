@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="page-inner">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                <h2 style="text-align: center; color: #1b4b72">Contabilidad</h2> 
                <a class="btn btn-sm btn-outline-primary float-center" href="">Seleccionar periodo</a>
                <a class="btn btn-sm btn-outline-primary float-center" href="">Seleccionar contribuyente</a>
                
</div>

<div class="card-body">
                    <div class="row justify-content-center">
                        <div class="col-md-12">
                    
</div>
</div>
</div>
</div>
</div>
</div>
</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
