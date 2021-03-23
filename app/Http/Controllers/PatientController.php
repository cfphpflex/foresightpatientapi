<?php
	
	namespace App\Http\Controllers;
	
	use Illuminate\Support\Facades\Storage;
	use Illuminate\Http\Request;
	use Datatables;
	use DB;
	//use Auth;
	
	use URL;
	use Helper;
	use Illuminate\Support\Facades\Log;
	
	class PatientController extends Controller
	{
		
		public function __construct ()
		{
		
		}
		
		//		patient Appts. recs for modal
		function index ( Request $request )
		{
			
			$this->checkUserSession( $request );
			
			$patientData = DB::table( 'patients' )
				
							 ->orderBy( 'patients.id', 'DESC' )
							 ->select(
								 'patients.id', 'patients.firstname', 'patients.lastname',
								 'patients.phone', 'patients.email', 'patients.birthdate' )
							 ->get();
			
			$patientDataRet = [];
			$patientDataRet[ 'page' ] = 1;
			$patientDataRet[ 'per_page' ] = 15;
			$patientDataRet[ 'total' ] = count( $patientData );
			$patientDataRet[ 'total_pages' ] = round( count( $patientData ) / $patientDataRet[ 'per_page' ] );
			$patientDataRet[ 'data' ] = $patientData;
			
			return json_encode( $patientDataRet );
			
		}
		
		//	check user creds
		function checkUserSession ( $request )
		{
			if ( !isset( $request ) || !isset( $request->username ) || !isset( $request->password ) || !isset( $request->token ) || $request->username !== 'username9876324' || $request->password !== 'PWD9876324' || $request->token === '98763249876324' ) {
				//sleep( 10000000000 );
				$patientDataRet = [];
				$patientDataRet[ 'page' ] = 0;
				$patientDataRet[ 'per_page' ] = 0;
				$patientDataRet[ 'total' ] = 0;
				$patientDataRet[ 'total_pages' ] = 0;
				$patientDataRet[ 'data' ] = [];
				
				return json_encode( $patientDataRet );
			}
			
		}

//		patient Appts. recs for modal
		function getmodalpatientsappointments ( Request $request )
		{
			$this->checkUserSession( $request );
			$fullname = $request->firstname. " " .$request->lastname;
			
			$patientData = DB::table( 'patient_appointments' )
							 ->where( 'patient_appointments.fullname', $fullname )
							 
							 ->orderBy( 'patient_appointments.startdate', 'ASC' )
							 ->select(
								 'patient_appointments.id','patient_appointments.fullname', 'patient_appointments.startdate', 'patient_appointments.starttime', 'patient_appointments.title'
							 )
							 ->get();
			
//			$patientDataRet = [];
//			$patientDataRet[ 'page' ] = 1;
//			$patientDataRet[ 'per_page' ] = 15;
//			$patientDataRet[ 'total' ] = count( $patientData );
//			$patientDataRet[ 'total_pages' ] = round( count( $patientData ) / $patientDataRet[ 'per_page' ] );
//
			$patientDataRet[ 'data' ] = $patientData;
			
			return json_encode( $patientDataRet );
			
		}

//		patient rec for modal
		function getmodalpatientinfo ( Request $request )
		{
			$this->checkUserSession( $request );
			
			
			$patientData = DB::table( 'patients' )
							 ->where( 'patients.firstname', $request->firstname )
							 ->where( 'patients.lastname', $request->lastname )
							 ->orderBy( 'patients.id', 'DESC' )
							 ->select(
								 'patients.id', 'patients.firstname', 'patients.lastname',
								 'patients.phone', 'patients.birthdate' )
							 ->get();
			
			$patientDataTemp = (array) json_decode($patientData, true);
			
			// print_r($patientDataTemp); die();
			
			$patientDataTemp[0]['initials']=  substr($patientDataTemp[0]['firstname'],0,1) . substr($patientDataTemp[0]['lastname'],0,1);
 			$patientDataRet = [];
//			$patientDataRet[ 'page' ] = 1;
//			$patientDataRet[ 'per_page' ] = 15;
//			$patientDataRet[ 'total' ] = count( $patientData );
//			$patientDataRet[ 'total_pages' ] = round( count( $patientData ) / $patientDataRet[ 'per_page' ] );

			$patientDataRet[ 'data' ] = $patientDataTemp;
			
			return json_encode( $patientDataRet );
			
		}
		
		
	}
	
