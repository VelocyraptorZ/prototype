<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use Illuminate\Support\Facades\DB;

class ItemController extends Controller
{
    //
    public function index(){
        $this->authorize('View Item');
        $items = Item::latest()->paginate(20);
        return view('item.index', compact('items'));
    }

    public function form()
    {
        $this->authorize('Create Item');
        $item=null;
        if(request('id')){
            $item=Item::find(request('id'));
        }
        return view('item.form', compact('item'));
    }

    public function destroy(Item $item)
    {
        //
        $this->authorize('Delete Item');

        // Delete dependent rows in inventory_logs table
        $inventoryIds = DB::table('inventories')->where('item_id', $item->id)->pluck('id');
        DB::table('inventory_logs')->whereIn('inventory_id', $inventoryIds)->delete();

        // Delete dependent rows in inventories table
        DB::table('inventories')->where('item_id', $item->id)->delete();

        // Delete dependent rows in document_item table
        DB::table('document_item')->where('item_id', $item->id)->delete();
        
        $item->delete();
        return redirect(route('item.index'))->with('danger','Deleted Succesfully');
    }
}
