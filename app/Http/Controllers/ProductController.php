<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;

class ProductController extends Controller
{
  public function getDanhSach() {
  	$product = Product::all();
    return view('admin.product.danhsach', ['product' => $product]);
  }

  public function getThem() {
    $theloai = Category::all();
  	return view('admin.product.them', ['theloai' => $theloai]);
  }

  public function postThem(Request $request) {
  	$this->validate($request, 
      [
        'name' => 'required|unique:products,name|min:3|max:100',
        'category' => 'required',
        'author' => 'required',
        'publisher' => 'required',
        'unit_price' => 'required',
        'promotion_price' => 'required',
        'amount' => 'required',
        'book_size' => 'required',
        'image' => 'required',
        'year_publish' => 'required',
        'description' => 'required',
      ],
      [
        'name.required' => 'chưa nhập tên sách',
        'name.unique' => 'Tên sách đã tồn tại',
        'name.min' => 'Tên sách phải nhiều hơn 3 chữ cái',
        'name.max' => 'Tên sách phải ít hơn 100 chữ cái',
        'category.required' => 'Chưa chọn thể loại sách',
        'author.required' => 'Chưa nhập tên tác giả',
        'publisher.required' => 'Chưa nhập nhà xuất bản',
        'unit_price.required' => 'Chưa nhập giá thực',
        'promotion_price.required' => 'Chưa nhập giá khuyến mãi',
        'amount.required' => 'Chưa nhập số lượng sách',
        'pages.required' => 'Chưa nhập số trang',
        'book_size.required' => 'Chưa nhập kích thước',
        'image.required' => 'Chưa nhập tên ảnh',
        'year_publish.required' => 'Chưa nhập năm xuất bản',
        'description.required' => 'Chưa nhập mô tả',
      ]);

    $product = new Product;
    $product->name = $request->name;
    // $product->TenKhongDau = changeTitle($request->Ten);
    $product->id_category = $request->category;
    $product->author = $request->author;
    $product->publisher = $request->publisher;
    $product->unit_price = $request->unit_price;
    $product->promotion_price = $request->promotion_price;
    $product->amount = $request->amount;
    $product->pages = $request->pages;
    $product->book_size = $request->book_size;
    $product->image = $request->image;
    $product->year_publish = $request->year_publish;
    $product->description = $request->description;
    $product->save();

    return redirect('admin/product/them')->with('thongbao', 'Thêm Thành Công');
  }

  public function getSua($id) {
    $theloai = Category::all();
    $product = Product::find($id);
    return view('admin.product.sua', ['product' => $product, 'theloai' => $theloai]);
  }

  public function postSua(Request $request, $id) {
    $this->validate($request, 
      [
        'name' => 'required|unique:products,name|min:3|max:100',
        'category' => 'required',
        'author' => 'required',
        'publisher' => 'required',
        'unit_price' => 'required',
        'promotion_price' => 'required',
        'amount' => 'required',
        'book_size' => 'required',
        'image' => 'required',
        'year_publish' => 'required',
        'description' => 'required',
      ],
      [
        'name.required' => 'chưa nhập tên sách',
        'name.unique' => 'Tên sách đã tồn tại',
        'name.min' => 'Tên sách phải nhiều hơn 3 chữ cái',
        'name.max' => 'Tên sách phải ít hơn 100 chữ cái',
        'category.required' => 'Chưa chọn thể loại sách',
        'author.required' => 'Chưa nhập tên tác giả',
        'publisher.required' => 'Chưa nhập nhà xuất bản',
        'unit_price.required' => 'Chưa nhập giá thực',
        'promotion_price.required' => 'Chưa nhập giá khuyến mãi',
        'amount.required' => 'Chưa nhập số lượng sách',
        'pages.required' => 'Chưa nhập số trang',
        'book_size.required' => 'Chưa nhập kích thước',
        'image.required' => 'Chưa nhập tên ảnh',
        'year_publish.required' => 'Chưa nhập năm xuất bản',
        'description.required' => 'Chưa nhập mô tả',
      ]);

    $product = Product::find($id);
    $product->name = $request->name;
    // $product->TenKhongDau = changeTitle($request->Ten);
    $product->id_category = $request->category;
    $product->author = $request->author;
    $product->publisher = $request->publisher;
    $product->unit_price = $request->unit_price;
    $product->promotion_price = $request->promotion_price;
    $product->amount = $request->amount;
    $product->pages = $request->pages;
    $product->book_size = $request->book_size;
    $product->image = $request->image;
    $product->year_publish = $request->year_publish;
    $product->description = $request->description;
    $product->save();

    return redirect('admin/product/sua/' . $id)->with('thongbao', 'Sửa thành công');
  }

  public function getXoa($id) {
    $product = Product::find($id);
    $product->delete();
    return redirect('admin/product/danhsach')->with('thongbao', 'Đã xóa thành công');
  }


}
