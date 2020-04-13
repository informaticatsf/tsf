@extends('layouts.app')

@section('contenido')
  
  
            
  
                <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 col-lg-9">
                <div class="card">
                    <div class="card-header">
                        <h3 style="text-align: center; color: #1b4b72">Registro de contribuyentes</h3>
                    </div>
                    <div class="card-body">
                        {!! Form::open(['route' => ['contribuyente.store']]) !!}
                        @include('contribuyente.form')
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

  
    @endsection