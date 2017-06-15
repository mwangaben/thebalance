<?php

namespace Tests\Feature;

use App\Benny\Mathematics\Solve;
use App\Movement;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class MovementTest extends TestCase
{

    use DatabaseTransactions, DatabaseMigrations;

    /** @test **/
    public function it_gets_new_balance_from_inflow()
    {
        factory(Movement::class)->create([
            'tenDeno'  => 1000,
            'fiveDeno' => 500,
            'type'     => 'input',
        ]);

        $this->assertEquals(3000, (new Solve())->newBalance('tenDeno', 2000));
    }

    /** @test **/
    public function it_gets_new_balance_from_outflow()
    {
        factory(Movement::class)->create([
            'tenDeno'  => 1000,
            'fiveDeno' => 500,
            'type'     => 'output',
        ]);

        $this->assertEquals(4000, (new Solve())->newBalance('tenDeno', 5000));
    }

    /** @test **/
    public function it_gets_new_balance_from_multiple_inflow()
    {
        factory(Movement::class)->create([
            'tenDeno'  => 4000,
            'fiveDeno' => 500,
            'type'     => 'input',
        ]);
        factory(Movement::class)->create([
            'tenDeno'  => 3000,
            'fiveDeno' => 500,
            'type'     => 'input',
        ]);

        $this->assertEquals(17000, (new Solve())->newBalance('tenDeno', 10000));

    }

      /** @test **/ 
	function it_gets_new_balance_from_multiple_outflow()
	{
		factory(Movement::class)->create([
             'tenDeno' => 1000,
             'fiveDeno' => 500,
             'type' => 'output',
			]);

		factory(Movement::class)->create([
             'tenDeno' => 2000,
             'fiveDeno' => 1000,
             'type' => 'output',
			]);

		$this->assertEquals(10000, (new Solve())->newBalance('tenDeno', 13000));
		
	}

	  /** @test **/ 
	function it_get_new_balance_from_both_inflow_and_outflow()
	{
          factory(MOvement::class)->create([
               'tenDeno' => 1000,
               'fiveDeno'=> 500,
               'type' => 'input'
          	]);

         factory(MOvement::class)->create([
              'tenDeno' => 2000,
              'fiveDeno' => 1000,
              'type' => 'output',
         ]);

         $this->assertEquals(4000, (new Solve())->newBalance('tenDeno', 5000)); 			
	}
}
