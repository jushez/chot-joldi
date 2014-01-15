<div class="row">
	<div class="col-6 col-sm-12 col-lg-12">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h3 class="panel-title">{{ $job->title }} <span class="pull-right">{{ $job->job_value }} TK</span></h3>
			</div>
			<div class="panel-body">
				<p>{{ $job->description }}</p>

				<table class="table">
					<tr>
						<th>Pickup Info</th>
						<td>
							<p><strong>Address: </strong> {{ $job->pickup_address }}</p>
							<strong>Date &amp; Time: </strong> {{ date('jS F Y - h:i A', strtotime($job->pickup_time)) }}
						</td>
					</tr>
					<tr>
						<th>Drop Info</th>
						<td>
							<p><strong>Address: </strong> {{ $job->drop_address }}</p>
							<strong>Date &amp; Time: </strong> {{ date('jS F Y - h:i A', strtotime($job->drop_time)) }}
						</td>
					</tr>
				</table>
			</div>
			<div class="panel-footer">
				<div class="btn-group btn-group-justified">
					<a href="{{ URL::previous() }}" title="Go back" class="btn btn-info">Back</a>
					@if(Auth::user()->type === 'Job Seeker')
					{{ HTML::linkRoute('job-apply', 'Apply', $job->id, ($is_applied) ? array('class' => 'btn btn-primary', 'disabled' => 'disabled') : array('class' => 'btn btn-primary')) }}
					@endif
				</div>
			</div>
		</div>
	</div><!-- end span -->
</div>