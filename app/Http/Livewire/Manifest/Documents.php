<?php
namespace App\Http\Livewire\Manifest;
use Livewire\Component;
use App\Models\Document;
class Documents extends Component
{
    public $manifest;
    public function remove(Document $document)
    {
        $this->manifest->documents()->detach($document);
        $this->manifest->refresh();
    }
    public function render()
    {
        return view('livewire.manifest.documents');
    }
}