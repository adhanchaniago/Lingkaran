<?php

namespace App\Http\Controllers\cms;

use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::with(['profiles', 'roles', 'permissions', 'posts'])
                        ->where('id', '<>', auth()->id())
                        ->whereHas("roles", function ($query) {
                            $query->whereNotIn('name', ['Writer']);
                        })
                        ->orderBy('firstname', 'ASC')
                        ->paginate(12);

        $roles = Role::where('name', '!=', 'Writer')->get();

        return view('cms.user.index', compact('users', 'roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::where('name', '!=', 'Writer')->get();
        
        return view('cms.user.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(request(), [
            'firstname' => 'required|string',
            'lastname' => 'required|string',
            'birth' => 'required|date',
            'gender' => 'required|max:10',
            'religion' => 'required|max:20',
            'status' => 'required|max:10',
            'address' => 'required',
            'phone' => 'required|unique:profiles|regex:/(0)[0-9]{9}/',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|string'
        ]);
        
        $user = User::create([
            'firstname' => Str::Title($request->firstname),
            'lastname' => Str::Title($request->lastname),
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'status' => 1
        ]);

        $user->assignRole($request->role);
        $user->profiles()->create([
            'birth' => $request->birth,
            'gender' => $request->gender,
            'religion' => $request->religion,
            'status' => $request->status,
            'address' => $request->address,
            'phone' => $request->phone
        ]);

        return redirect()->route('user.index')->withSuccess('New user have been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $user = User::with(['profiles', 'roles', 'permissions'])->find($user->id);
        $posts = Post::where('author', $user->id)->latest()->paginate(6);
        return view('cms.user.show', compact('user', 'posts'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('cms.user.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $this->validate(request(), [
            'status' => 'required',
            'role' => 'required'
        ]);

        $user = User::findOrFail($request->id);
        $user->update([
            'status' => $request->status
        ]);
        $user->removeRole($user->roles->first()->name);
        $user->assignRole($request->role);
        return redirect()->route('user.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $user = User::findOrFail($request->id);
        Storage::delete('profile/'.$user->profiles->first()->image);
        $user->removeRole($user->roles->first()->name);
        $user->delete();

        return redirect()->route('user.index')->withSuccess('The user have been deleted');
    }
}
