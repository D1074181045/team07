<?php

namespace App\Http\Controllers;

use App\Models\Somatotype;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class SomatotypesController extends Controller
{
    //
    public function index()
    {
        $somatotypes = Somatotype::all();
        return view('somatotypes.index', ["somatotypes" => $somatotypes]);
    }

    public function store(Request $request)
    {
        Somatotype::create([
            'somatotype' => $request->input("somatotype"),
            'avg_height' => $request->input("avg_height"),
            'avg_weight' => $request->input("avg_weight"),
            "created_at" => Carbon::now(8),
            "updated_at" => Carbon::now(8)
        ]);

        return Redirect::to("/somatotypes");
    }


    public function create()
    {
        return view('somatotypes.create');
    }

    public function update($id, Request $request)
    {
        $somatotyp = Somatotype::findOrFail($id);
        $somatotyp->somatotype = $request->input("somatotype");
        $somatotyp->avg_height = $request->input("avg_height");
        $somatotyp->avg_weight = $request->input("avg_weight");
        $somatotyp->updated_at = Carbon::now(8);
        $somatotyp->save();

        return Redirect::to("/somatotypes");
    }

    public function edit($id)
    {
        $somatotyp = Somatotype::findOrFail($id);

        return view('somatotypes.edit', $somatotyp);
    }

    public function show($id)
    {
//        $data = [];
//        $msg = "";
//        if ($id > 10)
//            $msg = "大於10";
//        else
//            $msg = "小於10";
//
//        $data['somatotypes'] = $id;
//        $data['message'] = $msg;
//        return view('somatotypes.show', $data); // -> with("message", $msg);

        $somatotype = Somatotype::findOrFail($id)->toArray();

        return view('somatotypes.show', $somatotype);
    }
}
