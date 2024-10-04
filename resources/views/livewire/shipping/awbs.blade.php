<div>
    @if($awb)
        <div class="py-4">
            <a class="float-right mb-3 px-4 py-2 font-semibold text-sm bg-cyan-500 text-white rounded-full shadow-sm" wire:click="cancel">Cancel</a>
        </div>
        <form wire:submit.prevent="save" method="POST">
                    <div>
                        <x-jet-label for="awb_number" value="{{ __('AWB Number') }}" />
                        <x-jet-input wire:model="awb.awb_number" class="block mt-1 w-full" type="text" autofocus />
                        @error('awb.awb_number')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                    <div>
                        <x-jet-label for="provider_id" value="{{ __('Mode') }}" />
                        <select class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm w-full" wire:model="awb.shipping_provider_id">
                            <option value="">Select Shipping Provider</option>
                            @foreach($providers as $provider)
                                <option value="{{ $provider->id }}">{{ $provider->name }}</option>
                            @endforeach
                        </select>
                        @error('awb.shipping_provider_id')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                    <x-jet-button class="mt-4">
                        {{ __('Save') }}
                    </x-jet-button>
        </form>
    @else
            @can('Create Shipping Awb')
                <div class="py-4">
                    <a class="float-right mb-3 px-4 py-2 font-semibold text-sm bg-cyan-500 text-white rounded-full shadow-sm" wire:click="create">Create</a>
                </div>
            @endcan
            <div class="clear-both bg-white overflow-hidden shadow-xl sm:rounded-lg p-4">
                <table class="table-auto min-w-full text-sm">
                    <thead class="bg-gray-200">
                        <tr>
                            <th class="text-left border-b p-2">AWB Number</th>
                            <th class="text-left border-b p-2">Shipping Provider</th>
                            <th class="text-left border-b p-2">Action</th>
                        </tr>
                    </thead>
                    <tbody class="text-slate-500">
                        @foreach($awbs as $awb)
                            <tr>
                                <td class="border-b p-2">{{ $awb->awb_number }}</td>
                                <td class="border-b p-2">{{ $awb->provider->name }}</td>
                                <td class="border-b p-2">
                                    @can('Edit Awb')
                                         <a wire:click="edit({{ $awb->id }})"><x-tabler-edit  class="inline-block hover:text-blue-500"/></a>
                                    @endcan
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="mt-5">
                    {{ $awbs->links() }}
                </div>
            </div>
    @endif
</div>