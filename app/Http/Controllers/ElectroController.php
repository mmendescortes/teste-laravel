<?php

namespace App\Http\Controllers;

use App\Models\Electro;
use Illuminate\Http\Request;
use App\Services\ElectrosService;
use App\Http\Requests\ElectrosRequest;

class ElectroController extends Controller
{
    // CompanySectorsServices
    protected $electrosService;

    public function __construct(ElectrosService $electrosService)
    {
        $this->electrosService = $electrosService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $response = $this->electrosService->getAllElectros();
        return response()->json($response[0]->toArray(), $response[1]);
    }

    /**
        * Store a newly created resource in storage.
        * @param  \App\Http\Requests\ElectrosRequest  $request
        * @return Response
        */
        public function store(ElectrosRequest $request)
        {
            $request->validated();
            $response = $this->electrosService->createElectro($request->all());
            return response()->json($response[0], $response[1]);
        }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Electro  $company
     * @return \Illuminate\Http\Response
     */
    public function show(string $id)
    {
        $response = $this->electrosService->getElectroById($id);
        return response()->json($response[0], $response[1]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\ElectrosRequest  $request
     * @param  \App\Models\Electro  $company
     * @return \Illuminate\Http\Response
     */
    public function update(ElectrosRequest $request, string $id)
    {
        //
        $request->validated();
        $response = $this->electrosService->updateElectro($id, $request->all());
        return response()->json($response[0], $response[1]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Electro  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(string $id)
    {
        //
        $response = $this->electrosService->deleteElectro($id);
        return response()->json($response[0], $response[1]);
    }
}
