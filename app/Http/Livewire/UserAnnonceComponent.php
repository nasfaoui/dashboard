<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Service;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class UserAnnonceComponent extends Component
{

    protected $listeners = ['delete' => '$refresh'];

    public function render()
    {
        $services = User::withCount('services')
                    ->with('services')
                    ->find(Auth::user()->id )
                    ->services()
                    ->orderBy('created_at', 'desc')
                    ->get();
        
        return view('livewire.user-annonce-component',compact('services'));
    }

    public function edit(Service $service)
    {   
        $categories = Category::withCount('services')->orderBy('services_count', 'desc')->get();
        return view("service.edit",compact('service','categories'));
    }

    public function delete(Service $service)
    {
        $images = explode(',', $service->images);
        foreach ($images as $image) {
             Storage::delete($image);
        }
        $service->delete();
        session()->flash("message","le service bien supprimer ");
    
    }


}
