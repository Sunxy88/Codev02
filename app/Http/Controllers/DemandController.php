<?php

namespace App\Http\Controllers;

use App\Demand;
use App\ListUsers;
use Illuminate\Http\Request;

class DemandController extends Controller
{
    public function create(Request $request) {
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
        return view('congratualation');
    }

    public function manage(Request $requests) {
        $user_id = $requests->session()->get('userid');
        $demands = Demand::where("user_id", $user_id)
            ->get()->toArray();
        $demands = collect($demands);
        $requests->session()->put('demands', $demands);
        return view("manage");
    }

    public function detail(Request $request, $demand_id) {
        $users = ListUsers::where('demand_id', $demand_id)->get()->toArray();
        $users = collect($users);
        $demand = collect(Demand::where("id", $demand_id)->get()->toArray());
        $request->session()->put('listUsers', $users);
        $request->session()->put('demand', $demand);
        return view("detail");
    }
}
