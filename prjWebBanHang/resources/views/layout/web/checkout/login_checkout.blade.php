@extends('layout')
@section('content')

<section id="form"><!--form-->
	<div class="container">
		<div class="row">
			<div class="col-sm-4 col-sm-offset-1">
				<div class="login-form"><!--login form-->
					<h2>Đăng nhập</h2>
					<form action="{{URL::to('/login-customer')}}" method="POST">
                        {{csrf_field()}}
						<input type="text" name="email_account" placeholder="E-MAIL" />
						<input type="password" name="password_account" placeholder="MẬT KHẨU" />
						<button type="submit" class="btn btn-default">Đăng nhập</button>
					</form>
				</div><!--/login form-->
			</div>
			<div class="col-sm-1">
				<h2 class="or">Hoặc</h2>
			</div>
			<div class="col-sm-5">
				<div class="signup-form"><!--sign up form-->
					<h2>Đăng ký</h2>
					<form action="{{URL::to('/add-customer')}}" method="POST">
                        {{csrf_field()}}
						<input type="text" name="customer_name" placeholder="HỌ VÀ TÊN"/>
						<input type="email" name="customer_email" placeholder="E-MAIL"/>
						<input type="password" name="customer_password" placeholder="MẬT KHẨU"/>
						<input type="text" name="customer_phone" placeholder="SỐ ĐIỆN THOẠI"/>
						<button type="submit" class="btn btn-default">Đăng ký</button>
					</form>
				</div><!--/sign up form-->
			</div>
		</div>
	</div>
</section><!--/form-->

@endsection

