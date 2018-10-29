<?php

namespace App\Models\User\Model;

use Moloquent;
class User extends Moloquent
{
    protected $connection = 'mongodb';


    protected  $table = "elzm";
}
