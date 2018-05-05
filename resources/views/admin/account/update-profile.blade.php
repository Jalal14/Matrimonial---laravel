@extends('layouts.admin')

@section('content')
<div class="panel panel-default">
	<div class="panel-heading"><h3>Update profile</h3></div>
	<div class="panel-body">
		<div class="row">
			<div class="col-md-12">
				<form method="POST">
					{{csrf_field()}}
					<input type="hidden" name="adminId" value="{{$admin->aid}}">
					<div class="col-md-8">
						<div class="panel panel-default">
							<div class="panel-heading"><h4>INFORMATION</h4></div>
							<div class="panel-body">
								<table cellpadding="0" cellspacing="0">
									<tr>
										<td>First name</td>
										<td>:</td>
										<td><input type="text" name="fName" value={{$admin->fname}}></td>
									</tr>
									<tr><td colspan="3"><hr/></td></tr>
									<tr>
										<td>Middle name</td>
										<td>:</td>
										<td><input type="text" name="mName" value={{$admin->mname}}></td>
									</tr>
									<tr><td colspan="3"><hr/></td></tr>
									<tr>
										<td>Last name</td>
										<td>:</td>
										<td><input type="text" name="lName" value={{$admin->lname}}></td>
									</tr>
									<tr><td colspan="3"><hr/></td></tr>
									<tr>
										<td>Date of birth</td>
										<td>:</td>
										<td><input type="date" name="dob" value="{{$admin->dob}}"> </td>
									</tr>
									<tr><td colspan="3"><hr/></td></tr>
									<tr>
										<td>Gender</td>
										<td>:</td>
										<td>
											@forelse($genderList as $gender)
												<label class="radio-inline">&nbsp; &nbsp;
													@if($gender->id == $admin->gender)
														<input type="radio" name="gender" value={{$gender->id}} checked>{{$gender->gender}}
													@else
														<input type="radio" name="gender" value={{$gender->id}}>{{$gender->gender}}
													@endif
												</label>
											@empty
											@endforelse
										</td>
									</tr>
									<tr><td colspan="3"><hr/></td></tr>
									<tr>
										<td>Blood group</td>
										<td>:</td>
										<td>
		  									<select class="form-control" name="blood">
		  										@forelse($bloodList as $blood)
		  											@if($blood->id == $admin->blood)
		  												<option value={{$blood->id}} selected>{{$blood->bgroup}}</option>
		  											@else
		  												<option value={{$blood->id}}>{{$blood->bgroup}}</option>
		  											@endif
		  										@empty
		  										@endforelse
		  									</select>
										</td>
									</tr>
									<tr><td colspan="3"><hr/></td></tr>
									<tr>
										<td>Email</td>
										<td>:</td>
										<td><input type="email" name="email" value="{{$admin->email}}"> </td>
									</tr>
									<tr><td colspan="3"><hr/></td></tr>
									<tr>
										<td>Contact</td>
										<td>:</td>
										<td><label for="number1">number1</label><input type="text" name="number1" value="{{$admin->number1}}">
									 		<hr/>
									 		<label for="number2">number1</label><input type="text" name="number2" value="{{$admin->number2}}">
										</td>
									</tr>
								</table>
							</div>
							<div class="panel-footer">
								<input class="btn btn-success" type="submit" value="Update">
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection