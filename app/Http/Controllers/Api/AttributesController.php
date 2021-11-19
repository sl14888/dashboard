<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Attribute;
use Illuminate\Http\Request;

class AttributesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index(): \Illuminate\Http\JsonResponse
    {
        return response()->json(['data' => Attribute::with('products')->get()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $attribute = new Attribute;
        $attribute->attribute_name = $request->input('name');
        $attribute->save();

        return response()->json(['data' => $attribute]);
    }

    /**
     * Display the specified resource.
     *
     * @param Attribute $attribute
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Attribute $attribute)
    {
        return response()->json(['data' => $attribute]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param Attribute $attribute
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, Attribute $attribute)
    {
        $attribute->attribute_name = $request->input('name');
        $attribute->save();
        return response()->json(['data' => $attribute]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Attribute $attribute)
    {
        $attribute->delete();
        return response()->json(null, 204);
    }
}
