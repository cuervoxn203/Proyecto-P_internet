<!-- Inicio de la Plantilla -->
@extends('layouts.main')

@section('title', 'Editar Consulta')
    <!-- CONTENIDO DEL PROGRAMA - INICIO -->
    <div class="container-fluid">
        <h5 class="card-title fw-semibold mb-4">Editar Consulta para {{ $consulta->paciente }}</h5>
        <div class="card">
            <div class="card-body">
                <!-- Formulario para editar la consulta -->
                <form action="{{ route('consultas.update', $consulta->id) }}" method="POST">
                    @csrf
                    @method('PUT') <!-- Método PUT para la actualización -->

                    <!-- Nombre del Paciente -->
                    <div class="mb-3">
                        <label for="paciente" class="form-label">Nombre del Paciente</label>
                        <input type="text" class="form-control" id="paciente" name="paciente" value="{{ $consulta->paciente }}" required>
                    </div>

                    <!-- Descripción de la Consulta -->
                    <div class="mb-3">
                        <label for="descripcion" class="form-label">Descripción</label>
                        <textarea class="form-control" id="descripcion" name="descripcion" required>{{ $consulta->descripcion }}</textarea>
                    </div>

                    <!-- Fecha y Hora de la Consulta -->
                    <div class="mb-3">
                        <label for="fecha_hora" class="form-label">Fecha y Hora</label>
                        <input type="datetime-local" class="form-control" id="fecha_hora" name="fecha_hora" value="{{ \Carbon\Carbon::parse($consulta->fecha_hora)->format('Y-m-d\TH:i') }}" required>
                    </div>

                    <!-- Selección del Terapeuta -->
                    <div class="mb-3">
                        <label for="terapeuta_id" class="form-label">Terapeuta</label>
                        <select class="form-select" id="terapeuta_id" name="terapeuta_id">
                            <option value="">Seleccione un terapeuta</option>
                            @foreach($terapeutas as $terapeuta)
                                <option value="{{ $terapeuta->id }}" {{ $consulta->terapeuta_id == $terapeuta->id ? 'selected' : '' }}>
                                    {{ $terapeuta->nombre }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Botón para guardar la consulta -->
                    <button type="submit" class="btn btn-primary">Actualizar Consulta</button>
                </form>
            </div>
        </div>
    </div>
    <!-- FIN DEL CONTENIDO -->
@endsection
