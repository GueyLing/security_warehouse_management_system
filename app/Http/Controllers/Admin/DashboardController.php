<?php

namespace App\Http\Controllers\Admin;

use Hash;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class DashboardController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
      }

      public function index() {
        $users = User::where('role', '=','purchasing_staff')->get();
        return view('admin.dashboard', [
          'users' => $users,
      ]);
      }

      public function addStaff(){
        return view('admin.addstaff');
      }

      public function store(Request $req){
        $req->validate([
          'name'=>'required',
          'email'=>'required | email',
          'password'=>'required | min:8'
        ]);
        try{
        $users = new User;
        $users->name=$req->name;
        $users->email=$req->email;
        $users->password=Hash::make($req->password);
        $users->role="purchasing_staff";
        $users->save();}catch (\Exception $e) {
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
        return view('admin.editstaff',['users'=>$users]);
      }

      public function edit(Request $req){
        $req->validate([
          'name'=>'required',
          'email'=>'required | email',
          'password'=>'required | min:8'
        ]);
        try{
        $users = User::find($req->id);
        $users->name=$req->name;
        $users->email=$req->email;
        $users->password=Hash::make($req->password);
        $users->role="purchasing_staff";
        $users->save();}catch (\Exception $e) {
          return redirect()->back()->with('error','Data is not added successfully. Please use another email. ');
        }
        return redirect()->action('App\Http\Controllers\Admin\DashboardController@index');
      }







      public function indexWarehouse() {
        $users = User::where('role', '=','warehouse_staff')->get();
        return view('admin.warehouselist', [
          'users' => $users,
      ]);
      }

      public function addStaffWarehouse(){
        return view('admin.addstaffwarehouse');
      }

      public function storeWarehouse(Request $req){
        $req->validate([
          'name'=>'required',
          'email'=>'required | email',
          'password'=>'required | min:8'
        ]);
        
        try{
        $users = new User;
        $users->name=$req->name;
        $users->email=$req->email;
        $users->password=Hash::make($req->password);
        $users->role="warehouse_staff";
        $users->save();}catch (\Exception $e) {
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
        return view('admin.editstaffwarehouse',['users'=>$users]);
      }

      public function editWarehouse(Request $req){
        $req->validate([
          'name'=>'required',
          'email'=>'required | email',
          'password'=>'required | min:8'
        ]);
        try{
        $users = User::find($req->id);
        $users->name=$req->name;
        $users->email=$req->email;
        $users->password=Hash::make($req->password);
        $users->role="warehouse_staff";
        $users->save();}catch (\Exception $e) {
          return redirect()->back()->with('error','Data is not added successfully. Please use another email. ');
        }
        return redirect()->action('App\Http\Controllers\Admin\DashboardController@indexWarehouse');
      }
}
