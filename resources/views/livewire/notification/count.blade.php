<div wire:poll>
    @if(Auth::user()->unreadNotifications->count()>0)
    <div class="top-0 right-0 animate-ping absolute  h-4 w-4 rounded-full bg-red-400 opacity-75"></div>
    <div class="top-0 right-0 absolute rounded-full h-4 w-4 bg-red-500 text-xs text-center text-white">
        {{ Auth::user()->unreadNotifications->count() }}
    </div>
    @endif
</div>