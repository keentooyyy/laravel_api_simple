<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Requests\StoretodosRequest;
use App\Http\Requests\UpdatetodosRequest;
use App\Models\Todos;

class TodosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Todos::paginate(3);
        return response()->json([
            'message' => "Todos retrieved successfully",
            'data' => $data
        ]);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(StoretodosRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Todos $id)
    {
        $data = Todos::all()->findOrFail($id);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatetodosRequest $request, Todos $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Todos $id)
    {
        $delete = Todos::all()->findOrFail($id);
        $delete->delete();
        return "Record Deleted";

    }
}
