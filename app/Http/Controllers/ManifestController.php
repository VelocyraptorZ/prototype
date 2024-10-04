<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Manifest;
class ManifestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $manifests = Manifest::latest()->paginate(10);
        return view('manifest.index', compact('manifests'));
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Manifest $manifest)
    {
        //
        return view('manifest.show', compact('manifest'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function print(Manifest $manifest)
    {
        //
        return view('manifest.print', compact('manifest'));
    }
    public function close(Manifest $manifest)
    {
        //
        $manifest->documents()->update(['status'=>'InTransit']);
        return redirect()->to(route('manifest.index'))->with('message', 'Manifest Closed');
    }
   
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Manifest $manifest)
    {
        $manifest->delete();
        return redirect(route('manifest.index'))->with('alert-success','Deleted Succesfully');
    }
}