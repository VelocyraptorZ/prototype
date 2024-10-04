<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $this->authorize('View User');
        $users = User::latest()->paginate(20);
        return view('user.index', compact('users'));
    }
    
    public function form()
    {
        $user=null;
        if(request('id')){
            $user=User::find(request('id'));
        }
        return view('user.form', compact('user'));
    }

    public function create()
    {
        $this->authorize('Create User');
        return view('user.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|min:4',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);
        $validated['password'] = Hash::make($validated['password']);
        //$validated['company_id'] = Auth::user()->company->id;
        $user = User::create($validated);
        foreach(Auth::user()->companies as $company)
        {
            $user->companies()->attach($company->id);
        }
        //Auth::user()->company->users()->create($validated);
        return redirect(route('user.index'))->with('alert-success','Created Succesfully');
    }
    
    public function destroy(User $user)
    {
        //
        $user->delete();
        return redirect(route('user.index'))->with('alert-success','Deleted Succesfully');
    }
}