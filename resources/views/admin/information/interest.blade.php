@extends('layouts.admin')

@section('content')
<div class="panel panel-default">
	<div class="panel-heading"><h3>INTEREST</h3></div>
	<div class="panel-body">
		<div class="row">
			<div class="col-md-7">
				<div class="panel panel-default">
					<div class="panel-heading"><h4>Add interest</h4></div>
					<div class="panel-body">
						<form method="POST">
							{{csrf_field()}}
							<table class="table table-stripped">
								<tr>
									<td>Interest name</td>
				          			<td><input type="text" name="name"></td>
								</tr>
								<tr>
									<td></td>
									<td><input class="btn btn-success" type="submit" value="Add"><br><br></td>
								</tr>
							</table>
						</form>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-7 col-sm-12">
				<div class="panel panel-default">
					<div class="panel-heading"><h4>Interest list</h4></div>
					<div class="panel-body">
						<form method="POST">
							<table class="table table-stripped">
								<tr>
									<th>Name</th>
									<th>Action</th>
								</tr>
								@forelse($interestList as $interest)
									<tr>
										<td>{{$interest->name}}</td>
										<td><a href="{{route('information.updateInterest', [$interest->id])}}">Update</a> | <a href="#">Delete</a></td>
									</tr>
								@empty
									<tr>
										<td>No</td>
										<td>Interest</td>
									</tr>
								@endforelse
							</table>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection