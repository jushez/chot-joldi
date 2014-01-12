<div class="row row-offcanvas row-offcanvas-right">

	{{ $sidebar }}

	<div class="col-xs-12 col-sm-9">
		
		<div class="row">
			<div class="col-12 col-sm-6 col-lg-12">
				<div class="panel panel-primary">
					<div class="panel-heading">
						<h3 class="panel-title"><span class="glyphicon glyphicon-edit"></span> Edit Job</h3>
					</div>
					<div class="panel-body">
						@include ('common.errors')
						{{ Form::open(array('route' => 'update-job', 'class' => 'validate-me', 'role' => 'form')) }}
							<div class="form-group">
								{{ Form::label('title', 'Job title') }}
								{{ Form::text('title', $job->title, array('class' => 'form-control validate[required, custom[onlyLetterSp], maxSize[50]]', 'placeholder' => 'Job title')) }}
							</div>
							<div class="form-group">
								{{ Form::label('description', 'Job description') }}
								{{ Form::textarea('description', $job->description, array('class' => 'form-control validate[required, minSize[5], maxSize[500]]', 'rows' => 4, 'placeholder' => 'Job description')) }}
							</div>
							<div class="form-group">
								{{ Form::label('pickup_address', 'Pickup address') }}
								{{ Form::textarea('pickup_address', $job->pickup_address, array('class' => 'form-control validate[required, minSize[5], maxSize[100]]', 'rows' => 4, 'placeholder' => 'pickup_address')) }}
							</div>
							<div class="form-group">
								{{ Form::label('pickup_time', 'Pickup time') }}
								<div class='input-group date' id='pickuptime'>
									{{ Form::text('pickup_time', $job->pickup_time, array('class' => 'form-control validate[required, custom[dateTimeFormat], maxSize[30]]', 'data-format' => 'YYYY-MM-DD hh:mm:ss A', 'placeholder' => 'Pickup time')) }}
									<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
								</div>
							</div>
							<div class="form-group">
								{{ Form::label('drop_address', 'Drop address') }}
								{{ Form::textarea('drop_address', $job->drop_address, array('class' => 'form-control validate[required, minSize[5], maxSize[100]]', 'rows' => 4, 'placeholder' => 'Drop address')) }}
							</div>
							<div class="form-group">
								{{ Form::label('drop_time', 'Drop time') }}
								<div class='input-group date' id='droptime'>
									{{ Form::text('drop_time', $job->drop_time, array('class' => 'form-control validate[required, custom[dateTimeFormat], maxSize[30]]', 'data-format' => 'YYYY-MM-DD hh:mm:ss A', 'placeholder' => 'Drop time')) }}
									<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
								</div>
								
							</div>
							<div class="form-group">
								{{ Form::label('distance', 'Distance (km)') }}
								{{ Form::text('distance', $job->distance, array('class' => 'form-control validate[required, custom[integer], maxSize[10]]', 'placeholder' => '20')) }}
							</div>
							<div class="form-group">
								{{ Form::label('job_value', 'Job value (tk)') }}
								{{ Form::text('job_value', $job->job_value, array('class' => 'form-control validate[required, min[100], max[1000], custom[integer], maxSize[10]]', 'placeholder' => '500')) }}
							</div>

							{{ Form::hidden('job_id', $job->id) }}
							{{ Form::submit('Save Job', array('class' => 'btn btn-primary')) }}

						{{ Form::close() }}

						
					</div>
				</div>
			</div><!-- end span -->

		</div><!-- end row-->
	</div><!-- end span-->
</div>