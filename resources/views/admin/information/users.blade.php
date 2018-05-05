@extends('layouts.admin')

@section('content')
<div class="panel panel-default">
	<div class="panel-heading"><h3>User list</h3></div>
	<div class="panel-body">
		<table class="table table-hover">
			<thead>
				<tr>
					<th>Image</th>
					<th>Name</th>
					<th>Email</th>
					<th>Age</th>
					<th>Blood</th>
					<th>Gender</th>
					<th>Religion</th>
					<th>Last login</th>
				</tr>
			</thead>
			@forelse($userList as $user)
				<tr>
					<td class="table-image"><img class="img-thumbnail" src="{{asset('images')}}/{{$user->propic}}"></td>
					<td><label><a href="{{route('admin.userProfile', [$user->uid])}}">{{$user->fname}} {{$user->mname}} {{$user->lname}}</a></label></td>
					<td><label>{{$user->email}}</label></td>
					<td><label>{{$user->age}}</label></td>
					<td><label>{{$user->bgroup}}</label></td>
					<td><label>{{$user->gender_name}}</label></td>
					<td><label>{{$user->religion_name}}</label></td>
					<td><label>{{$user->last_login}}</label></td>
				</tr>
			@empty
				<center><h2>No user</h2></center>
			@endforelse
		</table>
		
	</div>
</div>
@endsection