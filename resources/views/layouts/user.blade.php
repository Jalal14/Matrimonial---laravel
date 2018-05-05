<!DOCTYPE html>
<html>
<head>
	<!-- <title>Matrimonial</title> -->
	@yield('title')
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	@yield('style')
	<link rel="stylesheet" type="text/css" href="{{asset('css')}}/stylesheet.css">

	<!-- <script type="text/javascript" src="/matrimonial views/assets/js/jquery.min.js"></script>
	<script type="text/javascript" src="/matrimonial views/assets/js/bootstrap.min.js"></script> -->

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="{{asset('js')}}/userscript.js"></script>
	@yield('script')
</head>
<body>
	<nav class="navbar navbar-default navbar-fixed-top">
		<div class="container-fluid">
	 		<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
	 			<a class="navbar-brand" href="{{route('user.index')}}"><span><img src="{{asset('images')}}/defaultpic/ring.png" alt="MATRIMONIAL" height="100%"></a>
	 		</div>
	 		<div class="collapse navbar-collapse" id="myNavbar">
	 			<ul class="nav navbar-nav navbar-right">
	 				<li><a href="{{route('user.newMessages')}}">( <span id="new-message">0</span>) NEW MESSAGES</a></li>
                    <li><a href="{{route('user.requestList')}}"><span id="friendReq">( 0 ) REQUEST</span></a></li>
	 				<li><a href="{{route('user.profile')}}">PROFILE</a></li>
	 				<li><a href="{{route('logout.index')}}">LOGOUT</a></li>
		 		</ul>
	 		</div>
	 	</div>
	</nav>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-2" id="left-bar">
				<div class="row-offcanvas row-offcanvas-left">
					<div class="nav-side-menu">
						<div class="menu-list">
							<ul>
								<li><a href="{{route('user.index')}}">Dashboard</a></li>
								<li  data-toggle="collapse" data-target="#update" class="collapsed active">
								<a href="#">Update profile <span class="arrow"><i class="fa fa-hand-o-down fa-lg"></i></span></a></li>
					            <ul class="sub-menu collapse" id="update">
					                <li><a href="{{route('account.updateProfile')}}">Update info</a> </li>
						            <li><a href="{{route('account.family')}}">Family Info</a></li>
						            <li><a href="{{route('account.perAddress')}}">Permanent address</a></li>
						            <li><a href="{{route('account.prAddress')}}">Present address</a></li>
						            <li><a href="{{route('account.education')}}">Educational information</a></li>
						            <li><a href="{{route('account.occupation')}}">Occupation information</a></li>
						            <li><a href="{{route('account.lifeStyle')}}">Life style</a></li>
						            <li><a href="{{route('account.proPic')}}">Profile Picture</a></li>
						            <li><a href="{{route('account.changePassword')}}">Change Password</a></li>
					            </ul>
					            <li><a href="{{route('user.favoriteList')}}">Favorite list</a></li>
					            <li><a href="{{route('user.followerList')}}">Follower list</a></li>
					            <li><a href="{{route('user.sentRequests')}}">Sent request list</a></li>
					            <li><a href="{{route('user.friendList')}}">Friend list</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-10">
				@yield('content')
			</div>
		</div>
		@yield('conversation')
	</div>
</body>
</html>
