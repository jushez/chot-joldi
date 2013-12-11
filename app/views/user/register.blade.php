<div class="row">
	<div class="col-xs-4 col-xs-offset-4">
		<div class="register">
			<div class="well">

				{{ Form::open(array('route' => 'save-user', 'class' => 'validate-me', 'role' => 'form')) }}
				<h2 class="form-heading">Register now!</h2>
				@include('common.errors')

				<div class="form-group">
					{{ Form::text('first_name', null, array('class' => 'form-control validate[required, custom[onlyLetterSp], minSize[3], maxSize[50]]', 'placeholder' => 'First name')) }}
				</div>

				<div class="form-group">
					{{ Form::text('last_name', null, array('class' => 'form-control validate[required, custom[onlyLetterSp], minSize[3], maxSize[50]]', 'placeholder' => 'Last name')) }}
				</div>

				<div class="form-group">
					{{ Form::text('email', null, array('class' => 'form-control validate[required, custom[email], ajax[ajaxCheckEmail], minSize[3], maxSize[50]]', 'placeholder' => 'Email address')) }}
				</div>

				<div class="form-group">
					{{ Form::password('password', array('id' => 'password', 'class' => 'form-control validate[required]', 'placeholder' => 'Password')) }}
				</div>

				<div class="form-group">
					{{ Form::password('confirm_password', array('class' => 'form-control validate[required, equals[password]]', 'placeholder' => 'Confirm Password')) }}
				</div>

				<div class="form-group">
					{{ Form::select('gender', array('Male' => 'Male', 'Female' => 'Female'), 'Male', array('class' => 'form-control validate[required]')); }}
				</div>
	
				<div class="form-group">
					{{ Form::select('type', array('Job Seeker' => 'Job Seeker', 'Job Poster' => 'Job Poster'), 'Job Seeker', array('class' => 'form-control validate[required]')); }}
				</div>


				{{ Form::submit('Signup', array('class' => 'btn btn-primary')) }}
				{{ Form::close() }}
			</div>
		</div>
	</div>
</div>