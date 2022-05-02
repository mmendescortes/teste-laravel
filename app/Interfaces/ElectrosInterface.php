<?php

namespace App\Interfaces;

interface ElectrosInterface 
{
    public function getAllElectros();
    public function getElectroById(string $id);
    public function deleteElectro(string $id);
    public function createElectro(array $data);
    public function updateElectro(string $id, array $data);
}