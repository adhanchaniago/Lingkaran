<?php

namespace App\Http\Controllers\cms;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class GuestUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::with(['profiles', 'roles', 'permissions', 'posts'])
                        ->whereHas("roles", function ($query) {
                            $query->where('name', 'Writer');
                        })
                        ->orderBy('firstname', 'ASC')
                        ->paginate(12);

        $roles = Role::all();

        return view('cms.guest.index', compact('users', 'roles'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // for this function is same like in UserController, so i decide to use it in UserController
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
            'status' => 'required'
        ]);
        
        $user = User::findOrFail($request->id);
        $user->update([
            'is_active' => $request->status
        ]);
        return redirect()->route('guestuser.index');
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

        return redirect()->route('guestuser.index')->withSuccess('The guest user have been deleted');
    }
}
