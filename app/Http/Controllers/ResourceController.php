<?php

namespace App\Http\Controllers;

use App\Models\Resource;
use Illuminate\Http\Request;

class ResourceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $resource = Resource::latest()->paginate(10);
        return [
            "status" => 1,
            "data" => $resource
        ];
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
        return [
            "status" => 1,
            "data" =>$resource
        ];
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
