@extends('layouts.user')

@section('title')
<title>Matrimonial - sent requests</title>
@endsection

@section('content')
@forelse($sentReqList->chunk(2) as $sentReqs)
	<div class="row">
		@foreach($sentReqs as $sentReq)
		<div class="col-sm-3 col-md-3 searched-profile">
			<img class="thumbnail friend-image" src="{{asset('images')}}/{{$sentReq->propic}}">
			<div class="user-info">
				<form method="POST">
					{{csrf_field()}}
					<input type="hidden" name="reqId" value="{{$sentReq->uid}}">
					<table class="table">
						<tr>
							<td><a href="{{route('user.publicProfile',[$sentReq->uname])}}"><span class="user-name">{{$sentReq->fname}}&nbsp;{{$sentReq->mname}}&nbsp;{{$sentReq->lname}}</span></a></td>
						</tr>
					</table>
				</form>
			</div>
		</div>
	</div>
	@endforeach
@empty
	<h4 class="error">You did not sent any request</h4>
@endforelse
@endsection