<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="img/ico/favicon.png">

    <title>{{ ($pageTitle) ? $pageTitle  : 'Chot Joldi - Bike Messenger' }}</title>

    {{ HTML::style('css/bootstrap.min.css') }}
    {{ HTML::style('css/validationEngine.jquery.css') }}
    {{ HTML::style('css/bootstrap-datetimepicker.min.css') }}
    {{ HTML::style('css/style.css') }}

    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="../../docs-assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <div id="wrap">

    	@include('common.header')

    	<div class="container">
            @include('common.flash')
	        {{ $content }}
	    </div><!-- End container -->

    </div><!-- End wrap -->

    
    @include('common.footer')

    {{ HTML::script('js/jquery.js') }}
    {{ HTML::script('js/bootstrap.min.js') }}
    {{ HTML::script('js/moment.min.js') }}
    {{ HTML::script('js/bootstrap-datetimepicker.js') }}
    {{ HTML::script('js/jquery.validationEngine-en.js') }}
    {{ HTML::script('js/jquery.validationEngine.js') }}
    {{ HTML::script('js/script.js') }}
  </body>
</html>
