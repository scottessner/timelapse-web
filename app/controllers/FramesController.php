<?php

class FramesController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$frames = Frame::all();
        return View::make('frames.index',compact('frames'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
	    return View::make('frames.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//$input = Input::all();
		//return var_dump($input);
		
		$frame = new Frame;
		$frame->imageBytes = Input::get('imageBytes', null);
		$frame->captureTime = Input::get('captureTime', null);
		$frame->frameSourceID = Input::get('frameSourceID', null);
		$frame->save();

		//return var_dump($frame);

		//return show($frame->id);

	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$frame = Frame::find($id);

		$response = Response::make($frame->image(), 200);
		$response->headers->set('Content-Type','image/jpeg');
		return $response;
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function showRaw($id)
	{
		$frame = Frame::find($id);

		$response = Response::make($frame->imageRaw(), 200);
		$response->headers->set('Content-Type','image/jpeg');
		return $response;
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        return View::make('frames.edit');
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}
}
