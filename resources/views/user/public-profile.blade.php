@extends('layouts.user')

@section('title')
<title>Matrimonial - {{$user->uname}}</title>
@endsection

@section('content')
<div class="row">
	<div class="col-md-12">
		<img class="thumbnail user-image" src="{{asset('images')}}/{{$friend->propic}}">
		<div class="user-info">
			<table class="table table-stripped">
				<tr>
					<span class="user-name">{{$friend->fname}} {{$friend->mname}} {{$friend->lname}}</span><br>
				</tr>
				<tr>
					<td>Age</td>
					<td>:</td>
					<td>{{$friend->age}}</td>
				</tr>
				<tr>
					<td>Gender</td>
					<td>:</td>
					<td>{{$friend->gender_name}}</td>
				</tr>
				<tr>
					<td>Religion</td>
					<td>:</td>
					<td>{{$friend->religion_name}}</td>
				</tr>
			</table>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-6">
		<div class="panel panel-default">
			<div class="panel-heading"><h4>ADDITIONAL INFORMATION</h4></div>
			<div class="panel-body">
				<table cellpadding="0" cellspacing="0">
					<tr>
						<td>Height</td>
						<td>:</td>
						<td><label>{{$friend->height}}</label></td>
					</tr>
					<tr><td colspan="3"><hr/></td></tr>
					<tr>
						<td>Weight</td>
						<td>:</td>
						<td><label>{{$friend->weight}} Kg</label></td>
					</tr>
					<tr><td colspan="3"><hr/></td></tr>
					<tr>
						<td>Blood group</td>
						<td>:</td>
						<td><label>{{$friend->bgroup}}</label> </td>
					</tr>
					<tr><td colspan="3"><hr/></td></tr>
					<tr>
						<td>Email</td>
						<td>:</td>
						<td><label>{{$friend->email}}</label></td>
					</tr>
					<tr><td colspan="3"><hr/></td></tr>
					<tr>
						<form method="post">
							{{csrf_field()}}
							<input type="hidden" name="userId" value="{{$friend->uid}}">
							@if($friend->friend != null)
                                asdf
								@if($friend->favorite != null)
									<td><input class="btn btn-danger" type="submit" name="removeFav" value="Remove favorite"></td>
									<td></td>
								@else
									<td><input class="btn btn-success" type="submit" name="addFav" value="Add favorite"></td>
									<td></td>
								@endif
								<td><input class="btn btn-danger" type="submit" name="cancelFriend" value="Cancel friend"></td>
							@elseif($friend->sentReq != null)
								@if($friend->favorite != null)
									<td><input class="btn btn-danger" type="submit" name="removeFav" value="Remove favorite"></td>
									<td></td>
								@else
									<td><input class="btn btn-success" type="submit" name="addFav" value="Add favorite"></td>
									<td></td>
								@endif
								<td><input class="btn btn-danger" type="submit" name="cancelReq" value="Cancel request"></td>
							@elseif($friend->requested != null)
								@if($friend->favorite != null)
									<td><input class="btn btn-danger" type="submit" name="removeFav" value="Remove favorite"></td>
									<td></td>
								@else
									<td><input class="btn btn-success" type="submit" name="addFav" value="Add favorite"></td>
									<td></td>
								@endif
								<td><input class="btn btn-success" type="submit" name="accept" value="Accept"></td>
								<td></td>
								<td><input class="btn btn-danger" type="submit" name="reject" value="Reject"></td>
							@else
								@if($friend->favorite != null)
									<td><input class="btn btn-danger" type="submit" name="removeFav" value="Remove favorite"></td>
									<td></td>
								@else
									<td><input class="btn btn-success" type="submit" name="addFav" value="Add favorite"></td>
									<td></td>
								@endif
								<td><input class="btn btn-success" type="submit" name="addFriend" value="Add friend"></td>
							@endif
						</form>
					</tr>
				</table>
			</div>
		</div>
	</div>

    @section('conversation')
        <form method="post" id="message-form">
        {{csrf_field()}}
        <input type="hidden" value="{{$friend->uid}}" name="friendId">
        <input type="hidden" value="{{$friend->uname}}" name="friendUname">
            <div class="col-lg-3 col-md-3 col-sm-3" id="conversation-area">
                <div class="jquery-message-area">
                    @forelse($msgList as $msg)
                        <div class="message-area">
                            @if($msg->sender == $user->uid)
                                <img src="{{asset('images')}}/{{$user->propic}}" class="texted-user-img">
                                <div class="user-text-area">
                                    <div class="user-text" title="{{$msg->time}}">{{$msg->message}}</div>
                                </div>
                            @elseif($msg->sender == $friend->uid)
                                <img src="{{asset('images')}}/{{$friend->propic}}" class="texted-friend-img">
                                <div class="friend-text-area">
                                    <div class="friend-text"  title="{{$msg->time}}">{{$msg->message}}</div>
                                </div>
                            @endif
                        </div>
                    @empty
                    @endforelse
                </div>
                @if($friend->friend != null)
                    <div class="row">
                        <div id="message-box" class="col-lg-3 col-md-3 col-sm-3">
                            <input type="text" name="messageContent" id="text-box">
                            <input type="submit" value="send" name="sendMessage" id="send-button">
                        </div>
                    </div>
                @endif
            </div>
        </form>
    @endsection

</div>
@endsection