<?php

namespace App\Models;

class Logout extends Base
{
    function __construct()
    {
        parent::__construct();
        $this->table = 'logouts';
    }
}
