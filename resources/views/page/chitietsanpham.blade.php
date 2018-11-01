@extends('master')
@section('content')

<div class="inner-header">
	<div class="container">
		<div class="pull-left">
			<h6 class="inner-title">Sách " {{ $sanpham->name }} "</h6>
		</div>
		<div class="pull-right">
			<div class="beta-breadcrumb font-large">
				<a href="{{ route('trangchu') }}">Trang chủ</a> / <span>Chi tiết sản phẩm</span>
			</div>
		</div>
		<div class="clearfix"></div>
	</div>
</div>

<div class="container">
	<div id="content">
		<div class="row">
			<div class="col-sm-9">

				<div class="row">
					<div class="col-sm-4">
						<img src="source/image/product/{{ $sanpham->image }}" alt="">
					</div>
					<div class="col-sm-8">
						<div class="single-item-body">
							<h1><p class="single-item-title">{{ $sanpham->name }}</p></h1>
							<p class="single-item-title">Tác giả: {{ $sanpham->author }}</p>
							<!-- <h1>{{ $sanpham->name }}</h1> -->
							<p class="single-item-price">
								<span>Giá: </span>
						      @if($sanpham->promotion_price == 0)
							    <span class="flash-sale">{{ $sanpham->unit_price }} đồng</span>
						      @else
							    <span class="flash-del">{{ $sanpham->unit_price }} đồng</span>
							    <span class="flash-sale">{{ $sanpham->promotion_price }} đồng</span>
							  @endif
							</p>
						</div>

						<div class="clearfix"></div>
						<div class="space20">&nbsp;</div>

						<div class="single-item-desc">
							<p>Giới thiệu:</p>
							<p>{{ $sanpham->description }}</p>
						</div>
						<div class="space20">&nbsp;</div>

						<!-- <p>So Luong:</p> -->
						@if($sanpham->amount <= 5)
						<i class="beta-btn primary">Hết hàng</i>
						@else
						<div class="single-item-options">													
							<select class="wc-select" name="color">
								<option>Số Lượng</option>
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
								<option value="4">4</option>
								<option value="5">5</option>
							</select>
							<a class="add-to-cart" href="{{ route('themgiohang', $sanpham->id) }}""><i class="fa fa-shopping-cart"></i></a>
							<div class="clearfix"></div>
						</div>
						@endif
					</div>
				</div>

				<div class="space40">&nbsp;</div>
				<div class="woocommerce-tabs">
					<ul class="tabs">
						<!-- <li><a href="#tab-description">Description</a></li> -->
						<!-- <li><a href="#tab-reviews">Reviews (0)</a></li> -->
					</ul>

					<div class="panel" id="tab-description">
						<!-- <p>{{ $sanpham->description }}</p> -->
					</div>
					<!-- <div class="panel" id="tab-reviews">
						<p>No Reviews</p>
					</div> -->
				</div>
				<div class="space50">&nbsp;</div>
				<div class="beta-products-list">
					<h4>Sách cùng thể loại</h4>

					<div class="row">
						@foreach($sp_tuongtu as $sptt)
						  <div class="col-sm-4">
							<div class="single-item">
								<div class="single-item-header">
									@if($sptt->promotion_price != 0)
									<div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
									@endif
									<a href="{{ route('chitietsanpham', $sptt->id) }}"><img src="source/image/product/{{ $sptt->image }}" alt="" height="250px"></a>
								</div>
								<div class="single-item-body">
									<p class="single-item-title">{{ $sptt->name }}</p>
									<p class="single-item-price">
										@if($sptt->promotion_price == 0)
										  <span class="flash-sale">{{ $sptt->unit_price }} đồng</span>
										@else
										  <span class="flash-del">{{ $sptt->unit_price }} đồng</span>
										  <span class="flash-sale">{{ $sptt->promotion_price }} đồng</span>
										@endif
									</p>
								</div>
								<div class="single-item-caption">
									@if($sanpham->amount <= 5)
									  <i class="beta-btn primary">Hết hàng</i>
									@else
									<a class="add-to-cart pull-left" href="product.html"><i class="fa fa-shopping-cart"></i></a>
									@endif
									<a class="beta-btn primary" href="{{ route('chitietsanpham', $sptt->id) }}">Details <i class="fa fa-chevron-right"></i></a>
									<div class="clearfix"></div>
								</div>
							</div>
						  </div>
						@endforeach
					</div>

					<div class="row">{{ $sp_tuongtu->links() }}</div>
				</div> <!-- .beta-products-list -->
			</div>
			<div class="col-sm-3 aside">
				<!-- <div class="widget">
					<h3 class="widget-title">Best Sellers</h3>
					<div class="widget-body">
						<div class="beta-sales beta-lists">
							<div class="media beta-sales-item">
								<a class="pull-left" href="product.html"><img src="source/assets/dest/images/products/sales/1.png" alt=""></a>
								<div class="media-body">
									Sample Woman Top
									<span class="beta-sales-price">$34.55</span>
								</div>
							</div>
							<div class="media beta-sales-item">
								<a class="pull-left" href="product.html"><img src="source/assets/dest/images/products/sales/2.png" alt=""></a>
								<div class="media-body">
									Sample Woman Top
									<span class="beta-sales-price">$34.55</span>
								</div>
							</div>
							<div class="media beta-sales-item">
								<a class="pull-left" href="product.html"><img src="source/assets/dest/images/products/sales/3.png" alt=""></a>
								<div class="media-body">
									Sample Woman Top
									<span class="beta-sales-price">$34.55</span>
								</div>
							</div>
							<div class="media beta-sales-item">
								<a class="pull-left" href="product.html"><img src="source/assets/dest/images/products/sales/4.png" alt=""></a>
								<div class="media-body">
									Sample Woman Top
									<span class="beta-sales-price">$34.55</span>
								</div>
							</div>
						</div>
					</div>
				</div> <!-- best sellers widget -->
				<!-- <div class="widget">
					<h3 class="widget-title">New Products</h3>
					<div class="widget-body">
						<div class="beta-sales beta-lists">
							<div class="media beta-sales-item">
								<a class="pull-left" href="product.html"><img src="source/assets/dest/images/products/sales/1.png" alt=""></a>
								<div class="media-body">
									Sample Woman Top
									<span class="beta-sales-price">$34.55</span>
								</div>
							</div>
							<div class="media beta-sales-item">
								<a class="pull-left" href="product.html"><img src="source/assets/dest/images/products/sales/2.png" alt=""></a>
								<div class="media-body">
									Sample Woman Top
									<span class="beta-sales-price">$34.55</span>
								</div>
							</div>
							<div class="media beta-sales-item">
								<a class="pull-left" href="product.html"><img src="source/assets/dest/images/products/sales/3.png" alt=""></a>
								<div class="media-body">
									Sample Woman Top
									<span class="beta-sales-price">$34.55</span>
								</div>
							</div>
							<div class="media beta-sales-item">
								<a class="pull-left" href="product.html"><img src="source/assets/dest/images/products/sales/4.png" alt=""></a>
								<div class="media-body">
									Sample Woman Top
									<span class="beta-sales-price">$34.55</span>
								</div>
							</div>
						</div>
					</div>
				</div> <!-- best sellers widget -->
			</div>
		</div>
	</div> <!-- #content -->
</div> <!-- .container -->

@endsection