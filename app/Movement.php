<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movement extends Model
{
    protected $fillable = ['tenDeno', 'fiveDeno'];
    
    public static function grandOutFlow()
    {
        return self::selectRaw('sum(tenDeno) as tenDeno, sum(fiveDeno) as fiveDeno')
            ->where('type', 'output')
            ->get();
    }

    public static function grandInFlow()
    {
        return self::selectRaw('sum(tenDeno) as tenDeno, sum(fiveDeno) as fiveDeno')
            ->where('type', 'input')
            ->get();
    }
}
