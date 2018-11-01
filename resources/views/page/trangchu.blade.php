@extends('master')
@section('content')

<div class="fullwidthbanner-container">
	<div class="fullwidthbanner">
		<div class="bannercontainer" >
			<div class="banner" >
				<ul>
				  <!-- THE FIRST SLIDE -->			
				</ul>
			</div>
		</div>

		<div class="tp-bannertimer"></div>
		</div>
	</div>
	<!--slider-->
</div>

<div class="container">
	<div id="content" class="space-top-none">
		<div class="main-content">
			<div class="space60">&nbsp;</div>
			<div class="row">
				<div class="col-sm-12">
					<div class="beta-products-list">
						<h4>Sản Phẩm Mới</h4>
						<div class="beta-products-details">
							<!-- <p class="pull-left">Tìm thấy {{ count($new_product) }} sản phẩm</p> -->
							<div class="clearfix"></div>
						</div>

						<div class="row">
							@foreach($new_product as $new)
							<div class="col-sm-3">
								<div class="single-item">
									<!-- @if($new->promotion_price != 0)
									<div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
									@endif -->
									
									<div class="single-item-header">
										<a href="{{ route('chitietsanpham', $new->id) }}"><img src="source/image/product/{{ $new->image }}" alt="" height="250px"></a>
									</div>
									<div class="single-item-body">
										<p class="single-item-title">{{ $new->name }}</p>
										<p class="single-item-price">
											@if($new->promotion_price == 0)
											  <span class="flash-sale">{{ $new->unit_price }} đồng</span>
											@else
											  <span class="flash-del">{{ $new->unit_price }} đồng</span>
											  <span class="flash-sale">{{ $new->promotion_price }} đồng</span>
											@endif
										</p>
									</div>
									<div class="single-item-caption">
										@if($new->amount <= 5)
										  <i class="beta-btn primary">Hết hàng</i>
										@else
										  <a class="add-to-cart pull-left" href="{{ route('themgiohang', $new->id) }}"><i class="fa fa-shopping-cart"></i></a>
										@endif
										
										<a class="beta-btn primary" href="{{ route('chitietsanpham', $new->id) }}">Details <i class="fa fa-chevron-right"></i></a>
										<div class="clearfix"></div>
									</div>
								</div>
							</div>
							@endforeach				
						</div>

						<div class="row">{{ $new_product->links() }}</div>
					</div> <!-- .beta-products-list -->

					<div class="space50">&nbsp;</div>

					<div class="beta-products-list">
						<h4>Sản phẩm khuyến mãi</h4>
						<div class="beta-products-details">
							<!-- <p class="pull-left">Tìm thấy {{ count($sanpham_khuyenmai) }} san pham</p> -->
							<div class="clearfix"></div>
						</div>
						<div class="row">
							@foreach($sanpham_khuyenmai as $spkm)
							<div class="col-sm-3">
								<div class="single-item">
									@if($spkm->promotion_price != 0)
									<div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
									@endif
									
									<div class="single-item-header">
										<a href="{{ route('chitietsanpham', $spkm->id) }}"><img src="source/image/product/{{ $spkm->image }}" alt="" height="250px"></a>
									</div>
									<div class="single-item-body">
										<p class="single-item-title">{{ $spkm->name }}</p>
										<p class="single-item-price">
											<!-- <span class="flash-del">{{ number_format($spkm->unit_price) }} đồng</span>
											<span class="flash-sale">{{ number_format($spkm->promotion_price) }} đồng</span> -->
											<span class="flash-del">{{ ($spkm->unit_price) }} đồng</span>
											<span class="flash-sale">{{ ($spkm->promotion_price) }} đồng</span>
										</p>
									</div>
									<div class="single-item-caption">
										@if($spkm->amount <= 5)
									      <i class="beta-btn primary">Hết hàng</i>
									    @else
										<a class="add-to-cart pull-left" href="{{ route('themgiohang', $spkm->id) }}"><i class="fa fa-shopping-cart"></i></a>
										@endif
										<a class="beta-btn primary" href="{{ route('chitietsanpham', $spkm->id) }}">Details <i class="fa fa-chevron-right"></i></a>
										<div class="clearfix"></div>
									</div>
								</div>
							</div>
							@endforeach
						</div>

						<div class="row">{{ $sanpham_khuyenmai->links() }}</div>

						<div class="space40">&nbsp;</div>
						<!-- <div class="row">
							<div class="col-sm-3">
								<div class="single-item">
									<div class="single-item-header">
										<a href="product.html"><img src="source/assets/dest/images/products/1.jpg" alt=""></a>
									</div>
									<div class="single-item-body">
										<p class="single-item-title">Sample Woman Top</p>
										<p class="single-item-price">
											<span>$34.55</span>
										</p>
									</div>
									<div class="single-item-caption">
										<a class="add-to-cart pull-left" href="shopping_cart.html"><i class="fa fa-shopping-cart"></i></a>
										<a class="beta-btn primary" href="product.html">Details <i class="fa fa-chevron-right"></i></a>
										<div class="clearfix"></div>
									</div>
								</div>
							</div>
							<div class="col-sm-3">
								<div class="single-item">
									<div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>

									<div class="single-item-header">
										<a href="product.html"><img src="source/assets/dest/images/products/2.jpg" alt=""></a>
									</div>
									<div class="single-item-body">
										<p class="single-item-title">Sample Woman Top</p>
										<p class="single-item-price">
											<span class="flash-del">$34.55</span>
											<span class="flash-sale">$33.55</span>
										</p>
									</div>
									<div class="single-item-caption">
										<a class="add-to-cart pull-left" href="shopping_cart.html"><i class="fa fa-shopping-cart"></i></a>
										<a class="beta-btn primary" href="product.html">Details <i class="fa fa-chevron-right"></i></a>
										<div class="clearfix"></div>
									</div>
								</div>
							</div>
							<div class="col-sm-3">
								<div class="single-item">
									<div class="single-item-header">
										<a href="product.html"><img src="source/assets/dest/images/products/3.jpg" alt=""></a>
									</div>
									<div class="single-item-body">
										<p class="single-item-title">Sample Woman Top</p>
										<p class="single-item-price">
											<span>$34.55</span>
										</p>
									</div>
									<div class="single-item-caption">
										<a class="add-to-cart pull-left" href="shopping_cart.html"><i class="fa fa-shopping-cart"></i></a>
										<a class="beta-btn primary" href="product.html">Details <i class="fa fa-chevron-right"></i></a>
										<div class="clearfix"></div>
									</div>
								</div>
							</div>
							<div class="col-sm-3">
								<div class="single-item">
									<div class="single-item-header">
										<a href="product.html"><img src="source/assets/dest/images/products/3.jpg" alt=""></a>
									</div>
									<div class="single-item-body">
										<p class="single-item-title">Sample Woman Top</p>
										<p class="single-item-price">
											<span>$34.55</span>
										</p>
									</div>
									<div class="single-item-caption">
										<a class="add-to-cart pull-left" href="shopping_cart.html"><i class="fa fa-shopping-cart"></i></a>
										<a class="beta-btn primary" href="product.html">Details <i class="fa fa-chevron-right"></i></a>
										<div class="clearfix"></div>
									</div>
								</div>
							</div>
						</div> -->
					</div> <!-- .beta-products-list -->
				</div>
			</div> <!-- end section with sidebar and main content -->


		</div> <!-- .main-content -->
	</div> <!-- #content -->
</div> <!-- .container -->



@endsection		