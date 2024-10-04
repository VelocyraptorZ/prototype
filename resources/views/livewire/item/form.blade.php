<div class="p-4">
    <div class="grid md:grid-cols-2">
        <div>
            <form wire:submit.prevent="save" method="POST">
                @csrf

                <div>
                    <x-jet-label for="sku" value="{{ __('SKU') }}" />
                    <x-jet-input wire:model="item.sku" class="block mt-1 w-full" type="text" autofocus />
                    @error('item.sku')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <div>
                    <x-jet-label for="name" value="{{ __('Name') }}" />
                    <x-jet-input wire:model="item.name" class="block mt-1 w-full" type="text" autofocus />
                    @error('item.name')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <div>
                    <x-jet-label for="price" value="{{ __('Price') }}" />
                    <x-jet-input  wire:model="item.price" class="block mt-1 w-full"  type="text" />
                    @error('item.price')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <div>
                    <x-jet-label for="description" value="{{ __('Description') }}" />
                    <x-jet-input  wire:model="item.description" class="block mt-1 w-full"  type="text" />
                    @error('item.description')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <div>
                    <x-jet-label for="tax" value="{{ __('Tax') }}" />
                    <x-jet-input  wire:model="item.tax" class="block mt-1 w-full"  type="text" />
                    @error('item.tax')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <div>
                    <x-jet-label for="currency" value="{{ __('Currency') }}" />
                    <select class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm w-full" wire:model="item.currency">
                        <option value="">Select</option>
                        <option value="INR">INR</option>
                        <option value="USD">USD</option>
                    </select>
                    @error('item.currency')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <div>
                    <x-jet-label for="hsn_code" value="{{ __('HSN_CODE') }}" />
                    <x-jet-input  wire:model="item.hsn_code" class="block mt-1 w-full"  type="text" />
                    @error('item.hsn_code')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <div>
                    <x-jet-label for="sac_code" value="{{ __('SAC_CODE') }}" />
                    <x-jet-input  wire:model="item.sac_code" class="block mt-1 w-full"  type="text" />
                    @error('item.sac_code')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <x-jet-button class="mt-4">
                    {{ __('Save') }}
                </x-jet-button>
            </form>
        </div>
    </div>
</div>
