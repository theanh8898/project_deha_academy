<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LaptopType extends Model
{
    protected $table = 'laptoptype';
    protected $fillable = ['name_type'];


    public function Laptop()
    {
        return $this->hasMany('App\Laptop', 'idLaptopType', 'id');
    }

    public function showLaptopType()
    {
        $laptoptype = LaptopType::all();
        return $laptoptype;
    }

    public function add($input)
    {
        return $laptoptype = LaptopType::create($input);
    }

    public function findId($id)
    {
        return $laptoptype = LaptopType::find($id);
    }

    public function updateLaptopType($input, $id)
    {
        $laptoptype = $this->findId($id);
        return $laptoptype->update($input);
    }

    public function deleteLaptopType($id)
    {
        $laptoptype = $this->findId($id);
        if ($laptoptype)
            return $laptoptype->delete($id);
    }
}
