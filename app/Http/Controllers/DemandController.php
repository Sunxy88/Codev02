<?php

namespace App\Http\Controllers;

use App\Demand;
use App\ListUsers;
use Illuminate\Http\Request;

class DemandController extends Controller
{
    public function create(Request $request) {
        $user_id =  self::validateLogInState($request)->id;
        $validatedData = $request -> validate([
            'obj' => ['required', 'max:140'],
            'env' => ['required', 'max:140'],
            'numberUsers' => ['required', 'numeric'],
            'listUsers' => ['required'],
            'from' => ['required', 'date'],
            'to' => ['required', 'date'],
        ]);
        $demand = new Demand;
        $demand->user_id = $user_id;
        $demand->description = $validatedData['env'];
        $demand->numberUsers = $validatedData['numberUsers'];
        $demand->listUsers = $validatedData['listUsers'];
        $demand->fromDate = $validatedData['from'];
        $demand->toDate = $validatedData['to'];
        $demand->save();
        return view('congratualation');
    }

    public function manage(Request $requests) {
        $user_id = self::validateLogInState($requests)->id;
        $demands = Demand::where("user_id", $user_id)
            ->get()->toArray();
        $demands = collect($demands);
        $requests->session()->put('demands', $demands);
        return view("manage");
    }

    public function confirmDelete(Request $request, $id)
    {
        $demands = $request->session()->get('demands', null);
        if ($demands == null)
            return view('manage');
        $demands = $demands->toArray();
        $toBeDeleted = array();
        foreach ($demands as $demand) {
            if ($demand['id'] == $id)
                $toBeDeleted = array_merge($toBeDeleted, array($demand));
        }
        $request->session()->put('demandsToBeDeleted', collect($toBeDeleted));
        return view("confirm");
    }

    public function doDelete(Request $request) {
        $toBeDeleted = $request->session()->get('demandsToBeDeleted')->toArray();
        $primaryKeyToDelete = array();
        foreach ($toBeDeleted as $item) {
            array_push($primaryKeyToDelete, $item['id']);
        }
        Demand::destroy($primaryKeyToDelete);
        return view('congratualation');
    }

    public static function validateLogInState(Request $request) {
        $user = $request->session()->get('user', null);
        if ($user == null) {
            $request->session()->flash('alert', 'Connectez-vous par ici');
            return view('login');
        }
        return $user;
    }
}
