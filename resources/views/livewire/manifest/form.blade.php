<div class="p-4">
    <div class="mb-3 p-2 rounded text-sm bg-blue-100">Orders with Packed status will get manifested for selected company and mode</div>
        <form wire:submit.prevent="create" method="post">
            @csrf
            <div>
                <x-jet-label for="seller_company_id" value="{{ __('Seller Company') }}" />
                <x-select class="w-full" wire:model="seller_company_id">
                    <option value="">Select</option>
                    @foreach(Auth::user()->companies as $company)
                        <option value="{{ $company->id }}">{{ $company->name }}</option>
                    @endforeach
                </x-select>
                @error('seller_company_id')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <x-jet-label for="shipment_mode" value="{{ __('Shipment Mode') }}" />
                <x-select wire:model="shipping_mode_id" class="w-full">
                    <option value="">Select</option>
                    @foreach($modes as $mode)
                        <option value="{{ $mode->id }}">{{ $mode->name }}</option>
                    @endforeach
                </x-select>
                @error('shipping_mode_id')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>
            <x-jet-button class="mt-4">
                {{ __('Create') }}
            </x-jet-button>
        </form>
    </div>
</div>