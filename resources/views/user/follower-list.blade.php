@extends('layouts.user')

@section('title')
<title>Matrimonial - followers</title>
@endsection

@section('content')
@forelse($followerList->chunk(2) as $followers)
	<div class="row">
		@forelse($followers as $follower)
		<a href="{{route('user.publicProfile',[$follower->uname])}}">
			<div class="col-sm-5 col-md-5 searched-profile">
				<img class="thumbnail user-image" src="{{asset('images')}}/{{$follower->propic}}">
				<div class="user-info">
					<table class="table table-stripped">
						<tr>
							<span class="user-name">{{$follower->fname}}&nbsp;{{$follower->mname}}&nbsp;{{$follower->lname}}</span>
						</tr>
						<tr>
							<td>Age</td>
							<td>:</td>
							<td>{{$follower->age}}</td>
						</tr>
						<tr>
							<td>Gender</td>
							<td>:</td>
							<td>{{$follower->gender_name}}</td>
						</tr>
						<tr>
							<td>Religion</td>
							<td>:</td>
							<td>{{$follower->religion_name}}</td>
						</tr>
						<tr>
							<td>VIEW DETAILS</td>
						</tr>
					</table>
				</div>
			</div>
		</a>
		@empty
			<h4 class="error">You don't have any follower!</h4>
		@endforelse
	</div>
@empty
	<h4 class="error">You don't have any follower!</h4>
@endforelse
@endsection