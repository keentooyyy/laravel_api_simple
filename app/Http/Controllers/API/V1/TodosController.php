<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Requests\StoretodosRequest;
use App\Http\Requests\UpdatetodosRequest;
use App\Http\Resources\V1\TodoResource;
use App\Http\Resources\V1\TodoCollection;
use App\Models\todos;

class TodosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        return new TodoCollection(todos::paginate(3));
//        return todos::all();
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
    public function store(StoretodosRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(todos $todo)
    {
        return new TodoResource($todo);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(todos $todo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatetodosRequest $request, todos $todo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(todos $todo)
    {
        $delete = todos::all()->findOrFail($todo);
        $delete->delete();
        return "Record Deleted";

    }
}
