{{-- resources/views/dashboard.blade.php --}}
@extends('layouts.main')

@section('title', 'Menu Principal')

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

                <p class="text-muted">Si tienes alguna duda, no dudes en contactarnos.</p>
            </div>
        </div>
    </div>

    {{-- Additional script push from "Diego's branch" --}}
    @push('scripts')
        <script src="{{ mix('js/app.js') }}"></script>
    @endpush
@endsection