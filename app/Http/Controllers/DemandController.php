<?php

namespace App\Http\Controllers;

use App\Demand;
use App\ListUsers;
use Illuminate\Http\Request;

class DemandController extends Controller
{
    public function createDemande(Request $request) {
        $user_id = $request->session()->get('userid');
        $validatedData = $request -> validate([
            'obj' => ['required', 'max:140'],
            'env' => ['required', 'max:140'],
            'numberUsers' => ['required', 'numeric'],
            'listUsers' => ['required'],
            'from' => ['required', 'date'],
            'to' => ['required', 'date'],
        ]);
        $demand = new Demand;
        $listUsers = new ListUsers;
        $demand->user_id = $user_id;
        $demand->description = $validatedData['env'];
        $demand->numberUsers = $validatedData['numberUsers'];
        $demand->fromDate = $validatedData['from'];
        $demand->toDate = $validatedData['to'];
        $demand->save();
        $listUsers->demand_id = $demand->id;
        $listUsers->users = $validatedData['listUsers'];
        $listUsers->save();
        return view('demande');
    }
}
