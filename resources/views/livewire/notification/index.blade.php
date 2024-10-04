<div>
    @foreach ($notifications as $notification)
        <div class="rounded border p-3 mb-3  @if($notification->read_at) bg-slate-100 @else bg-blue-100 @endif text-sm">
            @if($notification->type = 'App\Notifications\DocumentUpdated')
            <div class="flex justify-between">
                <div>{{ $notification->data['document_type'] }} status has been changed to {{ $notification->data['status'] }} by {{ $notification->data['user_name'] }}.
                    <a href="{{ route('document.show',['document'=>$notification->data['document_id']]) }}" class="text-blue-500 hover:underline">View</a>
                    <a href="{{ route('document.edit',['document'=>$notification->data['document_id']]) }}" class="text-blue-500 hover:underline">Edit</a>
                </div>
                <div>{{ $notification->created_at->diffForHumans() }}</div>
            </div>
            @endif
        </div>
    @endforeach
    <div class="my-3 p-2">
        {{ $notifications->links() }}
    </div>
</div>