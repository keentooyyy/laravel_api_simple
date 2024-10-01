<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Requests\StoretodosRequest;
use App\Http\Requests\UpdateTodosRequest;
use App\Models\Todos;
use Faker\Factory;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Validator;

class TodosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        $data = Todos::all();
        $order = $data->sortByDesc('created_at')->values();
        return response()->json(['message' => "Todos retrieved successfully", 'data' => $order], 200);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(StoretodosRequest $request)
    {
        $faker = Factory::create();
        $id = $faker->randomNumber(5, true);
        $validate = Validator::make($request->all(), [
            'todo_item' => 'required|string|max:30',
        ]);

        if ($validate->fails()) {
            return response()->json(['message' => "Validation Error",], 422);
        }
        $strReq = $request->todo_item;
        $data = ['id' => $id, 'todo_item' => $strReq,];
//        dd($data,$strReq);

        Todos::create($data);
        $show_all_todos = Todos::all()->findOrFail($id);
        return response()->json([
            'message' => "Todo item created successfully",
            'data' => $show_all_todos
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Todos $id)
    {
        $data = Todos::all()->findOrFail($id);
        return response()->json(['message' => 'Todo retrieved successfully', 'data' => $data]);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTodosRequest $request, Todos $id)
    {
        $update = Todos::all()->findOrFail($id);
//        return response()->json($update);
        $validate = Validator::make($request->all(), [
            'todo_item' => 'required|string|max:30',
        ]);
        if ($validate->fails()) {
            return response()->json(['message' => "Todo not found.",], 422);
        }
//        dd($request->all());
        $data = [
            'todo_item' => $request->todo_item
        ];
        $update->update($data);
        $show_all_todos = Todos::all();
        return response()->json([
            'message' => "Todo item updated Successfully",
            'data'=> $show_all_todos,
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Todos $id): JsonResponse
    {
        $delete = Todos::all()->findOrFail($id);
        $delete->delete();
        return response()->json(['message' => "Todo deleted successfully",], 200);
    }
}
