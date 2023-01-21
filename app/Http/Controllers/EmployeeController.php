<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Http\Services\EmployeeService;
class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $data = [];

            //Check if user is authenticated
            if(auth()->check()) { 
                $employees = Employee::all();
                
                
                //employees where salary is less than 60k. Type A
                $employeeTypeA = (new EmployeeService)->getEmployeeTypeA($employees);
        
        
                //employees where salary is more than 60k and less than 100k. Type B
                $employeeTypeB = (new EmployeeService)->getEmployeeTypeB($employees);
        
        
                //employees where salary is more than 100k. Type C
                $employeeTypeC = (new EmployeeService)->getEmployeeTypeC($employees);
        
                
                $data = [
                    'typeA' => $employeeTypeA,
                    'typeB' => $employeeTypeB,
                    'typeC' => $employeeTypeC,
                ];
                
                
                return view('admin.index')->with('datas', $data);
            }

            return $data;

        } catch (\Throwable $th) {

            echo $th;

        }
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
