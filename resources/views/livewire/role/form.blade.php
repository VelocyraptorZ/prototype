<div class="p-4">
    <div class="">
        <h3 class="text-lg">Role</h3>
        <div>
            <form wire:submit.prevent="save" method="POST">
                @csrf
                
                <div>
                    <x-jet-label for="name" value="{{ __('Name') }}" />
                    <x-jet-input wire:model="role.name" class="block mt-1 w-full" type="text" autofocus />
                    @error('role.name')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>
                
                <x-jet-button class="mt-4">
                    {{ __('Save') }}
                </x-jet-button>
            </form>
        </div>
        <div>
        </div>
    </div>
</div>