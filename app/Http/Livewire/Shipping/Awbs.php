<?php
namespace App\Http\Livewire\Shipping;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Awb;
use App\Models\ShippingProvider;
class Awbs extends Component
{
    
    use WithPagination;
    public $awb, $providers;
    protected $rules = [
        "awb.awb_number" => "required",
        "awb.shipping_provider_id" => "required",
    ];
    public function mount()
    {
        $this->providers = ShippingProvider::get();
    }
    public function create()
    {
        $this->awb = new Awb;
    }
    public function edit(Awb $awb)
    {
        $this->awb = $awb;
    }
    public function cancel()
    {
        $this->reset('awb');
    }
    public function save()
    {
        $this->validate();
        $this->awb->save();
        $this->reset('awb');
    }
    
    public function render()
    {
        $awbs = Awb::paginate(20);
        return view('livewire.shipping.awbs', compact('awbs'));
    }
}