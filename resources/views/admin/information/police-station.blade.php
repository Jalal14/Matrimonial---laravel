@extends('layouts.admin')

@section('content')
<div class="panel panel-default">
	<div class="panel-heading"><h3>POLICE STATION</h3></div>
	<div class="panel-body">
		<div class="row">
			<div class="col-md-7">
				<div class="panel panel-default">
					<div class="panel-heading"><h4>Add police station</h4></div>
					<div class="panel-body">
						<form method="POST">
							{{csrf_field()}}
							<table class="table table-stripped">
								<tr>
									<td>Police station name</td>
				          			<td><input type="text" name="name" id="addPS"></td>
								</tr>
								<tr>
									<td>District</td>
									<td>
										<select name="district" id="addDistrictPS">
											@forelse($districtList as $district)
												<option value="{{$district->id}}">{{$district->name}}</option>
											@empty
												<option value="0">No district</option>
											@endforelse
										</select>
									</td>
								</tr>
								<tr>
									<td>Division</td>
									<td>
										<select name="division" id="addDivisionPS">
											@forelse($divisionList as $division)
												<option value={{$division->id}}>{{$division->name}}</option>
											@empty
												<option value="0">No division</option>
											@endforelse
										</select>
									</td>
								</tr>
								
								<tr>
									<td></td>
									<td><input class="btn btn-success" type="submit" value="Add" id="submit"><br><br></td>
								</tr>
							</table>
						</form>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-7 col-sm-12">
				<div class="panel panel-default">
					<div class="panel-heading"><h4>Police station list</h4></div>
					<div class="panel-body">
						<table class="table table-stripped" id="ps">
							<tr>
								<th><strong>Name</strong></th>
								<th>Action</th>
							</tr>
							@foreach($psList as $ps)
								<tr>
									<td>{{$ps->name}}</td>
									<td><a href="{{route('information.updatePolice', [$ps->id])}}">Update</a>|<a href="#">Delete</a></td>
								</tr>
							@endforeach
						</table>
					</div>
					<div class="panel-footer">
						<table class="table">
							<tr>
								<td><strong>District:</strong></td>
								<td>
									<select name="district" id="districtPS">
										@forelse($districtList as $district)
											@if($district->id == $addresses->districtId)
												<option value="{{$district->id}}" selected>{{$district->name}}</option>
											@else
												<option value="{{$district->id}}">{{$district->name}}</option>
											@endif
										@empty
											<option value="0">No district</option>
										@endforelse
									</select>
								</td>
							</tr>
							<tr></tr>
							<tr>
								<td><strong> Division : </strong></td>
								<td>
									<select name="division" id="divisionPS">
										@forelse($divisionList as $division)
											<option value={{$division->id}}>{{$division->name}}</option>
										@empty
											<option value="0">No division</option>
										@endforelse
									</select>
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