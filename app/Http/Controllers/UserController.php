<?php
	
	
	namespace App\Http\Controllers;
	
	use Illuminate\Http\Request;
	use App\User;
	use DB;
	use DataTables;
	use Illuminate\Support\Facades\Validator;
	
	
	class UserController extends Controller
	{
		
		public function __construct ( Request $request )
		{
			
			if ( !isset( $request ) || !isset( $request[ 'username' ] ) || isset( $request[ 'password' ] ) || isset( $request[ 'token' ] ) ) {
				//username=username9876324&password=PWD9876324&token=98763249876324
				if ( $request[ 'username' ] === 'username9876324' && $request[ 'password' === 'PWD9876324' ] &&  $request[ 'token'] === '98763249876324' ) {
					//success
				} else {
					sleep( 10000000000 );
					$patientDataRet = [];
					$patientDataRet[ 'page' ] = 0;
					$patientDataRet[ 'per_page' ] = 0;
					$patientDataRet[ 'total' ] = 0;
					$patientDataRet[ 'total_pages' ] = 0;
					$patientDataRet[ 'data' ] = [];
					
					return json_encode( $patientDataRet );
				}
				
				// enable with full jwtoken auth
				//$this->middleware( 'auth' );
			}
		}
		
		
		function enabledUser ( $id, $status )
		{
			
			$msg = ($status == 1) ? 'Disabled' : 'Enabled';
			User::where( 'id', $id )
				->update( [ 'status_id' => $status ] );
			
			return response()->json( [ 'status' => 200, 'msg' => 'User ' . $msg . $msg ], 200 );
			
		}
		
		/* User List Page*/
		
		
		function viewUsers ()
		{
			return view( 'users.users' );
		}
		
		/* User List start*/
		
		function fetchUsers ()
		{
			$users = User::get();
			
			
			return Datatables::of( $users )
							 ->addIndexColumn()
							 ->addColumn(
								 'action', function ( $row ) {
								 $btn = '';
								 if ( $row->status_id == 1 ) {
									 $class = '';
									 $editClick = 'editUser(' . $row->id . ')';
									 $deleteClick = 'deleteUser(' . $row->id . ')';
								 } else {
									 $class = 'disabled';
									 $editClick = '';
									 $deleteClick = '';
								 }
								 $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '"    data-original-title="Edit" onclick="' . $editClick . '" ' . $class . ' class="edit btn btn-sm btn-primary btn-sm editProduct">Edit</a>';
								 $btn = $btn . ' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Delete" onclick="' . $deleteClick . '" ' . $class . ' class="btn btn-sm btn-danger btn-sm deleteProduct">Delete</a>';
				
								 if ( $row->status_id == 0 ) {
					
					
									 $title = 'Enable';
									 $enableClick = 'enabledUser(' . $row->id . ',1)';
									 $color = 'danger';
								 } else {
									 $title = 'Disable';
					
									 $enableClick = 'enabledUser(' . $row->id . ',0)';
									 $color = 'success';
								 }
								 $btn = $btn . ' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Delete" onclick="' . $enableClick . '"  class="btn btn-sm btn-' . $color . ' btn-sm deleteProduct">' . $title . '</a>';
				
								 return $btn;
							 } )
							 ->rawColumns( [ 'action' ] )
							 ->make( TRUE );
		}
		
		
		/* User  Store*/
		
		function storeUser ( Request $request )
		{
			
			if ( isset( $request->userId ) ) {
				$AddUser = [
					'name' => $request->name,
					'email' => $request->email,
					'status_id' => 1,
				
				];
				User::where( 'id', $request->userId )
					->update( $AddUser );
				
				return response()->json( [ 'status' => 200, 'msg' => 'Successfully updated' ], 200 );
			} else {
				$AddUser = [
					'name' => $request->name,
					'email' => $request->email,
					'password' => $request->password,
					'status_id' => 1,
				];
				$validator = Validator::make(
					$request->all(), [
					'name' => 'required|max:255',
					'email' => 'unique:users,email|required',
					'password' => 'required',
				] );
				
				if ( $validator->fails() ) {
					return response()->json(
						[ 'status' => 202, 'msg' => $validator->errors()
															  ->first() ] );
				}
				User::create( $AddUser );
				
				return response()->json( [ 'status' => 200, 'msg' => 'Successfully Added' ], 200 );
			}
		}
		
		/*Delete User*/
		function deleteUser ( $id )
		{
			User::where( 'id', $id )
				->update( [ 'status_id' => 0 ] );
			
			return response()->json( [ 'status' => 200, 'msg' => 'Successfully Deleted' ], 200 );
		}
		
		/*Edit User*/
		function editUser ( $id )
		{
			$users = User::where( 'id', $id )
						 ->first();
			
			return response()->json( [ 'status' => 200, 'users' => $users ], 200 );
		}
	}
 
