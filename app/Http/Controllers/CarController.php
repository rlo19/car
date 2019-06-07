<?php

namespace App\Http\Controllers;

use App\Car;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Laravel\Lumen\Routing\Controller as BaseController;

class CarController extends BaseController
{

    public function showAll(Request $request) {

        return response()->json(Car::all(), 200);
    }

    public function create(Request $request) {

        $this->validate($request, [
            'make' => 'required',
            'model' => 'required',
            'year'  => 'required|integer',
        ]);

        $car = Car::create($request->all());

        return response()->json($car, 201);
    }

    public function show(Request $request, $id = '') {

        if(!empty($id)) {
            $cars = Car::find($id);

        } else {
 
            $cars = Car::where($request->all())
                     ->get();
        }

        return response()->json($cars, 200);
    }

    public function update(Request $request, $id) {

        $car = Car::where("id", $id)
                ->update($request->all());

        return response()->json($car);
    }


}
