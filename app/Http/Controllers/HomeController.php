<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
//use Mail;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    	$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
    	$users = DB::table('tbl_preferences')
    	->join('tbl_user', 'tbl_preferences.userId', '=', 'tbl_user.id')
    	->join('tbl_pref_master', 'tbl_preferences.preferenceId', '=', 'tbl_pref_master.id')
    	->select('tbl_user.*', 'tbl_pref_master.preferenceName')
    	->get();
    	return view('admin_dashboard',compact('users'));
    	
    }
    public function handleAdmin(Request $request)
    {
    	if($request->userName  && $request->emailAddress){
    		$users = DB::table('tbl_preferences')
    		->join('tbl_user', 'tbl_preferences.userId', '=', 'tbl_user.id')
    		->join('tbl_pref_master', 'tbl_preferences.preferenceId', '=', 'tbl_pref_master.id')
    		->select('tbl_user.*', 'tbl_pref_master.preferenceName')
    		->where([['tbl_user.userName', 'LIKE', '%'.$request->userName.'%'],['tbl_user.emailAddress', 'LIKE', '%'.$request->emailAddress.'%']])
    		->get();
    	} else if($request->userName){

    		$users = DB::table('tbl_preferences')
    		->join('tbl_user', 'tbl_preferences.userId', '=', 'tbl_user.id')
    		->join('tbl_pref_master', 'tbl_preferences.preferenceId', '=', 'tbl_pref_master.id')
    		->select('tbl_user.*', 'tbl_pref_master.preferenceName')
    		->where([['tbl_user.userName', 'LIKE', '%'.$request->userName.'%']])
    		->get();

    	}else if($request->emailAddress){
    		$users = DB::table('tbl_preferences')
    		->join('tbl_user', 'tbl_preferences.userId', '=', 'tbl_user.id')
    		->join('tbl_pref_master', 'tbl_preferences.preferenceId', '=', 'tbl_pref_master.id')
    		->select('tbl_user.*', 'tbl_pref_master.preferenceName')
    		->where([['tbl_user.emailAddress', 'LIKE', '%'.$request->emailAddress.'%']])
    		->get();
    	}else{
    		
    		$users = DB::table('tbl_preferences')
    		->join('tbl_user', 'tbl_preferences.userId', '=', 'tbl_user.id')
    		->join('tbl_pref_master', 'tbl_preferences.preferenceId', '=', 'tbl_pref_master.id')
    		->select('tbl_user.*', 'tbl_pref_master.preferenceName')
    		->get();
    	}
    	return view('admin_dashboard',compact('users'));
    	
    }
    public function User_Create()
    {
    	return view('User_Create');
    }

    public function user_edit($id)
    {
    	$tbl_user= DB::table('tbl_user')->where('id',$id)->first();
    	$tbl_pref_master= DB::table('tbl_pref_master')->where('id',$id)->first();
    	
    	return view('User_edit',compact('tbl_user','tbl_pref_master'));
    }
    

    public function User_insert(Request $request)
    {
    //  $request->validate([
    //     'userName' => 'required',
    //     'password' => 'required',
    //     'emailAddress' => 'required',
    //     'Profile_img' => 'required'
    // ]);
    	
    	if ($request->file('files')) {
    		$imagePath = $request->file('files');
    		$Profile_img = time().'.'.$imagePath->getClientOriginalName();
    		
    		$destinationPath = public_path('/images');
    		$imagePath->move($destinationPath, $Profile_img);
    	}else{
    		$Profile_img='test.png';
    	}
    	
    	$last_user_id=DB::table('tbl_user')->insertGetId(['userName' => $request->userName,'password' => $request->password,'emailAddress' => $request->emailAddress,'Profile_img' => $Profile_img]);
    	if($request->preferenceName){
    		$str = $request->preferenceName;
    		$preferenceName= implode(" ",$str);
    	}else{
    		$preferenceName= 'NULL';   
    	}

    	$last_pref_id=DB::table('tbl_pref_master')->insertGetId(['preferenceName' => $preferenceName]);

    	$last_pref_id=DB::table('tbl_preferences')->insert(['userId' => $last_user_id,'preferenceId' => $last_pref_id]);
    	
    	return redirect()->route('admin.route')->with('success', 'your data insert successfully');
    }
    public function User_update(Request $request)
    {
    	
    //  $request->validate([
    //     'userName' => 'required',
    //     'password' => 'required',
    //     'emailAddress' => 'required',
    //     'Profile_img' => 'required'
    // ]);
    	
    	if ($request->file('files')) {
    		$imagePath = $request->file('files');
    		$Profile_img = time().'.'.$imagePath->getClientOriginalName();
    		
    		$destinationPath = public_path('/images');
    		$imagePath->move($destinationPath, $Profile_img);
    	}else{
    		$Profile_img='test.png';
    	}
    	
    	$last_user_id=DB::table('tbl_user')->where('id',$request->tbl_user_id)->update(['userName' => $request->userName,'password' => $request->password,'emailAddress' => $request->emailAddress,'Profile_img' => $Profile_img]);

    	if($request->preferenceName){
    		$str = $request->preferenceName;
    		$preferenceName= implode(" ",$str);
    	}else{
    		$preferenceName= 'NULL';   
    	}

    	$last_pref_id=DB::table('tbl_pref_master')->where('id',$request->tbl_pref_master)->update(['preferenceName' => $preferenceName]);
    	
    	return redirect()->route('admin.route')->with('massage', 'your data update successfully');
    }
    public function user_delete($id)
    {
    	
    	$data=DB::table('tbl_user')->where('id',$id)->delete();
    	$data=DB::table('tbl_pref_master')->where('id',$id)->delete();
    	return redirect()->route('admin.route')->with('delete_massage', 'your data delete successfully');
    }

    
  }
