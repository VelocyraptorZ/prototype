<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'Laravel') }}</title>
        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
    </head>
    <body onload="window.print()">
        <div class="font-sans text-gray-900 antialiased">
    <div class="py-12">
        <div class="">
            <div class="border p-4">
                <h1 class="text-center text-2xl">Manifest</h1>
                <p class="text-center">Generated on : {{ $manifest->created_at->setTimezone('Asia/Kolkata')->format('M d, Y, h:i a') }}</p>
                <div class="flex justify-between mb-4">
                    <div>
                        Seller : {{ $manifest->documents[0]->seller_company->name  }}<br/>
                        Shipment Mode : {{ $manifest->documents[0]->shipment->mode  }}
                    </div>
                    <div>
                        Manifest Id : {{ $manifest->id  }}<br/>
                        Total Orders : {{ $manifest->documents()->count() }}
                    </div>
                </div>
                <table class="table-auto min-w-full text-sm">
                    <thead class="bg-gray-200">
                        <tr>
                            <th class="text-left border-b p-2">Order Id</th>
                            <th class="text-left border-b p-2">AWB</th>
                            <th class="text-left border-b p-2">Items Count</th>
                        </tr>
                    </thead>
                    <tbody class="text-slate-500">
                        @foreach($manifest->documents as $document)
                            <tr>
                                <td class="border-b p-2">{{ $document->id }}</td>
                                <td class="border-b p-2">{{ $document->shipment->awb }}</td>
                                <td class="border-b p-2">{{ $document->items()->count() }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="mt-6 bg-blue-100 text-center p-2 border-b bottom-t">
                    To be filled by Courier Logistics Executive
                </div>
                <div class="grid grid-cols-2 my-3 text-sm leading-relaxed">
                    <div>
                        <div class="grid grid-cols-2">
                            <div>Pick up time</div><div class="border-b"></div>
                            <div>Executive Name</div><div class="border-b"></div>
                            <div>Executive Signature</div><div class="border-b"></div>
                            <div>Executive Phone</div><div class="border-b"></div>
                        </div>
                    </div>
                    <div>
                        <div class="grid grid-cols-2">
                            <div>Total Items Picked:</div><div class="border-b"></div>
                            <div>Seller Name</div><div class="border-b">{{ $manifest->documents[0]->seller_company->name  }}</div>
                            <div>Seller Signature</div><div class="border-b"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
        </div>
    </body>
</html>