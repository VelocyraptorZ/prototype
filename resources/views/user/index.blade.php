<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Users') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @can('Create User')
                <div class="py-4">
                    <a class="float-right mb-3 px-4 py-2 font-semibold text-sm bg-cyan-500 text-white rounded-full shadow-sm" href="{{ route('user.create') }}">Create</a>
                </div>
            @endcan
            <div class="clear-both bg-white overflow-hidden shadow-xl sm:rounded-lg p-4">
                <table class="table-auto min-w-full text-sm">
                    <thead class="">
                        <x-tr>
                            <th class="text-left border-b p-2">Name</th>
                            <th class="text-left border-b p-2">Company</th>
                            <th class="text-left border-b p-2">Email</th>
                            <th class="text-left border-b p-2">Role</th>
                            <th class="text-left border-b p-2">Updated At</th>
                            <th class="text-left border-b p-2">Action</th>
                        </x-tr>
                    </thead>
                    <tbody class="text-slate-500">
                        @foreach($users as $user)
                            <tr>
                                <td class="border-b p-2">{{ $user->name }}</td>
                                <td class="border-b p-2">
                                    @foreach($user->companies->pluck('name') as $company)
                                        {{ $company }}<br/>
                                    @endforeach
                                </td>
                                <td class="border-b p-2">{{ $user->email }}</td>
                                <td class="border-b p-2">
                                    @foreach($user->roles as $role)
                                        <a onclick="openModal('role.permissions', 'role={{ $role->id }}')">{{ $role->name }}</a>
                                    @endforeach
                                </td>
                                <td class="border-b p-2">{{ $user->updated_at->setTimezone('Asia/Kolkata')->format('d-m-Y H:i:s') }}</td>
                                <td class="border-b p-2">
                                    @can('Edit User')
                                         <a href="{{ route('user.form') }}?id={{ $user->id }}"><x-tabler-edit  class="inline-block hover:text-blue-500"/></a>
                                    @endcan
                                    @can('Delete User')
                                    <a class="text-red-700 cursor-pointer" onclick="getElementById('delete-{{ $user->id }}').submit()">
                                    <x-tabler-trash class="inline-block" /> 
                                    </a>
                                    <form id="delete-{{ $user->id }}" action="{{ route('user.delete',['user'=>$user->id]) }}" method="POST">
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
                    {{ $users->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>