<?php

namespace App\Models;

class Login extends Base
{
    function __construct()
    {
        parent::__construct();
        $this->table = 'logins';
    }
}
