<?php

namespace App\Models;

class Subject extends Base
{
    function __construct()
    {
        parent::__construct();
        $this->table = 'subjects';
    }
}
