<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;

class KlasemenController extends Controller
{
    public function index()
    {
        $dEPL = Http::get('https://api-football-standings.azharimm.site/leagues/eng.1/standings?season=2021&sort=asc')->json();
        return view('klasemen', [
            "title" => "Klasemen EPL",
            "active" => "Klasemen EPL",
            "dataklasemen" => $dEPL
        ]);
    }
}
