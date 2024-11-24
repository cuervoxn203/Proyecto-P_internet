{{-- resources/views/dashboard.blade.php --}}
@extends('layouts.main')

@section('title', 'Dashboard')

@section('content')
    <div class="container-fluid">
        <div class="card shadow-lg mb-4">
            <div class="card-header bg-primary text-white">
                <h2 class="mb-0">Bienvenido, {{ Auth::user()->name }}!</h2>
            </div>
            <div class="card-body">
                <p class="lead">A continuación te damos un resumen de tu actividad:</p>

                <div class="row">
                    <!-- Nombre -->
                    <div class="col-md-6 mb-3">
                        <div class="card">
                            <div class="card-header bg-light">
                                <strong>Nombre</strong>
                            </div>
                            <div class="card-body">
                                <p class="card-text">{{ Auth::user()->name }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Correo -->
                    <div class="col-md-6 mb-3">
                        <div class="card">
                            <div class="card-header bg-light">
                                <strong>Correo Electrónico</strong>
                            </div>
                            <div class="card-body">
                                <p class="card-text">{{ Auth::user()->email }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <!-- Rol del usuario -->
                    <div class="col-md-6 mb-3">
                        <div class="card">
                            <div class="card-header bg-light">
                                <strong>Rol</strong>
                            </div>
                            <div class="card-body">
                                <p class="card-text">
                                    @if(Auth::user()->rol === 'user')
                                        Usuario
                                    @else
                                        {{ Auth::user()->rol }}
                                    @endif
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Última Actualización -->
                    <div class="col-md-6 mb-3">
                        <div class="card">
                            <div class="card-header bg-light">
                                <strong>Última Actualización</strong>
                            </div>
                            <div class="card-body">
                                <p class="card-text">
                                    @if(Auth::user()->updated_at)
                                        {{ \Carbon\Carbon::parse(Auth::user()->updated_at)->diffForHumans() }}
                                    @else
                                        <span class="text-muted">No se han realizado actualizaciones recientes.</span>
                                    @endif
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <hr>
                <!-- Reportes recientes -->
                <div class="col-md-12 mb-3">
                    <div class="card">
                        <div class="card-header bg-light">
                            <strong>Reportes Recientes</strong>
                        </div>
                        @if ($reportes_recientes !== null && count($reportes_recientes) > 0)
                            <div class="card-body">
                                <ul class="list-group list-group-flush">
                                    @foreach ($reportes_recientes as $index => $reporte)
                                        @if ($index < 7)
                                            <li class="list-group-item">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <strong>{{ $reporte->tipo_reporte }}</strong>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <span>{{ $reporte->descripcion }}</span>
                                                    </div>
                                                    <div class="col-md-4 text-right">
                                                        <a href="{{ route('reportes.show', $reporte->id) }}" class="btn btn-primary btn-sm">Ver Reporte</a>
                                                        <br>
                                                        <span class="text-muted">{{ \Carbon\Carbon::parse($reporte->created_at)->diffForHumans() }}</span>
                                                    </div>
                                                </div>
                                            </li>
                                        @else
                                            @break
                                        @endif
                                    @endforeach
                                </ul>
                            </div>
                        @else
                        <div class="card-body">
                            <p class="card-text text-center">No se han generado reportes recientemente.</p>
                            <p class="text-info text-center">¿Nuevo aquí? Estos se generan automáticamente cada día. ¡Y siempre puedes ver los últimos 7!</p>
                        </div>
                        @endif
                    </div>
                </div>
                <hr>
                <!-- Formularios contestados recientemente -->
                <div class="col-md-12 mb-3">
                    <div class="card">
                        <div class="card-header bg-light">
                            <strong>Formularios Contestados Recientes</strong>
                        </div>
                        @if ($respuestas_recientes !== null && count($respuestas_recientes) > 0)
                            <div class="card-body">
                                <ul class="list-group list-group-flush">
                                    @foreach ($respuestas_recientes as $index => $respuesta)
                                        @if ($index < 7)
                                            <li class="list-group-item">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <strong>{{ $respuesta->formulario->nombre }}</strong>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <span>{{ $respuesta->formulario->descripcion }}</span>
                                                    </div>
                                                    <div class="col-md-4 text-right">
                                                        <a href="{{ route('respuestas_formularios.show', $respuesta->id) }}" class="btn btn-primary btn-sm">Ver Respuestas</a>
                                                        <br>
                                                        <span class="text-muted">{{ \Carbon\Carbon::parse($respuesta->created_at)->diffForHumans() }}</span>
                                                    </div>
                                                </div>
                                            </li>
                                        @else
                                            @break
                                        @endif
                                    @endforeach
                                </ul>
                            </div>
                        @else
                        <div class="card-body">
                            <p class="card-text text-center">No se han generado reportes recientemente.</p>
                            <p class="text-info text-center">¿Nuevo aquí? Comienza contestando algunos de nuestros formularios creados por especialistas. ¡Y siempre puedes ver los últimos 7!</p>
                            <p class="text-center">
                                <a href="{{ route('formularios.index') }}" class="btn btn-secondary">Comenzar a contestar</a>
                            </p>
                        </div>
                        @endif
                    </div>
                </div>
                <hr>
                <p class="text-muted">Si tienes alguna duda, no dudes en contactarnos.</p>
            </div>
        </div>
    </div>

    @push('scripts')
        <script src="{{ mix('js/app.js') }}"></script>
    @endpush
@endsection
