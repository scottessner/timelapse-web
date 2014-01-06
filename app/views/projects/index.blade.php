@extends('layout')

@section('content')

@foreach($projects as $project)
	<ul>
		<h2>{{$project->name}}</h2>
		<p>{{$project->description}}</p>
		<h3>Cameras</h3>
		@foreach($project->cameras()->get() as $camera)
			<p>{{$camera->id}}</p>
		@endforeach
	</ul>
@endforeach
@stop
