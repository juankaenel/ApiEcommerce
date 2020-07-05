<?php

namespace App\Exceptions;

use Exception;

class ProductNotBelogsToUser extends Exception
{
    public function render(){
        return ['errors' =>'Product Not Belongs to user'];
    }
}
