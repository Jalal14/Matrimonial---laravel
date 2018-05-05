@extends('layouts.admin')

@section('content')
<div class="panel panel-default">
	<div class="panel-heading"><h3>DISTRICT</h3></div>
	<div class="panel-body">
		<div class="row">
			<div class="col-md-7">
				<div class="panel panel-default">
					<div class="panel-heading"><h4>Add district</h4></div>
					<div class="panel-body">
						<form method="POST">
							{{csrf_field()}}
							<table class="table table-stripped">
								<tr>
									<td>District name</td>
				          			<td><input type="text" name="name"></td>
								</tr>
								<tr>
									<td>Division</td>
									<td>
										<select name="division">
											@forelse($divisionList as $division)
												@if($division->id == $addresses->divisionId)
													<option value={{$division->id}} selected>{{$division->name}}</option>
												@else
													<option value={{$division->id}}>{{$division->name}}</option>
												@endif
											@empty
												<option value="0">No division</option>
											@endforelse
										</select>
									</td>
								</tr>
								<tr>
									<td></td>
									<td><input class="btn btn-success" type="submit" value="Add"><br><br></td>
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
					<div class="panel-heading"><h4>District list</h4></div>
					<div class="panel-body">
						<table class="table table-hover" id="district">
							<tr>
								<th>Name</th>
								<th>Action</th>
							</tr>
							@forelse($districtList as $district)
								<tr>
									<td>{{$district->name}}</td>
									<td><a href="{{route('information.updateDistrict', [$district->id])}}">Update</a>|<a href="#">Delete</a></td>
								</tr>
							@empty
								<tr>
									<td>No</td>
									<td>District</td>
								</tr>
							@endforelse
						</table>
					</div>
					<div class="panel-footer">
						<strong>Division : </strong>
						<select name="division" id="division">
							@forelse($divisionList as $division)
								@if($division->id == $addresses->divisionId)
									<option value={{$division->id}} selected>{{$division->name}}</option>
								@else
									<option value={{$division->id}}>{{$division->name}}</option>
								@endif
							@empty
								<option value="0">No division</option>
							@endforelse
						</select>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection