<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;

use App\Models\Item;

use Illuminate\Http\Request;

use Validator;

class ListController extends Controller
{
    // all Items
    public function index()
    {
        $Items = Item::all()->toArray();
        return array_reverse($Items);
    }

    // add Item
    public function store(Request $request)
    {
        $Item = new Item([
            'name' => $request->input('name'),
            'description' => $request->input('description')
        ]);
        $Item->save();

        return response()->json('The Item successfully added');
    }

    // edit Item
    public function show($id)
    {
        $Item = Item::find($id);
        return response()->json($Item);
    }

    // update Item
    public function update($id, Request $request)
    {
        $Item = Item::find($id);
        $Item->update($request->all());

        return response()->json('The Item successfully updated');
    }

    // delete Item
    public function destroy($id)
    {
        $Item = Item::find($id);
        $Item->delete();

        return response()->json('The Item successfully deleted');
    }
}
