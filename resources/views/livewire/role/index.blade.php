<div>
    <div class="flex justify-between">
        <div>
        </div>
    @can('create item')
        <div class="py-4">
            <a class="mb-3 px-4 py-2 font-semibold text-sm bg-cyan-500 text-white rounded-full shadow-sm" onclick="openModal('role.form', 'event=reloadRoles')">Create</a>
        </div>
    @endcan
    </div>

    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-4">
        <x-jet-validation-errors class="mb-4" />
        <table class="table-auto min-w-full text-sm">
            <thead class="">
                <x-tr>
                    <th class="text-left border-b p-2">Name</th>
                    <th class="text-left border-b p-2">Updated At</th>
                    <th class="text-left border-b p-2">Action</th>
                </x-tr>
            </thead>
            <tbody class="text-slate-500">
                @foreach($roles as $role)
                    <tr>
                        <td class="border-b p-2">
                            <a class="cursor-pointer" onclick="openModal('role.permissions', 'role={{ $role->id }}')">{{ $role->name }}</a>
                        </td>
                        <td class="border-b p-2">{{ $role->updated_at->setTimezone('Asia/Kolkata')->format('d-m-Y H:i:s') }}</td>
                        <td class="border-b p-2">
                            @can('edit role')
                                 <a onclick="openModal('role.form', 'role={{ $role->id }}&event=reloadRoles')"><x-tabler-edit  class="inline-block hover:text-blue-500"/></a>
                            @endcan
                            @can('delete role')
                            <a class="text-red-700 cursor-pointer" wire:click="delete('{{ $role->id }}')">
                            <x-tabler-trash class="inline-block" /> 
                            </a>
                            @endcan
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="mt-5">
            {{ $roles->links() }}
        </div>
    </div>
</div>
