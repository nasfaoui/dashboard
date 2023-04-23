<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\Avis;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ServicesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $services = Service::with('categorie', 'user','avis')->get();
        
        // dd($services);
        // $services=DB::table('services')
        // ->join('users', 'services.user_id', '=', 'users.id')
        // ->join('categories', 'services.category_id', '=', 'categories.id')
        // ->leftJoin('avis', 'services.id', '=', 'avis.service_id')
        // ->get();

        return view('admin.services.index',compact('services'));
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
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $service = Service::find($request->id);
        if ($service) {
            $service->delete();
            return redirect()->route('adminService.index')->with('message', ' Successfully deleted');
        } else {
            return redirect()->route('adminService.index')->with('error', ' no service id found');
        }
    }
}
