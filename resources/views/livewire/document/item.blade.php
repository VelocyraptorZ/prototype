<tr>
    <td class="border-b p-2">
        <span class="text-xs text-slate-400">{{ $documentItem->sku }}</span><br/>
        <span class="text-base">{{ $item->name }}</span>
        
        <a wire:click="remove()">
            <x-tabler-trash class="text-red-500 cursor-pointer w-4" />
        </a>
    </td> 
    <td class="border-b p-2">
        @if($item->hsn_code)
            <span class="text-xs text-slate-400">HSN</span> :{{ $item->hsn_code }}
        @endif
        @if($item->sac_code)
            <span class="text-xs text-slate-400">SAC</span> :{{ $item->sac_code }}
        @endif
    </td>
    <td class="border-b p-2">
        <x-jet-input wire:model="documentItem.quantity" class="block mt-1 w-20" type="number" min="1"/>
        @error('documentItem.quantity')
        <span class="text-red-500">{{ $message }}</span>
        @enderror
    </td>
    <td class="border-b p-2">
        <x-jet-input wire:model="documentItem.unit" class="block mt-1 w-20" type="text" />
        @error('documentItem.unit')
        <span class="text-red-500">{{ $message }}</span>
        @enderror
    </td>
    <td class="border-b p-2">
        <x-jet-input wire:model="documentItem.price" class="block mt-1" type="text" />
        @error('documentItem.price')
        <span class="text-red-500">{{ $message }}</span>
        @enderror
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
</tr>