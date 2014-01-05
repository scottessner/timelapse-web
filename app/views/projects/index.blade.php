@extends('layout')

@section('content')

@foreach($projects as $project)
	<ul>
		<h1>{{$project->name}}</h1>
		@foreach($project->cameras() as $camera)
			<h2>{{$camera->id}}</h2>
		@endforeach
	</ul>
@endforeach
@stop
