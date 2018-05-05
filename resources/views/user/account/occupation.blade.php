@extends('layouts.user')

@section('title')
<title>Matrimonial - occupation</title>
@endsection

@section('content')
<div class="row">
	<div class="col-md-6">
		<div class="panel panel-default">
			<div class="panel-heading"><h4>OCCUPATION INFORMATION</h4></div>
			<div class="panel-body">
				<form method="POST">
					{{csrf_field()}}
					<table cellpadding="0" cellspacing="0">
						<tr>
							<td>Designation</td>
							<td>:</td>
							<td><input type="text" name="designation" value="@if($user!=null){{$user->designation}}@endif"></td>
						</tr>
						<tr><td colspan="3"><hr/></td></tr>
						<tr>
							<td>Company</td>
							<td>:</td>
							<td><input type="text" name="company" value="@if($user!=null){{$user->company}}@endif"></td>
						</tr>
						<tr><td colspan="3"><hr/></td></tr>
						<tr>
							<td>Joinning date</td>
							<td>:</td>
							<td><input type="date" name="joinning_date" value="@if($user!=null){{$user->joinning_date}}@endif"></td>
						</tr>
						<tr><td colspan="3"><hr/></td></tr>
						<tr>
							<td>Annual income</td>
							<td>:</td>
							<td><input type="number" name="income" value="@if($user!=null){{$user->annual_income}}@endif"></td>
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