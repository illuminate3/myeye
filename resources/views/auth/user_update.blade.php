@extends('layouts.product')

@section('content')
<div class="container-fluid" style="margin-top: 8em">
	<div class="row" style="direction: rtl">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading "> ویرایش مشخصات کاربری   {{$user->email}}</div>
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

                    <form action="/userUpdate" method="post">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<div class="form-group">
                            <label class="col-md-4 control-label">نام </label>
                            <div class="col-md-6">
                                <input type="text" required="true" class="form-control" name="name" value="{{ old('name') ?: $user->name }}">
                            </div>
                        </div>
						<div class="form-group">
                                <label class="col-md-4 control-label">تلفن ثابت  </label>
                                <div class="col-md-6">
                                    <input type="tel" class="form-control" name="phone" value="{{ old('phone') ? old('phone') : $user->phone}}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">تلفن همراه </label>
                                <div class="col-md-6">
                                    <input  type="tel" class="form-control" name="mobile" value="{{ old('mobile') ? old('mobile') : $user->mobile}}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">آدرس </label>
                                <div class="col-md-6">
                                    <textarea class="form-control" name="address" style="direction:rtl;text-align: justify" cols="10" rows="10">
                                     {{ old('address') ? trim(old('address')) : trim($user->address) }}

                                    </textarea>
                                </div>
                            </div>


                            <div class="form-group" >
                                <div class="col-md-6 col-md-offset-4" style="margin-top: 3em">
                                    <button type="submit" class="btn btn-lg btn-primary">
                                       ویرایش اطلاعات
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
