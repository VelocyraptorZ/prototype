<div class="p-4" 
    x-data="{ isUploading: false, progress: 0 }"
    x-on:livewire-upload-start="isUploading = true"
    x-on:livewire-upload-finish="isUploading = false"
    x-on:livewire-upload-error="isUploading = false"
    x-on:livewire-upload-progress="progress = $event.detail.progress"
    >
    <h2 class="font-semibold mb-3">Attachments</h2>
    @can('Add '.$document->documentType->name .' Attachments')
        <form wire:submit.prevent="save">
            <input type="file" id="upload{{ $iteration }}" wire:model="file">
            <div wire:loading wire:target="file">Uploading...</div>
            @error('file')
                <span class="text-red-500">{{ $message }}</span>
            @enderror
        </form>

        <!-- Progress Bar -->
        <div x-show="isUploading">
            <progress max="100" x-bind:value="progress"></progress>
        </div>
    @endcan
    <div class="mt-3">
        @forelse($document->attachments as $file)
            <div class="flex justify-between hover:bg-gray-100 border rounded mb-2 p-2">
                <a href="/storage/{{ $file->file_path }}" class="hover:underline">{{ $file->name }}</a> 
                <a href="/storage/{{ $file->file_path }}"  class="text-blue-500 cursor-pointer">
                    <x-tabler-download class="inline-block"/>
                </a>
                <a wire:click="delete('{{ $file->id }}')" class="text-red-500 cursor-pointer">
                    <x-tabler-trash class="inline-block"/>
                </a>
            </div>
        @empty
            <span class="text-red-500">No Attachments Added</span>
        @endforelse
    </div>
</div>
