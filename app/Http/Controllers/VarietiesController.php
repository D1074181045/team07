<?php

namespace App\Http\Controllers;

use App\Models\Somatotype;
use App\Models\Varietie;
use Carbon\Carbon;
use ErrorException;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Symfony\Component\Routing\Exception\RouteNotFoundException;

class VarietiesController extends Controller
{
    //
    public function index($page = 1)
    {
        $pageRow_records = 10;
        $num_pages = $page;
        $startRow_records = ($num_pages - 1) * $pageRow_records;

        $varieties = Varietie::join('somatotypes', 'varieties.somatotype_id', '=', 'somatotypes.somatotype_id')
//            ->where("somatotypes.deleted_at", null)
            ->select('id', 'name', 'varieties.somatotype_id', 'somatotype', 'source', 'avg_life')
            ->orderBy('id')
            ->get();

        $total_records = $varieties->count();
        $total_pages = ceil($total_records / $pageRow_records);

        return view('varieties.index', [
            "varieties" => $varieties->skip($startRow_records)->take($pageRow_records),
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
        } catch (QueryException $e) {

        } finally {
            return Redirect::to('/varieties/page=1');
        }
    }

    public function edit($id)
    {
        $varietie = Varietie::findOrFail($id);
        $somatotypes = Somatotype::all();

        return view('varieties.edit', $varietie)->with(["somatotypes" => $somatotypes, 'id' => $id]);
    }

    public function update($id, Request $request)
    {
        try {
            $varietie = Varietie::findOrFail($id);
            $varietie->name = $request->input('name');
            $varietie->somatotype_id = $request->input('somatotype_id');
            $varietie->source = $request->input('source');
            $varietie->avg_life = $request->input('avg_life');
            $varietie->save();
        } catch (QueryException $e) {

        } finally {
            return Redirect::to('/varieties/page=1');
        }
    }

    public function show()
    {
        try {
            if (!isset($_GET['id']))
                return view('varieties.show');
            else {
                $id = $_GET['id'];
                $varietie = Varietie::join('somatotypes', 'varieties.somatotype_id', '=', 'somatotypes.somatotype_id')
//                    ->where("somatotypes.deleted_at", null)
                    ->select('id', 'name', 'varieties.somatotype_id', 'somatotype', 'source', 'avg_life')
                    ->findOrfail($id);

                return response()->json($varietie);
            }

        } catch (ErrorException $e) {
            return abort(404);
        }
    }

    public function destroy($id)
    {
//        Varietie::destroy($id);
        $varietie = Varietie::findOrFail($id);
        $varietie->delete();

        return Redirect::to('/varieties/page=1');
    }
}
