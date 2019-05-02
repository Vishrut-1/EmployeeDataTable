<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmployeeData extends Model
{
    //
     protected $table='employeedata';
     protected $fillable=['Name','Salary','Address','Email','PhoneNo'];

}



