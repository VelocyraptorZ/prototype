<div class="p-4">
    Add Inventory for <span class="font-semibold">{{ $item->name }}</span>
        <form wire:submit.prevent="save" method="POST">
            <div>
                <x-jet-label for="quantity" value="{{ __('Quantity') }}" />
                <x-jet-input wire:model="quantity" class="block mt-1 w-full" type="text" autofocus />
                @error('quantity')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <x-jet-label for="comment" value="{{ __('Comment') }}" />
                <x-jet-input wire:model="comment" class="block mt-1 w-full" type="text" />
                @error('comment')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>
            <x-jet-button wire:click="save" class="mt-4">
                {{ __('Save') }}
            </x-jet-button>
        </form>
</div>