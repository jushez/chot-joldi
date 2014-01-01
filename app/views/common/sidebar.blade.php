<div class="col-xs-6 col-sm-3 sidebar-offcanvas" id="sidebar" role="navigation">
	<div class="list-group">
		<a href="#" class="list-group-item {{ ($active === 'job-board') ? 'active' : '' }}">Job board</a>
		<a href="#" class="list-group-item">My jobs</a>
		@if(Auth::user()->type === 'Job Poster')
		<a href="{{ URL::route('new-job') }}" class="list-group-item {{ ($active === 'new-job') ? 'active' : '' }}">Post new job</a>
		@endif
		<a href="#" class="list-group-item">Link</a>
		<a href="#" class="list-group-item">Link</a>
		<a href="#" class="list-group-item">Link</a>
		<a href="#" class="list-group-item">Link</a>
		<a href="#" class="list-group-item">Link</a>
		<a href="#" class="list-group-item">Link</a>
	</div>
</div>