<!DOCTYPE html>
<html>
<head>
    <title> @yield('title') </title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" type="text/css" href="{{asset('css')}}/stylesheet.css">

    <!-- <script type="text/javascript" src="/matrimonial views/assets/js/jquery.min.js"></script>
    <script type="text/javascript" src="/matrimonial views/assets/js/bootstrap.min.js"></script> -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="{{asset('js')}}/userscript.js"></script>
</head>
<body>
<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{route('public.index')}}"><span><img src="{{asset('images')}}/defaultpic/ring.png" alt="MATRIMONIAL"></span></a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#" data-toggle="modal" data-target="#signup-modal">SIGNUP</a></li>
                <li><a href="#" data-toggle="modal" data-target="#login-modal">LOGIN</a></li>
            </ul>
        </div>
    </div>
</nav>
<div class="container">
    <!--Login modal-->
    <div class="modal fade" id="login-modal" role="dialog">
        <div class="modal-dialog">
            <!--Modal content-->
            <div class="modal-content">
                <div class="modal-header modal-icon">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <center>
                        <h4><span><img src="{{asset('images')}}/defaultpic/login.png" class="img-circle" alt="Login" width="60" height="60">
							</span> LOGIN</h4>
                    </center>
                </div>
                <div class="modal-body">
                    <form method="POST" action="/login">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="username"> Username</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                <input type="text" name="username" class="form-control" placeholder="Enter username">
                            </div>
                            <span id="usernameMsg" class="error"></span>
                        </div>
                        <div class="form-group">
                            <label for="password"> Password</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                <input type="password" name="password" class="form-control" placeholder="Enter password">
                            </div>
                            <span id="passwordMsg" class="error"></span>
                        </div>

                        @if($errors->any())
                            @foreach($errors->all() as $error)
                                <p class="error">* {{$error}}</p>
                            @endforeach
                        @endif
                        <div id="msg" class="error">
                            @if(session('msg'))
                                {{session('msg')}}
                            @endif
                        </div>
                        <div class="checkbox">
                            <label><input type="checkbox" value="">Remember me</label>
                        </div>
                        <input type="submit" class="btn btn-success btn-block" value="Login">
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger btn-default pull-left" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                    <p>Not a member? <a href="#" class="sign-up">Signup</a></p>
                    <p><a href="{{route('password.index')}}">Forgot Password?</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <!-- Signup modal  -->
    <div class="modal fade" id="signup-modal" role="dialog">
        <div class="modal-dialog">
            <!--Modal content-->
            <div class="modal-content">
                <div class="modal-header modal-icon">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <center>
                        <h4><span><img src="{{asset('images')}}/defaultpic/signup.png" class="img-circle" alt="Signup" width="60" height="60"></span> SIGNUP</h4>
                    </center>
                </div>
                <div class="modal-body">
                    <div class="tab-content">
                        <div class="tab-pane fade in active">
                            <form class="form-horizontal" method="POST" action="/registration">
                                {{csrf_field()}}
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3" for="fName">First name:</label>
                                    <div class="col-sm-9 col-md-9">
                                        <input type="text" class="form-control" name="fName" placeholder="First name" value="{{old('fName')}}">
                                        <span id="fNameMsg" class="error"></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-3 col-md-3" for="mName">Middle name:</label>
                                    <div class="col-sm-9 col-md-9">
                                        <input type="text" class="form-control" name="mName" placeholder="Middle name" value="{{old('mName')}}">
                                        <span id="mNameMsg" class="error"></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-3 col-md-3" for="lName">Last name:</label>
                                    <div class="col-sm-9 col-md-9">
                                        <input type="text" class="form-control" name="lName" placeholder="Last name" value="{{old('lName')}}">
                                        <span id="lNameMsg" class="error"></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-3 col-md-3" for="userName">User name:</label>
                                    <div class="col-sm-9 col-md-9">
                                        <input type="text" class="form-control" name="userName" placeholder="User name"  value="{{old('userName')}}">
                                        <span id="userNameMsg" class="error"></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-3 col-md-3" for="dob">Date of birth:</label>
                                    <div class="col-sm-4 col-md-4">
                                        <input type="text" class="form-control" name="dob" id="dob" value="{{old('dob')}}">
                                        <span id="dobMsg" class="error"></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-3 col-md-3" for="blood">Blood group:</label>
                                    <div class="col-sm-2 col-md-2">
                                        <select class="form-control" name="blood" id="blood">
                                            @forelse($bloodList as $blood)
                                                <option value="{{$blood->id}}">{{$blood->bgroup}}</option>
                                            @empty
                                            @endforelse
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-3" for="gender">Gender:</label>
                                    @forelse($genderList as $gender)
                                        <label class="radio-inline">
                                            &nbsp; &nbsp; <input type="radio" name="gender" value="{{$gender->id}}" checked>{{$gender->gender}}
                                        </label>
                                    @empty
                                    @endforelse
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-3 col-md-3" for="email">Email:</label>
                                    <div class="col-sm-9 col-md-9">
                                        <input type="email" class="form-control" placeholder="Email" name="email" value="{{old('email')}}">
                                        <span id="emailMsg" class="error"></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-3 col-md-3" for="religion">Religion:</label>
                                    <div class="col-sm-3 col-md-3">
                                        <select class="form-control" name="religion" id="religion">
                                            @forelse($religionList as $religion)
                                                <option value="{{$religion->id}}">{{$religion->name}}</option>
                                            @empty
                                            @endforelse
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-3 col-md-3" for="contact">Contact:</label>
                                    <div class="col-sm-6 col-md-6">
                                        <input type="text" class="form-control" placeholder="Contact" name="contact" value="{{old('contact')}}">
                                        <span id="contactMsg" class="error"></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-3 col-md-3" for="pass">Password:</label>
                                    <div class="col-sm-6 col-md-6">
                                        <input type="password" class="form-control" placeholder="Password" name="pass">
                                        <span id="passMsg" class="error"></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-3 col-md-3" for="
	  									cPassword">Confirm password:</label>
                                    <div class="col-sm-6 col-md-6">
                                        <input type="password" class="form-control" placeholder="Confirm password" name="cPass">
                                        <span id="cPassMsg" class="error"></span>
                                    </div>
                                </div>
                                @if($errors->any())
                                    @foreach($errors->all() as $error)
                                        <p class="error">* {{$error}}</p>
                                    @endforeach
                                @endif
                                <input type="submit" class="btn btn-success btn-block" value="Signup">
                            </form>
                            <div id="regMsg" class="error">
                                <div class="loader"></div>
                                @if(session('regMsg'))
                                    {{session('regMsg')}}
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger btn-default pull-left" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                    <p>Member already? <a class="login" href="#">LOGIN</a></p>
                    <p><a href="{{route('password.index')}}">Forgot Password?</a></p>
                </div>
            </div>
        </div>
    </div>
</div>

@yield('content')

</body>
</html>