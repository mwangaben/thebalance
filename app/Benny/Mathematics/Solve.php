<?php

namespace App\Benny\Mathematics;

use App\Movement;

class Solve
{


    public function newBalance($denomination, $balance)
    {
        $inputs  = Movement::all()->where('type', 'input')->sum($denomination);
        $outputs = Movement::all()->where('type', 'output')->sum($denomination);
        return $balance += $inputs - $outputs;

    }
}
