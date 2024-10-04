<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Manifests') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="clear-both bg-white overflow-hidden shadow-xl sm:rounded-lg p-4">
                <div class="text-right mb-4">
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
                </div>
                @livewire('manifest.documents', ['manifest'=>$manifest])
            </div>
        </div>
    </div>
</x-app-layout>