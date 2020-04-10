<?php

namespace App\Http\Controllers;

use App\Link;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;


class LinksController extends Controller
{
    public function show($id){
        $link = Link::findOrFail($id);
        return redirect($link->url);
    }

    public function create(){
        return view('links.create');
    }

    public function store(Request $request){
        $url = $request->input('url');
        $link = Link::firstOrCreate(['url' => $url]);
        return view('links.success', compact('link'));
    }
}
