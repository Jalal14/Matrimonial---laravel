@extends('layouts.admin')

@section('content')
<div class="panel panel-default">
	<div class="panel-heading"><h3>DISTRICT</h3></div>
	<div class="panel-body">
		<div class="row">
			<div class="col-md-7">
				<div class="panel panel-default">
					<div class="panel-heading"><h4>Update district</h4></div>
					<div class="panel-body">
						<form method="POST">
							{{csrf_field()}}
							<input type="hidden" name="districtId" value="{{$district->id}}">
							<table class="table table-stripped">
								<tr>
									<td>District name</td>
				          			<td><input type="text" name="name" value="{{$district->name}}"></td>
								</tr>
								<tr>
									<td>Division</td>
									<td>
										<select name="division">
											@forelse($divisionList as $division)
												@if($division->id == $district->division)
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
									<td><input class="btn btn-success" type="submit" value="Update"><br><br></td>
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