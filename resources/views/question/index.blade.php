@extends('layouts.product')

@section('content')
<div class="container-fluid" style="margin-top: 5em">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">پشتیبانی </div>
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

					<form class="form-horizontal" role="form" method="POST" action="{{ url('/question') }}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">

						<div class="form-group" >
							<label class="col-md-8 control-label col-md-offset-2"><p class="bg-info" style="text-align: right">هرگونه مشکل در سفارش محصول و یا هر گونه سوالی در مورد خدمات ما را می‌توانید از طریق فرم زیر با ما در میان بگذارید، در اسرع زمان همکاران ما پاسخ شمارا ایمیل و یا در صورت لزوم با شما تماس خواهند گرفت. با سپاس</p></label>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">عنوان سوال : </label>
							<div class="col-md-6">
								<input type="text" required="true" class="form-control" name="title" value="{{ old('title') }}">
							</div>
						</div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">متن سوال :‌ </label>
                            <div class="col-md-6">
                                <textarea class="form-control" rows="10" name="message" value="{{ old('message') }}">

                                </textarea>
                            </div>
                        </div>

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<button type="submit" class="btn btn-lg btn-primary">
									ارسال سوال
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
