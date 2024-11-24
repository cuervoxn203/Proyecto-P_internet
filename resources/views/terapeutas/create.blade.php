<!-- Inicio de la Plantilla -->
@extends('layouts.main')

@section('title', 'Registro de Terapeutas')

@section('content')
    <!-- CONTENIDO DEL PROGRAMA - INICIO -->
    <div class="container-fluid">
        <h5 class="card-title fw-semibold mb-4">Formulario de Registro de Terapeuta</h5>
        <div class="card">
            <div class="card-body">
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <form action="{{ route('terapeutas.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" value="{{ old('nombre') }}" required>
                        @error('nombre')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="text" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
                        @error('email')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="especialidad" class="form-label">Especialidad</label>
                        <input type="text" class="form-control" id="especialidad" name="especialidad" value="{{ old('especialidad') }}" required>
                        @error('especialidad')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="telefono" class="form-label">Teléfono</label>
                        <input type="text" class="form-control" id="telefono" name="telefono" value="{{ old('telefono') }}" required>
                        @error('telefono')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-success">Enviar</button>
                </form>
            </div>
        </div>
    </div>
    <!-- FIN DEL FORMULARIO -->
@endsection
