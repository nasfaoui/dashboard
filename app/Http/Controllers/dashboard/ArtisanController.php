<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Validation\Rule as ValidationRule;
use Illuminate\Support\Str;
use App\Models\Service;
use App\Models\Category;

class ArtisanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $artisans = User::where('isArtisan', true)->where('isAdmin', false)->get();
        //$users = User::all();
        return view('admin.artisan.index', compact('artisans'));
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
        //
        $service = User::join('services', 'services.user_id', '=', 'users.id')
            ->join('categories', 'categories.id', '=', 'services.category_id')
            ->where('users.id',$id)
            ->get(['users.*', 'services.*', 'categories.*']);


        //$service = Service::where('user_id', $id )->get();
        //$category = Category::where('user_id', $id )->get();
        return view('admin.artisan.showuser', compact('service'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $artisan = User::findOrFail($id);
        return view('admin.artisan.edituser', compact('artisan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //

        $artisan = User::findOrFail($id);

        $request->validate([
            'name' => 'required | string',
            'image' => 'nullable | image | mimes:jpg,jpeg,png,svg |max:3000',
            'email' => [
                'required', 'email', ValidationRule::unique('users')->ignore($artisan->id)
            ],
            'telephone' => [
                'required', ValidationRule::unique('users')->ignore($artisan->id)
            ],
            ['email.unique' => 'This email is already taken.'],
            ['telephone.unique' => 'This tele is already taken.'],
        ]);

        //dd($request->all());

        $artisan->update($request->except('image', '_token'));

        if ($request->file('image')) {
            $file = $request->file('image');
            $fileName = Str::uuid() . $file->getClientOriginalName();
            $file->move(public_path('images'), $fileName);
            $path = '/images/' . $fileName;
            $artisan->update(['image' => $path]);
        }

        return redirect()->back()->with('success', 'User update successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        //
        $artisan = User::find($request->id_user);
        if ($artisan) {
            $artisan->delete();
            return redirect()->route('adminArtisan.index')->with('message', ' Successfully deleted');
        } else {
            return redirect()->route('adminArtisan.index')->with('message', ' no user id found');
        }
    }
}
