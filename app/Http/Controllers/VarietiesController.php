<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateVarietieRequest;
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
    public function form_select($original, $value, $key)
    {
        $data = [];
        foreach ($original as $t) {
            $data[$t[$value]] = $t[$key];
        }
        return $data;
    }

    public function index($page = 1)
    {
        $pageRow_records = 10;
        $num_pages = $page;
        $startRow_records = ($num_pages - 1) * $pageRow_records;

        $somatotypes = Somatotype::all();
        $somatotypes = $this->form_select($somatotypes, 'somatotype_id', 'somatotype');

        $source = Varietie::Allsource()->get();
        $source = $this->form_select($source, 'source', 'source');

        $varieties = Varietie::AllData()->get();

        $total_records = $varieties->count();
        $total_pages = ceil($total_records / $pageRow_records);

        return view('varieties.index', [
            "varieties" => $varieties->skip($startRow_records)->take($pageRow_records),
            "somatotypes" => $somatotypes,
            "source" => $source,
            "total_records" => $total_records,
            "total_pages" => $total_pages,
            "num_pages" => $num_pages
        ]);
    }

    public function type($page = 1)
    {
        $pageRow_records = 10;
        $num_pages = $page;
        $startRow_records = ($num_pages - 1) * $pageRow_records;

        $somatotypes = Somatotype::all();
        $somatotypes = $this->form_select($somatotypes, 'somatotype_id', 'somatotype');

        $source = Varietie::Allsource()->get();
        $source = $this->form_select($source, 'source', 'source');

        $varieties = Varietie::Type($_GET['somatotype_id'])->get();

        $total_records = $varieties->count();
        $total_pages = ceil($total_records / $pageRow_records);

        return view('varieties.index', [
            "varieties" => $varieties->skip($startRow_records)->take($pageRow_records),
            "somatotypes" => $somatotypes,
            "source" => $source,
            "total_records" => $total_records,
            "total_pages" => $total_pages,
            "num_pages" => $num_pages
        ]);
    }

    public function source($page = 1, Request $request)
    {
        $pageRow_records = 10;
        $num_pages = $page;
        $startRow_records = ($num_pages - 1) * $pageRow_records;

        $somatotypes = Somatotype::all();
        $somatotypes = $this->form_select($somatotypes, 'somatotype_id', 'somatotype');

        $source = Varietie::Allsource()->get();
        $source = $this->form_select($source, 'source', 'source');

        $varieties = Varietie::source($request->input('source'))->get();

        $total_records = $varieties->count();
        $total_pages = ceil($total_records / $pageRow_records);

        return view('varieties.index', [
            "varieties" => $varieties->skip($startRow_records)->take($pageRow_records),
            "somatotypes" => $somatotypes,
            "source" => $source,
            "total_records" => $total_records,
            "total_pages" => $total_pages,
            "num_pages" => $num_pages
        ]);
    }

    public function create()
    {
        $somatotypes = Somatotype::all();

        $data = [];
        foreach ($somatotypes as $somatotype) {
            $data[$somatotype->somatotype_id] = $somatotype->somatotype;
        }

        return view('varieties.create', ["somatotypes" => $data]);
    }

    public function store(CreateVarietieRequest $request)
    {
        try {
            $name = $request->input('name');
            $somatotype_id = $request->input('somatotype_id');
            $source = $request->input('source');
            $avg_life = $request->input('avg_life');
            $find_date = $request->input('find_date');
            $land_date = $request->input('land_date');

            Varietie::create([
                "name" => $name,
                "somatotype_id" => $somatotype_id,
                "source" => $source,
                "avg_life" => $avg_life,
                "find_date" => $find_date,
                "land_date" => $land_date
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

        $data = [];
        foreach ($somatotypes as $somatotype) {
            $data[$somatotype->somatotype_id] = $somatotype->somatotype;
        }

        return view('varieties.edit', ["varietie" => $varietie, "somatotypes" => $data, 'id' => $id]);
    }

    public function update($id, CreateVarietieRequest $request)
    {
        try {
            $varietie = Varietie::findOrFail($id);

            $varietie->name = $request->input('name');
            $varietie->somatotype_id = $request->input('somatotype_id');
            $varietie->source = $request->input('source');
            $varietie->avg_life = $request->input('avg_life');
            $varietie->find_date = $request->input('find_date');
            $varietie->land_date = $request->input('land_date');
            $varietie->save();
        } catch (QueryException $e) {

        } finally {
            return Redirect::to('/varieties/page=1');
        }
    }

    public function show()
    {
        try {
            if (!isset($_GET['id'])) {
                $varieties = Varietie::all();

                $data = [];
                foreach ($varieties as $varietie) {
                    $data[$varietie->id] = $varietie->name;
                }

                return view('varieties.show', ['varieties_id' => $data]);
            } else {
                $id = $_GET['id'];
                $varietie = Varietie::AllData()->findOrfail($id);

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
