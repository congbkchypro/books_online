@extends('master')
@section('content')

<div class="inner-header">
	<div class="container">
		<div class="pull-left">
			<h6 class="inner-title">Đăng kí</h6>
		</div>
		<div class="pull-right">
			<div class="beta-breadcrumb">
				<a href="index">Trang chủ</a> / <span>Đăng kí</span>
			</div>
		</div>
		<div class="clearfix"></div>
	</div>
</div>

<div class="container">
	<div id="content">
		
		<form action="{{ route('signin') }}" method="post" class="beta-form-checkout">
			<div class="row">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<div class="col-sm-3"></div>
				<div class="col-sm-6">
					@if(count($errors) > 0)
					  @foreach($errors->all() as $err)
						{{ $err }}
					  @endforeach
					@endif

					@if(Session::has('thongbao'))
				      <div class="alert alert-success"> {{ Session::get('thongbao') }}</div>
				    @endif
					<h4>Đăng ký</h4>
					<div class="space20">&nbsp;</div>

					
					<div class="form-block">
						<label for="email">Email address*</label>
						<input type="email" name="email" required>
					</div>

					<div class="form-block">
						<label for="fullname">Fullname*</label>
						<input type="text" name="fullname" required>
					</div>

					<div class="form-block">
						<label for="adress">Address*</label>
						<input type="text" name="address" required>
					</div>


					<div class="form-block">
						<label for="phone">Phone*</label>
						<input type="text" name="phone" required>
					</div>
					<div class="form-block">
						<label for="phone">Password*</label>
						<input type="password" name="password" required>
					</div>
					<div class="form-block">
						<label for="phone">Re password*</label>
						<input type="password" name="re_password" required>
					</div>
					<div class="form-block">
						<button type="submit" class="btn btn-primary">Register</button>
					</div>
				</div>
				<div class="col-sm-3"></div>
			</div>
		</form>
	</div> <!-- #content -->
</div> <!-- .container -->

@endsection