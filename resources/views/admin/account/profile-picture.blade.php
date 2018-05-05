@extends('layouts.admin')

@section('content')
<div class="panel panel-default">
	<div class="panel-heading"><h3>Change profile picture</h3></div>
	<div class="panel-body">
		<div class="row">
			<div class="col-md-8">
				<form method="POST" enctype="multipart/form-data">
					{{csrf_field()}}
					<img class="thumbnail user-image" src="{{asset('images')}}/admin/{{$admin->propic}}">
					<label for="proPic">Update profile picture</label>
					<input type="file" name="proPic"><br>
					<input type="submit" value="Upload" class="btn btn-success">
				</form>
				@if(session('msg'))
  					<span class="error">{{session('msg')}}</span>
				@endif
			</div>
		</div>
	</div>
</div>
@endsection