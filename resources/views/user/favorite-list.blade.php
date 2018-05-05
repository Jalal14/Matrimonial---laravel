@extends('layouts.user')

@section('title')
<title>Matrimonial - favorites</title>
@endsection

@section('content')
@forelse($favoriteList->chunk(2) as $favorites)
	<div class="row">
		@forelse($favorites as $favorite)
		<div class="col-sm-3 col-md-3 searched-profile">
			<form method="POST">
				{{csrf_field()}}
				<input type="hidden" name="favoriteId" value="{{$favorite->uid}}">
				<img class="thumbnail friend-image" src="{{asset('images')}}/{{$favorite->propic}}">
				<div class="user-info">
					<table class="table">
						<tr>
							<td><a href="{{route('user.publicProfile',[$favorite->uname])}}"><span class="user-name">{{$favorite->fname}}&nbsp;{{$favorite->mname}}&nbsp;{{$favorite->lname}}</span></a></td>
						</tr>
					</table>
				</div>
			</form>
		</div>
		@empty
			<h4 class="error">You don't have any favorite user!</h4>
		@endforelse
	</div>
@empty
	<h4 class="error">You don't have any favorite user!</h4>
@endforelse
@endsection