<?php

namespace App\Http\Livewire\Notification;

use Livewire\Component;
use Auth;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Notification;

class Index extends Component
{
    use WithPagination;

    public function mount()
    {
        Auth::user()->unreadNotifications->markAsRead();
        //Auth::user()->notifications()->delete();
    }

    public function markRead(Notification $notification)
    {
        //$notification->markAsRead();
    }

    public function render()
    {
        return view('livewire.notification.index', [
            'notifications' => Auth::user()->notifications()->paginate(8),
        ]);
    }
}