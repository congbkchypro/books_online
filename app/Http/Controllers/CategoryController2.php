<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LoaiTin;
use App\TheLoai;

class LoaiTinController extends Controller
{
  public function getDanhSach() {
  	$loaitin = LoaiTin::all();
    return view('admin.loaitin.danhsach', ['loaitin' => $loaitin]);
  }

  public function getThem() {
    $theloai = TheLoai::all();
  	return view('admin.loaitin.them', ['theloai' => $theloai]);
  }

  public function postThem(Request $request) {
  	$this->validate($request, 
      [
        'Ten' => 'required|unique:LoaiTin,Ten|min:3|max:100',
        'TheLoai' => 'required'
      ],
      [
        'Ten.required' => 'chua nhap loai tin',
        'Ten.unique' => 'Loai Tin da ton tai',
        'Ten.min' => 'phai nhieu hon 3 chu cai',
        'Ten.max' => 'phai it hon 100 chu cai',
        'TheLoai' => 'chua chon the loai'
      ]);

    $loaitin = new LoaiTin;
    $loaitin->Ten = $request->Ten;
    $loaitin->TenKhongDau = changeTitle($request->Ten);
    $loaitin->idTheLoai = $request->TheLoai;
    $loaitin->save();

    return redirect('admin/loaitin/them')->with('thongbao', 'them thanh cong');
  }

  public function getSua($id) {
    $theloai = TheLoai::all();
    $loaitin = LoaiTin::find($id);
    return view('admin.loaitin.sua', ['loaitin' => $loaitin, 'theloai' => $theloai]);
  }

  public function postSua(Request $request, $id) {
    $this->validate($request, 
      [
        'Ten' => 'required|unique:LoaiTin,Ten|min:3|max:100',
        'TheLoai' => 'required'
      ],
      [
        'Ten.required' => 'chua nhap loai tin',
        'Ten.unique' => 'Loai Tin da ton tai',
        'Ten.min' => 'phai nhieu hon 3 chu cai',
        'Ten.max' => 'phai it hon 100 chu cai',
        'TheLoai' => 'chua chon the loai'
      ]);

    $loaitin = LoaiTin::find($id);
    $loaitin->Ten = $request->Ten;
    $loaitin->TenKhongDau = changeTitle($request->Ten);
    $loaitin->idTheLoai = $request->TheLoai;
    $loaitin->save();

    return redirect('admin/loaitin/sua/' . $id)->with('thongbao', 'sua thanh cong');
  }

  public function getXoa($id) {
    $loaitin = LoaiTin::find($id);
    $loaitin->delete();
    return redirect('admin/loaitin/danhsach')->with('thongbao', 'da xoa');
  }


}
