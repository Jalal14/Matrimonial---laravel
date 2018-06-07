@extends('layouts.public')

@section('title')
    Matrimonail - home
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-8 col-md-8">
            <div id="myCarousel" class="carousel slide banner-mid" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="item active">
                        <a href="#"><img src="{{asset('images')}}/defaultpic/couple-love.jpg" alt="LOVE"></a>
                    </div>
                    <div class="item">
                        <a href="#"><img src="{{asset('images')}}/defaultpic/desi-wedding.jpg" alt="DESI WEDDING"></a>
                    </div>
                    <div class="item">
                        <a href="#"><img src="{{asset('images')}}/defaultpic/love-couple.jpg" alt="LOVE"></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-4 col-md-4" id="search-box">
            <div class="panel panel-default">
                <div class="panel-heading"><h4>FIND YOUR PARTNER</h4></div>
                <div class="panel-body">
                    <form method="POST">
                        {{csrf_field()}}
                        <div class="form-group">
                                <label class="control-label col-sm-3" for="religion">Age:</label>
                                <select name="minAge">
                                @for($i=18; $i<=60; $i++)
                                    @if($i == $selectedMinAge)
                                        <option value={{$i}} selected> {{$i}}</option>
                                    @else
                                        <option value={{$i}}> {{$i}}</option>
                                    @endif
                                @endfor
                                </select>
                            &nbsp;TO&nbsp;
                            <select name="maxAge">
                                @for ($i=18; $i <=60 ; $i++)
                                    @if($i == $selectedMaxAge)
                                        <option value={{$i}} selected> {{$i}}</option>
                                    @else
                                        <option value={{$i}}> {{$i}}</option>
                                    @endif
                                @endfor
                            </select>
                        </div>
                        <hr>
                        <div class="form-group">
                            <label class="control-label col-sm-3" for="religion">Religion:</label>
                            <select name="religion">
                                @forelse($religionList as $religion)
                                    @if($religion->id == $selectedRel)
                                        <option value="{{$religion->id}}" selected> {{$religion->name}}</option>
                                    @else
                                        <option value="{{$religion->id}}"> {{$religion->name}}</option>
                                    @endif
                                @empty
                                @endforelse
                            </select>
                        </div>
                        <hr>
                        <div class="form-group">
                            <label class="control-label col-sm-3" for="gender">Gender:</label>
                            @forelse($genderList as $gender)
                                <label class="radio-inline">
                                    @if($gender->id == $selectedGen)
                                        &nbsp; &nbsp; <input type="radio" name="gender" value="{{$gender->id}}" checked>{{$gender->gender}}
                                    @else
                                        &nbsp; &nbsp; <input type="radio" name="gender" value="{{$gender->id}}">{{$gender->gender}}
                                    @endif
                                </label>
                            @empty
                            @endforelse
                        </div>
                        <hr>
                        <input type="submit" class="btn btn-success btn-block" value="Search">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row searched-body">
        @forelse($userList->chunk(2) as $users)
        <div class="row">
            @foreach($users as $user)
            <a href="#"  data-toggle="modal" data-target="#login-modal">
                <div class="col-sm-5 col-md-5 searched-profile">
                    <img class="thumbnail user-image" src="{{asset('images')}}/{{$user->propic}}">
                    <div class="user-info">
                        <table class="table table-stripped">
                            <tr>
                                <span class="user-name">{{$user->fname}} {{$user->lname}} {{$user->mname}} </span>
                            </tr>
                            <tr>
                                <td>Age</td>
                                <td>:</td>
                                <td>{{$user->age}} </td>
                            </tr>
                            <tr>
                                <td>Gender</td>
                                <td>:</td>
                                <td>{{$user->gender_name}}</td>
                            </tr>
                            <tr>
                                <td>Religion</td>
                                <td>:</td>
                                <td>{{$user->religion_name}}</td>
                            </tr>
                            <tr>
                                <td>VIEW DETAILS</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </a>
            @endforeach
        </div>
        @empty
            <span class="error"><h2>User not found</h2></span>
        @endforelse
    </div>
</div>
@endsection