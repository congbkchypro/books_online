<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
  public function getDanhSach() {
  	$theloai = Category::all();
    return view('admin.theloai.danhsach', ['theloai' => $theloai]);
  }

  public function getThem() {
  	return view('admin.theloai.them');
  }

  public function postThem(Request $request) {
  	$this->validate($request, 
  		[
  		  'name' => 'required|min:3|max:100'
  		], 
  		[
  		  'name.required' => "Chưa nhập tên",
  		  'name.min' => 'Tên phải dài hơn 3 chữ cái',
  		  'name.max' => 'Tên phải ngắn hơn 100 chữ cái'
  		]);

    $theloai = new Category;
    $theloai->name = $request->name;
    // $theloai->TenKhongDau = changeTitle($request->Ten);
    $theloai->save();
    return redirect('admin/theloai/them')->with('thongbao', 'Thêm thành công');

  }

  public function getSua($id) {
    $theloai = Category::find($id);
    return view('admin.theloai.sua', ['theloai' => $theloai]);
  }

  public function postSua(Request $request, $id) {
    
    $theloai = Category::find($id);
    // var_dump($theloai);
    $this->validate($request, 
    	[
    	  'name' => 'required|unique:category,name|min:3|max:100'		
    	], 
    	[
    	  'name.required' => 'Chưa nhập tên',
    	  'name.unique' => 'Tên đã tồn tại',
    	  'name.min' => 'Tên phải dài hơn 3 chữ cái',
    	  'name.max' => 'Tên phải ngắn hơn 100 chữ cái'
    	]);
    $theloai->name = $request->name;
    // $theloai->TenKhongDau = changeTitle($request->Ten);
    $theloai->save();

    return redirect('admin/theloai/sua/' . $id)->with('thongbao', 'Sửa thành công');
  }

  public function getXoa($id) {
    $theloai = Category::find($id);
    $theloai->delete();

    return redirect('admin/theloai/danhsach')->with('thongbao', 'Đã xóa thành công');
  }


}
