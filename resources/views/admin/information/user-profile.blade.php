@extends('layouts.admin')

@section('content')
<div class="panel panel-default">
	<div class="panel-heading"><h3>User profile</h3></div>
	<div class="panel-body">
		<div class="col-md-12">
			<img class="thumbnail user-image" src="{{asset('images')}}/{{$user->propic}}">
			<div class="user-info">
				<table class="table table-stripped">
					<tr>
						<span class="user-name">{{$user->uname}}</span><br>
					</tr>
					<tr>
						<td><h5>Age</h5></td>
						<td><h5>:</h5></td>
						<td><h4>{{$user->age}}</h4></td>
					</tr>
					<tr>
						<td><h5>Gender</h5></td>
						<td><h5>:</h5></td>
						<td><h4>{{$user->gender_name}}</h4></td>
					</tr>
					<tr>
						<td><h5>Religion</h5></td>
						<td><h5>:</h5></td>
						<td><h4>{{$user->religion_name}}</h4></td>
					</tr>
				</table>
			</div>
		</div>
		<div class="col-md-6">
			<div class="panel panel-default">
				<div class="panel-heading"><h4>ADDITIONAL INFORMATION</h4></div>
				<div class="panel-body">
					<table cellpadding="0" cellspacing="0">
						<tr>
							<td><h5>Blood group</h5></td>
							<td><h5>:</h5></td>
							<td><h4>{{$user->bgroup}}</h4></td>
						</tr>
						<tr><td colspan="3"><hr/></td></tr>
						<tr>
							<td><h5>Email</h5></td>
							<td><h5>:</h5></td>
							<td><h4>{{$user->email}}</h4></label></td>
						</tr>
						<tr><td colspan="3"><hr/></td></tr>
						<tr>
							<td><h5>Contact</h5></td>
							<td><h5>:</h5></td>
							<td><h4>{{$user->number1}}</h4>
						 		<h4>{{$user->number2}}</h4>
							</td>
						</tr>
						<tr><td colspan="3"><hr/></td></tr>
						<tr>
							<td><h5>Marital status</h5></td>
							<td><h5>:</h5></td>
							<td><h4>{{$user->status}}</h4></td>
						</tr>
						<tr><td colspan="3"><hr/></td></tr>
						<tr>
							<td><h5>Children</h5></td>
							<td><h5>:</h5></td>
							<td><h4>{{$user->children}}</h4></td>
						</tr>
						<tr><td colspan="3"><hr/></td></tr>
						<tr>
							<td><h5>Occupation</h5></td>
							<td><h5>:</h5></td>
							<td>
								@if($job != null)
								<label>{{$job->designation}}</label> at <label>{{$job->company}}</label> from <label>{{$job->joinning_date}}</label>
								@endif
							</td>
						</tr>
						<tr><td colspan="3"><hr/></td></tr>
						<tr>
							<td><h5>Education</h5></td>
							<td><h5>:</h5></td>
							<td>
								@if($education != null)
								<label>{{$education->degree}}</label> from <label>{{$education->institution}}</label> in <label>{{$education->field}}</label> at <label>{{$education->passing_year}}</label>
								@endif
							</td>
						</tr>
					</table>
				</div>
			</div>
		</div>
			
	</div>
</div>
@endsection