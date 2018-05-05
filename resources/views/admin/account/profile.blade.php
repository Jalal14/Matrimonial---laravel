@extends('layouts.admin')

@section('content')
<div class="panel panel-default">
	<div class="panel-heading"><h3>Profile</h3></div>
	<div class="panel-body">
		<div class="row">
			<div class="col-md-12">
				<img class="thumbnail user-image" src="{{asset('images')}}/admin/{{$admin->propic}}">
			</div>
			<div class="col-md-8">
				<div class="panel panel-default">
					<div class="panel-heading"><h4>INFORMATION</h4></div>
					<div class="panel-body">
						<table cellpadding="0" cellspacing="0">
							<tr>
								<td>Name</td>
								<td>:</td>
								<td><label><h4>{{$admin->fname}}&nbsp;{{$admin->mname}}&nbsp;{{$admin->lname}}</h4></label></td>
							</tr>
							<tr><td colspan="3"><hr/></td></tr>
							<tr>
								<td>Age</td>
								<td>: </td>
								<td><label>{{$admin->age}}</label></td>
							</tr>
							<tr><td colspan="3"><hr/></td></tr>
							<tr>
								<td>Gender</td>
								<td>: </td>
								<td><label>{{$admin->gender_name}}</label></td>
							</tr>
							<tr><td colspan="3"><hr/></td></tr>
							<tr>
								<td>Blood group</td>
								<td>: </td>
								<td><label>{{$admin->bgroup}}</label></td>
							</tr>
							<tr><td colspan="3"><hr/></td></tr>
							<tr>
								<td>Email</td>
								<td>:</td>
								<td><label>{{$admin->email}}</label></td>
							</tr>
							<tr><td colspan="3"><hr/></td></tr>
							<tr>
								<td>Contact</td>
								<td>:</td>
								<td><label>{{$admin->number1}}</label>
							 		<br>
							 		<label>{{$admin->number2}}</label>
								</td>
							</tr>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection