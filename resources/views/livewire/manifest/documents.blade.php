<div>
    <table class="table-auto min-w-full text-sm">
        <thead class="bg-gray-200">
            <tr>
                <th class="text-left border-b p-2">Order Id</th>
                <th class="text-left border-b p-2">AWB</th>
                <th class="text-left border-b p-2">Items Count</th>
                <th class="text-left border-b p-2">Action</th>
            </tr>
        </thead>
        <tbody class="text-slate-500">
            @foreach($manifest->documents as $document)
                <tr>
                    <td class="border-b p-2">{{ $document->id }}</td>
                    <td class="border-b p-2">{{ $document->shipment->awb }}</td>
                    <td class="border-b p-2">{{ $document->items()->count() }}</td>
                    <td class="border-b p-2">
                        <a wire:click="remove('{{ $document->id }}')">Remove</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>