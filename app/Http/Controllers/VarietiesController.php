<?php

namespace App\Http\Controllers;

use App\Models\Varietie;
use Carbon\Carbon;
use Illuminate\Http\Request;

class VarietiesController extends Controller
{
    //
    public function index()
    {
        $varieties = Varietie::all();
//        $varietie = Varietie::where("name", "麵包狗")->max("avg_life");
//        return view('varieties.index', ["varietie" => $varietie]);
        return view('varieties.index', ["varieties" => $varieties]);
    }

    public function create()
    {
        $Varietie = Varietie::create([
            "name" => "狗狗",
            "somatotype_id" => 1,
            "source" => "美國",
            "avg_life" => 10,
            "created_at" => Carbon::now(8),
            "updated_at" => Carbon::now(8)
        ]);

        return view('varieties.create', $Varietie);
    }

    public function edit($id)
    {
//        $dog_namw = "及哇哇";
//        $type = "瘋狗";
//        $data = compact('dog_namw', 'type', );
//
//        return $data['dog_namw'];
        $varietie = Varietie::findOrFail($id);
        $varietie->name = "瘋狗";
        $varietie->save();


        return view('varieties.edit', $varietie);
    }

    public function show($id)
    {
//        $dog_namw = "狗狗";
//        return view('varieties.show') -> with(["varieties_id" => $id, "dog_name" => $dog_namw]);

        $varietie = Varietie::findOrFail($id)->toArray();

        return view('varieties.show', $varietie);
    }
}
