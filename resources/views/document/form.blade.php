<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create ' .$type->name) }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-4 gap-4">
                <div class="col-span-3 bg-white shadow-xl sm:rounded-lg p-4">
                    @if(!$document || $document->status=='Draft')
                        @livewire('document.form',['document'=>$document, 'type'=>$type])
                    @else
                        @livewire('document.view',['document'=>$document])
                    @endif
                </div>
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    @if(isset($document) && $document->status!='Draft')
                        <div class="mb-3 border-b">
                            <div class="text-sm mb-3">
                                @livewire('document.users', ['document'=>$document])
                            </div>
                        </div>
                        <div class="mb-3 border-b">
                            <div class="text-sm mb-3">
                                @livewire('document.statuses', ['document'=>$document])
                            </div>
                        </div>

                        @if($document->documentType->inventory_involved)
                            <div class="mb-3 border-b">
                                <div class="text-sm mb-3">
                                    @livewire('document.shipment', ['document'=>$document])
                                </div>
                            </div>
                        @endif

                        @can('Send '.$document->documentType->name.' Mail')
                            @if($document->status!='Draft')
                            <div class="p-2">
                                <a class="text-blue-500 hover:underline" href="mailto:{{ $document->buyer_company->email }}?subject={{ $document->documentType->name }}&body=Please%20find%20attached%20{{ $document->documentType->name }}" target="_top">
                                    Send mail using device
                                </a>
                            </div>
                            <div class="flex justify-between border-b p-2">
                                <a class="p-2 rounded bg-slate-300 text-sm" href="{{ route('document.mail', ['document'=>$document->id]) }}">
                                    <x-tabler-mail class="inline-block" />
                                    Send Mail
                                </a>
                                <a class="p-2 rounded bg-slate-300 text-sm"  href="{{ route('document.pdf',['document'=>$document->id]) }}"><x-tabler-cloud-download class="inline" /> Download</a>
                            </div>
                            @endif
                        @endcan
                        @if($document->documentType->payment_involved && $document->payment)
                            <div class="mb-3 border-b">
                                <div class="text-sm mb-3">
                                    @livewire('document.payments', ['document'=>$document])
                                </div>
                            </div>
                        @endif
                        @if(false)
                            @if($document->documentType->inventory_involved)
                            <div class="mb-3 border-b">
                                <div class="text-sm mb-3">
                                    @livewire('document.quality', ['document'=>$document])
                                </div>
                            </div>
                            @endif
                        @endif
                    @else
                    
                    @endif
                </div>
            </div>
            @if(isset($document) && $document->created_at)
                @can('View '.$document->documentType->name .' Attachments')
                    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg mt-4">
                        @livewire('document.attachments',['document'=>$document])
                    </div>
                @endcan
                @can('View '.$document->documentType->name .' Attachments')
                    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg mt-4">
                        @livewire('document.comments',['document'=>$document])
                    </div>
                @endcan
            @endif
        </div>
    </div>
</x-app-layout>