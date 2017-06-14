<?php

namespace Tests\Feature;

use App\Movement;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class MovementTest extends TestCase
{

	use DatabaseTransactions, DatabaseMigrations;
      /** @test **/ 
	function it_check_if_the_user_can_pull_data()
	{
		$move = factory(Movement::class)->create();
		// $this->assertEquals(expected, actual);
		$this->assertDatabaseHas('movements', [
				'tenDeno' => $move->tenDeno,
				'fiveDeno' =>$move->fiveDeno,
				'type' => $move->type,
			]);
		
	}
}
