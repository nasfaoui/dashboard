<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule as ValidationRule;
use Illuminate\Support\Str;
use App\Models\Service;
use App\Models\Category;
use App\Models\Avis;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;


class UserControllerD extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $users = User::where('isArtisan', false)->where('isAdmin', false)->get();
        //$users = User::all();
        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
       $service = DB::table('services')
        ->join('users', 'services.user_id', '=', 'users.id')
        ->join('categories', 'services.category_id', '=', 'categories.id')
        ->leftJoin('avis', 'services.id', '=', 'avis.service_id')
        ->where('services.user_id', $id)
        ->get();
        
        //$service = Service::where('user_id', $id )->get();
        //$category = Category::where('user_id', $id )->get();
        return view('admin.users.showuser', compact('service'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.edituser', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //

        $user = User::findOrFail($id);

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

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        //
        $user = User::find($request->id_user);
        if ($user) {
            $user->delete();
            return redirect()->route('adminUsers.index')->with('message', ' Successfully deleted');
        } else {
            return redirect()->route('adminUsers.index')->with('message', ' no user id found');
        }
    }
}
