<?php

namespace App\Http\Controllers;

use App\Models\Somatotype;
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
        $pageRow_records = 20;
        $num_pages = $page;
        $startRow_records = ($num_pages -1) * $pageRow_records;

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

    public function store(Request $request)
    {
        try {
            Somatotype::create([
                'somatotype' => $request->input("somatotype"),
                'avg_height' => $request->input("avg_height"),
                'avg_weight' => $request->input("avg_weight"),
            ]);
        } catch (QueryException $e) {

        } finally {
            return Redirect::to("/somatotypes/page=1");
        }
    }

    public function edit($id)
    {
        $somatotyp = Somatotype::findOrFail($id);

        return view('somatotypes.edit', $somatotyp);
    }

    public function update($id, Request $request)
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
            if (!isset($_GET['id']))
                return view('somatotypes.show');
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

    public function destroy($id)
    {
        Somatotype::destroy($id);

        return Redirect::to('/somatotypes/page=1');
    }
}
