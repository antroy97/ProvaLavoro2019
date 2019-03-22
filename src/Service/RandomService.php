<?php

// src/Service/RandomService.php
namespace App\Service;

class RandomService
{
    public function getRandom()
    {
        return rand();
    }
}
