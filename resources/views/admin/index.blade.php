@extends('layouts.admin')

@section('content')
<div class="panel panel-default">
	<div class="panel-heading"><h3>Dashboard</h3></div>
	<div class="panel-body">
		<div class="row">
			<div class="col-lg-3 col-md-3 col-sm-6" class="activity-banner">
			<div class="tile tile-primary">
				<div class="tile-heading">REGISTRATION REQUEST</div>
				<div class="tile-body">
					<span><img src="{{asset('images')}}/admin/registration-user.png"></span>
					<h1 class="pull-right"><span class="regRequest">{{$regReqs}}</span></h1>
				</div>
				<div class="tile-footer">
					<a href="{{route('admin.registrationRequest')}}">View all.....</a>
				</div>
			</div>
		</div>
		<div class="col-lg-3 col-md-3 col-sm-6" class="activity-banner">
			<div class="tile tile-primary">
				<div class="tile-heading">REPORT</div>
				<div class="tile-body">
					<span><img src="{{asset('images')}}/admin/report-user.png"></span>
					<h1 class="pull-right">2</h1>
				</div>
				<div class="tile-footer">
					<a href="#">View all.....</a>
				</div>
			</div>
		</div>
		<div class="col-lg-3 col-md-3 col-sm-6" class="activity-banner">
			<div class="tile tile-primary">
				<div class="tile-heading">TOTAL USER</div>
				<div class="tile-body">
					<span><img src="{{asset('images')}}/admin/user-icon.png"></span>
					<h1 class="pull-right">{{$users}}</h1>
				</div>
				<div class="tile-footer">
					<a href="{{route('admin.userList')}}">View all.....</a>
				</div>
			</div>
		</div>
		<div class="col-lg-3 col-md-3 col-sm-6" class="activity-banner">
			<div class="tile tile-primary">
				<div class="tile-heading">ACTIVE USER</div>
				<div class="tile-body">
					<span><img src="{{asset('images')}}/admin/active-user.png"></span>
					<h1 class="pull-right">{{$activeUsers}}</h1>
				</div>
				<div class="tile-footer">
					<a href="{{route('admin.activeUsers')}}">View all.....</a>
				</div>
			</div>
		</div>
		</div>
	</div>
</div>
@endsection