<?php

namespace App\Http\Controllers;

use App\Models\Somatotype;
use App\Models\Varietie;
use Carbon\Carbon;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class VarietiesController extends Controller
{
    //
    public function index($page = 1)
    {
        $pageRow_records = 20;
        $num_pages = $page;
        $startRow_records = ($num_pages -1) * $pageRow_records;

//        $varieties = Varietie::all();
        $varieties = DB::table('varieties')
//            ->where("varieties.deleted_at" , "=", null)
//            ->where("somatotypes.deleted_at" , "=", null)
            ->join('somatotypes', 'varieties.somatotype_id', '=', 'somatotypes.somatotype_id')
            ->select('id', 'name', 'varieties.somatotype_id', 'somatotype', 'source', 'avg_life')
            ->orderBy('id')
            ->get();


        $total_records = $varieties->count();
        $total_pages = ceil($total_records / $pageRow_records);

        return view('varieties.index', [
            "varieties" => $varieties->skip($startRow_records)->take(20),
            "total_records" => $total_records,
            "total_pages" => $total_pages,
            "num_pages" => $num_pages
        ]);
    }

    public function create()
    {
        $somatotypes = Somatotype::all();

        return view('varieties.create', ["somatotypes" => $somatotypes]);
    }

    public function store(Request $request)
    {
        try {

            Varietie::create([
                "name" => $request->input('name'),
                "somatotype_id" => $request->input('somatotype_id'),
                "source" => $request->input('source'),
                "avg_life" => $request->input('avg_life'),
            ]);
        }
        catch (QueryException $e) {

        }

        return Redirect::to('/varieties/page=1');
    }

    public function edit($id)
    {
        $varietie = Varietie::findOrFail($id);
        $somatotypes = Somatotype::all();

        return view('varieties.edit', $varietie)->with("somatotypes", $somatotypes);
    }

    public function update($id, Request $request)
    {
        $varietie = Varietie::findOrFail($id);
        $varietie->name = $request->input('name');
        $varietie->somatotype_id = $request->input('somatotype_id');
        $varietie->source = $request->input('source');
        $varietie->avg_life = $request->input('avg_life');
        $varietie->save();


        return Redirect::to('/varieties/page=1');
    }

    public function show()
    {
        $id = $_GET['id'];
//        $varietie = Varietie::findOrFail($id)->toArray();

        $varietie = DB::table('varieties')
            ->where('id', $id)
//            ->where("varieties.deleted_at" , "=", null)
//            ->where("somatotypes.deleted_at" , "=", null)
            ->join('somatotypes', 'varieties.somatotype_id', '=', 'somatotypes.somatotype_id')
            ->select('id', 'name', 'varieties.somatotype_id', 'somatotype', 'source', 'avg_life')
            ->get();

        if ($varietie->count() == 0)
            return abort(404);

        return view('varieties.show', ["varietie" => $varietie[0]]);
    }

    public function destroy($id)
    {
        Varietie::destroy($id);

        return Redirect::to('/varieties/page=1');
    }
}
