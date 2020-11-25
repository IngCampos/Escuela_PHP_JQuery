<?php

namespace App\Models;

class LoginAttemp extends Base
{
    function __construct()
    {
        parent::__construct();
        $this->table = 'login_attemps';
    }
}
