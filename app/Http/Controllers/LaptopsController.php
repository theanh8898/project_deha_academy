<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Validator;
use App\Laptop;
use App\LaptopType;
use App\Http\Requests\LaptopRequest;

class LaptopsController extends Controller
{
    protected $laptop;
    protected $laptoptype;


    public function __construct(Laptop $laptop, LaptopType $laptoptype)
    {
        $this->laptop = $laptop;
        $this->laptoptype = $laptoptype;
    }

    public function index()
    {
        $laptops = $this->laptop->showLaptop();
        $laptoptype = $this->laptoptype->showLaptopType();
        // dd($laptops);
        return view('laptops.list', compact('laptops', 'laptoptype'));
    }


    public function store(LaptopRequest $request)
    {
        $laptop = $this->laptop->add($request->all());
        $laptoptype = $this->laptoptype->showLaptopType();
        return response()->json(['laptop' => $laptop, 'laptoptype' => $laptoptype]);

    }


    public function update(LaptopRequest $request, $id)
    {

        $laptop = $this->laptop->updateLaptop($request->all(), $id);
        $laptoptype = $this->laptoptype->showLaptopType();
        if ($laptop) return response()->json(['laptop' => $request->all(), 'laptoptype' => $laptoptype]);
        else return response()->json(["status" => "error"]);

    }

    public function destroy($id)
    {
        $laptop = $this->laptop->deleteLaptop($id);
        if ($laptop) return response()->json($id);
    }

    public function search(Request $request)
    {
        $keyword = $request->keyword;
        $laptoptype = $this->laptoptype->showLaptopType();
        $laptop = $this->laptop->searchLaptop($keyword);
        return view('laptops.search', ['laptops' => $laptop, 'keyword' => $keyword, 'laptoptype' => $laptoptype]);
    }

}
