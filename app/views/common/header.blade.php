<?php $userInfo = Session::get('userInfo'); ?>

<!-- Fixed navbar -->
<div class="navbar navbar-default navbar-fixed-top" role="navigation">
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="#">Chot-Joldi</a>
		</div>
		<div class="navbar-collapse collapse">
			<ul class="nav navbar-nav navbar-right">
				<li {{ ($active === 'home') ? 'class="active"' : '' }}>{{ HTML::linkRoute('/', 'Home') }}</li>
				@if(Auth::check())
				<li {{ ($active === 'dashboard') ? 'class="active"' : '' }}>{{ HTML::linkRoute('dashboard', 'Dashboard') }}</li>
				<li {{ ($active === 'settings') ? 'class="active dropdown"' : '' }}>
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">{{ $userInfo['last_name'] }} <b class="caret"></b></a>
					<ul class="dropdown-menu">
						<li><a href="#">Settings</a></li>
						<li class="divider"></li>
						<li>{{ HTML::linkRoute('logout', 'Logout') }}</li>
					</ul>
				</li>
				@else
				<li {{ ($active === 'login') ? 'class="active"' : '' }}>{{ HTML::linkRoute('login', 'Login') }}</li>
				@endif
			</ul>
		</div><!--/.nav-collapse -->
	</div>
</div>