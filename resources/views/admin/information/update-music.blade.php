@extends('layouts.admin')

@section('content')
<div class="panel panel-default">
	<div class="panel-heading"><h3>MUSIC</h3></div>
	<div class="panel-body">
		<div class="row">
			<div class="col-md-7">
				<div class="panel panel-default">
					<div class="panel-heading"><h4>Update music</h4></div>
					<div class="panel-body">
						<form method="POST">
							{{csrf_field()}}
							<input type="hidden" name="musicId" value={{"$music->id"}}>
							<table class="table table-stripped">
								<tr>
									<td>Music name</td>
				          			<td><input type="text" name="name"  value={{"$music->name"}}></td>
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