@extends('layout')

@section('content')

@foreach($projects as $project)
	<ul>
		<h2>{{$project->name}}</h2>
		<p>{{$project->description}}</p>
		<h3>Cameras</h3>
		@foreach($project->cameras()->get() as $camera)
			<p><img src={{URL::action('FramesController@show',array($camera->currentFrame()->id))}} height=200/></p>
		@endforeach
	</ul>
@endforeach
@stop
