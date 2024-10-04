<div>
    @if($mode)
        <div class="py-4">
            <a class="float-right mb-3 px-4 py-2 font-semibold text-sm bg-cyan-500 text-white rounded-full shadow-sm" wire:click="cancel">Cancel</a>
        </div>
        <form wire:submit.prevent="save" method="POST">
                    <div>
                        <x-jet-label for="name" value="{{ __('Name') }}" />
                        <x-jet-input wire:model="mode.name" class="block mt-1 w-full" type="text" autofocus />
                        @error('mode.name')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                    <x-jet-button class="mt-4">
                        {{ __('Save') }}
                    </x-jet-button>
        </form>
    @else
            @can('Create Shipping Mode')
                <div class="py-4">
                    <a class="float-right mb-3 px-4 py-2 font-semibold text-sm bg-cyan-500 text-white rounded-full shadow-sm" wire:click="create">Create</a>
                </div>
            @endcan
            <div class="clear-both bg-white overflow-hidden shadow-xl sm:rounded-lg p-4">
                <table class="table-auto min-w-full text-sm">
                    <thead class="bg-gray-200">
                        <tr>
                            <th class="text-left border-b p-2">Name</th>
                            <th class="text-left border-b p-2">Action</th>
                        </tr>
                    </thead>
                    <tbody class="text-slate-500">
                        @foreach($modes as $mode)
                            <tr>
                                <td class="border-b p-2">{{ $mode->name }}</td>
                                <td class="border-b p-2">
                                    @can('Edit Mode')
                                         <a wire:click="edit({{ $mode->id }})"><x-tabler-edit  class="inline-block hover:text-blue-500"/></a>
                                    @endcan
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="mt-5">
                    {{ $modes->links() }}
                </div>
            </div>
    @endif
</div>