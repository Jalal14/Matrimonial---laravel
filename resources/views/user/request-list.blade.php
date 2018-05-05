@extends('layouts.user')

@section('title')
<title>Matrimonial - friend requests</title>
@endsection

@section('content')
@forelse($requestList->chunk(2) as $requests )
	<div class="row">
	@foreach($requests as $request)
		<div class="col-sm-3 col-md-3 searched-profile">
			<img class="thumbnail user-image" src="{{asset('images')}}/{{$request->propic}}">
			<div class="user-info">
				<form method="POST">
					{{csrf_field()}}
					<input type="hidden" name="reqId" value="{{$request->uid}}">
					<table class="table table-stripped">
						<tr>
							<span class="user-name">{{$request->fname}}&nbsp;{{$request->mname}}&nbsp;{{$request->lname}}</span>
						</tr>
						<tr>
							<td>Age</td>
							<td>:</td>
							<td>{{$request->age}}</td>
						</tr>
						<tr>
							<td>Gender</td>
							<td>:</td>
							<td>{{$request->gender_name}}</td>
						</tr>
						<tr>
							<td>Religion</td>
							<td>:</td>
							<td>{{$request->religion_name}}</td>
						</tr>
						<tr>
							<td><a href="{{route('user.publicProfile',[$request->uname])}}">VIEW DETAILS</a></td>
						</tr>
						<!-- <tr>
							<td><input class="btn btn-success" type="submit" name="accept" value="Accept"></td>
							<td><input class="btn btn-danger" type="submit" name="reject" value="Reject"></td>
						</tr> -->
					</table>
				</form>
			</div>
		</div>
	</div>
	@endforeach
@empty
	<h4 class="error">You have no friend request!</h4>
@endforelse
@endsection