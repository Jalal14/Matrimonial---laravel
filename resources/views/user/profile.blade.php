@extends('layouts.user')

@section('title')
<title>Matrimonial - {{$user->uname}}</title>
@endsection

@section('content')
<div class="row">
	<div class="col-md-12">
		<img class="thumbnail user-image" src="{{asset('images')}}/{{$user->propic}}">
		<div class="user-info">
			<table class="table table-stripped">
				<tr>
					<span class="user-name">{{$user->uname}}</span><br>
				</tr>
				<tr>
					<td>Age</td>
					<td>:</td>
					<td>{{$user->age}}</td>
				</tr>
				<tr>
					<td>Gender</td>
					<td>:</td>
					<td>{{$user->gender_name}}</td>
				</tr>
				<tr>
					<td>Religion</td>
					<td>:</td>
					<td>{{$user->religion_name}}</td>
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
						<td>Height</td>
						<td>:</td>
						<td><label>{{$user->height}}</label></td>
					</tr>
					<tr><td colspan="3"><hr/></td></tr>
					<tr>
						<td>Weight</td>
						<td>:</td>
						<td><label>{{$user->weight}} Kg</label></td>
					</tr>
					<tr><td colspan="3"><hr/></td></tr>
					<tr>
						<td>Blood group</td>
						<td>:</td>
						<td><label>{{$user->bgroup}}</label> </td>
					</tr>
					<tr><td colspan="3"><hr/></td></tr>
					<tr>
						<td>Email</td>
						<td>:</td>
						<td><label>{{$user->email}}</label></td>
					</tr>
					<tr><td colspan="3"><hr/></td></tr>
					<tr>
						<td>Contact</td>
						<td>:</td>
						<td><label>{{$user->number1}}</label>
					 		<br>
					 		<label>{{$user->number2}}</label>
						</td>
					</tr>
					<tr><td colspan="3"><hr/></td></tr>
					<tr>
						<td>Complexion</td>
						<td>:</td>
						<td><label>{{$user->complexion_name}}</label></td>
					</tr>
					<tr><td colspan="3"><hr/></td></tr>
					<tr>
						<td>Marital status</td>
						<td>:</td>
						<td><label>{{$user->status}}</label></td>
					</tr>
					<tr><td colspan="3"><hr/></td></tr>
					<tr>
						<td>Children</td>
						<td>:</td>
						<td><label>{{$user->children}}</label></td>
					</tr>
					<tr><td colspan="3"><hr/></td></tr>
					<tr>
						<td>Permanent address</td>
						<td>:</td>
						<td><label>
							@if($perAddress != null)
							House: {{$perAddress->per_house}}, Road: {{$perAddress->per_road}}, {{$perAddress->per_area}}, {{$perAddress->policeStation}}, {{$perAddress->district}}, {{$perAddress->division}}
							@endif
						</label></td>
					</tr>
					<tr><td colspan="3"><hr/></td></tr>
					<tr>
						<td>Present address</td>
						<td>:</td>
						<td><label>
							@if($prAddress != null)
							House: {{$prAddress->pr_house}}, Road: {{$prAddress->pr_road}}, {{$prAddress->pr_area}}, {{$prAddress->policeStation}}, {{$prAddress->district}}, {{$prAddress->division}}
							@endif
						</label> </td>
					</tr>
					<tr><td colspan="3"><hr/></td></tr>
					<tr>
						<td>Occupation</td>
						<td>:</td>
						<td><label>
							@if($job != null)
							{{$job->designation}} at {{$job->company}} from {{$job->joinning_date}}
							@endif
						</label></td>
					</tr>
					<tr><td colspan="3"><hr/></td></tr>
					<tr>
						<td>Annual income</td>
						<td>:</td>
						<td><label>
							@if($job != null)
							{{$job->annual_income}}
							@endif
						</label></td>
					</tr>
					<tr><td colspan="3"><hr/></td></tr>
					<tr>
						<td>Education</td>
						<td>:</td>
						<td><label>
							@if($education != null)
							{{$education->degree}} from {{$education->institution}} in {{$education->field}} at {{$education->passing_year}}
							@endif
						</label> </td>
					</tr>
				</table>
			</div>
		</div>
	</div>
</div>
@endsection