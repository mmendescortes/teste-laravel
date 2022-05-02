<?php

namespace App\Repositories;

use App\Interfaces\ElectrosInterface;
use App\Models\Electro;

class ElectrosRepository implements ElectrosInterface 
{
    public function getAllElectros() 
    {
        return Electro::all();
    }

    public function getElectroById(string $id) 
    {
        return Electro::where('id', $id)->first();
    }

    public function createElectro(array $data) 
    {
        $electro = new Electro($data);
        $electro->save();
    }

    public function updateElectro(string $id, array $data) 
    {
        return Electro::whereId($id)->update($data);
    }

    public function deleteElectro(string $id) 
    {
        $electro = Electro::where('id', $id)->first();
        $electro->delete();
    }
}