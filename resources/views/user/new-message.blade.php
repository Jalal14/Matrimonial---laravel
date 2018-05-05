@extends('layouts.user')

@section('title')
    <title>Matrimonial - friends</title>
@endsection

@section('content')
    @forelse($senderList->chunk(2) as $senders)
        <div class="row">
            @foreach($senders as $sender)
                <div class="col-sm-3 col-md-3 searched-profile">
                    <form method="POST">
                        {{csrf_field()}}
                        <img class="thumbnail friend-image" src="{{asset('images')}}/{{$sender->propic}}">
                        <div class="user-info">
                            <table class="table">
                                <tr><h4 class="error">{{$sender->total}} new messages</h4></tr>
                                <tr>
                                    <td><a href="{{route('user.publicProfile',[$sender->uname])}}"><span class="user-name">{{$sender->fname}}&nbsp;{{$sender->mname}}&nbsp;{{$sender->lname}}</span></a></td>
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
        <h4 class="error">You have no new message</h4>
    @endforelse
@endsection