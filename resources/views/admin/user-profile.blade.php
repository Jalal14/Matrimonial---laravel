@extends('layouts.admin')

@section('content')
<div class="panel panel-default">
	<div class="panel-heading"><h3>Registration request</h3></div>
	<div class="panel-body">
		<div class="row">
			<div class="col-md-12">
				<img class="thumbnail user-image" src="{{asset('images')}}/default/user.png">
				<div class="user-info">
					<table class="table table-stripped">
						<tr>
							<span class="user-name">Sumon sutrodhor</span><br>
						</tr>
						<tr>
							<td>Age</td>
							<td>:</td>
							<td>24</td>
						</tr>
						<tr>
							<td>Gender</td>
							<td>:</td>
							<td>Male</td>
						</tr>
						<tr>
							<td>Religion</td>
							<td>:</td>
							<td>Islam</td>
						</tr>
					</table>
				</div>
			</div>
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading"><h4>ADDITIONAL INFORMATION</h4></div>
					<div class="panel-body">
						<table cellpadding="0" cellspacing="0">
							<tr>
								<td>Height</td>
								<td>:</td>
								<td><label>5.5</label></td>
							</tr>
							<tr><td colspan="3"><hr/></td></tr>
							<tr>
								<td>Weight</td>
								<td>:</td>
								<td><label>55Kg</label></td>
							</tr>
							<tr><td colspan="3"><hr/></td></tr>
							<tr>
								<td>Blood group</td>
								<td>:</td>
								<td><label>O+</label> </td>
							</tr>
							<tr><td colspan="3"><hr/></td></tr>
							<tr>
								<td>Email</td>
								<td>:</td>
								<td><label>example@email.com</label></td>
							</tr>
							<tr><td colspan="3"><hr/></td></tr>
							<tr>
								<td>Contact</td>
								<td>:</td>
								<td><label>number1</label>
							 		<br>
							 		<label>number2</label>
								</td>
							</tr>
							<tr><td colspan="3"><hr/></td></tr>
							<tr>
								<td>Complexion</td>
								<td>:</td>
								<td><label>Fair</label></td>
							</tr>
							<tr><td colspan="3"><hr/></td></tr>
							<tr>
								<td>Marital status</td>
								<td>:</td>
								<td><label>Single</label></td>
							</tr>
							<tr><td colspan="3"><hr/></td></tr>
							<tr>
								<td>Children</td>
								<td>:</td>
								<td><label>0</label></td>
							</tr>
							<tr><td colspan="3"><hr/></td></tr>
							<tr>
								<td>Permanent address</td>
								<td>:</td>
								<td><label>Permanent address</label></td>
							</tr>
							<tr><td colspan="3"><hr/></td></tr>
							<tr>
								<td>Present address</td>
								<td>:</td>
								<td><label>Present address</label> </td>
							</tr>
							<tr><td colspan="3"><hr/></td></tr>
							<tr>
								<td>Occupation</td>
								<td>:</td>
								<td><label>Occupation</label></td>
							</tr>
							<tr><td colspan="3"><hr/></td></tr>
							<tr>
								<td>Annual income</td>
								<td>:</td>
								<td><label>1000000</label></td>
							</tr>
							<tr><td colspan="3"><hr/></td></tr>
							<tr>
								<td>Education</td>
								<td>:</td>
								<td><label>Education</label> </td>
							</tr>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="panel-footer">
		<input class="btn btn-success" type="submit" value="Approve">
		<input class="btn btn-danger" type="submit" value="Reject">
	</div>
</div>
@endsection