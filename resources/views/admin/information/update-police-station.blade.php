@extends('layouts.admin')

@section('content')
<div class="panel panel-default">
	<div class="panel-heading"><h3>POLICE STATION</h3></div>
	<div class="panel-body">
		<div class="row">
			<div class="col-md-7">
				<div class="panel panel-default">
					<div class="panel-heading"><h4>Update police station</h4></div>
					<div class="panel-body">
						<form method="POST">
							{{csrf_field()}}
							<input type="hidden" name="psId" value="{{$ps->id}}">
							<table class="table table-stripped">
								<tr>
									<td>Police station name</td>
				          			<td><input type="text" name="name" value="{{$ps->name}}"></td>
								</tr>
								<tr>
									<td>District</td>
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
								<tr>
									<td>Division</td>
									<td>
										<select name="division" id="divisionPS">
											@forelse($divisionList as $division)
												@if($division->id == $addresses->divisionId)
													<option value="{{$division->id}}" selected>{{$division->name}}</option>
												@else
													<option value="{{$division->id}}">{{$division->name}}</option>
												@endif
											@empty
												<option value="0">No division</option>
											@endforelse
										</select>
									</td>
								</tr>
								<tr>
									<td></td>
									<td><input class="btn btn-success" type="submit" value="Update" id="submit"><br><br></td>
								</tr>
							</table>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection