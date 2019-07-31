<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Laptop extends Model
{
    protected $table = 'laptops';
    protected $fillable = ['name', 'idLaptopType', 'chip', 'card', 'number'];


    public function LaptopTypes()
    {
        return $this->belongsTo('App\LaptopType', 'idLaptopType', 'id');
    }

    public function showLaptop()
    {
        $laptop = Laptop::all();
        // dd($laptop);
        return $laptop;
    }

    public function add($input)
    {
        return $laptop = Laptop::create($input);
    }

    public function findId($id)
    {
        return $laptop = Laptop::find($id);
    }

    public function updateLaptop($input, $id)
    {
        $laptop = $this->findId($id);
        return $laptop->update($input);
    }

    public function deleteLaptop($id)
    {
        $laptop = $this->findId($id);
        if ($laptop) {
            return $laptop->delete();
        }
    }

    public function searchLaptop($key)
    {
        return $laptop = Laptop::where('name', 'LIKE', "%$key%")
            ->orWhere('chip', 'LIKE', "%$key%")
            ->orWhere('card', 'LIKE', "%$key%")
            ->get();
    }

    public function selectLaptopType($id)
    {
        return $laptop = Laptop::select('laptops.*')
            ->join('laptoptype', 'laptops.idLaptopType', '=', 'laptoptype.id')
            ->where('laptops.idLaptopType', '=', $id)
            ->get();
    }


}
