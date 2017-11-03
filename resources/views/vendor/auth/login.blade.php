@extends('layouts.prelogin')
@section('content')
@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif
<div class="login-logo">
    <a href="javascript:;"><b>Vendor</b> Login</a>
</div><!-- /.login-logo -->
<div class="login-box-body">
    <p class="login-box-msg">Sign in to start your session</p>
    <form action="<?php echo url($VENDOR_URL);?>" method="post">
    {{ csrf_field() }}
      <div class="form-group has-feedback">
        <input type="email" class="form-control" placeholder="Email" name="email" value="<?php echo old('email'); ?>" />
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Password" name="password" />
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">    
          <div class="checkbox icheck">
            <label>
              <input type="checkbox" value="1"> Remember Me
            </label>
          </div>                        
        </div><!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div><!-- /.col -->
      </div>
    </form>
    <a href="javascript:;">I forgot my password</a><br>
    <a href="<?php echo url($VENDOR_URL.'/signup'); ?>" class="text-center">Sign Up</a>
</div>
@endsection
