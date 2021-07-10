<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class VisitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $params = [
            "filterDate" => "",
            "filterEmployee" => "",
            "orderByDate" => "",
        ];

        foreach ($request->all() as $key => $value) {
            if (!empty($value)) {
                $params[$key] = $value;
            }
        }

        $responseVisits = Http::get(env("APP_API_URL") . "/visit/", $params);
        $responseEmployees = Http::get(env("APP_API_URL") . "/employee/");

        return view("visit.list", [
            "visits" => $responseVisits->json() ?? [],
            "employees" => $responseEmployees->json() ?? [],
            "queries" => $params,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $response = Http::get(env("APP_API_URL") . "/employee/");

        return view("visit.fixing", [
            "title" => "Внести посещение сотрудника",
            "formId" => "create_fixing",
            "employees" => $response->json() ?? [],
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $response = Http::post(env("APP_API_URL") . "/visit/", [
            "Visit" => $request->Visit ?? [],
        ]);

        return response($response->json() ?? []);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
