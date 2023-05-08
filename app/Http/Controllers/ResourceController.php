<?php

namespace App\Http\Controllers;

use App\Models\{Resource,Type};
use Illuminate\Http\Request;

class ResourceController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:api');
    }
    
    /**
     * Display a listing of the resource.
     

    */

    public function liste()
    {
        
        return Resource::with('type')->paginate(10);
    }



    public function indexbyliste($slug = null)
    {
        $query = $slug ? Type::whereSlug($slug)->firstOrFail()->resources() : Resource::query();
        $resources = $query->oldest('name')->paginate(5);
        $types = Type::with('resources')->get();
        
        return response()->json($resources,200);
    }

    public function index()
    {
        $resource = Resource::all();
/*
        return [
            'id' => 0, // $resource ->id,
            'name' => 'test', //$this->name,
            'type_id' => 'car'
//            'secret' => $this->when($request->user()->isAdmin(), 'secret-value'),

        ];*/
        return $resource;
    }


    public function getbyid($id )
    {

        $resource = Resource::where('id','=',$id)->get();

        
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
      /* return [
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
    public function update(Request $request, Resource $ressource)
    {
        $request->validate([
            'id' => 'required',
        ]);
 
        $ressource->update($request->all());
 
        return [
            "status" => 1,
            "data" => $ressource,
            "msg" => "Type updated successfully"
        ];
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {
        Resource::destroy($id);

   
        return [
            "status" => 1,
 
            "msg" => "Resource deleted successfully"
        ];
    }
}
