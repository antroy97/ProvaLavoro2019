<?php

// src/Twig/AppExtension.php
namespace App\Twig;

use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class AppExtension extends AbstractExtension
{
    public function getFunctions()
    {
        return [
            new TwigFunction('stampaOra', [$this, 'stampaOra']),
        ];
    }

    public function stampaOra()
    {
        return date('d/m/Y h:i:s a', time());
    }
}