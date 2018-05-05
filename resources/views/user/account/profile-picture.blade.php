@extends('layouts.user')

@section('title')
<title>Matrimonial - profile picture</title>
@endsection

@section('style')
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
@endsection

@section('script')
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
@endsection

@section('content')
<div class="user-image">
	<form enctype="multipart/form-data" method="POST">
		{{csrf_field()}}
		<img class="thumbnail user-image" src="{{asset('images')}}/{{$user->propic}}">
		<label for="proPic">Update profile picture</label>
		<input type="file" name="proPic"><br>
		<input type="submit" value="Upload" class="btn btn-success">
	</form>
	@if($errors->any())
		@foreach($errors->all() as $error)
			<p class="error">* {{$error}}</p>
		@endforeach
	@endif
</div>
@endsection