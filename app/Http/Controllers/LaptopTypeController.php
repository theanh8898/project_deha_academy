<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Validator;
use App\LaptopType;
use App\Laptop;
use App\Http\Requests\LaptopTypeRequest;

class LaptopTypeController extends Controller
{

    protected $laptoptype;
    protected $laptop;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(LaptopType $laptoptype, Laptop $laptop)
    {
        $this->laptoptype = $laptoptype;
        $this->laptop = $laptop;
    }

    public function index()
    {
        $laptoptypes = $this->laptoptype->showLaptopType();
        return view('laptops.laptoptype', ['laptoptypes' => $laptoptypes]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(LaptopTypeRequest $request)
    {
        $laptoptype = $this->laptoptype->add($request->all());

        return response()->json($laptoptype);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(LaptopTypeRequest $request, $id)
    {
        $laptoptype = $this->laptoptype->updateLaptopType($request->all(), $id);
        if ($laptoptype) return response()->json($request->all());
        else return response()->json(["status" => "error"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $laptoptype = $this->laptoptype->deleteLaptopType($id);
        if ($laptoptype) return response()->json($id);
    }

    public function showAllLaptop($id)
    {
        $laptoptype = $this->laptoptype->showLaptopType();
        $laptops = $this->laptop->selectLaptopType($id);
        return view('laptops.listoftype', ['laptops' => $laptops, 'laptoptype' => $laptoptype]);
    }
}
