<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Manifests') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @can('Create Manifest')
                <div class="py-4">
                    <a class="float-right mb-3 px-4 py-2 font-semibold text-sm bg-cyan-500 text-white rounded-full shadow-sm" onclick="openModal('manifest.form')">Create</a>
                </div>
            @endcan
            <div class="clear-both bg-white overflow-hidden shadow-xl sm:rounded-lg p-4">
                <table class="table-auto min-w-full text-sm">
                    <thead class="bg-gray-200">
                        <tr>
                            <th class="text-left border-b p-2">Manifest Id</th>
                            <th class="text-left border-b p-2">User</th>
                            <th class="text-left border-b p-2">Created At</th>
                            <th class="text-left border-b p-2">Action</th>
                        </tr>
                    </thead>
                    <tbody class="text-slate-500">
                        @foreach($manifests as $manifest)
                            <tr>
                                <td class="border-b p-2">{{ $manifest->id }}</td>
                                <td class="border-b p-2">{{ $manifest->user->name }}</td>
                                <td class="border-b p-2">{{ $manifest->created_at }}</td>
                                <td class="border-b p-2">
                                    @can('View Manifest')
                                        <a class="cursor-pointer" href="{{ route('manifest.show',['manifest'=>$manifest->id]) }}">
                                        <x-tabler-eye class="inline-block" /> View
                                        </a>
                                    @endcan
                                    @can('Print Manifest')
                                        <a class="text-blue-500 cursor-pointer ml-2" href="{{ route('manifest.print',['manifest'=>$manifest->id]) }}">
                                        <x-tabler-printer class="inline-block" /> Print
                                        </a>
                                    @endcan
                                    @can('Close Manifest')
                                        <a class="text-blue-500 cursor-pointer ml-2" href="{{ route('manifest.close',['manifest'=>$manifest->id]) }}">
                                        <x-tabler-truck-delivery class="inline-block" /> Close
                                        </a>
                                    @endcan
                                    @can('Delete Manifest')
                                    <a class="text-red-700 cursor-pointer" onclick="getElementById('delete-{{ $manifest->id }}').submit()">
                                    <x-tabler-trash class="inline-block" /> 
                                    </a>
                                    <form id="delete-{{ $manifest->id }}" action="{{ route('manifest.delete',['manifest'=>$manifest->id]) }}" method="POST">
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
                    {{ $manifests->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>