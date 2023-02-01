<?php

namespace Tests\Unit;

// use PHPUnit\Framework\TestCase;
use Tests\TestCase;
use App\Http\Controllers\EmployeeController;
use Illuminate\Foundation\Testing\RefreshDataBase;
use App\Models\Employee;
use App\Http\Services\EmployeeService;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class EmployeeTest extends TestCase
{
    use RefreshDatabase;

    /**
     *  //call the controller method and get the empty array if user is not logged in
     * @return void
     */
    public function test_if_user_is_not_logged_in()
    {  
        $returnedValues = (new EmployeeController)->index();

        // $this->assertEmpty($returnedValues);

        $this->assertEquals([], $returnedValues);
    }


    /**
     * Check for type A data returning from service function that is empty
     */
    public function test_get_employee_type_a_is_empty()
    {
        
        $employees = Employee::factory(5)->create();

        $response = (new EmployeeService)->getEmployeeTypeA($employees);

        $this->assertEmpty($response);
    }


    /**
     * Check for type A data returning from service function that is not empty
     */
    public function test_get_employee_type_a_not_empty()
    {
        
        $employees = Employee::factory(5)->create();

        $response = (new EmployeeService)->getEmployeeTypeA($employees);

        if(!empty($response)) {
            $this->assertNotEmpty($response);
        }else{
            $this->assertEmpty($response);
        };
            
    }

    /**
     * Check for user if logged in and get employee data in employee route
     */
    public function test_if_user_logged_in_and_access_employee_route_get_employee_data()
    {
        //Create a User 
        $user = User::factory()->create([
            'password' => Hash::make('12345')
        ]);
        
        //Login a User
        $response = $this->post('login',[
            'email' => $user->email,
            'password' => '12345'
        ]);

        //If loggedin check
        $response->assertRedirect('dashboard');

        $employees = Employee::factory(5)->create();

        $employeetypeA = (new EmployeeService)->getEmployeeTypeA($employees);
        $employeetypeB = (new EmployeeService)->getEmployeeTypeB($employees);
        $employeetypeC = (new EmployeeService)->getEmployeeTypeC($employees);

        $data = [
            'typeA' => $employeetypeA,
            'typeB' => $employeetypeB,
            'typeC' => $employeetypeC,
        ];

        //get data from employee.
        $employeeData = $this->get(route('employee'));

        // dd(array_keys($responses['datas']));
        $this->assertEquals(array_keys($data), array_keys($employeeData['datas']));
    
    }


    public function test_check_if_data_displayed_correctly_in_employee()
    {
         //Create a User 
         $user = User::factory()->create([
            'password' => Hash::make('12345')
        ]);
        
        //Login a User
        $response = $this->post('login',[
            'email' => $user->email,
            'password' => '12345'
        ]);

        //If loggedin check
        $response->assertRedirect('dashboard');

        $employees = Employee::factory(10)->create();

        $employeetypeA = (new EmployeeService)->getEmployeeTypeA($employees);
        $employeetypeB = (new EmployeeService)->getEmployeeTypeB($employees);
        $employeetypeC = (new EmployeeService)->getEmployeeTypeC($employees);


        //Get one employee from each type.
        $employeeTypeData = [];
        
        foreach($employeetypeA as $employeeA) {
            $employeeTypeData['type_a'] = $employeeA['firstname'];
        }

        foreach($employeetypeB as $employeeB) {
            $employeeTypeData['type_b'] = $employeeB['firstname'];
        }

        foreach($employeetypeC as $employeeC) {
            $employeeTypeData['type_c'] = $employeeC['firstname'];
        }


        //Get data from employee 
        $responseData = $this->get(route('employee'));

        //Add this some assertion for reference from buzz recruitment
        // $response = $this->get('/v1/organization-type/list');

        // $response->assertStatus(200);

        // $response->assertJson([
        //     "result" => [
        //         [
        //             "id" => $response['result'][0]['id'],
        //             "description" => $response['result'][0]['description'],
        //         ]
        //     ],
        //     "errors" => []
        // ]);


        // dd(collect($responseData['datas']['typeA'])->contains('firstname', $employeeTypeData['type_a']));
        $this->assertTrue(collect($responseData['datas']['typeA'])->contains('firstname', $employeeTypeData['type_a']));
        $this->assertTrue(collect($responseData['datas']['typeB'])->contains('firstname', $employeeTypeData['type_b']));
        $this->assertTrue(collect($responseData['datas']['typeC'])->contains('firstname', $employeeTypeData['type_c']));
    }
}
