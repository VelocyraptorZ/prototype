<div class="p-4">

    <h2 class="font-semibold mb-3">Comments</h2>

    @can('Add '.$document->documentType->name .' Comments')
        <form wire:submit.prevent="add" method="POST">
            <x-jet-label for="comment" value="Comment" />
            <div class="border rounded-lg">
                <textarea rows='4' class="block rounded-lg w-full border-0 focus:border-0 focus:ring focus:ring-indigo-200 focus:ring-opacity-0" type="text" wire:model.defer="body"></textarea>
                <!-- <div class="bg-gray-100 p-2 rounded-b-lg text-sm">
                    <x-tabler-paperclip class="w-4 inline"/> Attach
                </div> -->
                @error('body')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>
            <x-jet-button class="mt-4">
                {{ __('Add') }}
            </x-jet-button>
        </form>
    @endcan
    <div class="mt-2">
        @forelse($document->comments as $comment)
            <div class="mt-2 border p-2">
                <span class="text-sm">{{ $comment->user->name }}</span>
                <span class="text-gray-500 text-sm">{{ $comment->created_at->diffForHumans() }}</span>
                <br/>
                <span class="text-slate-600 text-sm">{{ $comment->body }}</span>
            </div>
        @empty
            <span class="text-red-500">No Comments Added</span>
        @endforelse
    </div>
</div>