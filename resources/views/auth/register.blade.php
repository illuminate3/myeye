@extends('layouts.product')

@section('content')
<div class="container-fluid" style="margin-top: 5em">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">ثبت نام </div>
				<div class="panel-body">
					@if (count($errors) > 0)
						<div class="alert alert-danger">
							<strong>خطا ! </strong>اطلاعات شما صحیح نمی‌باشند <br><br>
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@endif

					<form class="form-horizontal" role="form" method="POST" action="{{ url('/auth/register') }}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">

						<div class="form-group">
							<label class="col-md-4 control-label col-md-offset-4"><p>اطلاعات ضروری : </p></label>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">نام </label>
							<div class="col-md-6">
								<input type="text" required="true" class="form-control" name="name" value="{{ old('name') }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">ایمیل : </label>
							<div class="col-md-6">
								<input type="email" required="true" class="form-control" name="email" value="{{ old('email') }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">رمز عبور </label>
							<div class="col-md-6">
								<input type="password" required="true" class="form-control" name="password">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">تکرار رمز عبور </label>
							<div class="col-md-6">
								<input type="password" required="true" class="form-control" name="password_confirmation">
							</div>
						</div>

						<div class="form-group" >
                            <label class="col-md-4 control-label">تصویر امنیتی : </label>
                            <div class="col-md-6">
                                <p>{!! captcha_img() !!}</p>
                                <input type="text" name="captcha">
                            </div>
                        </div>

						<div class="form-group">
                            <label class="col-md-4 control-label col-md-offset-4"><p>اطلاعات غیر ضروری : </p></label>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">تلفن ثابت  </label>
                            <div class="col-md-6">
                                <input type="tel" class="form-control" name="phone" value="{{ old('phone') }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">تلفن همراه </label>
                            <div class="col-md-6">
                                <input  type="tel" class="form-control" name="mobile" value="{{ old('mobile') }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">آدرس </label>
                            <div class="col-md-6">
                                <textarea class="form-control" name="address" value="{{ old('address') }}">

                                </textarea>
                            </div>
                        </div>


						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<button type="submit" class="btn btn-lg btn-primary">
									ثبت نام
								</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
