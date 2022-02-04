@extends('user.layouts.base')
@section('main')
    <main class="bg_gray">	
	<div class="container margin_30">
		<div class="page_header">
			<div class="breadcrumbs">
				<ul>
					<li><a href="#">Home</a></li>
					<li><a href="#">Category</a></li>
					<li>Page active</li>
				</ul>
		</div>
		<h1>Sign In or Create an Account</h1>
	</div>
	<!-- /page_header -->
			<div class="row justify-content-center">
			<div class="col-xl-6 col-lg-6 col-md-8">
				<div class="box_account">
					<h3 class="client">{{ __('messages.already_client')}}</h3>
					<div class="form_container">
						<div class="row no-gutters">
							<div class="col-lg-6 pr-lg-1">
								<a href="#0" class="social_bt facebook">Login with Facebook</a>
							</div>
							<div class="col-lg-6 pl-lg-1">
								<a href="#0" class="social_bt google">Login with Google</a>
							</div>
						</div>
						<div class="divider"><span>Or</span></div>

                        <form action="{{route('login')}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <input type="email" class="form-control" name="email" id="email" placeholder="Email*">
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" name="password" id="password_in" value="" placeholder="Password*">
                            </div>
                            <div class="clearfix add_bottom_15">
                                <div class="checkboxes float-start">
                                    <label class="container_check">Remember me
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <div class="float-end"><a id="forgot" href="javascript:void(0);">Lost Password?</a></div>
                            </div>
                            <div class="text-center"><input type="submit" value="Log In" class="btn_1 full-width"></div>
                            <div id="forgot_pw">
                                <div class="form-group">
                                    <input type="email" class="form-control" name="email_forgot" id="email_forgot" placeholder="Type your email">
                                </div>
                                <p>A new password will be sent shortly.</p>
                                <div class="text-center"><input type="submit" value="Reset Password" class="btn_1"></div>
                            </div>
                        </form>
					</div>
					<!-- /form_container -->
				</div>
				<!-- /box_account -->				
			</div>
            
			<div class="col-xl-6 col-lg-6 col-md-8">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                    </ul>
                </div>
            @endif
				<div class="box_account">
					<h3 class="new_client">{{ __('messages.new_client')}}</h3> <small class="float-right pt-2">* Required Fields</small>
					
                    <form method="POST" action="{{route('registration')}}">
                        @csrf
                        <div class="form_container">
                            <div class="form-group">
                                <input type="text" class="form-control" name="name" id="name" placeholder="Name">
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control" name="email" id="email_2" placeholder="Email">
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" name="password" id="password_in_2" value="" placeholder="Password">
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" name="password_confirmation" id="password_in" value="" placeholder="Password*">
                            </div>
                            <hr>
                            <div class="text-center"><input type="submit" value="Register" class="btn_1 full-width"></div>
                        </div>
                </form>
					<!-- /form_container -->
				</div>
				<!-- /box_account -->
			</div>
		</div>
		<!-- /row -->
		</div>
		<!-- /container -->
	</main>
@endsection