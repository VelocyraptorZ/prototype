<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $type->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-between">
                <div class="basis-2/5 mb-3">
                    <form action="">
                    <x-jet-input id="search" placeholder="Type number/title and press enter to search" class="text-sm block mt-1 w-full" type="text" name="search" :value="old('search')" />
                    </form>
                </div>
                <div class="text-right">
                    @can('Create '.$type->name)
                        <div class="py-4">
                            <a class="mb-3 px-4 py-2 font-semibold text-sm bg-cyan-500 text-white rounded-full shadow-sm" href="{{ route('document.create',['type'=>$type->slug]) }}">Create {{ $type->name }}</a>
                            <!-- onclick="openModal('document.create', 'type={{ $type->slug }}')" -->
                        </div>
                    @endcan
                </div>
            </div>
            <div class="clear-both bg-white overflow-hidden shadow-xl sm:rounded-lg p-4">
                <x-table class="">
                    <thead>
                        <x-tr>
                            <th class="border-b p-2">Title</th>
                            <th class="border-b p-2">Number</th>
                            <th class="border-b p-2">Status</th>
                            <th class="border-b p-2">Created By</th>
                            @if($type->payment_involved)
                                <th class="border-b p-2">Payment Status</th>
                            @endif
                            <th class="border-b p-2">Updated At</th>
                            @if($type->next)
                            <th class="border-b p-2">{{ $type->next->name }}</th>
                            @endif
                            <th class="border-b p-2">Action</th>
                        </x-tr>
                    </thead>
                    <tbody class="text-slate-500">
                        @forelse($documents as $document)
                            <tr class="even:bg-slate-50">
                                <x-td>{{ $document->title }}</x-td>
                                <x-td>{{ $document->document_number }}</x-td>
                                <x-td>{{ $document->status }}</x-td>
                                <x-td>{{ $document->user->name }}</x-td>
                                @if($type->payment_involved)
                                    <x-td>
                                        @if($document->payment)
                                            {{ $document->payment->status }}
                                        @else
                                            Unpaid
                                        @endif
                                    </x-td>
                                @endif
                                <x-td>{{ $document->updated_at->setTimezone('Asia/Kolkata')->format('d-m-Y H:i:s') }}</x-td>

                                @if($type->next)
                                <x-td>
                                    @if($document->next)
                                        {{ $document->next->id }}
                                    @elseif($document->status!='Draft')
                                        @can('Create '.$type->next->name)
                                            <a class="cursor-pointer border rounded-full py-1 px-2" onclick="document.getElementById('next-{{ $document->id }}').submit()">
                                            <x-tabler-file-symlink  class="inline-block hover:text-blue-500"/>
                                                Create {{ $type->next->name }}
                                            </a>
                                            <form method="post" id="next-{{ $document->id }}" action="{{ route('document.next',['document'=>$document->id]) }}">
                                                @csrf
                                            </form>
                                        @endcan
                                    @else
                                        -
                                    @endif
                                </x-td>
                                @endif 

                                <x-td>
                                    @if($document->status!='Draft')
                                    <a href="{{ route('document.show',['document'=>$document->id]) }}"><x-tabler-file-info  class="inline-block hover:text-blue-500"/></a>
                                    @endif
                                    @can('Edit '.$type->name)
                                         <a href="{{ route('document.edit',['document'=>$document->id]) }}"><x-tabler-edit  class="inline-block hover:text-blue-500"/></a>
                                    @endcan
                                    @can('Create '.$type->name)
                                         <a href="{{ route('document.replicate',['document'=>$document->id]) }}"><x-tabler-copy  class="inline-block hover:text-blue-500"/></a>
                                    @endcan
                                    @can('Delete '.$type->name)
                                    <a class="text-red-700 cursor-pointer" onclick="confirmDelete('delete-{{ $document->id }}','{{ $document->title }}')">
                                    <x-tabler-trash class="inline-block" /> 
                                    </a>
                                    <form id="delete-{{ $document->id }}" action="{{ route('document.delete',['document'=>$document->id]) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                    @endcan
                                </x-td>
                            </tr>
                        @empty
                            <tr><x-td colspan='6'><span class="text-red-500">No Records Found</span></x-td></tr>
                        @endforelse
                    </tbody>
                </x-table>

                <div class="mt-5">
                    {{ $documents->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
