@extends('layouts.admin')
@section('content')
<section class="content">
	<div class="row">
	<!-- left column -->
	<div class="col-md-10">
	  <!-- general form elements -->
	  <div class="box box-primary">
	    <div class="box-header">
	      <h3 class="box-title">Add Category</h3>
	    </div><!-- /.box-header -->
	    <!-- form start -->
	    <form method="post" action="<?php echo url($ADMIN_URL.'/categories');?>" enctype="multipart/form-data">
	    {{ csrf_field() }}
	      <div class="box-body">
	        <div class="form-group">
              <label>Main Category</label>
              <select class="form-control" name="parent_id">
                <option value="0">Root</option>
                <?php foreach($categories as $key=>$value): ?>
                	<option value="<?php echo $key; ?>"><?php echo $value; ?></option>
            	<?php endforeach ?>
              </select>
            </div>
            <div class="form-group">
	          <label for="exampleInputEmail1">Name</label>
	          <input type="text" class="form-control" id="name" placeholder="Enter Name" name="name" value="<?php echo old('name'); ?>">
	        </div>
	        <div class="form-group">
              <label for="exampleInputFile">Image</label>
              <input type="file" id="image" name="image">
              <p class="help-block">jpg,jpeg,png only.</p>
            </div>
	        <div class="form-group">
	          <label>Description</label>
	          <textarea class="form-control" rows="3" placeholder="Enter ..." name="description"><?php echo old('description'); ?></textarea>
	        </div>
	        <div class="form-group">
	          <label>MetaTag Keyword</label>
	          <textarea class="form-control" rows="3" placeholder="Enter ..." name="meta_keyword"><?php echo old('meta_keyword'); ?></textarea>
	        </div>
	        <div class="form-group">
	          <label>MetaTag Description</label>
	          <textarea class="form-control" rows="3" placeholder="Enter ..." name="meta_description"><?php echo old('meta_description'); ?></textarea>
	        </div>
	      </div><!-- /.box-body -->
	      <div class="box-footer">
	        <button type="submit" class="btn btn-primary">Submit</button>
	      </div>
	    </form>
	  </div><!-- /.box -->
</section>
@endsection