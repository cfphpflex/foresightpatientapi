<?php
 
	namespace App;
	
	use Illuminate\Contracts\Auth\MustVerifyEmail;
	use Illuminate\Foundation\Auth\User as Authenticatable;
	use Illuminate\Notifications\Notifiable;
	use Illuminate\Support\Carbon;
	use Illuminate\Support\Facades\Hash;
	use Tymon\JWTAuth\Contracts\JWTSubject;
	
	
	class PatientAppointment extends Authenticatable implements JWTSubject
	{
		
		use Notifiable;
		public const TABLE_NAME			= 'patient_appointments';
		
		public const PATIENT_ID			= 'patient_id';
		public const FULLNAME			= 'fullname';
		public const STARTDATE			= 'startdate';
		public const STARTTIME			= 'starttime';
		public const TITLE				= 'title';
		public const STATUS_ID			= 'status_id';
		public const DATETIME			= 'datetime';
		
		public const CREATED_AT 		= 'created_at';
		public const UPDATED_AT			= 'updated_at';
		
		
		
		/**
		 * The attributes that are mass assignable.
		 *
		 * @var array
		 */
		protected $dates = [
			'created_at',
			'updated_at',
		
		];
		
		/**
		 * The attributes that should be cast to native types.
		 *
		 * @var array
		 */
		
		public function getJWTIdentifier ()
		{
			return $this->getKey();
		}
		
		public function getJWTCustomClaims ()
		{
			return [];
		}
		
	 
	}
