<?php

namespace App\Http\Controllers\WarehouseStaff;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Stock;
use App\Models\Stocktake;
use App\Models\Stockadjustment;
use App\Models\Stockreceive;
use App\Models\Activitylog;
use App\Models\Stockissue;

class DashboardController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
      }

    public function index() {
      $stocks = Stockadjustment::all()->unique('invoice_prefix');
      return view('warehouse_staff.dashboard', [
        'stocks' => $stocks,
    ]);
    }

    public function stockTake() {
      $stocks = Stocktake::all()->unique('doc_no');
      return view('warehouse_staff.takestock', [
        'stocks' => $stocks,
    ]);
    }

    public function addNewStockTake() {
      $stocks = Stock::distinct()->get(['location']);
      return view('warehouse_staff.addnewstocktake', [
        'stocks' => $stocks,
    ]);
    }

    public function selectLocation(Request $req){
      $stocks = Stock::distinct()->get(['location']);
      $locations = Stock::where('location', '=',$req->location)->get();
      return view('warehouse_staff.addnewstocktake', [
        'locations' => $locations,
        'stocks' => $stocks,
    ]);}

    public function store(Request $request){
      foreach($request->input('code') as $key => $value) 
      {
           $item = new Stocktake;
           $item ->location = $request->location;
           $item ->doc_no = $request->docno;
           $item ->doc_date = $request->docdate;
           $item ->description = $request->description;
           $item ->product_name = $request->get('product_name')[$key];
           $item ->code = $request->get('code')[$key];
           $item ->quantity_available = $request->get('quantity_available')[$key];
           $item ->new_quantity = $request->get('new_quantity')[$key];
           $item ->quantity_adjusted = $request->get('quantity_adjusted')[$key];
           $item ->remark = $request->get('remark')[$key];
           // mention other fields here
           $item ->save();

           if ($request->get('quantity_adjusted')[$key] != 0){
            $stock = Stock::where('code', '=', $request->get('code')[$key])->first();
            $stock->quantity=$request->get('new_quantity')[$key];
            $stock->save();

            $newactivity = new Activitylog;
            $newactivity ->location = $request->location;
            $newactivity ->product_name = $request->get('product_name')[$key];
            $newactivity ->code = $request->get('code')[$key];
            $newactivity ->quantity = $request->get('new_quantity')[$key];
            $newactivity ->variance = $request->get('quantity_adjusted')[$key];
            $newactivity ->activity="Stock Take";
            // mention other fields here
            $newactivity ->save();
           }       
      }  
      return redirect()->action('App\Http\Controllers\WarehouseStaff\DashboardController@stockTake');
    }

    public function showData($doc_no){
      $stocks = Stocktake::where('doc_no', '=', $doc_no)->get();
      return view('warehouse_staff.showstocktake',['stocks'=>$stocks]);
    }

    public function showDatas($invoice_prefix){
      $stock = Stockissue::where('invoice_prefix', '=', $invoice_prefix)->get();
      return view('warehouse_staff.showstockissue',['stock'=>$stock]);
    }

    public function lowStockAlert(){
      $stocks = Stock::whereRaw('quantity < low_stock_alert')->get();
      return view('warehouse_staff.lowstockalert',['stocks'=>$stocks]);
    }

    public function stockReport(){
      $activities = Activitylog::orderBy('created_at', 'desc')->paginate(3);
      return view('warehouse_staff.stockreport',['activities'=>$activities]);
    }

    public function stockReceived() {
      $data = Stockreceive::all()->unique('docNo');
      return view('warehouse_staff.stockreceived_main', [
        'data' => $data,
    ]);
    }

    public function stockIssue() {
      $datas = Stockissue::all()->unique('invoice_prefix');
      return view('warehouse_staff.stockissue_main', [
        'datas' => $datas,
    ]);
    }

    public function addNewStockIssue(Request $req) {
      return view('warehouse_staff.stockissue_addnew');
    }

  public function addStockIssue(Request $req){
    foreach($req->input('prod_code') as $key => $value) 
     {

      $stockissue = new Stockissue;
      $stockissue ->invoice_prefix = filter_var($req ->invoice_prefix, FILTER_SANITIZE_STRING);
      $stockissue ->date = filter_var($req ->date, FILTER_SANITIZE_STRING);
      $stockissue ->customer = filter_var($req ->customer, FILTER_SANITIZE_STRING);
      $stockissue ->prod_code = filter_var($req ->get('prod_code')[$key], FILTER_SANITIZE_STRING);
      $stockissue ->prod_name = filter_var($req ->get('prod_name')[$key], FILTER_SANITIZE_STRING);
      $stockissue ->qty = filter_var($req ->get('qty')[$key], FILTER_SANITIZE_NUMBER_INT);
      $stockissue ->location =  filter_var($req ->get('location')[$key], FILTER_SANITIZE_STRING);
      $stockissue ->remark = filter_var($req ->get('remark')[$key], FILTER_SANITIZE_STRING);
      $stockissue ->save();

      $stock = Stock::where('code', '=', $req->get('prod_code')[$key])->first();
      $stock->quantity=$stock->quantity-$req->get('qty')[$key];
      $stock->save();
      
      $newactivity = new Activitylog;
      $newactivity ->location =   filter_var($req->get('location')[$key], FILTER_SANITIZE_STRING);
      $newactivity ->product_name =  filter_var($req->get('prod_name')[$key], FILTER_SANITIZE_STRING);
      $newactivity ->code =  filter_var($req->get('prod_code')[$key], FILTER_SANITIZE_STRING);
      $newactivity ->quantity =  $stock->quantity;
      $newactivity ->variance = '-'.$req->get('qty')[$key];
      $newactivity ->activity="Stock Issue";
      // mention other fields here
      $newactivity ->save();
     }
     return redirect()->action('App\Http\Controllers\WarehouseStaff\DashboardController@stockIssue');
    }

    public function showStockIssue($invoice_prefix){
      $datas = Stockissue::where('invoice_prefix', '=', $invoice_prefix)->get();
      return view('warehouse_staff.showstockissue',['datas'=>$datas]);
    }


    public function addNewStockReceived() {
      return view('warehouse_staff.stockreceived_addnew');
    }

   
    public function stockAdjustment() {
      $stocks = Stockadjustment::all()->unique('invoice_prefix');
      return view('warehouse_staff.dashboard', [
        'stocks' => $stocks,
    ]);
    }

    public function addStockAdjustment() {
      return view('warehouse_staff.stockadjustment_addnew');
    }

    public function storeStockAdjustment(Request $request){
      foreach($request->input('code') as $key => $value) 
      {
           $item = new Stockadjustment;
           $item ->invoice_prefix = $request->invoice_prefix;
           $item ->date = $request->date;
           $item ->description = $request->description;
           $item ->name = $request->get('name')[$key];
           $item ->code = $request->get('code')[$key];
           $item ->location = $request->get('location')[$key];
           $item ->quantity_available = $request->get('quantity_available')[$key];
           $item ->new_quantity = $request->get('new_quantity')[$key];
           $item ->quantity_adjusted = $request->get('quantity_adjusted')[$key];
           $item ->remark = $request->get('remark')[$key];
           // mention other fields here
           $item ->save();

           if ($request->get('quantity_adjusted')[$key] != 0){
            $stock = Stock::where('code', '=', $request->get('code')[$key])->first();
            $stock->quantity=$request->get('new_quantity')[$key];
            $stock->save();

            $newactivity = new Activitylog;
            $newactivity ->location =  $request->get('location')[$key];
            $newactivity ->product_name = $request->get('name')[$key];
            $newactivity ->code = $request->get('code')[$key];
            $newactivity ->quantity = $request->get('new_quantity')[$key];
            $newactivity ->variance = $request->get('quantity_adjusted')[$key];
            $newactivity ->activity="Stock Adjustment";
            // mention other fields here
            $newactivity ->save();
           }       
      }  
      return redirect()->action('App\Http\Controllers\WarehouseStaff\DashboardController@stockAdjustment');
    }

    public function showDataStockAdjustment($invoice_prefix){
      $stocks = Stockadjustment::where('invoice_prefix', '=', $invoice_prefix)->get();
      return view('warehouse_staff.showstockadjustment',['stocks'=>$stocks]);
    }

    public function retrieve(Request $request){
      $user_id = $request->id;

    if ($user_id !== "") {
        $stock = Stock::where('code', $user_id)->first();

        if ($stock) {
            $product = $stock->product_name;
            $quantity = $stock->quantity;
            $location = $stock->location;

            $result = [
                'product' => $product,
                'quantity' => $quantity,
                'location' => $location,
            ];

            return response()->json($result);
        }
    }

    return response()->json(['error' => 'Stock not found'], 404);
    }

    public function addStockReceive(Request $req){
      foreach($req->input('product_code') as $key => $value) 
       {
              
              $stockreceive = new Stockreceive;
              $stockreceive->docNo=$req->docNo;
              $stockreceive->docDate=$req->docDate;
              $stockreceive->description=$req->description;
              $stockreceive->product_code=$req->get('product_code')[$key];
              $stockreceive->product_name=$req->get('product_name')[$key];
              $stockreceive->quantity=$req->get('quantity')[$key];
              $stockreceive->location=$req->get('location')[$key];
              $stockreceive->remark=$req->get('remark')[$key];
              $stockreceive->save();

            $stock = Stock::where('code', '=', $req->get('product_code')[$key])->first();
            $stock->quantity=$stock->quantity+$req->get('quantity')[$key];
            $stock->save();
            
            $newactivity = new Activitylog;
            $newactivity ->location =  $req->get('location')[$key];
            $newactivity ->product_name = $req->get('product_name')[$key];
            $newactivity ->code = $req->get('product_code')[$key];
            $newactivity ->quantity = $stock->quantity;
            $newactivity ->variance = $req->get('quantity')[$key];
            $newactivity ->activity="Stock Received";
            // mention other fields here
            $newactivity ->save();
       }
       return redirect()->action('App\Http\Controllers\WarehouseStaff\DashboardController@stockReceived');
      }

      public function showStockReceive($docNo){
        $data = Stockreceive::where('docNo', '=', $docNo)->get();
        return view('warehouse_staff.showstockreceive',['data'=>$data]);
      }

      public function productMaintenance(){
        $stocks = Stock::all();
        return view('warehouse_staff.product',['stocks'=>$stocks]);
      }

      public function addNewProduct() {
        return view('warehouse_staff.addproduct');
      }

      public function storeProduct(Request $request){    
             $item = new Stock;
             $item ->location = filter_var($request->location, FILTER_SANITIZE_STRING);
             $item ->product_name = filter_var($request->product_name, FILTER_SANITIZE_STRING);
             $item ->code = filter_var($request->code, FILTER_SANITIZE_STRING);
             $item ->low_stock_alert = filter_var($request->low_stock_alert,  FILTER_SANITIZE_NUMBER_INT);
             $item ->save(); 
        return redirect()->action('App\Http\Controllers\WarehouseStaff\DashboardController@productMaintenance');
      }

      public function showProductData($id){
        $stocks = Stock::where('id', '=', $id)->get();
        return view('warehouse_staff.showproduct',['stocks'=>$stocks]);
      }

      public function deleteProduct($id){
        $stocks = Stock::find($id);
        $stocks->delete();
        return redirect()->action('App\Http\Controllers\WarehouseStaff\DashboardController@productMaintenance');
      }

      public function edit(Request $req){
      
        $users = Stock::find($req->id);
        $users->product_name=filter_var($req->product_name, FILTER_SANITIZE_STRING);
        $users->code=filter_var($req->code, FILTER_SANITIZE_STRING);
        $users->location=filter_var($req->location, FILTER_SANITIZE_STRING);
        $users->low_stock_alert=filter_var($req->low_stock_alert, FILTER_SANITIZE_NUMBER_INT);
        $users->save();      
        return redirect()->action('App\Http\Controllers\WarehouseStaff\DashboardController@productMaintenance');
      }
}
