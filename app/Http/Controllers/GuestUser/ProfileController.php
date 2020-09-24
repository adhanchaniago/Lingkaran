<?php

namespace App\Http\Controllers\GuestUser;

use Image;
use App\Models\User;
use App\Models\Profile;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:Writer');
    }

    public function show(Request $request)
    {
        $profile = Profile::with('user')
            ->where('user_id', decrypt($request->id))
            ->get()
            ->first();

        return view('guest.dashboard.profiles.show', compact('profile'));
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'firstname' => 'required|string',
            'lastname' => 'required|string',
            'email' => 'required|string|email|max:50',
            'password' => 'required|string|min:8|confirmed',
            'birth' => 'required',
            'gender' => 'required',
            'religion' => 'required|string',
            'status' => 'required|string',
            'address' => 'required|string',
            'phone' => 'required|regex:/(0)[0-9]{9}/',
            'about' => 'required|string'
        ]);
        
        $userId = decrypt($request->id);
        $user = User::findOrFail($userId);
        $user->update([
            'firstname' => Str::title($request->firstname),
            'lastname' => Str::title($request->lastname),
            'email' => $request->email
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
        
        return redirect()->route('guestuser.profile', encrypt($user->id))->withSuccess('Data has been updated');
    }

    public function changeImage(Request $request)
    {
        $this->validate(request(), [
            'image' => 'required|image'
        ]);
        
        $id = decrypt($request->id);
        $profile = Profile::findOrFail($id);
        $image = $request->file('image');
        $filename = $profile->phone.'-'.$profile->id . '.' . $image->getClientOriginalExtension();

        $location = public_path('images/profile/'. $filename);
        $thumbLocation = public_path('images/profile/thumbnails/'. $filename);

        $profileLoc = Image::make($image)->fit(200, 200)->save($location);
        $profileLoc == true
            ? Image::make($image)->fit(50, 50)->save($thumbLocation)
            : false;

        $oldFilename = 'images/profile/'.$profile->image;
        $oldThumbFilename = 'images/profile/thumbnails/'.$profile->image;

        $profile->update([
                'image' => $filename
            ]);

        $deleteFile = Storage::delete($oldFilename);
        $deleteFile == true
            ? Storage::delete($oldThumbFilename)
            : false;

        return redirect()->route('guestuser.profile', encrypt($profile->id))->withSuccess('Image has been changed');
    }
}
