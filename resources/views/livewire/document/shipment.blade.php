<div class="p-4">

    <h3 class="font-semibold">Shipping Details</h3>

        <div class="mb-3">
            <x-jet-label for="status" value="{{ __('Shipment Mode') }}" />
            <x-select wire:model="shipment.shipping_mode_id" class="w-full">
                <option value="">Select</option>
                @foreach($modes as $mode)
                    <option value="{{ $mode->id }}">{{ $mode->name }}</option>
                @endforeach
        </x-select>
        @error('shipment.shipping_mode_id')
                <span class="text-red-500">{{ $message }}</span>
            @enderror
        </div>

        <div>
            <x-jet-label for="expectedDispatchDate" value="{{ __('Expected Date of Dispatch') }}" />
            <x-jet-input wire:model="expectedDispatchDate" class="block mt-1 w-full" type="date" />
            @error('expectedDispatchDate')
                <span class="text-red-500">{{ $message }}</span>
            @enderror
        </div> 

        <div>
            <x-jet-label for="actualDispatchDate" value="{{ __('Actual Date of Dispatch') }}" />
            <x-jet-input wire:model="actualDispatchDate" class="block mt-1 w-full" type="date" />
            @error('actualDispatchDate')
                <span class="text-red-500">{{ $message }}</span>
            @enderror
        </div>
        
        <div>
            <x-jet-label for="length" value="{{ __('Length') }}" />
            <x-jet-input wire:model="shipment.length" class="block mt-1 w-full" type="text" />
            @error('shipment.length')
                <span class="text-red-500">{{ $message }}</span>
            @enderror
        </div> 
        <div>
            <x-jet-label for="breadth" value="{{ __('Breadth') }}" />
            <x-jet-input wire:model="shipment.breadth" class="block mt-1 w-full" type="text" />
            @error('shipment.breadth')
                <span class="text-red-500">{{ $message }}</span>
            @enderror
        </div> 
        <div>
            <x-jet-label for="height" value="{{ __('Height') }}" />
            <x-jet-input wire:model="shipment.height" class="block mt-1 w-full" type="text" />
            @error('shipment.height')
                <span class="text-red-500">{{ $message }}</span>
            @enderror
        </div> 
        <div>
            <x-jet-label for="weight" value="{{ __('Weight') }}" />
            <x-jet-input wire:model="shipment.weight" class="block mt-1 w-full" type="text" />
            @error('shipment.weight')
                <span class="text-red-500">{{ $message }}</span>
            @enderror
        </div> 
        <div>
            <x-jet-label for="payment_method" value="{{ __('Payment Method') }}" />
            <x-select wire:model="shipment.payment_method" class="w-full">
                <option value="">Select</option>
                <option value="cod">COD</option>
                <option value="Prepaid">Prepaid</option>
            </x-select>
            @error('shipment.payment_method')
                <span class="text-red-500">{{ $message }}</span>
            @enderror
        </div> 

        <div>
            <x-jet-label for="awb" value="{{ __('AWB') }}" />
            <x-jet-input wire:model="shipment.awb" class="block mt-1 w-full" type="text" />
            @error('shipment.awb')
                <span class="text-red-500">{{ $message }}</span>
            @enderror
        </div> 
        
        <x-jet-button class="mt-4" wire:click="save">
            {{ __('Save') }}
        </x-jet-button>
</div>