@extends('layouts.vendor')
@section('content')
<section class="content">
	<div class="row">
	<!-- left column -->
	<div class="col-md-10">
	  <!-- general form elements -->
	  <div class="box box-primary">
	    <div class="box-header">
	      <h3 class="box-title">Add Products</h3>
	    </div><!-- /.box-header -->
	    <!-- form start -->
	    <form method="post" action="<?php echo url($VENDOR_URL.'/products');?>" enctype="multipart/form-data">
	    {{ csrf_field() }}
	      <div class="box-body">
	        <div class="form-group">
	          <label for="name">Name</label>
	          <input type="text" class="form-control" id="name" placeholder="Enter Name" name="name" value="<?php echo old('name'); ?>">
	        </div>
	        <div class="form-group">
	          <label for="sku">SKU</label>
	          <input type="text" class="form-control" id="sku" placeholder="Enter SKU" name="sku" value="<?php echo old('sku'); ?>">
	        </div>
	        <div class="form-group">
	          <label for="price">Price</label>
	          <input type="text" class="form-control" id="price" placeholder="Enter Price" name="price" value="<?php echo old('price'); ?>">
	        </div>
	        <div class="form-group">
	          <label for="new_from_date">New From Date</label>
	          <input type="text" class="form-control" id="new_from_date" placeholder="Enter new_from_date" name="new_from_date" value="<?php echo old('new_from_date'); ?>">
	        </div>
	        <div class="form-group">
	          <label for="new_to_date">New To Date</label>
	          <input type="text" class="form-control" id="new_to_date" placeholder="Enter new_to_date" name="new_to_date" value="<?php echo old('new_to_date'); ?>">
	        </div>
	        <div class="form-group">
	          <label>MetaTag Keyword</label>
	          <textarea class="form-control" rows="3" placeholder="Enter ..." name="meta_keyword"><?php echo old('meta_keyword'); ?></textarea>
	        </div>
	        <div class="form-group">
	          <label>MetaTag Description</label>
	          <textarea class="form-control" rows="3" placeholder="Enter ..." name="meta_description"><?php echo old('meta_description'); ?></textarea>
	        </div>
	        <div class="form-group">
	          <label>Description</label>
	          <textarea class="form-control" rows="3" placeholder="Enter ..." name="short description"><?php echo old('short description'); ?></textarea>
	        </div>
	        <div class="form-group">
	          <label>Description</label>
	          <textarea class="form-control" rows="3" placeholder="Enter ..." name="description"><?php echo old('description'); ?></textarea>
	        </div>
	      </div><!-- /.box-body -->
	      <div class="box-footer">
	        <button type="submit" class="btn btn-primary">Submit</button>
	      </div>
	    </form>
	  </div><!-- /.box -->
</section>
@endsection