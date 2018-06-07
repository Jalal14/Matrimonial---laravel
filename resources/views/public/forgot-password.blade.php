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
                            <label class="control-label col-md-2 col-sm-2" for="email">Email:</label>
                            <div class="col-sm-10 col-md-10">
                                <input type="email" class="form-control" name="email" placeholder="Email">
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