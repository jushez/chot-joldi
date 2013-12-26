<div class="row">
	<div class="col-xs-6 col-xs-offset-3">
		
		<div class="well">

			{{ Form::open(array('route' => 'save-profile', 'files'=> true, 'class' => 'form-horizontal validate-me', 'role' => 'form')) }}
			<h2 class="form-heading">Update Profile</h2>
			@include('common.errors')

			<div class="form-group">
				{{ Form::label('first_name', 'First Name:', array('class' => 'col-xs-3 control-label')) }}
				<div class="col-xs-9">
					{{ Form::text('first_name', $profile->first_name, array('class' => 'form-control validate[required, custom[onlyLetterSp]]', 'placeholder' => 'First name')) }}
				</div>
			</div>

			<div class="form-group">
				{{ Form::label('last_name', 'Last Name:', array('class' => 'col-xs-3 control-label')) }}
				<div class="col-xs-9">
					{{ Form::text('last_name', $profile->last_name, array('class' => 'form-control validate[required, custom[onlyLetterSp]]', 'placeholder' => 'Last name')) }}
				</div>
			</div>

			<div class="form-group">
				{{ Form::label('password', 'Password:', array('class' => 'col-xs-3 control-label')) }}
				<div class="col-xs-9">
					{{ Form::password('password', array('id' => 'password', 'class' => 'form-control validate[minSize[6], maxSize[50]]', 'placeholder' => 'Password')) }}
					<span class="help-block">Only if you want to change your password.</span>
					
				</div>
			</div>

			<div class="form-group">
				{{ Form::label('confirm_password', 'Confirm Password:', array('class' => 'col-xs-3 control-label')) }}
				<div class="col-xs-9">
					{{ Form::password('confirm_password', array('class' => 'form-control validate[condRequired[password], equals[password], maxSize[50]]', 'placeholder' => 'Confirm Password')) }}
				</div>
			</div>

			<div class="form-group">
				{{ Form::label('profile_picture', 'Profile Picture:', array('class' => 'col-xs-3 control-label')) }}
				<div class="col-xs-9">
					{{ Form::file('profile_picture') }}
					<span class="help-block">Only if you want to change profile picture.</span>
				</div>
			</div>

			<div class="form-group">
				{{ Form::label('gender', 'Gender:', array('class' => 'col-xs-3 control-label')) }}
				<div class="col-xs-9">
					{{ Form::select('gender', array('Male' => 'Male', 'Female' => 'Female'), 'Male', array('class' => 'form-control')); }}
				</div>
			</div>

			<div class="form-group">
				{{ Form::label('mobile', 'Mobile:', array('class' => 'col-xs-3 control-label')) }}
				<div class="col-xs-9">
					{{ Form::text('mobile', $profile->mobile, array('class' => 'form-control validate[required, custom[integer], minSize[11], maxSize[11]]', 'placeholder' => 'Confirm Password')) }}
				</div>
			</div>

			<div class="form-group">
				{{ Form::label('present_address', 'Present Address:', array('class' => 'col-xs-3 control-label')) }}
				<div class="col-xs-9">
					{{ Form::textarea('present_address', $profile->present_address, array('class' => 'form-control validate[required, minSize[5], maxSize[100]]', 'rows' => 4, 'placeholder' => 'Present address')) }}
				</div>
			</div>

			<div class="form-group">
				{{ Form::label('permanent_address', 'Permanent Address:', array('class' => 'col-xs-3 control-label')) }}
				<div class="col-xs-9">
					{{ Form::textarea('permanent_address', $profile->permanent_address, array('class' => 'form-control validate[minSize[5], maxSize[100]]', 'rows' => 4, 'placeholder' => 'Permanent address')) }}
				</div>
			</div>

			<div class="form-group">
			<div class="col-xs-offset-3 col-xs-9">
					{{ Form::submit('Update', array('class' => 'btn btn-primary')) }}
				</div>
			</div>

			{{ Form::close() }}
		</div>
	
	</div>
</div>