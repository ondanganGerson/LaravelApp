<?php

namespace Tests\Unit;

use App\Models\Employee;
use PHPUnit\Framework\TestCase;

class SampleTest extends TestCase
{
    protected $employee;

    public function setUp(): void
    {
        $this->employee = new \App\Models\Employee;
    }
    
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_sample_is_true()
    {
        $sample = false;
        if(1===1) {
            $sample = true;
        }
        $this->assertTrue($sample);
    }


    public function test_check_if_array_has_key()
    {
        $arrayKey = [
            'name' => 'Gerson',
            'age' => 30,
        ];

        $this->assertArrayHasKey('age', $arrayKey);
    }


    public function test_get_employee_age()
    {
        $this->employee->setAge(29); //passing param to Employee model

        $this->assertEquals($this->employee->getAge(), '30');
        
    }


    public function test_get_age_and_name_employee()
    {
        $this->employee->setAgeAndName('Gerson', 30); //passing param to Employee model

        $this->assertEquals($this->employee->getAgeAndName(), ['Gerson', 30]);
    }

    //TEST FOR FUTURE REFERENCES

    /* 1 */ //passing array to route as POST
        // $data = [
        //     'new_password' => $password,
        //     'token' => $tokenRecord->token.$tokenRecord->id,
        // ];

        // $response = $this->postJson('v1/user/reset-password', $data);
        

    /* 2 */ //GET
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


    /* 3 */// PASSING DATA AS ARRAY TO ROUTE DELETE
        // $data = [
        //     'id' => $projectSatellitefacility->facility_id,
        // ];

        // $response = $this->deleteJson('/v1/facility/delete', $data);  // in api Route::delete('/facility/delete', FacilityDeleteController::class);
        // $response->assertStatus(200);
        
        //$this->assertSoftDeleted($projectSatellitefacility); => check if table has soft delete


    /* 4 */ //empty database before creating new record
        // $this->assertDatabaseEmpty('facilities');
        // $this->assertDatabaseEmpty('project_facilities');
        // $this->assertDatabaseEmpty('project_satellite_facilities');

        // $facility = Facility::create([
        //     'organization_id' => fake()->randomNumber(2),
        //     'medical_organization_identification_number' => fake()->randomNumber(2),
        //     'is_satellite' => fake()->randomNumber(2),
        //     'contract_status' => fake()->randomNumber(2),
        //     'contract_date' => now(),
        //     'address_kana' => fake()->address(),
        // ]);


}

