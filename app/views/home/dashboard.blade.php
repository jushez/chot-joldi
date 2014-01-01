<div class="row row-offcanvas row-offcanvas-right">

	{{ $sidebar }}

	<div class="col-xs-12 col-sm-9">
		
		<div class="row">
			<div class="col-6 col-sm-6 col-lg-6">
				<div class="panel panel-primary">
					<div class="panel-heading">
						<h3 class="panel-title"><span class="glyphicon glyphicon-fire"></span> Personal Details</h3>
					</div>
					<div class="panel-body">
						{{ HTML::image(($profile->avatar_path) ? Image::thumb($profile->avatar_path, 64) : (($profile->gender === 'Male') ? 'img/male.png' : 'img/female.png'), 'Avatar', array('class' => 'avatar'))}}
						
						<table class="table">
							<tr>
								<th>Name</th>
								<td>{{ Auth::user()->first_name . ' ' . Auth::user()->last_name }}</td>
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
								<td>{{ ($profile->permanent_address == '') ? 'n/a' : $profile->permanent_address }}</td>
							</tr>
							<tr>
								<th>Verification Status</th>
								<td> 
									{{ ($verification->email == 1) ? '<span class="glyphicon glyphicon-ok"></span>
 Email verified' : HTML::linkRoute('send-verification-email', 'Verify Email', null, array('class' => 'verify-email')) }}
								</td>
							</tr>
							<tr>
								<td colspan="2">
								{{ HTML::linkRoute('edit-profile', 'Update Profile', null, array('title' => 'Update Profile', 'class' => 'btn btn-primary')) }}
								</td>
							</tr>
						</table>
						
					</div>
				</div>
			</div><!-- end span -->

			@if(Auth::user()->type === 'Job Seeker')
			
			<div class="col-6 col-sm-6 col-lg-6">
				<div class="panel panel-primary">
					<div class="panel-heading">
						<h3 class="panel-title"><span class="glyphicon glyphicon-briefcase"></span> Applied Jobs</h3>
					</div>
					<div class="panel-body">
						List of latest 5 applied jobs :)
					</div>
				</div>
			</div><!-- end span -->

			@else

			<div class="col-6 col-sm-6 col-lg-6">
				<div class="panel panel-primary">
					<div class="panel-heading">
						<h3 class="panel-title">Job Posted</h3>
					</div>
					<div class="panel-body">
						List of latest 10 job posted :)
					</div>
				</div>
			</div><!-- end span -->			

			@endif

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

		</div><!-- end row-->
	</div><!-- end span-->
</div>