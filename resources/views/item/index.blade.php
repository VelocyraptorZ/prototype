<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Items') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @can('Create Item')
                <div class="py-4">
                    <a class="float-right mb-3 px-4 py-2 font-semibold text-sm bg-cyan-500 text-white rounded-full shadow-sm" href="{{ route('item.form') }}">Create</a>
                </div>
            @endcan
            <div class="clear-both bg-white overflow-hidden shadow-xl sm:rounded-lg p-4">
                <table class="table-auto min-w-full text-sm">
                    <thead class="">
                        <x-tr>
                            <th class="text-left border-b p-2">SKU</th>
                            <th class="text-left border-b p-2">Name</th>
                            <th class="text-left border-b p-2">Price</th>
                            <th class="text-left border-b p-2">Tax</th>
                            <th class="text-left border-b p-2">Instock</th>
                            <th class="text-left border-b p-2">Updated At</th>
                            <th class="text-left border-b p-2">Action</th>
                        </x-tr>
                    </thead>
                    <tbody class="text-slate-500">
                        @foreach($items as $item)
                            <tr>
                                <td class="border-b p-2">{{ $item->sku }}</td>
                                <td class="border-b p-2">{{ $item->name }}</td>
                                <td class="border-b p-2">{{ $item->price }}</td>
                                <td class="border-b p-2">{{ $item->tax }}</td>
                                <td class="border-b p-2">{{ $item->inventory()->sum('instock'); }}</td>
                                <td class="border-b p-2">{{ $item->updated_at->setTimezone('Asia/Kolkata')->format('d-m-Y H:i:s') }}</td>
                                <td class="border-b p-2">
                                    @can('Add Inventory')
                                    <a onclick="openModal('inventory.add', 'item={{ $item->id }}')" ><x-tabler-plus class="inline-block hover:text-blue-500"/></a>
                                    @endcan
                                    @can('Edit Item')
                                         <a href="{{ route('item.form') }}?id={{ $item->id }}"><x-tabler-edit  class="inline-block hover:text-blue-500"/></a>
                                    @endcan
                                    @can('Delete Item')
                                    <a class="text-red-700 cursor-pointer" onclick="getElementById('delete-{{ $item->id }}').submit()">
                                    <x-tabler-trash class="inline-block" /> 
                                    </a>
                                    <form id="delete-{{ $item->id }}" action="{{ route('item.delete',['item'=>$item->id]) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                    @endcan
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="mt-5">
                    {{ $items->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
