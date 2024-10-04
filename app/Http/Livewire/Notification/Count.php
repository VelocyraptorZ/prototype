<?php
namespace App\Http\Livewire\Notification;
use Livewire\Component;
use Auth;
class Count extends Component
{
    public function render()
    {
        $latest = Auth::user()->notifications()->latest()->first();

        if(isset($latest->created_at) && $latest->created_at->timestamp > (time()-10)){
            $this->emit('notify');
        }

        return view('livewire.notification.count');
    }
}