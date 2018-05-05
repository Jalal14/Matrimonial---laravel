@extends('layouts.admin')

@section('content')
<div class="panel panel-default">
	<div class="panel-heading"><h3>COMPLEXION</h3></div>
	<div class="panel-body">
		<div class="row">
			<div class="col-md-7">
				<div class="panel panel-default">
					<div class="panel-heading"><h4>Update complexion</h4></div>
					<div class="panel-body">
						<form method="POST">
							{{csrf_field()}}
							<input type="hidden" name="complexionId" value="{{$complexion->id}}">
							<table class="table table-stripped">
								<tr>
									<td>Complexion name</td>
				          			<td><input type="text" name="name" value="{{$complexion->type}}"></td>
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