<?php

namespace App\Services;

use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use App\Interfaces\ElectrosInterface;
use Illuminate\Database\QueryException;


class ElectrosService
{
    private ElectrosInterface $electrosRepository;

    public function __construct(ElectrosInterface $electrosRepository) 
    {
        $this->electrosRepository = $electrosRepository;
    }

    public function getAllElectros() 
    {
        try {
            $electros = $this->electrosRepository->getAllElectros();
            return [$electros, 200];
        } catch(QueryException $e) {
            switch ($e->getCode()) {
                default:
                    return [
                        [
                            'error' => 'An unknown error occoured! Please contact the system administrator.'
                        ],
                        500
                    ];
                    break;

            }
        }
    }



    public function getElectroById(string $id){
        try {
            $electro = $this->electrosRepository->getElectroById($id);
            return [$electro, 200];
        } catch(QueryException $e) {
            switch ($e->getCode()) {
                default:
                    return [
                        [
                            'error' => 'An unknown error occoured! Please contact the system administrator.'
                        ],
                        500
                    ];
                    break;

            }
        }
    }

    public function createElectro(array $data)
    {
        try {
            $this->electrosRepository->createElectro($data);
            return [
                [
                    'message' => 'Electro created successfully!'
                ],
                201
            ];
        } catch (QueryException $e) {
            switch ($e->getCode()) {
                case 23505:
                    return [
                        [
                            'error' => 'Product is already registered on the platform!'
                        ],
                        409
                    ];
                    break;
                default:
                    return [
                        [
                            'error' => 'An unknown error occoured! Please contact the system administrator.'
                        ],
                        500
                    ];
                    break;

            }
        }
    }

    public function updateElectro(string $id, array $data) 
    {
        try {
            $this->electrosRepository->updateElectro($id, $data);
            return [
                [
                    'message' => 'Electro updated successfully!'
                ],
                201
            ];
        } catch (QueryException $e) {
            switch ($e->getCode()) {
                default:
                    return [
                        [
                            'error' => 'An unknown error occoured! Please contact the system administrator.'
                        ],
                        500
                    ];
                    break;

            }
        }
    }

    public function deleteElectro(string $id)
    {
        try {
            $this->electrosRepository->deleteElectro($id);
            return [
                [
                    'message' => 'Electro deleted successfully!'
                ],
                201
            ];
        } catch (QueryException $e) {
            switch ($e->getCode()) {
                default:
                    return [
                        [
                            'error' => 'An unknown error occoured! Please contact the system administrator.'
                        ],
                        500
                    ];
                    break;

            }
        }
    }
}