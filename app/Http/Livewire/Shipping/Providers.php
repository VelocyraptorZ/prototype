<?php
namespace App\Http\Livewire\Shipping;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\ShippingProvider;
class Providers extends Component
{
    use WithPagination;
    public $provider;
    protected $rules = [
        "provider.name" => "required"
    ];
    public function create()
    {
        $this->provider = new ShippingProvider;
    }
    public function edit(ShippingProvider $provider)
    {
        $this->provider = $provider;
    }
    public function cancel()
    {
        $this->reset('provider');
    }
    public function save()
    {
        $this->validate();
        $this->provider->save();
        $this->reset('provider');
    }
    
    public function render()
    {
        $providers = ShippingProvider::paginate(20);
        return view('livewire.shipping.providers', compact('providers'));
    }
}