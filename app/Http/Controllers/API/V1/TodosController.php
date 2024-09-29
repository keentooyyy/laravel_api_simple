<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Requests\StoretodosRequest;
use App\Http\Requests\UpdateTodosRequest;
use App\Models\Todos;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Validator;
use Faker\Factory;

class TodosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        $data = Todos::all();
        return response()->json([
            'message' => "Todos retrieved successfully",
            'data' => $data
        ],200);
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
//            'id' => str($id),
        ]);

        if ($validate->fails()) {
            return response()->json([
                'message' => "Validation Error",
            ],422);
        }
        $strReq = implode($request->all());
        $data = [
            'id' => $id,
            'todo_item' => $strReq,
        ];
//        dd($data,$strReq);

        $todo_item = Todos::create($data);
        return response()->json([
            'message' => "Todo item created successfully",
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Todos $id): JsonResponse
    {
        $data = Todos::all()->findOrFail($id);
        return response()->json([
            'message' => 'Todo retrieved successfully',
            'data' => $data
        ]);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTodosRequest $request, Todos $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Todos $id): JsonResponse
    {
        $delete = Todos::all()->findOrFail($id);
        $delete->delete();
        return response()->json([
            'message' => "Todo deleted successfully",
        ],200);
    }
}
