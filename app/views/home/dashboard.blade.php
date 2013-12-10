<div class="row row-offcanvas row-offcanvas-right">

	<div class="col-xs-6 col-sm-3 sidebar-offcanvas" id="sidebar" role="navigation">
		<div class="list-group">
			<a href="#" class="list-group-item active">Link</a>
			<a href="#" class="list-group-item">Link</a>
			<a href="#" class="list-group-item">Link</a>
			<a href="#" class="list-group-item">Link</a>
			<a href="#" class="list-group-item">Link</a>
			<a href="#" class="list-group-item">Link</a>
			<a href="#" class="list-group-item">Link</a>
			<a href="#" class="list-group-item">Link</a>
			<a href="#" class="list-group-item">Link</a>
			<a href="#" class="list-group-item">Link</a>
		</div>
	</div><!--/span-->

	<div class="col-xs-12 col-sm-9">
		
		<div class="row">
			<div class="col-6 col-sm-6 col-lg-6">
				<div class="panel panel-primary">
					<div class="panel-heading">
						<h3 class="panel-title">Personal Details</h3>
					</div>
					<div class="panel-body">

						@if($profile->avatar_path == '')
						{{ HTML::image(($profile->gender === 'Male') ? 'img/male.png' : 'img/female.png', 'Avatar', array('class' => 'avatar'))}}
						@endif

						<table class="table">
							<tr>
								<th>Name</th>
								<td>{{ $profile->first_name . ' ' . $profile->last_name }}</td>
							</tr>
							<tr>
								<th>E-mail</th>
								<td>{{ Auth::user()->email }}</td>
							</tr>
							<tr>
								<th>Mobile</th>
								<td>{{ ($profile->mobile == '') ? 'n/a' : $profile->mobile }}</td>
							</tr>
							<tr>
								<th>Gender</th>
								<td>{{ ($profile->gender == '') ? 'n/a' : $profile->gender }}</td>
							</tr>
							<tr>
								<th>Present Address</th>
								<td>{{ ($profile->present_address == '') ? 'n/a' : $profile->present_address }}</td>
							</tr>
							<tr>
								<th>Permanent Address</th>
								<td>{{ ($profile->permanen_address == '') ? 'n/a' : $profile->permanen_address }}</td>
							</tr>
							<tr>
								<th>Verification Status</th>
								<td> 
									@if(empty($verfication->email))
									{{ HTML::linkRoute('verify-email', 'Verify Email', null, array('class' => 'verify-email')) }}
									@endif
								</td>
							</tr>
						</table>
						
					</div>
				</div>
			</div><!-- end span -->

			<div class="col-6 col-sm-6 col-lg-6">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title">Panel title</h3>
					</div>
					<div class="panel-body">
						Panel content
					</div>
				</div>
			</div><!-- end span -->

			<div class="col-6 col-sm-6 col-lg-4">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title">Panel title</h3>
					</div>
					<div class="panel-body">
						Panel content
					</div>
				</div>
			</div><!-- end span -->

			<div class="col-6 col-sm-6 col-lg-4">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title">Panel title</h3>
					</div>
					<div class="panel-body">
						Panel content
					</div>
				</div>
			</div><!-- end span -->

			<div class="col-6 col-sm-6 col-lg-4">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title">Panel title</h3>
					</div>
					<div class="panel-body">
						Panel content
					</div>
				</div>
			</div><!-- end span -->

		</div><!--/row-->
	</div><!--/span-->
</div>