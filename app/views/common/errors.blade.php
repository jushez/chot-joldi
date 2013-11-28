@if($errors->has())
    @foreach($errors->all() as $message)
		<div class="alert alert-danger fade in">
	        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
	        {{ $message }}
      	</div>
    @endforeach
@endif