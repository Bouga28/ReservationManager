<?php

namespace App\Http\Controllers;

use App\Models\{Resource,Type};
use Illuminate\Http\Request;

class ResourceController extends Controller
{
    /**
     * Display a listing of the resource.
     

    */

    public function index($slug = null)
    {
        $query = $slug ? Type::whereSlug($slug)->firstOrFail()->resources() : Resource::query();
        $resources = $query->oldest('name')->paginate(5);
        $types = Type::with('resources')->get();
        
        return response()->json($types,200);
    }

    public function liste()
    {
        $resource = Resource::paginate(10);

        return $resource;
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
        $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);
 
        $resource = Resource::create($request->all());
        return [
            "status" => 1,
            "data" => $resource
        ];
    }

    /**
     * Display the specified resource.
     */
    public function show(Resource $resource)
    {
    /*    return [
            "status" => 1,
            "data" =>$resource
        ];*/
        return $resource;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Resource $resource)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Resource $resource)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);
 
        $resource->update($request->all());
 
        return [
            "status" => 1,
            "data" => $resource,
            "msg" => "Resource updated successfully"
        ];
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Resource $resource)
    {
        $resource->delete();
        return [
            "status" => 1,
            "data" => $resource,
            "msg" => "Resource deleted successfully"
        ];
    }
}
