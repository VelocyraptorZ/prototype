<div>
    @can('View All Document')
    <h3 class="font-semibold mb-3">Document Counts</h3>
    <div class="grid sm:grid-cols-2 md:grid-cols-4 gap-6 mb-3">
        @foreach($types as $type)
            @can('View '.$type->name)
            <div class="flex-auto p-4 bg-white rounded mb-6 xl:mb-0 shadow-lg">
                <a href="{{ route('document.index',['type'=>$type->slug]) }}">
                    <div class="flex flex-wrap">
                        <div class="relative w-full pr-4 max-w-full flex-grow flex-1">
                        <h5 class="text-gray-500 uppercase font-bold text-xs">
                            {{ $type->name }}
                        </h5>
                        <span class="font-semibold text-xl text-blueGray-700">
                            {{ $type->documents_count }}
                        </span>
                        </div>
                        <div class="relative w-auto pl-4 flex-initial">
                        <div class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 shadow-lg rounded-full bg-orange-500">
                            <x-tabler-chart-line />
                        </div>
                        </div>
                    </div>
                </a>
                <!-- <p class="text-sm text-blueGray-400 mt-4">
                    <span class="text-emerald-500 mr-2">
                    <x-tabler-arrow-up class="inline-block" /> 3.48%
                    </span>
                    <span class="text-slate-500">
                    Since last month
                    </span>
                </p> -->
            </div>
            @endcan
        @endforeach
    </div>
    @endcan


    @foreach($statusCount as $docType=>$statuses)
        <div class=" border-gray-200 mb-3">
            <h3 class="font-semibold mb-3">{{ $docType }} Status Counts</h3>
            <div class="grid sm:grid-cols-3 md:grid-cols-6 gap-4 text-sm">
                @foreach($statuses as $status=>$count)
                    <div class="p-2 bg-white rounded mb-3 shadow-sm">
                        <h5 class="text-gray-500 uppercase font-bold text-xs">
                            {{ $status }}
                        </h5>
                        <span class="font-semibold text-xl text-blueGray-700">
                            {{ $count }}
                        </span>
                    </div>
                @endforeach
            </div>
        </div>
    @endforeach
</div>