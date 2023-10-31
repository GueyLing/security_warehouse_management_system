<?php

namespace App\Http\Controllers\Admin;

use Hash;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Logging;
use Illuminate\Support\Facades\Auth;
use App\Rules\StrongPassword;

class DashboardController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
      }

      public function index() {
        $users = User::where('role', '=','purchasing_staff')->get();
        foreach ($users as $user) {
          $user->phone_no = decrypt($user->phone_no);
          $user->ic_passport_no = decrypt($user->ic_passport_no);
      }
        return view('admin.dashboard', compact('users'));
      }

      public function addStaff(){
        return view('admin.addstaff');
      }

      public function store(Request $req){
        $req->validate([
          'name'=>'required',
          'email'=>'required | email',
          'password'=>['required', 'string', 'min:8', new StrongPassword]
        ]);
        try{
        $users = new User;
        $users->name=$req->name;
        $users->email=$req->email;
        $users->password=Hash::make($req->password);
        $users->role="purchasing_staff";
        $users->phone_no=encrypt($req->phone_no);
        $users->ic_passport_no=encrypt($req->ic_passport_no);
        // $users->by_admin = Auth::user()->name;
        // $users->action="Added new purchasing staff";
        $users->save();
          
        $logs = new Logging;
        $logs->admin_name = Auth::user()->name;
        $logs->action="Added new purchasing staff";
        $logs->employee_name = $req->name;
        $logs->save();
      }catch (\Exception $e) {
        return redirect()->back()->with('error','Data is not added successfully. Please use another email. ');
      }
        return redirect()->action('App\Http\Controllers\Admin\DashboardController@index');
      }

      public function delete($id){
      $users = User::find($id);
      $users->delete();
      return redirect()->action('App\Http\Controllers\Admin\DashboardController@index');
      }

      public function showData($id){
        $users = User::find($id);
        if ($users) {
          $users->phone_no = decrypt($users->phone_no);
          $users->ic_passport_no = decrypt($users->ic_passport_no);
      }  
      return view('admin.editstaff', compact('users'));
      }

      public function edit(Request $req){
        $req->validate([
          'name'=>'required',
          'email'=>'required | email',
          'password'=>'nullable | min:8'
        ]);
        try{
        $users = User::find($req->id);
        $users->name=$req->name;
        $users->email=$req->email;
        if (isset($req->password))
        $users->password=Hash::make($req->password);
        $users->phone_no=encrypt($req->phone_no);
        $users->ic_passport_no=encrypt($req->ic_passport_no);
        $users->role=$req->role;
        $users->save();

        $logs = new Logging;
        $logs->admin_name = Auth::user()->name;
        $logs->action="Edited purchasing staff info";
        $logs->employee_name = $req->name;
        $logs->save();
        }catch (\Exception $e) {
          return redirect()->back()->with('error','Data is not added successfully. Please use another email. ');
        }
        return redirect()->action('App\Http\Controllers\Admin\DashboardController@index');
      }







      public function indexWarehouse() {
        $users = User::where('role', '=','warehouse_staff')->get();
        foreach ($users as $user) {
          $user->phone_no = decrypt($user->phone_no);
          $user->ic_passport_no = decrypt($user->ic_passport_no);
      }
        return view('admin.warehouselist', compact('users'));
      }

      public function addStaffWarehouse(){
        return view('admin.addstaffwarehouse');
      }

      public function storeWarehouse(Request $req){
        $req->validate([
          'name'=>'required',
          'email'=>'required | email',
          'password'=>['required', 'string', 'min:8', new StrongPassword]
        ]);
        
        try{
        $users = new User;
        $users->name=$req->name;
        $users->email=$req->email;
        $users->password=Hash::make($req->password);
        $users->role="warehouse_staff";
        $users->phone_no=encrypt($req->phone_no);
        $users->ic_passport_no=encrypt($req->ic_passport_no);
        // $users->by_admin = Auth::user()->name;
        // $users->action="Added new warehouse staff";
        $users->save();

        $logs = new Logging;
        $logs->admin_name = Auth::user()->name;
        $logs->action="Added new warehouse staff";
        $logs->employee_name = $req->name;
        $logs->save();
      }catch (\Exception $e) {
        return redirect()->back()->with('error','Data is not added successfully. Please use another email. ');
      }
        return redirect()->action('App\Http\Controllers\Admin\DashboardController@indexWarehouse');
      }

      public function deleteWarehouse($id){
      $users = User::find($id);
      $users->delete();
      return redirect()->action('App\Http\Controllers\Admin\DashboardController@indexWarehouse');
      }

      public function showDataWarehouse($id){
        $users = User::find($id);
        if ($users) {
          $users->phone_no = decrypt($users->phone_no);
          $users->ic_passport_no = decrypt($users->ic_passport_no);
      }  
      return view('admin.editstaffwarehouse', compact('users'));
      }

      public function editWarehouse(Request $req){
        $req->validate([
          'name'=>'required',
          'email'=>'required | email',
          'password'=>'nullable | min:8'
        ]);
        try{
        $users = User::find($req->id);
        $users->name=$req->name;
        $users->email=$req->email;
        if (isset($req->password))
        $users->password=Hash::make($req->password);
        $users->phone_no=encrypt($req->phone_no);
        $users->ic_passport_no=encrypt($req->ic_passport_no);
        $users->role=$req->role;
        $users->save();

        $logs = new Logging;
        $logs->admin_name = Auth::user()->name;
        $logs->action="Edited warehouse staff info";
        $logs->employee_name = $req->name;
        $logs->save();
      
      }catch (\Exception $e) {
          return redirect()->back()->with('error','Data is not added successfully. Please use another email. ');
        }
        return redirect()->action('App\Http\Controllers\Admin\DashboardController@indexWarehouse');
      }

      public function logging() {
        $users = Logging::orderBy('updated_at', 'desc')->get();
        return view('admin.logging', [
          'users' => $users,
      ]);
      }
}
