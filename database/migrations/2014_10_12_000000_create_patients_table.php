<?php
	
	use App\User;
	use Illuminate\Database\Migrations\Migration;
	use Illuminate\Database\Schema\Blueprint;
	use Illuminate\Support\Carbon;
	use Illuminate\Support\Facades\DB;
	use Illuminate\Support\Facades\Hash;
	use Illuminate\Support\Facades\Schema;
 
	
	class CreatePatientsTable extends Migration
	{
		/**
		 * Run the migrations.
		 *
		 * @return void
		 
		 */
		public function up()
		{
			Schema::create('patients', function (Blueprint $table) {
				$table->id();
				$table->string('firstname')->nullable();
				$table->string('lastname')->nullable();
				$table->string('phone')->nullable();
				$table->string('email')->nullable();
				$table->string('email_verified_at')->nullable();
				$table->string('birthdate')->nullable();
				$table->integer('status_id')->default(1);
				$table->string('col0')->nullable();
				$table->string('col6')->nullable();
				
				$table->timestamps();
				
			});
		 
		}
		
		/**
		 * Reverse the migrations.
		 *
		 * @return void
		 */
		public function down()
		{
			Schema::dropIfExists('patients');
		}
	}
 
