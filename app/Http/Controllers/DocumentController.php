<?php

namespace App\Http\Controllers;

use App\Models\Document;
use Illuminate\Http\Request;
use App\Models\DocumentType;
use App\Models\Status;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Mail\DocumentCreated;
use Illuminate\Support\Facades\Mail;
use Illuminate\Database\Eloquent\Builder;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($type)
    {
        //$types = Document::whereDate('created_at', '>' , date('Y-m-d', strtotime('-30 days')))->count();
        $type = DocumentType::where('slug',$type)->firstOrFail();

        $documents = $type->documents();
        
        if(Auth::user()->can('View All Document')){
            
        }else{
            // $statuses = Status::get();
            $allowedStatuses = array();
            foreach($type->statuses as $status)
            {
                if(Auth::user()->can('View '.$status.' '.$type->name)){
                    $allowedStatuses[] =  $status;
                }
            }
            $documents = $documents->whereIn('status', $allowedStatuses);
            $documents = $documents->whereHas('users', function (Builder $query) {
                $query->where('users.id', Auth::id());
            });
        }

        if(request('search')){
            $documents = $documents->where('document_number', request('search'))
            ->orWhere('title', request('search'));
        }

        $documents = $documents->orderBy('id','desc')->paginate(10);
        return view('document.index', compact('type','documents'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($type)
    {
        $document = null;
        $type = DocumentType::where('slug',$type)->firstOrFail();
        return view('document.form', compact('type','document'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function show(Document $document)
    {
        $this->authorize('View '.$document->status.' '.$document->documentType->name);
        return view('document.show', compact('document'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function edit(Document $document)
    {
        $this->authorize('Edit '.$document->documentType->name);
        $type = $document->documentType;
        return view('document.form', compact('type','document'));
    }

    public function replicate(Document $document)
    {
        $fill = [
            'status' => 'Draft',
            'document_number' => 'Copy of '.$document->document_number,
        ];
        return $this->duplicate($document, $fill);
    }
    public function next(Document $document)
    {
        $fill = [
            'status' => 'Draft',
            'document_number' => $document->documentType->next->id.$document->document_number,
            'document_type_id' => $document->documentType->next->id,
            'document_id' => $document->id,
        ];
        return $this->duplicate($document, $fill);
    }

    public function duplicate(Document $document, $fill)
    {
        $copy = $document->replicate()->fill($fill);
        $copy->save();
        foreach($document->items as $item)
        {
            $data[$item->id]['sku']=$item->sku;
            $data[$item->id]['unit']='';
            $data[$item->id]['price']=$item->price;
            $data[$item->id]['tax']=$item->tax;
            $copy->items()->syncWithoutDetaching($data);
        }
        return redirect(route('document.edit',['document'=>$copy->id]));
    }

    public function pdf(Document $document)
    {
        $pdf = PDF::setOptions(['dpi' => 150, 'defaultFont' => 'sans-serif', 'isRemoteEnabled'=>true])->loadView('document.pdf', compact('document'));
        return $pdf->download('document.pdf');
    }

    public function mail(Document $document)
    {
        $pdf = PDF::setOptions(['dpi' => 150, 'defaultFont' => 'sans-serif', 'isRemoteEnabled'=>true])->loadView('document.pdf', compact('document'));
        $pdf->save('storage/document'.$document->id.'.pdf');
        Mail::to($document->buyer_company->email)->send(new DocumentCreated($document));
        return redirect(route('document.edit',['document'=>$document->id]))->with('alert-success','Mail Sent Succesfully');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Document $document)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function destroy(Document $document)
    {
        //
        $type = $document->documentType;
        $document->items()->detach();
        $document->delete();
        return redirect(route('document.index',['type'=>$type->slug]))->with('alert-success','Deleted Succesfully');
    }
}
