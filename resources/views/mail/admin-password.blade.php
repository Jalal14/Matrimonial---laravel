<h1>This is a password reset request.</h1>
<p>If you confirm, it was you, click the link below</p>
<a href="{{route('adminPassword.passToken', [$token->token, $token->id])}}">Reset password</a>