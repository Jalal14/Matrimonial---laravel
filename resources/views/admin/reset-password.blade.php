<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="{{asset('css')}}/adminstyle.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-sm-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <H3>Forgot password</H3>
                </div>
                <div class="panel-body">
                    <form method="POST" class="form-horizontal">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label class="control-label col-md-2 col-sm-2" for="newPasssword">New password:</label>
                            <div class="col-sm-10 col-md-10">
                                <input type="password" class="form-control" name="newPassword">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-2 col-sm-2" for="confirmPassword">Confirm password:</label>
                            <div class="col-sm-10 col-md-10">
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
                <div class="panel-footer">
                    <a href="{{route('login.admin')}}">Login</a>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>