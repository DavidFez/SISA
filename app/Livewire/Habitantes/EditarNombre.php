<?php

namespace App\Livewire\Habitantes;

use App\Models\Habitante;
use Illuminate\Validation\ValidationException;
use Livewire\Attributes\On;
use Livewire\Component;

class EditarNombre extends Component
{

    public $habitanteId;
    public $nombreHabitante;

    #[On('nombre-habitante')]
    public function editNombreHabitante($idHabitante)
    {
        $habitante = Habitante::find($idHabitante);
        
        if ($habitante) {
            $this->habitanteId = $habitante->idhabitante;
            $this->nombreHabitante = $habitante->nombre;

            $this->dispatch('abrirModalNombre');
        }
    }

    public function actualizarNombre()
    {
        try {

            $this->validate([

                'nombreHabitante' => 'required|string|max:255',
            ]);
    
            $habitante = Habitante::find($this->habitanteId);
    
            if ($habitante) {
    
                $habitante->update([
                    'nombre' => $this->nombreHabitante,
                ]);
                
                /*
                    En esta seccion se están disparando dos eventos, el primero hace referencia a cerrar un modal que se encuentra en el
                    script del blade del modal donde se carga el nombre para editarlo, esto hacer que cuando ya se ha completado la accion
                    de editar el nombre se cierre el modal y se emita una alerta de confirmacion. Por otro lado, el segundo evento es
                    para poder pasarlo directamente al componente principal y reflejar los cambios inmediatamente sin refrescar la 
                    pagina, referencia documentacion de Livewire 3x
                */
    
                $this->dispatch('cerrarModalNombre');
                $this->dispatch('nombreActualizado')->to(OpListadoHabitantes::class);
            }

        }
        catch(ValidationException $e){

            $this->dispatch('campoNombreVacio');
        }
        
    }

    public function render()
    {
        return view('livewire.habitantes.editar-nombre');
    }
}
