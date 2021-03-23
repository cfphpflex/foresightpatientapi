<?php
	
	namespace App;
	
	use Illuminate\Contracts\Auth\MustVerifyEmail;
	use Illuminate\Foundation\Auth\User as Authenticatable;
	use Illuminate\Notifications\Notifiable;
	use Illuminate\Support\Carbon;
	use Illuminate\Support\Facades\Hash;
	use Tymon\JWTAuth\Contracts\JWTSubject;
	
	
	class Patient extends Authenticatable implements JWTSubject
	{
		use Notifiable;
		public const TABLE_NAME			= 'patients';
		
		public const FIRSTNAME			= 'firstname';
		public const LASTNAME			= 'lastname';
		public const EMAIL				= 'email';
		public const EMAIL_VERIFIED_AT	= 'email_verified_at';
		public const BIRTHDATE			= 'birthdate';
		public const PHONE				= 'phone';
		public const STATUS_ID			= 'status_id';
		public const COL0				= 'col0';
		public const COL6				= 'col6';
	 
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
		
		public function getJWTIdentifier()
		{
			return $this->getKey();
		}
		public function getJWTCustomClaims()
		{
			return [];
		}
		
		
		protected $casts = [
			'email_verified_at' => 'datetime',
		];
		
		
	}
