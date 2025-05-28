<?php

namespace App\Livewire\Habitantes;

use App\Models\Habitante;
use Illuminate\Validation\ValidationException;
use Livewire\Attributes\On;
use Livewire\Component;

class EditarApellido extends Component
{
    public $idHabitanteApellido;
    public $apellidoHabitante;

    #[On('apellido-habitante')]
    public function editApellidoHabitante($idHabitante)
    {
        $habitante = Habitante::find($idHabitante);
        
        if ($habitante) {

            $this->idHabitanteApellido = $habitante->idhabitante;
            $this->apellidoHabitante = $habitante->apellido;

            $this->dispatch('abrirModalApellido');
        }
    }

    public function actualizarApellido()
    {
        try {

            $this->validate([

                'apellidoHabitante' => 'required|string|max:255',
            ]);
    
            $habitante = Habitante::find($this->idHabitanteApellido);
    
            if ($habitante) {
    
                $habitante->update([
                    'apellido' => $this->apellidoHabitante,
                ]);
                
                /*
                    En esta seccion se están disparando dos eventos, el primero hace referencia a cerrar un modal que se encuentra en el
                    script del blade del modal donde se carga el nombre para editarlo, esto hacer que cuando ya se ha completado la accion
                    de editar el nombre se cierre el modal y se emita una alerta de confirmacion. Por otro lado, el segundo evento es
                    para poder pasarlo directamente al componente principal y reflejar los cambios inmediatamente sin refrescar la 
                    pagina, referencia documentacion de Livewire 3x
                */
    
                $this->dispatch('cerrarModalApellido');
                $this->dispatch('apellidoActualizado')->to(OpListadoHabitantes::class);
            }

        }
        catch(ValidationException $e){

            $this->dispatch('campoApellidoVacio');
        }
        
    }

    public function render()
    {
        return view('livewire.habitantes.editar-apellido');
    }
}
