<div class="row">
	@foreach($jobs as $job)
	<div class="col-4 col-sm-4 col-lg-4">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h3 class="panel-title">{{ $job->title }} <span class="pull-right">{{ $job->job_value }} TK</span></h3>
			</div>
			<div class="panel-body">
				<p>{{ $job->description }}</p>

				<table class="table">
					<tr>
						<th>Pickup Info</th>
						<th>Drop Info</th>
					</tr>
					<tr>
						<td>{{ $job->pickup_address }}</td>
						<td>{{ $job->drop_address }}</td>
					</tr>
				</table>
			</div>
			<div class="panel-footer">
				<div class="btn-group btn-group-justified">
					{{ HTML::linkRoute('job-details', 'View', $job->id, array('class' => 'btn btn-info')) }}
					@if(Auth::user()->type === 'Job Seeker')
					{{ HTML::linkRoute('job-apply', 'Apply', $job->id, ($applied_jobs && in_array($job->id, $applied_jobs)) ? array('class' => 'btn btn-primary', 'disabled' => 'disabled') : array('class' => 'btn btn-primary')) }}
					@endif
					
				</div>
			</div>
		</div>
	</div><!-- end span -->
	@endforeach
</div>