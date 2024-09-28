document.addEventListener('DOMContentLoaded', function () {
    let contadorPreguntas = 1;

    const btnAgregarPregunta = document.getElementById('agregar-pregunta');
    const preguntasContainer = document.getElementById('preguntas-container');

    btnAgregarPregunta.addEventListener('click', function () {
        contadorPreguntas++;

        const nuevoDiv = document.createElement('div');
        nuevoDiv.classList.add('form-group', 'pregunta-item');

        const nuevoLabel = document.createElement('label');
        nuevoLabel.setAttribute('for', `pregunta_${contadorPreguntas}`);
        nuevoLabel.textContent = `Pregunta ${contadorPreguntas}:`;

        const nuevoInput = document.createElement('input');
        nuevoInput.setAttribute('type', 'text');
        nuevoInput.setAttribute('name', 'preguntas[]');
        nuevoInput.setAttribute('id', `pregunta_${contadorPreguntas}`);
        nuevoInput.setAttribute('class', 'form-control');
        nuevoInput.setAttribute('placeholder', 'Escribe una pregunta');
        nuevoInput.required = true;

        const btnEliminar = document.createElement('button');
        btnEliminar.setAttribute('type', 'button');
        btnEliminar.classList.add('btn', 'btn-danger', 'btn-eliminar');
        btnEliminar.textContent = 'Eliminar';
        btnEliminar.style.marginLeft = '10px';

        nuevoDiv.appendChild(nuevoLabel);
        nuevoDiv.appendChild(nuevoInput);
        nuevoDiv.appendChild(btnEliminar);

        preguntasContainer.appendChild(nuevoDiv);

        // Activar el botón de eliminar para todas las preguntas excepto la primera
        if (contadorPreguntas > 1) {
            btnEliminar.disabled = false; // Habilitar el botón de eliminar
        }

        btnEliminar.addEventListener('click', function () {
            nuevoDiv.remove();
            contadorPreguntas--; // Decrementar el contador al eliminar
            actualizarBotonesEliminar();
        });
    });

    function actualizarBotonesEliminar() {
        const items = preguntasContainer.querySelectorAll('.pregunta-item');
        items.forEach((item, index) => {
            const btnEliminar = item.querySelector('.btn-eliminar');
            btnEliminar.disabled = (index === 0); // Deshabilitar el botón de eliminar para la primera pregunta
        });
    }
});