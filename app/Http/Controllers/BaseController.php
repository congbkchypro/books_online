<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Slide;
use App\Product;
use App\Category;
use App\Cart;
use Session;
use App\Customer;
use App\Order;
use App\OrderDetail;
use App\User;
use Hash;
use Auth;

class BaseController extends Controller
{

  public function getIndex(){
    $slide = Slide::all();
    // print_r($slide);
    $new_product = Product::where('new', 1)->paginate(4);
    $sanpham_khuyenmai = Product::where('promotion_price', '<>', 0)->paginate(4);
    // dd($new_product);
    return view('page.trangchu', compact('slide', 'new_product', 'sanpham_khuyenmai'));
    // return view('page.trangchu');
  }

  public function getLienHe(){
    return view('page.lien_he');
  }

  public function getGioiThieu(){
    return view('page.gioi_thieu');
  }

  public function getLoaiSanPham($type){
    $sp_theoloai = Product::where('id_category', $type)->paginate(6);
    $sp_khac = Product::where('id_category', '<>', $type)->paginate(6);
    $loai = Category::all();
    $loai_sp = Category::where('id', $type)->first();
    return view('page.loaisanpham', compact('sp_theoloai', 'sp_khac', 'loai', 'loai_sp'));
    
    // return view('page.loaisanpham');
  }

  public function getChiTiet(Request $req){
    $sanpham = Product::where('id', $req->id)->first();
    $sp_tuongtu = Product::where('id_category', $sanpham->id_category)->paginate(3);
  	return view('page.chitietsanpham', compact('sanpham', 'sp_tuongtu'));
  }

  public function getSignin() {
    return view('page.dangky');
  }

  public function postSignin(Request $req) {
    $this->validate($req,
    [
      'email' => 'required|email|unique:users,email',
      'password' => 'required|min:6|max:20',
      'fullname' => 'required',
      're_password' => 'required|same:password'
    ], 
    [
      'email.required' => "Vui lòng nhập email",
      'email.email' => "Không đúng định dạng email",
      'email.unique' => "email đã tồn tại",
      'password.required' => "Vui lòng nhập password",
      're_password.same' => "mật khẩu không giống nhau"
    ]);

    $user = new User();
    $user->full_name = $req->fullname;
    $user->email = $req->email;
    $user->password = Hash::make($req->password);
    $user->phone = $req->phone;
    $user->address = $req->address;
    $user->save();
    return redirect()->back()->with('thongbao', "Đã tạo tài khoản thành công");    
  }

  public function getLogin() {
    return view('page.dangnhap');
  }

  public function postLogin(Request $req) {
    $this->validate($req, 
      [
        'email' => 'required|email',
        'password' => 'required|min:6|max:20'
      ],
      [
        'email.required' => "Vui lòng nhập email",
        'email.email' => "email không đúng",
        'email.min' => "email có ít nhất 6 ký tự",
        'email.max' => "email có nhiều nhất 20 ký tự"
      ]);
    $credentials = array('email' => $req->email, 'password' => $req->password);
    if(Auth::attempt($credentials)) {
      return redirect()->back()->with(['flag' => 'success', 'message' => "Đăng nhập thành công"]);
    }
    else {
      return redirect()->back()->with(['flag' => 'danger', 'message' => "Đăng nhập không thành công"]);
    }

  }

  public function getLogout() {
    Auth::logout();
    return redirect()->route('trangchu');
  }

  public function getSearch(Request $req) {
    $product = Product::where('name', 'like', '%'.$req->key.'%')->orwhere('unit_price', $req->key)->paginate(6);
    return view('page.search', compact('product'));
  }

  public function getAddToCart(Request $req, $id) {
    $product = Product::find($id);
    $oldCart = Session('cart') ? Session::get('cart') : null;
    $cart = new Cart($oldCart);
    $cart->add($product, $id);
    $req->session()->put('cart', $cart);
    return redirect()->back();
  }

  public function getDelItemCart($id) {
    $oldCart = Session::has('cart') ? Session::get('cart') : null;
    $cart = new Cart($oldCart);
    $cart->removeItem($id);
    // Session::put('cart', $cart);
    if(count($cart->items) > 0) {
      Session::put('cart', $cart);  
    }
    else {
      Session::forget('cart');
    }
    return redirect()->back();
  }

  public function getCheckout() {
    return view('page.dat_hang');
  }

  public function postCheckout(Request $req) {
    $cart = Session::get('cart');
    // dd($cart);
    $customer = new Customer;
    $customer->name = $req->name;
    $customer->gender = $req->gender;
    $customer->email = $req->email;
    $customer->address = $req->address;
    $customer->phone_number = $req->phone;
    $customer->note = $req->notes;
    $customer->save();

    $order = new Order;
    $order->id_customer = $customer->id;
    $order->date_order = date('Y-m-d');
    $order->month_order = date('Y-m');
    $order->year_order = date('Y');
    $order->total = $cart->totalPrice;
    $order->payment = $req->payment_method;
    // $order->note = $req->notes;
    $order->save();

    foreach ($cart->items as $key => $value) {
      $order_detail = new OrderDetail;
      $product = Product::find($key);
      $order_detail->id_order = $order->id;
      $order_detail->id_product = $key;
      $order_detail->quantity = $value['qty'];
      $order_detail->unit_price = $value['price']/$value['qty'];
      $order_detail->save();
      $product->amount -= $value['qty'];
      $product->save();
    }
    Session::forget('cart');
    return redirect()->back()->with('thongbao', 'Đặt Hàng Thành Công');
  }

}