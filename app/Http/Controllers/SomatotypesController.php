<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SomatotypesController extends Controller
{
    //
    public function index()
    {
        return view('somatotypes.index');
    }

    public function create()
    {
        return view('somatotypes.create');
    }

    public function edit()
    {
        return view('somatotypes.edit');
    }

    public function show($id)
    {
        $data = [];
        $msg = "";
        if ($id > 10)
            $msg = "大於10";
        else
            $msg = "小於10";

        $data['somatotypes'] = $id;
        $data['message'] = $msg;
        return view('somatotypes.show', $data); // -> with("message", $msg);
    }
}
