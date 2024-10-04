Dear {{ $document->buyer_company->name }},<br/>
{{ $document->documentType->name }} has been created.
Please find attached pdf file for the same.<br/>
<br/>
<br/>
Regards,<br/>
{{ Auth::user()->name }},<br/>
