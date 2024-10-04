<div class="">
    <div class="grid md:grid-cols-2 gap-6">
        <div>
                <form wire:submit.prevent="save" method="POST">
                    @csrf
                    <div>
                        <x-jet-label for="name" value="{{ __('Name') }}" />
                        <x-jet-input wire:model="user.name" class="block mt-1 w-full" type="text" autofocus />
                        @error('user.name')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                    <div>
                        <x-jet-label for="email" value="{{ __('email') }}" />
                        <x-jet-input  wire:model="user.email" class="block mt-1 w-full"  type="text" />
                        @error('user.email')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mt-3 border-t">
                        @livewire('user.roles', ['user'=>$user])
                    </div>
                    <x-jet-button class="mt-4">
                        {{ __('Save') }}
                    </x-jet-button>
                </form>
        </div>
    </div>
</div>