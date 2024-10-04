<div>
    @if($component)
    <div wire:click="closeModal" class="bg bg-gradient-to-r from-gray-400 to-transparent fixed top-0 right-0 w-full h-full">
        
    </div>
    <div class="px-4 fixed top-0 right-0 w-full md:w-half lg:w-1/4 bg-white h-full shadow-sm border-l overflow-y-auto">
        <div class="flex items-center justify-between border-b">
            <div class="p-4">
                {{ ucwords(str_replace('.', ' ', $component)) }}
            </div>
            <div class="overflow-auto">
                <a class="text-center text-red-500 cursor-pointer float-right" wire:click="closeModal">
                    <x-feathericon-x-square class="m-3 hover:text-blue-500"/>
                </a>
            </div>
        </div>
        <div class="mt-4">
            @livewire($component, $data, key($component))
        </div>
    </div>
    @endif
</div>
