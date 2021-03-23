<?php
	
	use App\User;
	use Illuminate\Database\Migrations\Migration;
	use Illuminate\Database\Schema\Blueprint;
	use Illuminate\Support\Carbon;
	use Illuminate\Support\Facades\DB;
	use Illuminate\Support\Facades\Hash;
	use Illuminate\Support\Facades\Schema;
 
	
	class CreateUsersTable extends Migration
	{
		/**
		 * Run the migrations.
		 *
		 * @return void
		 */
		public function up()
		{
			Schema::create('users', function (Blueprint $table) {
				$table->id();
				$table->string('name');
				$table->string('email')->unique();
				$table->timestamp('email_verified_at')->nullable();
				$table->string('password');
				$table->integer('status_id')->default(0);
				$table->rememberToken();
				$table->timestamps();
			});
			
			
			
			$now = Carbon::now();
			DB::table( User::TABLE_NAME )->insert
			(
				
				[
					User::NAME				=> 'e',
					User::EMAIL				=> 'e@gmail.com',
					User::EMAIL_VERIFIED_ID	=> NULL,
					User::PASSWORD			=> Hash::make( 'e123' ),
					User::STATUS_ID			=> 1,
					User::CREATED_AT		=> $now,
					User::UPDATED_AT		=> $now,
				]
			);
			
			
			// Emiliano's QA user persist when db recreate
			DB::table( User::TABLE_NAME )->insert
			(
				[
					User::NAME				=> 'liz',
					User::EMAIL				=> 'liz@gmail.com',
					User::EMAIL_VERIFIED_ID	=> NULL,
					User::PASSWORD			=> Hash::make( 'liz123' ),
					User::STATUS_ID			=> 1,
					User::CREATED_AT		=> $now,
					User::UPDATED_AT		=> $now,
				
				]
			);
			
			
			
			
			
			
			
		}
		
		/**
		 * Reverse the migrations.
		 *
		 * @return void
		 */
		public function down()
		{
			Schema::dropIfExists('users');
		}
	}
 
