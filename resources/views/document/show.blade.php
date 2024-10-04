<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $document->documentType->name }} Details - {{ $document->title }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-4 gap-4">
                <div class="col-span-3 bg-white overflow-hidden shadow-xl sm:rounded-lg p-4">
                    @livewire('document.view',['document'=>$document])
                </div>
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-4">
                    <div class="flex justify-between border-b p-2">
                        <a href="{{ route('document.pdf',['document'=>$document->id]) }}"><x-tabler-cloud-download class="inline" /> Download</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>