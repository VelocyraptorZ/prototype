<div>
    <x-jet-input wire:model="query" class="block mt-1 w-full" type="text"/>
    @if ($results)
    <div class="relative">
        <div class=" w-full bg-white border">
            @foreach ($results as $row)
                <div class="p-2 hover:bg-slate-400 text-gray-800 border-b cursor-pointer" wire:click="select('{{ $row->id }}')">
                    {{ $row->name }}
                </div>
            @endforeach
            @if ($createComponent)
            <div class="p-2 hover:bg-slate-400 text-gray-800 border-b cursor-pointer" onclick="openModal('{{ $createComponent }}', 'event={{ $event }}')">
                Create New
            </div>
        @endif
        </div>
    </div>
    @endif
</div>
