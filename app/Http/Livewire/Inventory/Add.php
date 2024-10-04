<?php

namespace App\Http\Livewire\Inventory;

use Livewire\Component;
use App\Models\Item;
use App\Models\Inventory;
use App\Models\InventoryLog;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class Add extends Component
{
    public $item, $quantity, $comment;

    public function mount()
    {
        $this->item = Item::find($this->item);
    }

    public function save()
    {
        $validated = $this->validate([
            "quantity" => "required|numeric",
            "comment" => "required"
        ]);
        $inventory = Inventory::firstOrCreate(
            ['store_id' => 1,'item_id'=>$this->item->id],
            ['instock' => 0]
        );
        //Increment the instock quantity
        $inventory->increment('instock', intval($this->quantity));
                // Add to inventories_log table
                $log = InventoryLog::create([
                    'inventory_id' => $inventory->id,
                    'quantity' => $this->quantity,
                    'user_id' => Auth::id(),
                    'comment' => $this->comment,
                ]);
        $this->reset('quantity','comment');
        session()->flash('alert-success', ' Successfully Added Items to Stock');
        return redirect()->to(route('item.index'));
    }

    public function render()
    {
        return view('livewire.inventory.add');
    }
}