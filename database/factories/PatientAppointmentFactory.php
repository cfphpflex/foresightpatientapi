<?php
	
	/** @var \Illuminate\Database\Eloquent\Factory $factory */
	
	use App\PatientAppointment;
	use Faker\Generator as Faker;
	use Illuminate\Support\Str;
	
	$factory->define(
		PatientAppointment::class, function ( Faker $faker ) {
		return [
			'patient_id' => $faker->randomDigit( 1, 100000 ),
			'fullname' => $faker->name,
			'startdate' => now(),
			'starttime' => now(),
			'title' => $faker->name,
			'status_id' => 1
		];
	} );
