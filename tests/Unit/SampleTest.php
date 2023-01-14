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
}
