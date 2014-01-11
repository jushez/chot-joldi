<div class="row row-offcanvas row-offcanvas-right">

	{{ $sidebar }}

	<div class="col-xs-12 col-sm-9">
		
		<div class="row">
			<div class="col-12 col-sm-6 col-lg-12">
				<div class="panel panel-primary">
					<div class="panel-heading">
						<h3 class="panel-title"><span class="glyphicon glyphicon-briefcase"></span> All Jobs</h3>
					</div>
					<div class="panel-body">
						
						<p>Showing <strong>{{ $jobs->getFrom() }} - {{ $jobs->getTo() }}</strong> of <strong>{{ $jobs->getTotal() }}</strong></p>

						<table class="table table-striped table-condensed table-hover">
							@foreach ($jobs as $job)
							<tr>
								<td>{{ $job->title }}</td>
								<td>
									<ul class="list-inline actions pull-right">
										<li><a href="#" class="tips black glyphicon glyphicon-eye-open" title="view"></a></li>
										<li><a href="#" class="tips black glyphicon glyphicon-edit" title="edit"></a></li>
										<li><a href="#" class="tips black glyphicon glyphicon-trash" title="delete"></a></li>
									</ul>
								</td>
							</tr>
							@endforeach
						</table>
						{{ $jobs->links() }}
					</div>
				</div>
				
			</div><!-- end span -->

		</div><!-- end row-->
	</div><!-- end span-->
</div>