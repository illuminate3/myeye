@extends('layouts.product')

@section('content')
<div class="container-fluid" style="margin-top: 5em">
	<div class="row" style="direction: rtl">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading ">ورود </div>
				<div class="panel-body">
					@if (count($errors) > 0)
						<div class="alert alert-danger">
							  <strong>خطا</strong> اطلاعات وارد شده صحیح نمی‌باشد
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@endif

					<form class="form-horizontal" role="form" method="POST" action="{{ url('/auth/login') }}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">

						<div class="form-group" style="direction: ltr">
							<label class="col-md-4 control-label">ایمیل </label>
							<div class="col-md-6">
								<input type="email" class="form-control" name="email" value="{{ old('email') }}">
							</div>
						</div>

						<div class="form-group" style="direction: ltr">
							<label class="col-md-4 control-label"> رمز عبوری  </label>
							<div class="col-md-6">
								<input type="password" class="form-control" name="password">
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<div class="checkbox">
									<label>
										<input type="checkbox" name="remember">  به یاد داشتن رمز عبوری
									</label>
								</div>
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<button type="submit" class="btn btn-primary">ورود</button>

								<a class="btn btn-link" href="{{ url('/password/email') }}">فراموش کردن رمز عبور؟</a>
								<a class="btn btn-link" href="{{ url('/auth/register') }}">آیا حساب کاربری ندارید؟ کلیک کنید! </a>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
