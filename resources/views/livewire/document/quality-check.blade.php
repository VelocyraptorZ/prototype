<div class="p-4">
    @if($check)
        <h3 class="font-semibold">Quality Check</h3>
        @foreach($document->documentItems as $item)
            <div>
                <div>
                    <x-jet-label for="check" value="{{ $item->sku }} - {{ $item->item->name }}" />
                    <x-jet-input class="block mt-1 w-full" type="text" value="{{ $item->quantity }}" />
                    @error('paymentLog.paid_at')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        @endforeach
                <x-jet-button wire:click="save" class="mt-4">
                    {{ __('Save') }}
                </x-jet-button>
    @else
        <x-jet-button class="mt-4" wire:click="add">
            {{ __('Quality Check') }}
        </x-jet-button>
    @endif
</div>