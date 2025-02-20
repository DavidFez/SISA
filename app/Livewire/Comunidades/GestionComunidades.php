<?php

namespace App\Livewire\Comunidades;

use App\Models\Direccion;
use App\Models\Vivienda;
use Livewire\Attributes\On;
use Livewire\Component;

class GestionComunidades extends Component
{
    public $direccion; 
    public $direcciones; 
    public $direccionId;
    public $modoEdicion = false;

    protected $rules = [
        'direccion' => 'required|string|max:255',
    ];

    /* Se usan las varibles para almacenar los datos direccion es para la direccion del input y direcciones para almacenar 
        todas las direcciones que se van a mostrar en la tabla. Cuando se va a editar una direccion se procede a almacenar el id
        para poder identificarla en la tabla, una vez se identifique se procede a tomar el valor que haya en el campo del imput, en
        este caso si ya se editó se va a guardar ese valor. Por ultimo se utiliza una sola funcion con un condicional que vcalida que
        si es edicion o es garadar el valor del input
    */
    

    public function render()
    {
        $this->direcciones = Direccion::all(); 
        return view('livewire.comunidades.gestion-comunidades');
    }

    public function guardarDireccion()
    {
        $this->validate();

        // Si estamos en modo edición, actualizamos la dirección
        if ($this->modoEdicion) {
            
            $direccion = Direccion::find($this->direccionId);
            $direccion->update([

                'direccion' => $this->direccion
            ]);
            
            $this->modoEdicion = false; // Salir del modo edición
            $this->dispatch('ResEditDir', 'La dirección se ha editado correctamenrte.');

        } else {
    
            Direccion::create(['direccion' => $this->direccion]);
            $this->dispatch('ResSaveDir', 'Se agregó la dirección correctamente.');
        }

        $this->resetInput();
    }

    public function editarDireccion($id)
    {
        $direccion = Direccion::find($id);
        $this->direccionId = $direccion->iddireccion;
        $this->direccion = $direccion->direccion;
        $this->modoEdicion = true;
    }

    #[On('eliminarDireccion')] 
    public function deleteDireccion($id)
    {
        $verificarVivienda = Vivienda::where('iddireccion', $id)->first();

        if ($verificarVivienda) {

            $this->dispatch('ErrorDeleteDir', 'La direccion ya está asignada a una vivienda por lo tanto no se puede eliminar.');
            return;
        }

        $direccion = Direccion::find($id);

        if ($direccion) {
            $direccion->delete();
            $this->dispatch('alertaExito', 'Dirección eliminada con éxito');
        }
    }

    public function resetInput()
    {
        $this->direccion = '';
        $this->direccionId = null;
    }
}
