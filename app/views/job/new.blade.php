<div class="row row-offcanvas row-offcanvas-right">

	{{ $sidebar }}

	<div class="col-xs-12 col-sm-9">
		
		<div class="row">
			<div class="col-12 col-sm-6 col-lg-12">
				<div class="panel panel-primary">
					<div class="panel-heading">
						<h3 class="panel-title"><span class="glyphicon glyphicon-briefcase"></span> New Job</h3>
					</div>
					<div class="panel-body">
						{{ Form::open(array('route' => 'save-job', 'class' => 'validate-me')) }}
						<form role="form">
							<div class="form-group">
								{{ Form::label('title', 'Job title') }}
								{{ Form::text('title', null, array('class' => 'form-control validate[required, maxSize[50]]', 'placeholder' => 'Job title')) }}
							</div>
							<div class="form-group">
								{{ Form::label('description', 'Job description') }}
								{{ Form::textarea('description', null, array('class' => 'form-control validate[minSize[5], maxSize[500]]', 'rows' => 4, 'placeholder' => 'Job description')) }}
							</div>
							<div class="form-group">
								{{ Form::label('pickup_address', 'Pickup address') }}
								{{ Form::textarea('pickup_address', null, array('class' => 'form-control validate[minSize[5], maxSize[100]]', 'rows' => 4, 'placeholder' => 'pickup_address')) }}
							</div>
							<div class="form-group">
								{{ Form::label('pickup_time', 'Pickup time') }}
								{{ Form::text('pickup_time', null, array('class' => 'form-control validate[required, custom[dateTimeFormat], maxSize[50]]', 'placeholder' => 'Pickup time')) }}
							</div>
							<div class="form-group">
								{{ Form::label('drop_address', 'Drop address') }}
								{{ Form::textarea('drop_address', null, array('class' => 'form-control validate[minSize[5], maxSize[100]]', 'rows' => 4, 'placeholder' => 'Drop address')) }}
							</div>
							<div class="form-group">
								{{ Form::label('drop_time', 'Drop time') }}
								{{ Form::text('drop_time', null, array('class' => 'form-control validate[required, custom[dateTimeFormat], maxSize[20]]', 'placeholder' => 'Drop time')) }}
							</div>
							<div class="form-group">
								{{ Form::label('distance', 'Distance (km)') }}
								{{ Form::text('distance', null, array('class' => 'form-control validate[required, custom[integer], maxSize[10]]', 'placeholder' => '20')) }}
							</div>
							<div class="form-group">
								{{ Form::label('job_value', 'Job value (tk)') }}
								{{ Form::text('job_value', null, array('class' => 'form-control validate[required, custom[integer], maxSize[10]]', 'placeholder' => '500')) }}
							</div>

							{{ Form::submit('Save Job', array('class' => 'btn btn-primary')) }}

						{{ Form::close() }}

						
					</div>
				</div>
			</div><!-- end span -->

		</div><!-- end row-->
	</div><!-- end span-->
</div>