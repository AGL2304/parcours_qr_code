<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Parcours;

class DragDropParcours extends Component
{
    public $parcours = [];

    public function mount()
    {
        $this->parcours = Parcours::orderBy('order')->get()->toArray();
    }

    public function updateOrder($updated)
    {
        foreach ($updated as $item) {
            Parcours::where('id', $item['id'])->update(['order' => $item['order']]);
        }

        // Recharge la liste ordonnée
        $this->parcours = Parcours::orderBy('order')->get()->toArray();
    }

    public function render()
    {
        return view('livewire.drag-drop-parcours');
    }
}
