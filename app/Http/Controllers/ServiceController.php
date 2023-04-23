<?php

namespace App\Http\Controllers;

use App\Http\Requests\ServiceRequest;
use App\Models\Categorie;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //function for display index page and showing all services by categories

        $categories = Categorie::withCount('services')->orderBy('services_count', 'desc')->get();

        return view('home.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $categories = Categorie::withCount('services')->orderBy('services_count', 'desc')->get();
        return view('service.post',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ServiceRequest $request)
    {
      
        if($files=$request->file('images')){
           foreach ($files as $file) {
                $image_path=$file->store("services", "public");  
                $images[]= $image_path;
                $img_url = implode(",",$images);
           }
        }
            
        $id=Auth::id();
        $service = new Service();
        $service->title = $request->input('title');
        $service->description = $request->input('description');
        $service->price = $request->input('price');
        $service->location = $request->input('location');
        $service->Ratings = 0;
        $service->user_id =$id ;
        $service->category_id = $request->input('category');
        $service->images = $img_url;
        $service->save();
        return redirect()->route('user.dashbord')->with('success', 'service added seccusfuly.');
       
    }

    /**
     * Display the specified resource.
     */
    public function show(Service $service)
    {
        $images = explode(",",$service->images);
        
        return view("service.show",compact("service","images"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Service $service)
    {
        //
        $categories = Categorie::withCount('services')->orderBy('services_count', 'desc')->get();
        return view("service.edit",compact('service','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Service $service)
    {
        //
  
        // Get the service by ID
        $service = Service::findOrFail($service);

        // Update the service title
        $service->title = $request->title;
        $service->save();

        // Handle the service images
        if ($request->hasFile('images')) {
            // Get the old images for the service
            $old_images = $service->images;

            // Delete the old images
            foreach ($old_images as $old_image) {
                Storage::delete($old_image->path);
                $old_image->delete();
            }

            // Add the new images
            $images = $request->file('images');
            foreach ($images as $image) {
                $image_path = $image->store('public/uploads/services');
                $service->images()->create(['path' => $image_path]);
            }
        }
       


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Service $service)
    {
        //
    }
}
