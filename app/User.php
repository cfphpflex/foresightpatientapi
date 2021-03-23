<?php
	
	namespace App;
	
	use Illuminate\Contracts\Auth\MustVerifyEmail;
	use Illuminate\Foundation\Auth\User as Authenticatable;
	use Illuminate\Notifications\Notifiable;
	use Illuminate\Support\Carbon;
	use Illuminate\Support\Facades\Hash;
	use Tymon\JWTAuth\Contracts\JWTSubject;
	
	class User extends Authenticatable implements JWTSubject
	{
		use Notifiable;
		public const TABLE_NAME			= 'users';
		
		public const NAME				= 'name';
		public const EMAIL				= 'email';
		public const EMAIL_VERIFIED_ID	= 'email_verified_at';
		public const PASSWORD			= 'password';
		public const STATUS_ID			= 'status_id';
		
		public const CREATED_AT 		= 'created_at';
		public const UPDATED_AT			= 'updated_at';
		
		
		
		/**
		 * The attributes that are mass assignable.
		 *
		 * @var array
		 */
		protected $fillable = [
			'name', 'email', 'password','status_id',
		];
		
		/**
		 * The attributes that should be hidden for arrays.
		 *
		 * @var array
		 */
		protected $hidden = [
			'password', 'remember_token',
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
		
		/*public function setPasswordAttribute($password)
		{
			$this->attributes['password'] = bcrypt($password);
		}*/
	}
