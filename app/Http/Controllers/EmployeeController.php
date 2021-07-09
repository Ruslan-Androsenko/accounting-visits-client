<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $response = Http::get(env("APP_API_URL") . "/employee/");

        return view("employee.list", ["employees" => $response->json() ?? []]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("employee.form", [
            "title" => "Создание нового сотрудника",
            "formId" => "create_employee",
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
        $response = Http::post(env("APP_API_URL") . "/employee/", [
            "Employee" => $request->Employee ?? [],
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
        $response = Http::get(env("APP_API_URL") . "/employee/{$id}/");

        return view("employee.form", [
            "title" => "Редактирование сотрудника",
            "formId" => "update_employee",
            "employee" => $response->json() ?? []
        ]);
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
        $response = Http::put(env("APP_API_URL") . "/employee/{$id}/", [
            "Employee" => $request->Employee ?? [],
        ]);

        return response($response->json() ?? []);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $response = Http::delete(env("APP_API_URL") . "/employee/{$id}/");

        return response($response->body() ?? []);
    }
}
