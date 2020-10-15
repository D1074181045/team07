<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VarietiesController extends Controller
{
    //
    public function index()
    {
        return view('varieties.index');
    }

    public function create()
    {
        return view('varieties.create');
    }

    public function edit()
    {
        $dog_namw = "及哇哇";
        $type = "瘋狗";
        $data = compact('dog_namw', 'type');
        return view('varieties.edit', $data);
    }

    public function show($id)
    {
        $dog_namw = "狗狗";
        return view('varieties.show') -> with(["varieties_id" => $id, "dog_name" => $dog_namw]);
    }
}
