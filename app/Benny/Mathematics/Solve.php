<?php 

namespace App\Benny\Mathematics;


class Solve {
	
	public function updateBalance(array $data, $balance)
	{
		  if ($data['type'] == 'input') {
		  	    foreach ($data as $input) {
		  	    	$balance += $input;
		  	    }
		  }else {
		  	
		  }
	}
}
 ?>