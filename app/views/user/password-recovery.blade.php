<div class="row">
	<div class="col-xs-4 col-xs-offset-4">
		<div class="login">
			<div class="well">
				{{ Form::open(array('route' => 'send-password-recovery-email', 'class' => 'validate-me', 'role' => 'form')) }}
				<h2 class="form-heading">Forgot Password</h2>
				@include('common.errors')
				
				<div class="form-group">
					{{ Form::text('email', null, array('class' => 'form-control validate[required, custom[email]]', 'placeholder' => 'Email address')) }}
				</div>

				{{ Form::submit('Reset Password', array('class' => 'btn btn-primary')) }}
				{{ Form::close() }}
			</div>

		</div>
	</div>
</div>