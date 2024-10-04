<?php

namespace App\Http\Livewire\Manifest;

use Livewire\Component;
use App\Models\Document;
use App\Models\Manifest;
use Illuminate\Database\Eloquent\Builder;
use Auth;
use App\Models\ShippingMode;

class Form extends Component
{
    public $shipping_mode_id, $seller_company_id, $modes;

    public function mount()
    {
        $this->modes = ShippingMode::get();
    }

    public function create()
    {
        $validated = $this->validate([
            "shipping_mode_id" => "required",
            "seller_company_id" => "required",
        ]);
        $documents = Document::where('seller_company_id', $this->seller_company_id)->where('status','Packed')->whereHas('shipment', function (Builder $query) {
            $query->where('shipping_mode_id', $this->shipping_mode_id);
        });
        if($documents->count()>0){
            $manifest = Manifest::create([
                "user_id"=>Auth::id()
            ]);
            $manifest->documents()->sync($documents->get());
            $documents->update(['status'=>'Shipped']);
            session()->flash('message', 'Manifest Created');
        }else{
            session()->flash('message', 'Manifest Not Created no orders available for given shipping mode');
        }
        return redirect()->to(route('manifest.index'));
    }

    public function render()
    {
        return view('livewire.manifest.form');
    }
}