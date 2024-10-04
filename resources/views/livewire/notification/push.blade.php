<div class="fixed bottom-4 right-4 w-1/3">
    @if(isset($notification->created_at) && $notification->created_at->timestamp> (time()-10))
        <div class="rounded shadow border p-3 text-sm bg-blue-100">
            @if($notification->type = 'App\Notifications\DocumentUpdated')
                <div class="flex justify-between mb-3">
                    <span class="mb-1 text-sm font-semibold text-gray-900 dark:text-white">New notification</span>
                    <span>
                        <!--  <x-tabler-x class="hover:text-red-500 cursor-pointer"/> -->
                    </span>
                </div>
                <div class="">
                    <div>{{ $notification->data['document_type'] }} status has been changed to {{ $notification->data['status'] }} by {{ $notification->data['user_name'] }}.
                        <a href="{{ route('document.show',['document'=>$notification->data['document_id']]) }}" class="text-blue-500 hover:underline">View</a>
                        <a href="{{ route('document.edit',['document'=>$notification->data['document_id']]) }}" class="text-blue-500 hover:underline">Edit</a>
                    </div>
                    <span class="text-xs font-medium text-blue-600 dark:text-blue-500">{{ $notification->created_at->diffForHumans() }}</span>   
                </div>
            @endif
        </div>
    @endif
</div>