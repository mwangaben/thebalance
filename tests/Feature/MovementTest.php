<?php

namespace Tests\Feature;

use App\Movement;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class MovementTest extends TestCase
{

    // use DatabaseTransactions, DatabaseMigrations;
    /** @test **/
    public function it_fetches_a_total_of_inflow_only()
    {
        factory(Movement::class)->create([
            'tenDeno'  => 1000,
            'fiveDeno' => 2000,
            'type'     => 'input',
        ]);
        factory(Movement::class)->create([
            'tenDeno'  => 1000,
            'fiveDeno' => 2000,
            'type'     => 'input',
        ]);
        factory(Movement::class)->create([
            'tenDeno'  => 1000,
            'fiveDeno' => 2000,
            'type'     => 'output',
        ]);

        $data = Movement::grandInFlow();
        foreach ($data as $denos) {
            $this->assertEquals(2000, $denos->tenDeno);
        }

    }
    /** @test **/
    public function it_fetches_the_total_of_outflow_only()
    {
        factory(Movement::class)->create([
            'tenDeno'  => 2000,
            'fiveDeno' => 1000,
            'type'     => 'output',

        ]);

        factory(Movement::class)->create([
            'tenDeno'  => 2000,
            'fiveDeno' => 1000,
            'type'     => 'output',
        ]);
        factory(Movement::class)->create([
            'tenDeno'  => 1000,
            'fiveDeno' => 2000,
            'type'     => 'input',
        ]);

        $data = Movement::grandOutFlow();
        foreach ($data as $denos) {
            $this->assertEquals(4000, $denos->tenDeno);
        }
    }

}
