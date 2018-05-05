@extends('layouts.admin')

@section('content')
<div class="panel panel-default">
	<div class="panel-heading"><h3>Registration request</h3></div>
	<div class="panel-body">
		@forelse($requests as $request)
			<div class="row">
				<div class="col-sm-5 col-md-5 user-profile">
					<div class="user-info">
						<form method="POST">
							{{csrf_field()}}
							<input type="hidden" name="reqId" value="{{$request->uid}}">
							<table class="table table-stripped">
								<tr>
									<span class="user-name">{{$request->fname}}&nbsp;{{$request->mname}}&nbsp;{{$request->lname}}</span>
								</tr>
								<tr>
									<td>Username</td>
									<td>:</td>
									<td>{{$request->uname}}</td>
								</tr>
								<tr>
									<td>Email</td>
									<td>:</td>
									<td>{{$request->email}}</td>
								</tr>
								<tr>
									<td>Contact</td>
									<td>:</td>
									<td>{{$request->number1}}</td>
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
									<td><input class="btn btn-success" type="submit" name="approve" value="Approve"></td>
									<td><input class="btn btn-danger" type="submit" name="reject" value="Reject"></td>
								</tr>
							</table>
						</form>
					</div>
				</div>
			</div>
		@empty
			<span class="error">No registration requests</span>
		@endforelse
	</div>
</div>
@endsection