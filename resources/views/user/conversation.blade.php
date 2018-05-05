@for ($i = 0; $i < 10; $i++)
	<span style='float:right'><img class='img-circle message-img' src="{{asset('images')}}/{{$user->propic}}"></span>
	<span class='message-text' style='float:right'><p>aieufhiauhgf</p></span><br>
	<span style='float:left;'><img class='img-circle message-img' src="{{asset('images')}}/{{$loggerUser->propic}}"></span>
	<span class='message-text' style='float:left;'>message[message]&nbsp;</span><br>
	<span class='message-text' style='float:left;'>message[message]&nbsp;</span><br>
	<span class='message-text' style='float:left;'>message[message]&nbsp;</span><br>
@endfor