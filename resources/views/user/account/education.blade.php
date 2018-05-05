@extends('layouts.user')

@section('title')
<title>Matrimonial - education</title>
@endsection

@section('style')
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
@endsection

@section('script')
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
@endsection

@section('content')
<div class="row">
	<div class="col-md-6">
		<div class="panel panel-default">
			<div class="panel-heading"><h4>EDUCATION INFORMATION</h4></div>
			<div class="panel-body">
				<form method="POST">
					{{csrf_field()}}
					<table cellpadding="0" cellspacing="0">
						<tr>
							<td>Degree</td>
							<td>:</td>
							<td>
								<select class="form-control" name="degree">
									@forelse($degreeList as $degree)
										@if($user!=null && $user->degree == $degree->id)
											<option value="{{$degree->id}}" selected>{{$degree->degree}}</option>
										@else
											<option value="{{$degree->id}}">{{$degree->degree}}</option>
										@endif
									@empty
									@endforelse
								</select>
							</td>
						</tr>
						<tr><td colspan="3"><hr/></td></tr>
						<tr>
							<td>Field</td>
							<td>:</td>
							<td><input type="text" name="field" value="@if($user!=null){{$user->field}}@endif"></td>
						</tr>
						<tr><td colspan="3"><hr/></td></tr>
						<tr>
							<td>Institution</td>
							<td>:</td>
							<td><input type="text" name="institution" value="@if($user!=null){{$user->institution}}@endif"></td>
						</tr>
						<tr><td colspan="3"><hr/></td></tr>
						<tr>
							<td>Passing year</td>
							<td>:</td>
							<td><input type="text" name="passing_year" id="passing-date" value="@if($user!=null){{$user->passing_year}}@endif"></td>
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