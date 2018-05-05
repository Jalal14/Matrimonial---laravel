<!DOCTYPE html>
<html>
<head>
	<title>Matrimonial</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="{{asset('css')}}/adminstyle.css">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	{{--<script type="text/javascript" src="{{asset('js')}}/jquery.min.js"></script>--}}
	{{--<script type="text/javascript" src="{{asset('js')}}/bootstrap.min.js"></script>--}}
	<script type="text/javascript" src="{{asset('js')}}/adminscript.js"></script>

</head>
<body>
	<header>
		<nav class="navbar navbar-inverse navbar-fixed-top">
			<div class="container-fluid">
		 		<div class="navbar-header">
		 			<p class="pull-left visible-xs">
		 				<button id="offcanvasleft" class="btn btn-xs glyphicon glyphicon-menu-hamburger" type="button" data-toggle="offcanvas"></button>
		            	<button id="offcanvasleft" class="btn btn-xs" type="button" data-toggle="offcanvas">
		            		<span class="icon-bar"></span>
		            	</button>
		        	</p>
					<a class="navbar-brand" href="{{route('admin.index')}}"><span><img src="{{asset('images')}}/defaultpic/ring.png" alt="MATRIMONIAL" height="100%"></span></a>
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
		 		</div>
		 		<div class="collapse navbar-collapse" id="myNavbar">
			 		<div class="nav navbar-nav navbar-right" id="account-nav">
			 			<ul class="nav navbar-nav">
				 			<li><a href="{{route('admin.registrationRequest')}}">Registration request ( <span class="regRequest">{{$regReqNum}} </span>)</a></li>
				 			<li><a href="{{route('admin.profile')}}">Profile</a></li>
				 			<li><a href="{{route('logout.admin')}}">Logout</a></li>
				 		</ul>
				 	</div>
				 </div>
		 	</div>
		</nav>
	</header>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-2">
				<div class="row-offcanvas row-offcanvas-left" id="left-menu">
					<div class="sidebar-offcanvas">
						<div class="nav-side-menu col-md-12">
							<div class="menu-list">
								<ul class="menu-content collapse-out" id="left-menu-content">
									<li><a href="{{route('admin.index')}}">Dashboard</a></li>
									<li  data-toggle="collapse" data-target="#update" class="collapsed active">
									<a href="#">Update <span class="arrow"><i class="fa fa-hand-o-down fa-lg"></i></span></a></li>
						            <ul class="sub-menu collapse" id="update">
						                <li class="active"><a href="{{route('admin.updateProfile')}}">Update info</a></li>
						                <li><a href="{{route('admin.proPic')}}">Profile picture</a></li>
						                <li><a href="{{route('admin.updatePassword')}}">Change password</a></li>
						            </ul>
						            <li><a href="{{route('information.police')}}">Police station</a></li>
									<li><a href="{{route('information.district')}}">District</a></li>
									<li><a href="{{route('information.division')}}">Division</a></li>
									<li><a href="{{route('information.degree')}}">Degree</a></li>
									<li><a href="{{route('information.family')}}">Family type</a></li>
									<li><a href="{{route('information.complexion')}}">Complexion</a></li>
									<li><a href="{{route('information.hobby')}}">Hobby</a></li>
									<li><a href="{{route('information.interest')}}">Interest</a></li>
									<li><a href="{{route('information.music')}}">Music</a></li>
									<li><a href="{{route('information.sport')}}">Sports</a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-10">
				@yield('content')
			</div>
		</div>
	</div>
</body>
</html>