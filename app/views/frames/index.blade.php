@extends('layout')

@section('content')

@foreach($frames as $frame)
	<ul>
		<p>
			<img src={{URL::action('FramesController@show',array($frame->id))}} height=200/>
		</p>
		{{$frame->id}} : {{$frame->captureTime}}
	</ul>
@endforeach
<a href=" {{route('frames.create') }}">Create a new frame</a>
@stop