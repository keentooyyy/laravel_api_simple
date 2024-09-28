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

        return Todos::paginate(3);
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
    public function show(Todos $todo)
    {
        return new $todo;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Todos $todo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatetodosRequest $request, Todos $todo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Todos $todo)
    {
        $delete = Todos::all()->findOrFail($todo);
        $delete->delete();
        return "Record Deleted";

    }
}
