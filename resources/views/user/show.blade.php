@section('title', 'Ver Usuario - ')

@extends('layouts.app')

@section('content')
    <div class="page-inner">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <a class="btn btn-danger float-right" href="{{ route('users.index') }}">Regresar</a>
                        <h1 style="text-align: center; color: #1b4b72">Información del usuario</h1>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-head-bg-info">
                            <thead style="text-align: center;">
                                <tr>
                                    <th>Datos</th>
                                    <th>Informacion del usuario</th>
                                </tr>
                            </thead>
                            <tbody style="font-size: 15px">
                                <tr>
                                    <td>Nombre</td>
                                    <td style="text-align: right">{{ $user->name }}</td>
                                </tr>
                                <tr>
                                    <td>Apellido</td>
                                    <td style="text-align: right">{{ $datos[0]->apellido }}</td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td style="text-align: right">{{ $user->email }}</td>
                                </tr>
                                <tr>
                                    <td>DPI</td>
                                    <td style="text-align: right">{{ $datos[0]->dpi }}</td>
                                </tr>
                                <tr>
                                    <td>Fecha de Nacimiento</td>
                                    <td style="text-align: right">{{ $datos[0]->fechanacimiento }}</td>
                                </tr>
                                <tr>
                                    <td>Direccion</td>
                                    <td style="text-align: right">{{ $datos[0]->direccion }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
