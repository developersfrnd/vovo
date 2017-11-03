@extends('layouts.admin')
@section('content')
<section class="content">
    <div class="row">
        <div class="col-xs-12">
			<div class="box">
				<div class="box-header">
				  <h3 class="box-title">Manage Categories</h3>
				</div><!-- /.box-header -->
				<div class="box-body">
					<table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Category</th>
                        <th>Status</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach($categories as $category)
                      <tr>
                        <td>{{ $category->display }}</td>
                        <td>{{ $category->status }}</td>
                        <td>Edit / Delete</td>
                      </tr>
                    @endforeach  
                    </tbody>
                  </table>	  
				</div><!-- /.box-body -->
			</div>
		</div>
	</div>
</section>
@endsection

