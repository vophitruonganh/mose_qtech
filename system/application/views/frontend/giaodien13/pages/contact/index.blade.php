@if( count($errors) > 0 )
    @foreach( $errors->all() as $error )
    <?php $text = $error; ?>
    @endforeach
@else
	<?php $text = ''; ?>
@endif

<script type="text/javascript">
	alert('{!!$text!!}');
	window.history.back(-1);
</script>