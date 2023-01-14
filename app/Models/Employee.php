<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $age;
    protected $name;

    protected $fillable = [
        'firstname',
        'lastname',
        'age',
        'position',
        'salary',
        'allowances'
    ];


    //set age value passing from sampleTest
    public function setAge($value)
    {
        $this->age = $value;
    }


    //get age
    public function getAge()
    {
        return $this->age = 30;
    }

    //set age and name passing from sampleTest
    public function setAgeAndName($name, $age)
    {
        $this->name = $name;
        $this->age = $age;
    }

    //get age and name set from sampleTest
    public function getAgeAndName()
    {
        return [$this->name, $this->age];
    }


   
}
