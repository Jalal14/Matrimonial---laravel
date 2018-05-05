@extends('layouts.user')

@section('title')
<title>Matrimonial - friends</title>
@endsection

@section('content')
@forelse($friendList->chunk(2) as $friends)
	<div class="row">
		@foreach($friends as $friend)
		<div class="col-sm-3 col-md-3 searched-profile">
			<form method="POST">
				{{csrf_field()}}
				<input type="hidden" name="friendId" value="{{$friend->uid}}">
				<img class="thumbnail friend-image" src="{{asset('images')}}/{{$friend->propic}}">
				<div class="user-info">
					<table class="table">
						<tr>
							<td><a href="{{route('user.publicProfile',[$friend->uname])}}"><span class="user-name">{{$friend->fname}}&nbsp;{{$friend->mname}}&nbsp;{{$friend->lname}}</span></a></td>
						</tr>
						<!-- <tr>
							<td><input type="submit" class="btn btn-danger" name="cancelFriend" value="Cancel friend"></td>
						</tr> -->
					</table>
				</div>
			</form>
		</div>
		@endforeach
	</div>
@empty
	<h4 class="error">You have no friend?</h4>
@endforelse
@endsection