@extends('layouts.app')

@section('contenido')
@if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
          <div class="alert-text">
            @foreach ($errors->all() as $error)
              <span>{{ $error }}</span>
            @endforeach
          </div>
        </div>
      @endif
    <div class="page-inner">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h1 style="text-align: center; color: #1b4b72">Editar informacion del usuario</h1> </div>
                    <div class="card-body">
                        {!! Form::model($user, ['route' => ['users.update', $user->id],
                          'method'=>'POST' ]) !!}
                            @include('user.partials.form')
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div> 
    </div>
@endsection