<?php

namespace App\Http\Controllers;

use App\Rental;
use Illuminate\Http\Request;
use Laravel\Lumen\Routing\Controller as BaseController;

class RentalController extends BaseController
{

    public function showAll(Request $request) {

        return response()->json(Rental::all());
    }

    public function create(Request $request) {

        $this->validate($request, [
            'uid' => 'required|integer',
            'cid' => 'required|integer',
            'rented_from'  => 'required|date',
            'rented_to'  => 'required|date|after:rented_from',
        ]);

        $rental = Rental::create($request->all());

        return response()->json($rental, 201);
    }    

    public function show(Request $request, $id = '') {

        $rental = Rental::find($id);

        return response()->json($rental, 200);
    }

    public function update(Request $request, $id) {

        $rental = Rental::find($id)
                ->update($request->all());

        return response()->json($rental);
    }
}
