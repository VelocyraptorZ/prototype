<div class="p-4">
    <div class="grid md:grid-cols-2">
        <div>
            <form wire:submit.prevent="save" method="POST">
                @csrf
                <div>
                    <x-jet-label for="name" value="{{ __('Company Name') }}" />
                    <x-jet-input wire:model="company.name" class="block mt-1 w-full" type="text" autofocus />
                    @error('company.name')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <div>
                    <x-jet-label for="email" value="{{ __('Company Email') }}" />
                    <x-jet-input  wire:model="company.email" id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" />
                    @error('company.email')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <div>
                    <x-jet-label for="mobile" value="{{ __('Company Mobile') }}" />
                    <x-jet-input  wire:model="company.mobile" id="mobile" class="block mt-1 w-full" type="text" name="mobile" :value="old('mobile')" maxlength='10' />
                    @error('company.mobile')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <div class="block mt-4">
                    <label for="sameContact" class="flex items-center">
                        <x-jet-checkbox id="sameContact" wire:click="contactDetails" wire:model="sameContact" 
                        />
                        <span class="ml-2 text-sm text-gray-600">{{ __('Contact Person details same as company details') }}</span>
                    </label>
                    @error('sameContact')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>
                
                @if(!$sameContact)

                <div>
                    <x-jet-label for="contact_person_name" value="{{ __('Contact Person Name') }}" />
                    <x-jet-input wire:model="company.contact_person_name" class="block mt-1 w-full" type="text" autofocus />
                    @error('company.contact_person_name')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <div>
                    <x-jet-label for="contact_person_email" value="{{ __('Contact Person Email') }}" />
                    <x-jet-input  wire:model="company.contact_person_email" id="contact_person_email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" />
                    @error('company.contact_person_email')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>
                
                <div>
                    <x-jet-label for="contact_person_mobile" value="{{ __('Contact Person Mobile') }}" />
                    <x-jet-input  wire:model="company.contact_person_mobile" id="contact_person_mobile" class="block mt-1 w-full" type="text" name="mobile" :value="old('mobile')" maxlength='10' />
                    @error('company.contact_person_mobile')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <div>
                    <x-jet-label for="gstin" value="{{ __('GSTIN') }}" />
                    <x-jet-input wire:model="company.gstin" class="block mt-1 w-full" type="text" />
                    @error('company.gstin')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                @endif

                <div>
                    <x-jet-label for="logo" value="{{ __('Company Logo') }}" />
                    @if ($company->logo)
                        <img class="w-16" src="/storage/{{ $company->logo }}">
                    @endif
                    <input type='file'  wire:model="logo" id="logo" class="block mt-1 w-full" type="text" name="logo" />
                    @error('logo')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                    @if ($logo)
                        Preview:
                        <img class="w-10" src="{{ $logo->temporaryUrl() }}">
                    @endif
                </div>
                
                <x-jet-button class="mt-4">
                    {{ __('Save') }}
                </x-jet-button>
            </form>
        </div>
    </div>
</div>
