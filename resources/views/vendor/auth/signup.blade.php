@extends('layouts.prelogin')
@section('content')
<div class="login-logo">
    <a href="../../index2.html"><b>Vendor</b> Sign Up</a>
</div><!-- /.login-logo -->
<div class="register-box-body">
    <p class="login-box-msg">Personal Details</p>
    <form action="<?php echo url($VENDOR_URL.'/signup'); ?>" method="post">
    {{ csrf_field() }}
      <div class="form-group has-feedback">
        <input type="text" class="form-control" name="first_name" placeholder="First Name*" value="<?php echo old('first_name'); ?>" />
      </div>
      <div class="form-group has-feedback">
        <input type="text" class="form-control" name="last_name" placeholder="Last Name" value="<?php echo old('last_name'); ?>" />
      </div>
      <div class="form-group has-feedback">
        <input type="email" name="email" class="form-control" placeholder="Email*" value="<?php echo old('email'); ?>" />
      </div>
      <div class="form-group has-feedback">
        <input type="password" name="password" class="form-control" placeholder="Password*"/>
      </div>
      <div class="form-group has-feedback">
        <input type="password" name="password_confirmation" class="form-control" placeholder="Retype password*"/>
      </div>

      <p class="login-box-msg">Company Details</p>

      <div class="form-group has-feedback">
        <input type="text" class="form-control" name="name" placeholder="Company Name*" value="<?php echo old('name'); ?>" />
      </div>
      <div class="form-group has-feedback">
        <input type="text" class="form-control" name="company_id" placeholder="Company ID" value="<?php echo old('company_id'); ?>" />
      </div>
      <div class="form-group has-feedback">
        <input type="text" name="address1" class="form-control" placeholder="Address1*" value="<?php echo old('address1'); ?>" />
      </div>
      <div class="form-group has-feedback">
        <input type="text" name="address2" class="form-control" placeholder="address2" value="<?php echo old('address2'); ?>" />
      </div>
      <div class="form-group has-feedback">
        <input type="text" name="city" class="form-control" placeholder="City*" value="<?php echo old('city'); ?>" />
      </div>

      <div class="form-group has-feedback">
        <input type="text" class="form-control" name="state" placeholder="State" value="<?php echo old('state'); ?>" />
      </div>
      <div class="form-group has-feedback">
        <input type="text" class="form-control" name="country_id" placeholder="Country" value="<?php echo old('country_id'); ?>"/>
      </div>
      <div class="form-group has-feedback">
        <input type="text" name="zip" class="form-control" placeholder="Post Code*" value="<?php echo old('zip'); ?>" />
      </div>
      <div class="form-group has-feedback">
        <input type="text" name="store_url" class="form-control" placeholder="Company Url" value="<?php echo old('store_url'); ?>" />
      </div>
      <div class="form-group has-feedback">
        <textarea name="about_company" class="form-control" placeholder="About Company" ><?php echo old('about_company'); ?></textarea>
      </div>

      <p class="login-box-msg">Bank Details</p>


      <div class="form-group has-feedback">
        <input type="text" class="form-control" name="bank_name" placeholder="Bank Name" value="<?php echo old('bank_name'); ?>"/>
      </div>
      <div class="form-group has-feedback">
        <input type="text" class="form-control" name="account_number" placeholder="Account Number" value="<?php echo old('account_number'); ?>"/>
      </div>
      <div class="form-group has-feedback">
        <input type="text" name="neft_code" class="form-control" placeholder="Neft Code" value="<?php echo old('neft_code'); ?>"/>
      </div>
      <div class="form-group has-feedback">
        <input type="text" name="tax_id" class="form-control" placeholder="Tax ID" value="<?php echo old('tax_id'); ?>"/>
      </div>
      <div class="form-group has-feedback">
        <input type="text" name="bank_address" class="form-control" placeholder="Bank Address" value="<?php echo old('bank_address'); ?>"/>
      </div>
      <div class="form-group has-feedback">
        <input type="text" name="paypal_email" class="form-control" placeholder="Paypal Email (International vendor: put PayPal email. This will be used to receive payments)" value="<?php echo old('paypal_email'); ?>"/>
      </div>


      <div class="row">
        <div class="col-xs-8">    
          <div class="checkbox icheck">
            <label>
              <input type="checkbox"> I agree to the <a href="#">terms</a>
            </label>
          </div>                        
        </div><!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Register</button>
        </div><!-- /.col -->
      </div>
    </form>        
    <a href="<?php echo url($VENDOR_URL); ?>" class="text-center">Login</a>
</div>
@endsection