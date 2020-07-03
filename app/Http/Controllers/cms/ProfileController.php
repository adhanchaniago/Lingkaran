<?php

namespace App\Http\Controllers\cms;

use App\Models\Post;
use App\Models\User;
use App\Models\Profile;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Image;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $profile = Profile::with('user.roles')
            ->where('user_id', $id)
            ->get()
            ->first();

        $posts = Post::where('author', $id)
            ->latest()
            ->paginate(6);

        return view('cms.profile.show', compact('profile', 'posts'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Profile $profile)
    {
        $this->validate(request(), [
            'firstname' => 'required|max:25',
            'lastname' => 'required|max:25',
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed',
            'gender' => 'required',
            'status' => 'required',
            'birth' => 'required',
            'religion' => 'required',
            'phone' => 'required|regex:/(0)[0-9]{9}/',
            'address' => 'required',
            'about' => 'required',
        ]);
        $user = User::findOrFail($profile->user_id);
        if (Hash::check($request->password, $user->password)) {
            $user->update([
                'firstname' => $request->firstname,
                'lastname' => $request->lastname,
                'email' => $request->email,
            ]);

            $profile = Profile::where('user_id', $user->id);
            $profile->update([
                'birth' => $request->birth,
                'gender' => $request->gender,
                'religion' => $request->religion,
                'status' => $request->status,
                'address' => $request->address,
                'phone' => $request->phone,
                'about' => $request->about
            ]);
            return redirect()->route('profile.show', $user)->withSuccess('Data has been updated');
        }
        return redirect()->route('profile.show', $profile)->withDanger('Wrong password');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function changeImage(Request $request, $id)
    {
        $this->validate(request(), [
            'image' => 'required|image'
        ]);
        
        $profile = Profile::findOrFail($id);
        $image = $request->file('image');
        $filename = $profile->phone.'-'.$profile->id . '.' . $image->getClientOriginalExtension();
        $location = public_path('images/profile/'. $filename);
        Image::make($image)->fit(200, 200)->save($location);
        $oldFilename = 'images/profile/'.$profile->image;

        $profile->update([
                'image' => $filename
            ]);

        Storage::delete($oldFilename);

        return redirect()->route('profile.show', $profile)->withSuccess('Image has been changed');
    }

    public function passwordEdit()
    {
        return view('cms.profile.password');
    }

    public function passwordUpdate(Request $request, $id)
    {
        $this->validate(request(), [
            'current_password' => 'required|string',
            'password' => 'required|min:8|confirmed'
        ]);
        $user = User::findOrFail($id);
        if (Hash::check($request->current_password, $user->password)) {
            $user->update([
                'password' => Hash::make($request->password)
            ]);
            return redirect()->route('password.edit', $user)->withSuccess('Your password has been updated');
        }
        return redirect()->back()->withDanger('Wrong password.');
    }
}
