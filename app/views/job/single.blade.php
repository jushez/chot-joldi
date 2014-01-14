<div class="row row-offcanvas row-offcanvas-right">

	{{ $sidebar }}

	<div class="col-xs-12 col-sm-9">
		
		<div class="row">
			<div class="col-12 col-sm-6 col-lg-12">
				<div class="panel panel-primary">
					<div class="panel-heading">
						<h3 class="panel-title">
							<span class="glyphicon glyphicon-briefcase"></span> {{ $job->title }}
							@if(Auth::user()->type === 'Job Poster' && Auth::user()->id == $job->user_id)
							{{ HTML::linkRoute('edit-job', '', array('id' => $job->id), array('class' => 'tips pull-right white glyphicon glyphicon-edit', 'title' => 'edit')) }}
							@endif
						</h3>
					</div>
					<div class="panel-body">
						
						<table class="table table-striped table-condensed">
							<tr>
								<th>Job description</th>
								<td>{{ $job->description }}</td>
							</tr>
							<tr>
								<th>Pickup address</th>
								<td>{{ $job->pickup_address }}</td>
							</tr>
							<tr>
								<th>Pickup time</th>
								<td>{{ date('jS F Y - h:i A', strtotime($job->pickup_time)) }}</td>
							</tr>
							<tr>
								<th>Drop address</th>
								<td>{{ $job->drop_address }}</td>
							</tr>
							<tr>
								<th>Drop time</th>
								<td>{{ date('jS F Y - h:i A', strtotime($job->drop_time)) }}</td>
							</tr>
							<tr>
								<th>Distance</th>
								<td>{{ $job->distance }}</td>
							</tr>
							<tr>
								<th>Job value</th>
								<td>{{ $job->job_value }} TK</td>
							</tr>
							<tr>
								<th>Created at</th>
								<td>{{ date('jS F Y - h:i:s A', strtotime($job->created_at)) }}</td>
							</tr>
							<tr>
								<th>Updated at</th>
								<td>{{ ($job->created_at == $job->updated_at) ? 'Not yet' : date('jS F Y - h:i:s A') }}</td>
							</tr>
						</table>
						
					</div>
				</div>
			</div><!-- end span -->

		</div><!-- end row-->
	</div><!-- end span-->
</div>