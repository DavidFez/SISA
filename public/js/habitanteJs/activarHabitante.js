function activarHabitante(id) {

    Swal.fire({
        title: "¿ESTÁ SEGURO?",
        text: "Este habitante pasara nuevamente a estar ACTIVO",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#198754",
        cancelButtonColor: "#3085d6",
        confirmButtonText: "Sí, Activar",
        cancelButtonText: "Cancelar"
    }).then((result) => {
        if (result.isConfirmed) {
            Livewire.dispatch('activarHabitante', { id: id });
        }
    });

}

document.addEventListener("DOMContentLoaded", function () {

    Livewire.on('habitanteActivado', () => {

        Swal.fire({

            position:'top-end',
            icon: 'success',
            title: 'Activado con Exito',
            text: 'El habitante se ha activado verifique la seccion de habitantes activos.',
            timer: 3000,
            showConfirmButton: false
        });
    });
});