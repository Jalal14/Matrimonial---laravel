@extends('layouts.user')

@section('title')
<title>Matrimonial - life style</title>
@endsection

@section('content')
<div class="row">
	<div class="col-md-6">
		<div class="panel panel-default">
			<div class="panel-heading"><h4>LIFE STYLE</h4></div>
			<div class="panel-body">
				<form method="POST">
					{{csrf_field()}}
					<table>
						<tr>
							<div class="panel panel-default">
								<div class="panel-heading"><h4>Interests</h4></div>
								<div class="panel-body">
									@forelse($interestList as $interest)
										@php
											$match = false;
										@endphp
										@forelse($userInterestList as $userInterest)
											@if($userInterest->interest == $interest->id)
												@php
													$match = true;
													break;
												@endphp
											@endif
										@empty
										@endforelse
										<div class="checkbox">
											@if($match)
												<label><input type="checkbox" name="interest[]" value="{{$interest->id}}" checked>{{$interest->name}}</label>
											@else
												<label><input type="checkbox" name="interest[]" value="{{$interest->id}}">{{$interest->name}}</label>
											@endif
										</div>
									@empty
									@endforelse
								</div>
							</div>
						</tr>
						<tr>
							<div class="panel panel-default">
								<div class="panel-heading"><h4>Hobbies</h4></div>
								<div class="panel-body">
									@forelse($hobbyList as $hobby)
										@php
											$match = false;
										@endphp
										@forelse($userHobbyList as $userHobby)
											@if($userHobby->hobby == $hobby->id)
												@php
													$match = true;
													break;
												@endphp
											@endif
										@empty
										@endforelse
										<div class="checkbox">
											@if($match)
												<label><input type="checkbox" name="hobby[]" value="{{$hobby->id}}" checked>{{$hobby->name}}</label>
											@else
												<label><input type="checkbox" name="hobby[]" value="{{$hobby->id}}">{{$hobby->name}}</label>
											@endif
										</div>
									@empty
									@endforelse
								</div>
							</div>
						</tr>
						<tr><td colspan="3"><hr/></td></tr>
						<tr>
							<div class="panel panel-default">
								<div class="panel-heading"><h4>Music</h4></div>
								<div class="panel-body">
									@forelse($musicList as $music)
										@php
											$match = false;
										@endphp
										@forelse($userMusicList as $userMusic)
											@if($userMusic->music == $music->id)
												@php
													$match = true;
													break;
												@endphp
											@endif
										@empty
										@endforelse
										<div class="checkbox">
											@if($match)
												<label><input type="checkbox" name="music[]" value="{{$music->id}}" checked>{{$music->name}}</label>
											@else
												<label><input type="checkbox" name="music[]" value="{{$music->id}}">{{$music->name}}</label>
											@endif
										</div>
									@empty
									@endforelse
								</div>
							</div>
						</tr>
						<tr>
							<div class="panel panel-default">
								<div class="panel-heading"><h4>Sports</h4></div>
								<div class="panel-body">
									@forelse($sportList as $sport)
										@php
											$match = false;
										@endphp
										@forelse($userSportList as $userSport)
											@if($userSport->sport == $sport->id)
												@php
													$match = true;
													break;
												@endphp
											@endif
										@empty
										@endforelse
										<div class="checkbox">
											@if($match)
												<label><input type="checkbox" name="sport[]" value="{{$sport->id}}" checked>{{$sport->name}}</label>
											@else
												<label><input type="checkbox" name="sport[]" value="{{$sport->id}}">{{$sport->name}}</label>
											@endif
										</div>
									@endforeach
								</div>
							</div>
						</tr>
						<tr>
							<input class="btn btn-success" type="submit" value="Update">
						</tr>
					</table>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection