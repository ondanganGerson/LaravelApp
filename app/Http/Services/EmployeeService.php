<?php

namespace App\Http\Services;

class EmployeeService
{

    public $employeeTypeA = [];
    public $employeeTypeB = [];
    public $employeeTypeC = [];


    /**
     * employees where salary is less than 60k. Type A
     */
    public function getEmployeeTypeA($employees)
    {   
        $data=[];

        foreach($employees as $employee) {
            
            if($employee->salary <= 60000) {
                $data['id']        = $employee->id;
                $data['firstname'] = $employee->firstname;
                $data['lastname']  = $employee->lastname;
                $data['position']  = $employee->position;
                $data['age']       = $employee->age;
                $data['salary']    = $employee->salary;
                $data['allowances']     = $employee->allowances;
                $data['totalexpence']   = $employee->salary + $employee->allowances;

                // put all data array into an array
                $this->employeeTypeA[] = $data;  
            }
        }

        return $this->employeeTypeA;
       
    }

    /**
     * employees where salary is more than 60k and less than 100k. Type B
     */
    public function getEmployeeTypeB($employees)
    {
        $data=[];
        
        foreach($employees as $employee) {
            
            if($employee->salary >= 60000 && $employee->salary <= 100000 ) {
                $data['id']        = $employee->id;
                $data['firstname'] = $employee->firstname;
                $data['lastname']  = $employee->lastname;
                $data['position']  = $employee->position;
                $data['age']       = $employee->age;
                $data['salary']    = $employee->salary;
                $data['allowances']     = $employee->allowances;
                $data['totalexpence']   = $employee->salary + $employee->allowances;

                
                $this->employeeTypeB[] = $data;  
            }
        }

        return $this->employeeTypeB;

    }

    /**
     * employees where salary is more than 100k. Type C
     */
    public function getEmployeeTypeC($employees)
    {
        $data=[];

        foreach($employees as $employee) {
            
            if($employee->salary >= 100000) {
                $data['id']        = $employee->id;
                $data['firstname'] = $employee->firstname;
                $data['lastname']  = $employee->lastname;
                $data['position']  = $employee->position;
                $data['age']       = $employee->age;
                $data['salary']    = $employee->salary;
                $data['allowances']     = $employee->allowances;
                $data['totalexpence']   = $employee->salary + $employee->allowances;

                
                $this->employeeTypeC[] = $data;  
            }
        }

        return $this->employeeTypeC;
    }
}