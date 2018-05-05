@extends('layouts.admin')

@section('content')
<div class="panel panel-default">
	<div class="panel-heading"><h3>Change password</h3></div>
	<div class="panel-body">
		<div class="row">
			<div class="col-md-8">
				<form method="POST">
					{{csrf_field()}}
		 			<table cellpadding="0" cellspacing="0">
						<tr>
							<td>Current password</td>
							<td>:</td>
							<td><input type="password" name="password"></td>
						</tr>
						<tr><td colspan="3"><hr/></td></tr>
						<tr>
							<td>New password</td>
							<td>:</td>
							<td><input type="password" name="newPassword"></td>
						</tr>
						<tr><td colspan="3"><hr/></td></tr>
						<tr>
							<td>Retype new password</td>
							<td>:</td>
							<td><input type="password" name="cNewPassword"></td>
						</tr>
						<tr><td colspan="3"><hr/></td></tr>
						<tr>
							<td></td>
							<td><input class="btn btn-success" type="submit" value="Update"> </td>
						</tr>
					</table>
				</form>
				@if(session('msg'))
  					<span class="error">{{session('msg')}}</span>
				@endif
			</div>
		</div>
	</div>
</div>
@endsection