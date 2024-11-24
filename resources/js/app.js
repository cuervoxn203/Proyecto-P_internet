import './bootstrap'; // Importaciones existentes
import Swal from 'sweetalert2';

// Detectar inactividad del usuario y manejar mensajes
let timeout;
const idleTime = 60 * 60 * 1000; // 1 hora

function resetTimer() {
    clearTimeout(timeout);
    timeout = setTimeout(logoutUser, idleTime);
}

function logoutUser() {
    Swal.fire({
        title: "Inactividad detectada",
        text: "¿Deseas continuar en la sesión?",
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Sí, continuar",
        cancelButtonText: "No, cerrar sesión",
        timer: 30000, // 30 segundos para decidir
        timerProgressBar: true
    }).then((result) => {
        if (result.isConfirmed) {
            resetTimer(); // Si el usuario confirma, se reinicia el temporizador
        } else {
            window.location.href = "/logout"; // Redirige para cerrar sesión
        }
    });
}

// Agregar listeners para detectar actividad del usuario
document.onload = resetTimer;
document.onmousemove = resetTimer;
document.onkeydown = resetTimer; // Cambia onkeypress por onkeydown
