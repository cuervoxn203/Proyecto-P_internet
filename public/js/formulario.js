document.addEventListener('DOMContentLoaded', function () {
    const preguntasContainer = document.getElementById('preguntas-container');
    const btnAgregarPregunta = document.getElementById('agregar-pregunta');
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
            nuevoDiv.classList.add('form-group', 'pregunta-item');

            const nuevoLabel = document.createElement('label');
            nuevoLabel.setAttribute('for', `pregunta_${index}`);
            nuevoLabel.textContent = `Pregunta ${index + 1}:`;

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
            btnEliminar.classList.add('btn', 'btn-danger', 'btn-eliminar');
            btnEliminar.textContent = 'Eliminar';
            btnEliminar.style.marginLeft = '10px';

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
});
