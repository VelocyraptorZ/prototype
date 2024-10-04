<div class="p-4">
    @if($paymentLog)
        <form wire:submit.prevent="save" method="POST">
            <h3 class="font-semibold text-lg">Payment Details</h3>  
            
            <div>
                <x-jet-label for="amount" value="{{ __('Paid Amount') }}" />
                <x-jet-input wire:model="paymentLog.paid_amount" class="block mt-1 w-full" type="text" autofocus />
                @error('paymentLog.paid_amount')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <x-jet-label for="line2" value="{{ __('Paid At') }}" />
                <x-jet-input wire:model="paymentLog.paid_at" class="block mt-1 w-full" type="date" />
                @error('paymentLog.paid_at')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <x-jet-label for="pin" value="{{ __('Reference Number') }}" />
                <x-jet-input wire:model="paymentLog.reference_number" class="block mt-1 w-full" type="text" />
                @error('paymentLog.reference_number')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <x-jet-label for="mode" value="{{ __('Mode') }}" />
                <select class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm w-full" wire:model="paymentLog.payment_mode_id">
                    <option value="">Select Mode</option>
                    @foreach($modes as $mode)
                        <option value="{{ $mode->id }}">{{ $mode->name }}</option>
                    @endforeach
                </select>
                @error('paymentLog.payment_mode_id')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <x-jet-label for="comment" value="{{ __('Comment') }}" />
                <x-jet-input wire:model="paymentLog.comment" class="block mt-1 w-full" type="text" />
                @error('paymentLog.comment')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <div class="block mt-4">
                <label for="mark_paid" class="flex items-center">
                    <x-jet-checkbox id="mark_paid" wire:model="mark_paid" />
                    <span class="ml-2 text-sm text-gray-600">{{ __('Mark Paid') }}</span>
                </label>
            </div>

            <x-jet-button wire:click="save" class="mt-4">
                {{ __('Save') }}
            </x-jet-button>
            <a wire:click="cancel" class="text-red-500 cursor-pointer">Cancel</a>
        </form>
    @else
        <h3 class="font-semibold mb-3">Payment Status 
            <span class=" @if($document->payment->status=='Unpaid') text-red-500 @else text-green-500 @endif">{{ $document->payment->status }}</span>
        </h3>
        
        @can('View '.$document->documentType->name.' Payment Log')
            @if($document->payment)
                @foreach($document->payment->logs as $log)
                    <div class="mb-3 border rounded p-2">
                        <span class="text-gray-500">
                            {{ $log->updated_at->setTimezone('Asia/Kolkata')->format('d-m-Y h:i a') }}
                        </span>
                        - Rs. {{ $log->paid_amount }} by {{ $log->payment_mode->name }} on 
                        {{ $log->paid_at->setTimezone('Asia/Kolkata')->format('d-m-Y') }}<br/>
                        Reference - {{ $log->reference_number }},<br/>
                        Comment - {{ $log->comment }}
                    </div>
                @endforeach
            @endif
        @endcan

        @can('Add '.$document->documentType->name.' Payment Log')
            <x-jet-button class="mt-4" wire:click="add">
                {{ __('Log Payment') }}
            </x-jet-button>
        @endcan
    @endif
</div>