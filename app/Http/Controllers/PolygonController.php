<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Markert;
use App\Models\Polygon;


class PolygonController extends Controller
{
    public function index()
    {
        return Polygon::with('markerts')->get();
    }

    public function store(Request $request)
    {
        $polygon = Polygon::create(["name" => $request->name]);

        foreach ($request->markerts as $ket => $value) {
            $market = Markert::create($value);
            $market->polygon_id = $polygon->id;
            $market->save();
            // return $value;
        }

        return $polygon->markerts;
    }
}
