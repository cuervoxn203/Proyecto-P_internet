document.addEventListener('DOMContentLoaded', function () {
    const preguntasContainer = document.getElementById('preguntas-container');
    const btnAgregarPregunta = document.getElementById('agregar-pregunta');
    const formCrear = document.getElementById('form-crear'); // Obtener el formulario de creación
    const formEditar = document.getElementById('form-editar'); // Obtener el formulario de edición
    let preguntas = []; // Arreglo para mantener el control de las preguntas

    // Inicializar las preguntas desde el input existente, si hay preguntas cargadas
    const existingQuestions = document.querySelectorAll('input[name="preguntas[]"]');
    existingQuestions.forEach(input => {
        preguntas.push(input.value); // Cargar preguntas existentes en el arreglo
    });

    // Función para renderizar las preguntas
    function renderizarPreguntas() {
        preguntasContainer.innerHTML = ''; // Limpiar el contenedor para volver a renderizar

        preguntas.forEach((pregunta, index) => {
            const nuevoDiv = document.createElement('div');
            nuevoDiv.classList.add('mb-3', 'd-flex', 'align-items-center', 'pregunta-item');

            const nuevoLabel = document.createElement('label');
            nuevoLabel.setAttribute('for', `pregunta_${index}`);
            nuevoLabel.textContent = `Pregunta ${index + 1}:`;
            nuevoLabel.classList.add('form-label', 'me-3');

            const nuevoInput = document.createElement('input');
            nuevoInput.setAttribute('type', 'text');
            nuevoInput.setAttribute('name', 'preguntas[]');
            nuevoInput.setAttribute('id', `pregunta_${index}`);
            nuevoInput.setAttribute('class', 'form-control');
            nuevoInput.setAttribute('placeholder', 'Escribe una pregunta');
            nuevoInput.value = pregunta; // Agregar el valor existente
            nuevoInput.required = true;

            const btnEliminar = document.createElement('button');
            btnEliminar.setAttribute('type', 'button');
            btnEliminar.classList.add('btn', 'btn-outline-danger', 'ms-2', 'btn-eliminar');
            btnEliminar.textContent = 'Eliminar';

            btnEliminar.addEventListener('click', function () {
                preguntas.splice(index, 1); // Eliminar la pregunta del arreglo
                renderizarPreguntas(); // Volver a renderizar las preguntas
            });

            nuevoDiv.appendChild(nuevoLabel);
            nuevoDiv.appendChild(nuevoInput);
            nuevoDiv.appendChild(btnEliminar);

            preguntasContainer.appendChild(nuevoDiv);
        });
    }

    btnAgregarPregunta.addEventListener('click', function () {
        preguntas.push(''); // Agregar una nueva pregunta vacía al arreglo
        renderizarPreguntas(); // Volver a renderizar las preguntas
    });

    // Inicializar el contenedor de preguntas al cargar la página
    renderizarPreguntas(); // Esta llamada se mantiene para cargar las preguntas existentes

    // Guardar el contenido de las preguntas en el arreglo al cambiar
    preguntasContainer.addEventListener('input', function (event) {
        if (event.target.name === 'preguntas[]') {
            const index = Array.from(preguntasContainer.querySelectorAll('input[name="preguntas[]"]')).indexOf(event.target);
            preguntas[index] = event.target.value; // Actualizar el arreglo con el nuevo valor
        }
    });

    // Validación antes de enviar el formulario
    const validateForm = (event) => {
        if (preguntas.length === 0) {
            event.preventDefault(); // Prevenir el envío del formulario
            alert('Por favor, añade al menos una pregunta antes de guardar el formulario.'); // Mensaje de alerta
        }
    };

    if (formCrear) {
        formCrear.addEventListener('submit', validateForm); // Validar en el formulario de creación
    }
    
    if (formEditar) {
        formEditar.addEventListener('submit', validateForm); // Validar en el formulario de edición
    }
});
