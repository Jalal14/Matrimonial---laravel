@extends('layouts.user')

@section('title')
<title>Matrimonial - update profile</title>
@endsection

@section('style')
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
@endsection

@section('script')
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
@endsection

@section('content')
<div class="row">
	<form method="POST"  enctype="multipart/form-data">
		{{csrf_field()}}
		<div class="col-md-12">
			<div class="user-info">
				<table class="table table-stripped">
					<tr>
						<td>First name</td>
						<td>:</td>
						<td><input type="text" name="fName" value="{{$user->fname}}"></td>
					</tr>
					<tr>
						<td>Middle name</td>
						<td>:</td>
						<td><input type="text" name="mName" value="{{$user->mname}}"></td>
					</tr>
					<tr>
						<td>Last name</td>
						<td>:</td>
						<td><input type="text" name="lName" value="{{$user->lname}}"></td>
					</tr>
					<tr>
						<td>Date of birth</td>
						<td>:</td>
						<td><input type="text" name="dob" value="{{$user->dob}}" id="dob"></td>
					</tr>
					<tr>
						<td>Gender</td>
						<td>:</td>
						<td>
							@forelse($genderList as $gender)
								<label class="radio-inline">
									@if($gender->id == $user->gender )
										&nbsp; &nbsp; <input type="radio" name="gender" value="{{$gender->id}}" checked>{{$gender->gender}}
									@else
										&nbsp; &nbsp; <input type="radio" name="gender" value="{{$gender->id}}">{{$gender->gender}}
							    	@endif
							    </label>
							@empty
							@endforelse
						</td>
					</tr>
					<tr>
						<td>Religion</td>
						<td>:</td>
						<td>
							<select name="religion">
								@forelse($religionList as $religion)
									@if($religion->id == $user->religion)
										<option value="{{$religion->id}}" selected>{{$religion->name}}</option>
									@else
										<option value="{{$religion->id}}">{{$religion->name}}</option>
									@endif
								@empty
								@endforelse
                            </select>
						</td>
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
							<td><input type="text" name="height" value="{{$user->height}}"></td>
						</tr>
						<tr><td colspan="3"><hr/></td></tr>
						<tr>
							<td>Weight</td>
							<td>:</td>
							<td><input type="text" name="weight" value="{{$user->weight}}">&nbsp;kg</td>
						</tr>
						<tr><td colspan="3"><hr/></td></tr>
						<tr>
							<td>Blood group</td>
							<td>:</td>
							<td>
								<select class="form-control" name="blood">
									@forelse($bloodList as $blood)
										@if($blood->id == $user->blood)
											<option value="{{$blood->id}}" selected>{{$blood->bgroup}}</option>
										@else
											<option value="{{$blood->id}}">{{$blood->bgroup}}</option>
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
							<td><input type="email" name="email" value="{{$user->email}}"></td>
						</tr>
						<tr><td colspan="3"><hr/></td></tr>
						<tr>
							<td>Contact</td>
							<td>:</td>
							<td><label for="contact">number1</label><input type="text" name="contact" value="{{$user->number1}}">
						 		<hr/>
						 		<label for="contact2">number2</label><input type="text" name="contact2" value="{{$user->number2}}">
							</td>
						</tr>
						<tr><td colspan="3"><hr/></td></tr>
						<tr>
							<td>Complexion</td>
							<td>:</td>
							<td>
								<select class="form-control" name="complexion">
									@forelse($complexionList as $complexion)
										@if($complexion->id == $user->complexion)
											<option value="{{$complexion->id}}" selected>{{$complexion->type}}</option>
										@else
											<option value="{{$complexion->id}}">{{$complexion->type}}</option>
										@endif
									@empty
									@endforelse
								</select>
							</td>
						</tr>
						<tr><td colspan="3"><hr/></td></tr>
						<tr>
							<td>Marital status</td>
							<td>:</td>
							<td>
								<select class="form-control" name="marital">
									@forelse($statusList as $status)
										@if($status->id == $user->marital_status)
											<option value="{{$status->id}}" selected>{{$status->status}}</option>
										@else
											<option value="{{$status->id}}">{{$status->status}}</option>
										@endif
									@empty
									@endforelse
								</select>
							</td>
						</tr>
						<tr><td colspan="3"><hr/></td></tr>
						<tr>
							<td>Children</td>
							<td>:</td>
							<td><input type="number" name="children" value="{{$user->children}}"></td>
						</tr>
						<tr><td colspan="3"><hr/></td></tr>
						<tr>
							<td></td>
							<td><input class="btn btn-success" type="submit" value="Update"> </td>
						</tr>
					</table>
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
	</form>
</div>
@endsection