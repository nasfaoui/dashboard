<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categorie;
use Illuminate\Validation\Rule as ValidationRule;
use Illuminate\Support\Str;

class CategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $categorie = Categorie::all();
        return view('admin.categorie.index', compact('categorie'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $categories = Categorie::where('parent', null)->get();
        return view('admin.categorie.add', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'parent' => 'nullable | string',
            'title' => ' required | string',
            'content' => 'nullable | string',
        ]);
       
        $categorie = new Categorie();
        $categorie->title=$request->title;
        $categorie->parent=$request->parent;
        $categorie->content=$request->content;
        $categorie->save();

        return redirect()->back()->with('success', 'Category created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $categories = Categorie::where('id', '=', $id)->get();
        return view('admin.categorie.edit', compact('categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $categorie = Categorie::findOrFail($id);

        $request->validate([
            'parent' => 'nullable | string',
            'content' => 'nullable | string',
            'image' => 'nullable | image | mimes:jpg,jpeg,png,svg |max:3000',
            'title' => [
                'required ', 'string',  ValidationRule::unique('categories')->ignore($categorie->title)
            ],

            ['title.unique' => 'This title is already taken.'],
        ]);

        //dd($request->all());

        $categorie->update($request->all());

        return redirect()->back()->with('success', 'categorie update successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
