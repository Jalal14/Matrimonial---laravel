@extends('layouts.user')

@section('title')
<title>Matrimonial - present address</title>
@endsection

@section('content')
<div class="row">
	<div class="col-md-6">
		<div class="panel panel-default">
			<div class="panel-heading"><h4>PRESENT ADDRESS</h4></div>
			<div class="panel-body">
				<form method="POST">
					{{csrf_field()}}
					<table cellpadding="0" cellspacing="0">
						<tr>
							<td>House</td>
							<td>:</td>
							<td><input type="text" name="house" value="@if($user!=null){{$user->pr_house}}@endif"></td>
						</tr>
						<tr><td colspan="3"><hr/></td></tr>
						<tr>
							<td>Road</td>
							<td>:</td>
							<td><input type="text" name="road" value="@if($user!=null){{$user->pr_road}}@endif"></td>
						</tr>
						<tr><td colspan="3"><hr/></td></tr>
						<tr>
							<td>Area</td>
							<td>:</td>
							<td><input type="text" name="area" value="@if($user!=null){{$user->pr_area}}@endif"></td>
						</tr>
						<tr><td colspan="3"><hr/></td></tr>
						<tr>
							<td>Division</td>
							<td>:</td>
							<td>
								<select class="form-control" name="division" id="division">
									@forelse($divisionList as $division)
										@if($user!=null && $user->division == $division->id)
											<option value="{{$division->id}}" selected>{{$division->name}}</option>
										@else
											<option value="{{$division->id}}">{{$division->name}}</option>
										@endif
									@empty
									@endforelse
								</select>
							</td>
						</tr>
						<tr><td colspan="3"><hr/></td></tr>
						<tr>
							<td>District</td>
							<td>:</td>
							<td>
								<select class="form-control" name="district" id="district">
									@forelse($districtList as $district)
										@if($user!=null && $user->district == $district->id)
											<option value="{{$district->id}}" selected>{{$district->name}}</option>
										@else
											<option value="{{$district->id}}">{{$district->name}}</option>
										@endif
									@empty
									@endforelse
								</select>
							</td>
						</tr>
                        <tr><td colspan="3"><hr/></td></tr>
                        <tr>
                            <td>Police station</td>
                            <td>:</td>
                            <td>
                                <select class="form-control" name="police_station" id="ps">
                                    @forelse($psList as $ps)
                                        @if($user!=null && $user->pr_police_station == $ps->id)
                                            <option value="{{$ps->id}}" selected>{{$ps->name}}</option>
                                        @else
                                            <option value="{{$ps->id}}">{{$ps->name}}</option>
                                        @endif
                                    @empty
                                    @endforelse
                                </select>
                            </td>
                        </tr>
						<tr><td colspan="3"><hr/></td></tr>
						<tr>
							<td></td>
							<td><input class="btn btn-success" type="submit" value="Update"> </td>
						</tr>
					</table>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection