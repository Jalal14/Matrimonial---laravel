@extends('layouts.user')

@section('title')
<title>Matrimonial - family</title>
@endsection

@section('content')
<div class="row">
	<div class="col-md-6">
		<div class="panel panel-default">
			<div class="panel-heading"><h4>FAMILY INFORMATION</h4></div>
			<div class="panel-body">
				<form method="POST">
					{{csrf_field()}}
					<table cellpadding="0" cellspacing="0">
						<tr>
							<td>Family type</td>
							<td>:</td>
							<td>
								<select class="form-control" name="family_type">
									@forelse($typeList as $type)
										@if($user!=null && $type->id == $user->family_type)
											<option value="{{$type->id}}" selected>{{$type->type}}</option>
										@else
											<option value="{{$type->id}}">{{$type->type}}</option>
										@endif
									@empty
									@endforelse
								</select>
							</td>
						</tr>
						<tr><td colspan="3"><hr/></td></tr>
						<tr>
							<td>Father's name</td>
							<td>:</td>
							<td><input type="text" name="faName" value="@if($user!=null){{$user->father_name}}@endif"></td>
						</tr>
						<tr><td colspan="3"><hr/></td></tr>
						<tr>
							<td>Father's occupation</td>
							<td>:</td>
							<td><input type="text" name="faOccupation"  value="@if($user!=null){{$user->father_occupation}}@endif"></td>
						</tr>
						<tr><td colspan="3"><hr/></td></tr>
						<tr>
							<td>Father's annual income</td>
							<td>:</td>
							<td><input type="number" name="faIncome"  value="@if($user!=null){{$user->father_income }}@endif"></td>
						</tr>
						<tr><td colspan="3"><hr/></td></tr>
						<tr>
							<td>Mother's name</td>
							<td>:</td>
							<td><input type="text" name="moName" value="@if($user!=null){{$user->mother_name}}@endif"></td>
						</tr>
						<tr><td colspan="3"><hr/></td></tr>
						<tr>
							<td>Mother's occupation</td>
							<td>:</td>
							<td><input type="text" name="moOccupation" value="@if($user!=null){{$user->mother_occupation}}@endif"></td>
						</tr>
						<tr><td colspan="3"><hr/></td></tr>
						<tr>
							<td>Mother's annual income</td>
							<td>:</td>
							<td><input type="number" name="moIncome" value="@if($user!=null){{$user->mother_income}}@endif"></td>
						</tr>
						<tr><td colspan="3"><hr/></td></tr>
						<tr>
							<td>Contact</td>
							<td>:</td>
							<td><input type="text" name="fContact" value="@if($user!=null){{$user->contact}}@endif"></td>
						</tr>
						<tr><td colspan="3"><hr/></td></tr>
						<tr>
							<td>Siblings</td>
							<td>:</td>
							<td><input type="number" name="siblings" value="@if($user!=null){{$user->siblings}}@endif"></td>
						</tr>
						<tr><td colspan="3"><hr/></td></tr>
						<tr>
							<td></td>
							<td><input class="btn btn-success" type="submit" value="Update"> </td>
						</tr>
					</table>
				</form>
			</div>
			<div class="panel-footer">
                @if($errors->any())
                    @foreach($errors->all() as $error)
                        <p class="error">* {{$error}}</p>
                    @endforeach
                @endif
            </div>
		</div>
	</div>
</div>
@endsection