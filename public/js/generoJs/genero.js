function eliminarGenero(id) {

    Swal.fire({
        title: "¿ESTÁ SEGURO?",
        text: "Este genero ya no estará disponible",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#d33",
        cancelButtonColor: "#3085d6",
        confirmButtonText: "Sí, Eliminar",
        cancelButtonText: "Cancelar"
    }).then((result) => {
        if (result.isConfirmed) {
            Livewire.dispatch('deleteGenero', { id: id });
        }
    });
}


document.addEventListener('DOMContentLoaded', () => {
    
    const form = document.getElementById('form-genero');

    form.addEventListener('submit', function (e) {
        const genero = document.getElementById('genero').value.trim();
        const abreviatura = document.getElementById('abreviatura').value.trim();

        if (!genero || !abreviatura) {
        
            e.preventDefault(); // Detiene Livewire
            
            Swal.fire({

                position:'top-end',
                icon: 'error',
                title: 'Campos Vacíos',
                text: 'LLene todos los campos.',
                timer: 3000,
                showConfirmButton: false
            });
        }
    });

    Livewire.on('resGuardarGenero', () => {

        const modal = bootstrap.Modal.getInstance(document.getElementById('modalGenero'));

        if (modal) {
            modal.hide();
        }

        Swal.fire({

            position:'top-end',
            icon: 'success',
            title: 'Registrado',
            text: 'El genero se ha registrado con éxito.',
            timer: 3000,
            showConfirmButton: false
        });
    });

    Livewire.on('resExisteGenero', () => {

        Swal.fire({

            position:'top-end',
            icon: 'error',
            title: 'No se Eliminó',
            text: 'El genero tiene registros asociados.',
            timer: 3000,
            showConfirmButton: false
        });
    });

    Livewire.on('resEliminarGenero', () => {
        
        Swal.fire({

            position:'top-end',
            icon: 'success',
            title: 'Eliminado Correctamente',
            text: 'El genero se ha eliminado correctamente.',
            timer: 3000,
            showConfirmButton: false
        });
    });

});