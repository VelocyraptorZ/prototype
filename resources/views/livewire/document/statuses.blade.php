<div class="p-4">
    <table class="w-full mb-3">
        <tr>
            <td>Created At</td>
            <td class="text-right">{{ $document->created_at->setTimezone('Asia/Kolkata')->format('d-m-Y H:i:s') }}</td>
        </tr>
        <tr>
            <td>Updated At</td>
            <td class="text-right">{{ $document->updated_at->setTimezone('Asia/Kolkata')->format('d-m-Y H:i:s') }}</td>
        </tr>
    </table>
    
    @if($document->statuses)
        <b>Status History</b><br/>
        @foreach($document->statuses as $status)
            <div>
                <span class="text-gray-500">
                    {{ $status->updated_at->setTimezone('Asia/Kolkata')->format('d-m-Y h:i a') }}
                </span>
                 - {{ $status->name }}
            </div>
        @endforeach
    @endif

    @if(sizeof($statuses)>0)
        <div>
            <x-jet-label for="status" value="{{ __('Status') }}" />
            <select class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm w-full" wire:model="document.status">
                <option value="">Select</option>
                @foreach($statuses as $status)
                    <option value="{{ $status }}">{{ $status }}</option>
                @endforeach
            </select>
            @error('document.status')
                <span class="text-red-500">{{ $message }}</span>
            @enderror
        </div>

        @if($document->isDirty())
            <div class="block mt-4">
                <label for="comment_read" class="flex items-center">
                    <x-jet-checkbox id="comment_read" wire:model="comment_read" />
                    <span class="ml-2 text-sm text-gray-600">{{ __('I have read all comments') }}</span>
                </label>
                @error('comment_read')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>
            <x-jet-button class="mt-4" wire:loading.remove wire:click="save">
                {{ __('Save') }}
            </x-jet-button>
            <div wire:loading wire:target="save">
                Updating Status...
            </div>
        @endif
    @endif
</div>