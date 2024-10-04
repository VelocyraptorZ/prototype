<?php
namespace App\Http\Livewire\Notification;
use Livewire\Component;
use Auth;
class Push extends Component
{
    public $notification;

    protected $listeners = ['notify'];

    public function mount()
    {
        $this->notification = Auth::user()->notifications()->latest()->first();
    }

    public function notify()
    {
        $this->notification = Auth::user()->notifications()->latest()->first();
    }

    public function render()
    {
        return view('livewire.notification.push');
    }
}