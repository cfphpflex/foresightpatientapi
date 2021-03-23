<?php
	
	use App\User;
	use Illuminate\Database\Migrations\Migration;
	use Illuminate\Database\Schema\Blueprint;
	use Illuminate\Support\Carbon;
	use Illuminate\Support\Facades\DB;
	use Illuminate\Support\Facades\Hash;
	use Illuminate\Support\Facades\Schema;
 
	
	class CreatePatientAppointmentsTable extends Migration
	{
		/**
		 * Run the migrations.
		 *
		 * @return void
		 
		 *
		 */
		public function up()
		{
			Schema::create('patient_appointments', function (Blueprint $table) {
				$table->id()->unique();
				$table->integer('patient_id')->nullable();
				$table->string('fullname')->nullable();
				$table->string('startdate')->nullable();
				$table->string('starttime')->nullable();
				$table->string('title')->nullable();
				$table->integer('status_id')->default(1);
				
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
			Schema::dropIfExists('users');
		}
	}
 
