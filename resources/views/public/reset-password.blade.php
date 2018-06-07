@extends('layouts.public')
@section('title')
    Matrimonial - reset password
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-12"></div>
            <div class="col-md-6 col-sm-12">
                <div class="panel panel-default">
                    <div class="panel-heading"><h4>RESET PASSWORD</h4></div>
                    <div class="panel-body">
                        <form method="POST" class="form-horizontal">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label class="control-label col-md-4 col-sm-4" for="newPassword">New password:</label>
                                <div class="col-sm-8 col-md-8">
                                    <input type="password" class="form-control" name="newPassword">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-4 col-sm-4" for="confirmPassword">Confirm new password:</label>
                                <div class="col-sm-8 col-md-8">
                                    <input type="password" class="form-control" name="confirmPassword">
                                </div>
                            </div>
                            <input type="submit" class="btn btn-success btn-block" value="Submit">
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
    </div>
@endsection