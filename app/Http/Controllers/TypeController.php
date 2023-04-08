<?php

namespace App\Http\Controllers;

use App\Models\Type;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $type = Type::all();
        return $type;
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
        ]);
 
        $type = Type::create($request->all());
        return [
            "status" => 1,
            "data" => $type
        ];
    }

    /**
     * Display the specified resource.
     */
    public function show(Type $type)
    {
        return $type;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Type $type)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Type $type)
    {
        $request->validate([
            'name' => 'required',
        ]);
 
        $type->update($request->all());
 
        return [
            "status" => 1,
            "data" => $type,
            "msg" => "Type updated successfully"
        ];
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Type $type)
    {
        $type->delete();
        return [
            "status" => 1,
            "data" => $type,
            "msg" => "Type deleted successfully"
        ];
    }
}
