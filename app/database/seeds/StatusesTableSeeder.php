<?php

class StatusesTableSeeder extends Seeder
{
	public function run()
	{
		DB::table('statuses')->delete();
		// Pateiktas / Primtas / Išsiųstas /Atmestas
		$statuses = array('Pateiktas'=>'bg-info','Priimtas'=>'bg-primary','Išsiųstas'=>'bg-success','Atmestas'=>'bg-danger');

		foreach ($statuses as $status => $class) 
		{
			Status::create(['status'=>$status,'class'=>$class]);
		}
	}
}