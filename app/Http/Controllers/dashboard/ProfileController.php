<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule as ValidationRule;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;


class ProfileController extends Controller
{
    public function index()
    {
        //
        $user = User::where('isAdmin', true)->first();
        return view('admin.profile', compact('user'));
    }
    public function update(Request $request, string $id)
    {
        //

        $user = User::findOrFail(auth()->user()->id);
        //$user = User::findOrFail($id);

        $request->validate([
            'name' => 'required | string',
            //'image' => 'nullable | image ',
            'email' => [
                'required', 'email', ValidationRule::unique('users')->ignore($user->id)
            ],
            'telephone' => [
                'required', ValidationRule::unique('users')->ignore($user->id)
            ],
            ['email.unique' => 'This email is already taken.'],
            ['telephone.unique' => 'This tele is already taken.'],
        ]);

        //dd($request->all());

        // Delete the old image if it exists
        if ($user->image) {
            Storage::delete($user->image);
        }
        $user->password = Hash::make($request->input('password'));
        $user->update($request->except('image', '_token'));

        if ($request->file('image')) {
            $file = $request->file('image');
            $fileName = Str::uuid() . $file->getClientOriginalName();
            $file->move(public_path('images'), $fileName);
            $path = '/images/' . $fileName;
            $user->update(['image' => $path]);
        }

        return redirect()->back()->with('success', 'User update successfully!');
    }
}
