<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Customer;
use App\Order;
use App\OrderDetail;
use App\Product;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class OrderController extends Controller
{
  public function getDanhSach() {
  	$order = Order::all();
    // $customer = Customer::all();
    return view('admin.order.danhsach', ['order' => $order]);
  }

  public function getThem() {
    $theloai = TheLoai::all();
    $loaitin = LoaiTin::all();
    return view('admin.tintuc.them', ['theloai' => $theloai, 'loaitin' => $loaitin]);
  }

  public function postThem(Request $request) {
  	$this->validate($request, 
      [
        'LoaiTin' => 'required',
        'TieuDe' => 'required|min:3|unique:TinTuc,TieuDe',
        'TomTat' => 'required',
        'NoiDung' => 'required'
      ],
      [
        'LoaiTin.required' => "chua chon",
        'LoaiTin.min' => "phai nhieu hon 3 chu cai",
        'LoaiTin.unique' => 'da ton tai',
        'TieuDe.required' => "chua chon",
        'TomTat.required' => "chua chon",
        'NoiDung.required' => "chua chon",
      ]);

    $tintuc = new TinTuc;
    $tintuc->TieuDe = $request->TieuDe;
    $tintuc->TieuDeKhongDau = changeTitle($request->TieuDe);
    $tintuc->idLoaiTin = $request->LoaiTin;
    $tintuc->TomTat = $request->TomTat;
    $tintuc->NoiDung = $request->NoiDung;
    $tintuc->NoiBat = $request->NoiBat;
    $tintuc->SoLuotXem = 0;
    
    // Cach luu hinh anh sai
    // $tintuc->Hinh = $request->Hinh;
    // Cach luu hinh anh sai
    
    if($request->hasFile('Hinh')) {
      $file = $request->file('Hinh');
      $name = $file->getClientOriginalName();
      $duoi = $file->getClientOriginalExtension();
      if($duoi != 'jpg' && $duoi != 'jpeg' && $duoi != 'png') {
        return redirect('admin/tintuc/them')->with('loi', 'file phai co duoi la jpg, jpeg, png');
      }
      $hinh = str_random(4) . "_" . $name;
      while(file_exists("upload/tintuc/" . $hinh)) {
        $hinh = str_random(4) . "_" . $name;
      }
      $file->move("upload/tintuc", $hinh);
      $tintuc->Hinh = $hinh;
    }
    else {
      $tintuc->Hinh = "";
    }
    $tintuc->save();

    return redirect('admin/tintuc/them')->with('thongbao', 'them thanh cong');
  }

  public function getSua($id) {
    $order = Order::find($id);
    return view('admin.order.sua', ['order' => $order]);
  }

  public function postSua(Request $request, $id) {
    $order = Order::find($id);    
    $order->status = $request->status;
    // var_dump($order);
    $order->save(); 
    return redirect('admin/order/sua/' . $id)->with('thongbao', 'Sửa thành công');

  }

  public function getXoa($id) {
    $order = Order::find($id);
    $orderDetail = OrderDetail::where('id_order', $id);
    // var_dump($orderDetail);
    $orderDetail->delete();
    $order->delete();
    

    return redirect('admin/order/danhsach')->with('thongbao', 'xoa thanh cong');
  }

  public function getChiTiet($id) {
    $order = Order::find($id);
    $orderDetail = OrderDetail::where('id_order', $id)->get();
    // var_dump($orderDetail);
    // var_dump($order);
    // echo $orderDetail->product;
    // echo $order->customer->name;
    return view('admin.order.chitiet', ['order' => $order, 'orderDetail' => $orderDetail]);
  }

  public function getNgay() {
    $order = DB::table('order')->select(DB::raw('date_order as ngay_mua'), DB::raw('SUM(total) as doanh_thu'))->where('status', 1)->groupBy('date_order')->get();
    // var_dump($order);
    return view('admin.order.ngay', ['order' => $order]);
  }
  
  public function getThang() {
    // $order = DB::table('order')->select(DB::raw(date("m", strtotime("date_order"))) ,DB::raw('sum(total) as tongso'))->groupBy(date("m", strtotime("date_order")))->get();
    // $order = DB::table('order')->select(DB::raw('sum(total) as tongso'))->whereMonth('date_order', 5)->get();
    // var_dump($order);
    // // echo $order->tongso;
    // $order = DB::table('order')->select(DB::raw('date_order->format("Ym") as thang'))->groupBy('date_order->format("Ym")')->get();
    // var_dump($order);
    $order = DB::table('order')->select(DB::raw('month_order as thang'), DB::raw('SUM(total) as doanh_thu'))->where('status', 1)->groupBy('month_order')->get();
    return view('admin.order.thang', ['order' => $order]);
    // $mytime = Carbon::now();
    // echo $mytime->month;
    // $order = DB::table('order')->where()
  }

}
