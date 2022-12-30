<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Markert;


class MarkertController extends Controller
{
    public function index()
    {
        return Markert::where('polygon_id', null)->get();
    }

    public function store(Request $request)
    {
        return Markert::create($request->all());
    }

    public function update($id, Request $request)
    {
        $markert = Markert::find($id);
        // return $request->all();
        $markert->update($request->all());

        return $markert;
    }
}