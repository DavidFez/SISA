function desactivarHabitante(id) {

    Swal.fire({
        title: "¿ESTÁ SEGURO?",
        text: "Este habitante ya no estará disponible en esta sección",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#d33",
        cancelButtonColor: "#3085d6",
        confirmButtonText: "Sí, Desactivar",
        cancelButtonText: "Cancelar"
    }).then((result) => {
        if (result.isConfirmed) {
            Livewire.dispatch('desactivarHabitante', { id: id });
        }
    });

}

document.addEventListener("DOMContentLoaded", function () {

    Livewire.on('habitanteDesactivado', () => {

        Swal.fire({

            position:'top-end',
            icon: 'success',
            title: 'Desactivado con Exito',
            text: 'El habitante se ha desactivado.',
            timer: 3000,
            showConfirmButton: false
        });
    });
});

