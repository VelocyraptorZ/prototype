<?php

namespace App\Http\Livewire\Shipping;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\ShippingMode;

class Modes extends Component
{
    use WithPagination;
    public $mode;
    protected $rules = [
        "mode.name" => "required"
    ];
    public function create()
    {
        $this->mode = new Shippingmode;
    }
    public function edit(Shippingmode $mode)
    {
        $this->mode = $mode;
    }
    public function cancel()
    {
        $this->reset('mode');
    }
    public function save()
    {
        $this->validate();
        $this->mode->save();
        $this->reset('mode');
    }
    
    public function render()
    {
        $modes = Shippingmode::paginate(20);
        return view('livewire.shipping.modes', compact('modes'));
    }
}