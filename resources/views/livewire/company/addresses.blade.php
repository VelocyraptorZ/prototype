<div class="p-4">
    @if($address)
        <form wire:submit.prevent="save" method="POST">
            <h3 class="font-semibold text-lg">Address Details</h3>
            <div>
                <x-jet-label for="line1" value="{{ __('Address line 1') }}" />
                <x-jet-input wire:model="address.line1" class="block mt-1 w-full" type="text" autofocus />
                @error('address.line1')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <x-jet-label for="line2" value="{{ __('Address line 2') }}" />
                <x-jet-input wire:model="address.line2" class="block mt-1 w-full" type="text" />
                @error('address.line2')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <x-jet-label for="landmark" value="{{ __('Landmark') }}" />
                <x-jet-input wire:model="address.landmark" class="block mt-1 w-full" type="text" />
                @error('address.landmark')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <x-jet-label for="pin" value="{{ __('Pin Code') }}" />
                <x-jet-input wire:model="address.pin" class="block mt-1 w-full" type="text" maxlength="6"/>
                @error('address.pin')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <x-jet-label for="city_id" value="{{ __('City') }}" />
                @if($this->address->city_id)
                    <a wire:click="removeCity">
                        <x-tabler-trash class="text-red-500 inline-block w-4 cursor-pointer" />
                    </a>
                    {{ $address->city->name }}, {{ $address->city->state->name }}, {{ $address->city->state->country->name }}
                @else
                    @livewire('autocomplete',['table'=>'cities', 'event'=>'selectedCity'])
                @endif
                @error('address.city_id')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <x-jet-label for="gstin" value="{{ __('GSTIN') }}" />
                <x-jet-input wire:model="address.gstin" class="block mt-1 w-full" type="text" />
                @error('address.gstin')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>
            <x-jet-button class="mt-4">
                {{ __('Save') }}
            </x-jet-button>

            <a wire:click="cancel" class="text-red-500 cursor-pointer">Cancel</a>
        </form>
    @else
        <h3 class="font-semibold text-lg mb-3">Addresses</h3>
        @forelse($company->addresses as $address)
            <div class="p-2 border rounded mb-3">
                <x-tabler-edit class="inline-block" wire:click="edit('{{ $address->id }}')" />
                {{ $address->line1 }},<br/>
                {{ $address->line2 }}<br/>
                Landmark : {{ $address->landmark }}.<br/>
                {{ $address->city->name }}, {{ $address->city->state->name }}, {{ $address->city->state->country->name }}<br/>
                PIN : {{ $address->pin }}<br/>
                GSTIN : {{ $address->gstin }}<br/>
                @if($event)
                <a wire:click="select('{{ $address->id }}')" class="text-blue-500 cursor-pointer">Select this address</a>
                @endif
            </div>
        @empty
            <div class="text-red-500">No Address</div>
        @endforelse

        @can('Add Company Address')
            <x-jet-button class="mt-4" wire:click="add">
                {{ __('Add') }}
            </x-jet-button>
        @endcan
    @endif
</div>
