@extends('layouts.user')

@section('title')
<title>Matrimonial - password</title>
@endsection

@section('content')
<div class="row">
	<div class="col-md-6">
		<div class="panel panel-default">
			<div class="panel-heading"><h4>CHANGE PASSWORD</h4></div>
			<div class="panel-body">
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
					@if($errors->any())
	  					@foreach($errors->all() as $error)
							<p class="error">* {{$error}}</p>
						@endforeach
	  				@endif
	  				@if(session('msg'))
	  					<span class="error">{{session('msg')}}</span>
					@endif
				</form>
			</div>
		</div>
	</div>
</div>
@endsection