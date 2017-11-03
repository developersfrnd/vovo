@extends('layouts.vendor')
@section('content')
<section class="content">
	<div class="row">
	<!-- left column -->
	<div class="col-md-10">
	  <!-- general form elements -->
	  <div class="box box-primary">
	    <div class="box-header">
	      <h3 class="box-title">Add Product Images</h3>
	    </div><!-- /.box-header -->
	    <!-- form start -->
	    <form method="post" action="<?php echo url($VENDOR_URL.'/images');?>" enctype="multipart/form-data">
	    {{ csrf_field() }}
	      <div class="box-body">
	        <div class="form-group">
	          <label for="name">Name</label>
	          <input type="file" class="form-control" id="image" name="images[]"  multiple >
	        </div>
	      </div><!-- /.box-body -->
	      <div class="box-footer">
	      	<input type="hidden" name="product_id" value="{{ $product_id }}">
	        <button type="submit" class="btn btn-primary">Submit</button>
	      </div>
	    </form>
	  </div><!-- /.box -->
</section>
@endsection