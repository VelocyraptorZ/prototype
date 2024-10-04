<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Companies') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @can('Create Company')
                <div class="py-4">
                    <a class="float-right mb-3 px-4 py-2 font-semibold text-sm bg-cyan-500 text-white rounded-full shadow-sm" href="{{ route('company.create') }}">Create</a>
                </div>
            @endcan
            <div class="clear-both bg-white overflow-hidden shadow-xl sm:rounded-lg p-4">
                <x-table>
                    <thead class="">
                        <x-tr>
                            <th class="text-left border-b p-2">Name</th>
                            <th class="text-left border-b p-2">Email</th>
                            <th class="text-left border-b p-2">Mobile</th>
                            <th class="text-left border-b p-2">Contact Person</th>
                            <th class="text-left border-b p-2">Created By</th>
                            <th class="text-left border-b p-2">Updated At</th>
                            <th class="text-left border-b p-2">Action</th>
                        </x-tr>
                    </thead>
                    <tbody class="text-slate-500">
                        @foreach($companies as $company)
                            <tr>
                                <td class="border-b p-2">{{ $company->name }}</td>
                                <td class="border-b p-2">{{ $company->email }}</td>
                                <td class="border-b p-2">{{ $company->mobile }}</td>
                                <td class="border-b p-2">
                                    {{ $company->contact_person_name }}
                                    <br/>
                                    {{ $company->contact_person_email }}, {{ $company->contact_person_mobile }}
                                </td>
                                <td class="border-b p-2">@if($company->user) {{ $company->user->name }} @endif<br/>
                                <td class="border-b p-2">{{ $company->updated_at->setTimezone('Asia/Kolkata')->format('d-m-Y H:i:s') }}</td>
                                <td class="border-b p-2">

                                    <a class="text-blue-500 text-sm cursor-pointer" onclick="openModal('company.addresses', 'company={{ $company->id }}')">
                                        <x-tabler-map-2 class="inline-block" />
                                    </a>

                                    @can('Edit Company')
                                         <a href="{{ route('company.edit',['company'=>$company->id]) }}"><x-tabler-edit  class="inline-block hover:text-blue-500"/></a>
                                    @endcan
                                    @can('Delete Company')
                                    <a class="text-red-700 cursor-pointer" onclick="getElementById('delete-{{ $company->id }}').submit()">
                                    <x-tabler-trash class="inline-block" /> 
                                    </a>
                                    <form id="delete-{{ $company->id }}" action="{{ route('company.delete',['company'=>$company->id]) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                    @endcan
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </x-table>

                <div class="mt-5">
                    {{ $companies->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
