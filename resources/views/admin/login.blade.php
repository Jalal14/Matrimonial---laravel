<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="{{asset('css')}}/adminstyle.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="modal-content" id="login-panel">
				<div class="modal-header modal-icon">
					<center>
						<span><img src="{{asset('images')}}/defaultpic/login.png" class="img-circle" alt="Login" width="60" height="60"></span> LOGIN</h4>
					</center>
				</div>
				<div class="modal-body">
					<form method="POST">
						{{csrf_field()}}
						<div class="form-group">
							<label for="username"> Username</label>
		                    <div class="input-group">
		                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
		                        <input type="text" name="username" id="username" class="form-control" placeholder="Enter username">
		                    </div>
						</div>
						<div class="form-group">
							<label for="password"> Password</label>
		                    <div class="input-group">
		                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
		                        <input type="password" name="password" id="password" class="form-control" placeholder="Enter password">
		                    </div>
						</div>
		  				@if($errors->any())
		  					@foreach($errors->all() as $error)
								<p class="error">* {{$error}}</p>
							@endforeach
		  				@endif
		  				<div id="msg" class="error">
		  					@if(session('msg'))
								{{session('msg')}}
							@endif
		  				</div>
		  				<input type="submit" class="btn btn-success btn-block" value="Login">
						<a href="{{route('adminPassword.index')}}">Forgot password?</a>
					</form>
				</div>
			</div>	
		</div>
	</div>
</body>
</html>