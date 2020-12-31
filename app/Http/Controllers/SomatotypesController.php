<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateSomatotypeRequest;
use App\Models\Somatotype;
use App\Models\Varietie;
use Carbon\Carbon;
use ErrorException;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class SomatotypesController extends Controller
{
    //
    public function index($page=1)
    {
        $pageRow_records = 10;
        $num_pages = $page;
        $startRow_records = ($num_pages - 1) * $pageRow_records;

        $somatotypes = Somatotype::all();
        $total_records = $somatotypes->count();
        $total_pages = ceil($total_records / $pageRow_records);

        return view('somatotypes.index', [
            "somatotypes" => $somatotypes->skip($startRow_records)->take($pageRow_records),
            "total_records" => $total_records,
            "total_pages" => $total_pages,
            "num_pages" => $num_pages
        ]);
    }

    public function create()
    {
        return view('somatotypes.create');
    }

    public function store(CreateSomatotypeRequest $request)
    {
        try {
            $somatotype = $request->input("somatotype");
            $avg_height = $request->input("avg_height");
            $avg_weight = $request->input("avg_weight");

            Somatotype::create([
                'somatotype' => $somatotype,
                'avg_height' => $avg_height,
                'avg_weight' => $avg_weight,
            ]);

        } catch (QueryException $e) {

        } finally {
            return Redirect::to("/somatotypes/page=1");
        }
    }

    public function edit($id)
    {
        $somatotype = Somatotype::findOrFail($id);

        return view('somatotypes.edit', ['somatotype' => $somatotype, 'id' => $id]);
    }

    public function update($id, CreateSomatotypeRequest $request)
    {
        try {
            $somatotyp = Somatotype::findOrFail($id);

            $somatotyp->somatotype = $request->input("somatotype");
            $somatotyp->avg_height = $request->input("avg_height");
            $somatotyp->avg_weight = $request->input("avg_weight");
            $somatotyp->save();
        } catch (QueryException $e) {

        } finally {
            return Redirect::to("/somatotypes/page=1");
        }
    }

    public function show()
    {
        try {
            if (!isset($_GET['id'])) {
                $somatotypes = Somatotype::all();

                $data = [];
                foreach ($somatotypes as $somatotype) {
                    $data[$somatotype->somatotype_id] = $somatotype->somatotype;
                }

                return view('somatotypes.show', ['somatotypes_id' => $data]);
            }
            else {
                $id = $_GET['id'];
                $somatotype = Somatotype::findOrfail($id);

                return response()->json($somatotype);
            }
        }
        catch (ErrorException $e) {
            return abort(404);
        }
    }

    public function show2($id)
    {
        try {
            $somatotype = Somatotype::find($id);
            $varieties = $somatotype->Varieties;

            return view('somatotypes.show2', [
                'somatotype' => $somatotype,
                'varieties' => $varieties]
            );

        } catch (ErrorException $e) {
            return abort(404);
        }
    }

    public function api_update(Request $request) {
        $somatotype = Somatotype::find($request->input('somatotype_id'));

        if ($somatotype == null) {
            return response()->json([
                'status' => 0
            ]);
        }

        $somatotype->somatotype = $request->input("somatotype");
        $somatotype->avg_height = $request->input("avg_height");
        $somatotype->avg_weight = $request->input("avg_weight");

        if ($somatotype->save()) {
            return response()->json([
                'status' => 1
            ]);
        } else {
            return response()->json([
                'status' => 0
            ]);
        }
    }

    public function api_somatotypes() {
        return Somatotype::all();
    }

    public function api_delete(Request $request) {
        $somatotype = Somatotype::find($request->input('somatotype_id'));

        if ($somatotype == null) {
            return response()->json([
                'status' => 0
            ]);
        }

        if ($somatotype->delete()) {
            return response()->json([
                'status' => 1
            ]);
        }
    }

    public function destroy($id)
    {
//        Somatotype::destroy($id);
        $somatotype = Somatotype::findOrFail($id);
        $somatotype->delete();

        return Redirect::to('/somatotypes/page=1');
    }
}
