<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;

use Illuminate\Http\Request;

class KlasemenController extends Controller
{
    public function index(Request $request)
    {
        $standingYear = date("Y");
        if($request->year){
            $standingYear = $request->year;
        }

        $dEPL = Http::get('https://api-football-standings.azharimm.dev/leagues/eng.1/standings', [
            'season' => $standingYear,
            'sort' => 'asc',
        ])->json();

        $dEPLnew = Http::get('https://api-football-standings.azharimm.dev/leagues/eng.1/')->json();
        return view('klasemen', [
            "title" => "Klasemen EPL",
            "active" => "Klasemen EPL",
            "dataKlasemen" => $dEPL,
            "dataLiga" => $dEPLnew,
            "standingYear" => $standingYear
        ]);
    }
}
