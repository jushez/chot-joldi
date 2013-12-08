<div class="row">
	<div class="col-xs-4 col-xs-offset-4">
		<div class="login">
			<div class="well">
				{{ Form::open(array('route' => 'verify', 'class' => 'validate-me', 'role' => 'form')) }}
				<h2 class="form-heading">Login</h2>
				@include('common.errors')
				
				<div class="form-group">
					{{ Form::text('email', null, array('class' => 'form-control validate[required, custom[email]]', 'placeholder' => 'Email address')) }}
				</div>

				<div class="form-group">
					{{ Form::password('password', array('class' => 'form-control validate[required]', 'placeholder' => 'Password')) }}
				</div>

				<div class="checkbox">
					<label>
						{{ Form::checkbox('remember-me', 1) }} Remember me
						{{ HTML::linkRoute('register', 'Sign up', null, array('class' => 'pull-right')) }}
					</label>
				</div>

				{{ Form::submit('Sign in', array('class' => 'btn btn-primary')) }}
				{{ Form::close() }}
			</div>
		</div>
	</div>
</div>