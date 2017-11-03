<!-- Sidebar user panel (optional) -->
<div class="user-panel">
	<div class="pull-left image">
	  <img src="{{ asset('assets/images') }}/logo-vovo.png" class="img-circle" alt="Admin Image">
	</div>
	<div class="pull-left info">
	  <p>{{ Auth::user()->first_name }}</p>
	  <!-- Status -->
	  <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
	</div>
	</div>

	<!-- Sidebar Menu -->
	<ul class="sidebar-menu" data-widget="tree">
	<!-- Optionally, you can add icons to the links -->
	<!-- <li class="active"><a href="#"><i class="fa fa-link"></i> <span>Link</span></a></li>
	<li><a href="#"><i class="fa fa-link"></i> <span>Another Link</span></a></li> -->
	<li class="treeview">
	  <a href="#"><i class="fa fa-link"></i> <span>Add Products</span>
	    <span class="pull-right-container">
	        <i class="fa fa-angle-left pull-right"></i>
	      </span>
	  </a>
	  <ul class="treeview-menu">
	    <li><a href="#">General</a></li>
	    <li><a href="#">Categories</a></li>
	    <li><a href="#">Images</a></li>
	    <li><a href="#">Options</a></li>
	    <li><a href="{{ url('manager/categories') }}">View Categories</a></li>
	  </ul>
	</li>

	<li><a href="{{ url('manager/Products') }}"><i class="fa fa-link"></i> <span>View Products</span></a></li>
	<li><a href="{{ url('manager/Users') }}"><i class="fa fa-link"></i> <span>Manage Users</span></a></li>
	<li><a href="{{ url('manager/Vendors') }}"><i class="fa fa-link"></i> <span>View Orders</span></a></li>
</ul>
   