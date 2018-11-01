<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class UserController extends Controller
{
  public function getDanhSach() {
  	$user = User::all();
  	return view('admin.user.danhsach', ['user' => $user]);
  }

  public function getThem() {
    return view('admin.user.them');
  }

  public function postThem(Request $request) {
  	$this->validate($request, 
  		[
  		  'full_name' => 'required|min:3',
  		  'email' => 'required|unique:users,email|email',
  		  'password' => 'required|min:3|max:32',
  		  'passwordAgain' => 'required|same:password',
  		  'phone' => 'required',
  		  'address' => 'required'
  		], 
  		[
  		  'full_name.required' => 'chưa nhập tên',
  		  'full_name.min' => 'Tên phải nhiều hơn 3 chữ cái',
  		  'email.required' => 'Bạn chưa nhập email',
  		  'email.email' => 'Bạn chưa nhập đứng định dạng của email',
  		  'email.unique' => 'email đã tồn tại',
  		  'password.required' => 'Bạn chưa nhập password',
  		  'password.min' => 'password phải có ít nhất 3 chữ cái',
  		  'password.max' => 'password chỉ được tối đa 32 chữ cái',
  		  'passwordAgain.required' => 'Bạn chưa nhập passwordAgain',
  		  'passwordAgain.same' => 'password không khớp',
  		  'phone.required' => 'Bạn chưa nhập số điện thoại',
  		  'address.required' => 'Bạn chưa nhập địa chỉ'
  		]);
  	$user = new User;
  	$user->full_name = $request->full_name;
  	$user->email = $request->email;
  	$user->password = bcrypt($request->password);
  	$user->phone = $request->phone;
  	$user->address = $request->address;
  	$user->permission = $request->permission;
  	$user->save();

  	return redirect('admin/user/them')->with('thongbao', 'Thêm thành công');
  }

  public function getSua($id) {
    $user = User::find($id);
    return view('admin.user.sua', ['user' => $user]);
  }

  public function postSua(Request $request, $id) {
    $this->validate($request, 
  		[
  		  'full_name' => 'required|min:3',
  		  // 'email' => 'required|unique:users,email|email',
  		  // 'password' => 'required|min:3|max:32',
  		  // 'passwordAgain' => 'required|same:password',
  		  'phone' => 'required',
  		  'address' => 'required'
  		], 
  		[
  		  'full_name.required' => 'chưa nhập tên',
  		  'full_name.min' => 'Tên phải nhiều hơn 3 chữ cái',
  		  // 'email.required' => 'Bạn chưa nhập email',
  		  // 'email.email' => 'Bạn chưa nhập đứng định dạng của email',
  		  // 'email.unique' => 'email đã tồn tại',
  		  // 'password.required' => 'Bạn chưa nhập password',
  		  // 'password.min' => 'password phải có ít nhất 3 chữ cái',
  		  // 'password.max' => 'password chỉ được tối đa 32 chữ cái',
  		  // 'passwordAgain.required' => 'Bạn chưa nhập passwordAgain',
  		  // 'passwordAgain.same' => 'password không khớp',
  		  'phone.required' => 'Bạn chưa nhập số điện thoại',
  		  'address.required' => 'Bạn chưa nhập địa chỉ'
  		]);
  	$user = User::find($id);
  	$user->full_name = $request->full_name;
  	// $user->email = $request->email;
  	// $user->password = bcrypt($request->password);
  	$user->phone = $request->phone;
  	$user->address = $request->address;
  	$user->permission = $request->permission;
  	$user->save();
  	return redirect('admin/user/sua/' . $id)->with('thongbao', 'Bạn đã sửa thành công');
  }

  public function getXoa($id) {
    $user = User::find($id);
    $user->delete();
    return redirect('admin/user/danhsach')->with('thongbao', 'Đã xóa thành công');
  }

  public function getDangNhapAdmin() {
    return view('admin.login');
  }

  public function postDangNhapAdmin(Request $request) {
    $this->validate($request, 
    	[
    	  'email' => 'required',
    	  'password' => 'required|min:3|max:32'
    	],
    	[
    	  'email.required' => 'Bạn chưa nhập email',
    	  'password.required' => 'Bạn chưa nhập password',
    	  'password.min' => 'password phải có ít nhất 3 chữ cái',
    	  'password.max' => 'password có không quá 32 chữ cái'
    	]);
    if(Auth::attempt(['email' => $request->email, 'password' => $request->password]) && Auth::user()->permission == 1) {
      return redirect('admin/theloai/danhsach');
    }
    else {
      return redirect('admin/dangnhap')->with('thongbao', 'Bạn không có quyền truy cập');
    }
  }

  public function getDangXuatAdmin() {
  	Auth::logout();
  	return redirect('admin/dangnhap');
  }
}
