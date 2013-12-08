@if(Session::has('messages'))
	<div class="alert alert-info fade in">
        <button data-dismiss="alert" class="close" type="button">×</button>
        <strong>Info!</strong> {{ Session::get('messages') }}
    </div>
@endif