<div>
    @if($document->seller_company->logo)
        <img src="/storage/{{ $document->seller_company->logo }}" alt="Logo" class="float-right w-20">
    @endif

    <h3 class="font-semibold text-lg">{{ $document->documentType->name }}</h3>

    <div>
        <div class="text-sm p-2">
            <p class="text-right"></p>
        </div>
    </div>

    <table class="table-auto min-w-full text-sm my-5">
        <tbody class="text-slate-800 align-top">
            <tr>
                <td class="p-2">
                    <!-- <p>{{ $document->documentType->name }} Title : {{ $document->title}} </p> -->
                    <p>{{ $document->documentType->name }} Number : {{ $document->document_number}} </p>
                    <p>{{ $document->documentType->name }} Date : {{ $document->created_at->format('d-m-Y') }} </p>
                </td>
                <td class="p-2 text-right">
                    {{-- <p>Order Date : {{ $document->created_at->format('d-m-Y') }} </p>
                    <p>Order Number : </p> --}}
                </td>
            </tr>
        </tbody>
    </table>

    @can('View '.$document->documentType->name .' Information')
        <table class="table-auto min-w-full text-sm my-5">
            <tbody class="text-slate-800 align-top">
                <tr>
                    <td class="border p-2">
                        <b>Buyer Details</b><br/>
                        Name: {{ $document->buyer_company->name }},<br/>
                        Email: {{ $document->buyer_company->email }}<br/>
                        Mobile: {{ $document->buyer_company->mobile }},<br/>
                        GSTIN : {{ $document->buyer_company->gstin }},<br/>
                        Address : <br/>
                        @if(isset($document->data['billing_address']))
                            {{ $document->data['billing_address']['line1'] }}<br/>
                            {{ $document->data['billing_address']['line2'] }}<br/>
                            City : 
                            {{ $document->data['billing_address']['city'] }}<br/>
                            State : 
                            {{ $document->data['billing_address']['state'] }}<br/>
                            Country : 
                            {{ $document->data['billing_address']['country'] }}<br/>
                            PIN : 
                            {{ $document->data['billing_address']['pin'] }}<br/>
                        @endif
                    </td>
                    <td class="border p-2">
                        <b>Supplier Details</b><br/>
                        Name: {{ $document->seller_company->name }},<br/>
                        Email: {{ $document->seller_company->email }},<br/>
                        Mobile: {{ $document->seller_company->mobile }},<br/>
                        GSTIN : {{ $document->seller_company->gstin }},<br/>
                        Address : <br/>
                        @if(isset($document->data['seller_address']))
                            {{ $document->data['seller_address']['line1'] }}<br/>
                            {{ $document->data['seller_address']['line2'] }}<br/>
                            City : 
                            {{ $document->data['seller_address']['city'] }}<br/>
                            State : 
                            {{ $document->data['seller_address']['state'] }}<br/>
                            Country : 
                            {{ $document->data['seller_address']['country'] }}<br/>
                            PIN : 
                            {{ $document->data['seller_address']['pin'] }}<br/>
                        @endif
                    </td>
                    <td class="border p-2">
                        <b>Shipping Details</b><br/>
                            {{ $document->data['delivery_address']['line1'] }}<br/>
                            {{ $document->data['delivery_address']['line2'] }}<br/>
                            City : 
                            {{ $document->data['delivery_address']['city'] }}<br/>
                            State : 
                            {{ $document->data['delivery_address']['state'] }}<br/>
                            Country : 
                            {{ $document->data['delivery_address']['country'] }}<br/>
                            PIN : 
                            {{ $document->data['delivery_address']['pin'] }}<br/>
                            <b>Place of Supply</b> : {{ $document->place_of_supply->name }}
                    </td>
            </tbody>
        </table>
    @endcan

    <table class="table-auto min-w-full text-sm">
        <thead class="bg-gray-200">
            <tr>
                <th class="text-left border-b p-2">Item</th>
                <th class="text-left border-b p-2">HSN/SAC Code</th>
                <th class="text-left border-b p-2">Quantity</th>
                <th class="text-left border-b p-2">Unit</th>
                @can('View '.$document->documentType->name .' Prices')
                    <th class="text-left border-b p-2">Price</th>
                    <th class="text-left border-b p-2">Tax</th>
                    <th class="text-right border-b p-2">Amount</th>
                @endcan
            </tr>
        </thead>
        <tbody class="text-slate-500">
        @foreach($document->documentItems as $documentItem)
        
            <tr>
                <td class="border-b p-2">
                    <span class="text-xs text-slate-400">{{ $documentItem->sku }}</span><br/>
                    <span class="text-base">{{ $documentItem->name }}</span>
                </td> 
                <td class="border-b p-2">
                    @if($documentItem->item->hsn_code)
                        <span class="text-xs text-slate-400">HSN</span> :{{ $documentItem->item->hsn_code }}
                    @endif
                    @if($documentItem->item->sac_code)
                        <span class="text-xs text-slate-400">SAC</span> :{{ $documentItem->item->sac_code }}
                    @endif
                </td>
                <td class="border-b p-2">
                    {{ $documentItem->quantity }}
                </td>
                <td class="border-b p-2">
                    {{ $documentItem->unit }}
                </td>
                @can('View '.$document->documentType->name .' Prices')
                    <td class="border-b p-2">
                        {{ $documentItem->price }}
                    </td>
                    <td class="border-b p-2">{{ $documentItem->tax }}</td>
                    <td class="border-b p-2 text-right">
                        <span class="text-xs text-slate-400">Before Tax</span>
                        {{ $documentItem->amount }}<br/>
                        <span class="text-xs text-slate-400">IGST</span>
                        {{ $documentItem->taxes['igst'] }}<br/>
                        <span class="text-xs text-slate-400">CGST</span>
                        {{ $documentItem->taxes['cgst'] }}<br/>
                        <span class="text-xs text-slate-400">SGST</span>
                        {{ $documentItem->taxes['sgst'] }}<br/>
                        <span class="text-xs text-slate-400">After Tax</span>
                        {{ $documentItem->total_amount }}<br/>
                    </td>
                @endcan
            </tr>
        @endforeach

        @can('View '.$document->documentType->name .' Prices')
            <tr>
                <td colspan="6" class="text-right">
                    Amount : <br/>
                    IGST : <br/>
                    SGST : <br/>
                    CGST : <br/>
                    Total Amount: <br/>
                </td>
                <td>
                    <div class="text-right p-2">
                        {{ $document->items()->sum('amount'); }}<br/>
                        {{ $document->items()->sum('taxes->igst'); }}<br/>
                        {{ $document->items()->sum('taxes->sgst'); }}<br/>
                        {{ $document->items()->sum('taxes->cgst'); }}<br/>
                        {{ $document->items()->sum('total_amount'); }}<br/>
                    </div>
                </td>
            </tr>
        @endcan
        </tbody>
    </table>

    <div class="text-right mt-5 border-t p-2 text-sm">
        For {{ $document->seller_company->name }}
        <br/><br/><br/>
        Authorized Signatury
    </div>

    <div class="text-gray-500 text-sm">
        <!-- Notes: -->
    </div>
</div>