<?php

class SessionsController extends \BaseController {

    /**
     * Display a listing of sessions
     *
     * @return Response
     */
    // public function index()
    // {
    //     $sessions = Session::all();

    //     return View::make('sessions.index', compact('sessions'));
    // }

    /**
     * Show the form for creating a new session
     *
     * @return Response
     */
    public function create()
    {
        return View::make('sessions.create');
    }

    /**
     * Store a newly created session in storage.
     *
     * @return Response
     */
    public function store()
    {
        // $validator = Validator::make($data = Input::all(), Session::$rules);

        // if ($validator->fails())
        // {
        //     return Redirect::back()->withErrors($validator)->withInput();
        // }

        // Session::create($data);

        // return Redirect::route('sessions.index');

        if (Auth::attempt(Input::only('username', 'password')))
        {
            return Auth::user();
        }

        return 'Failed';
    }

    /**
     * Display the specified session.
     *
     * @param  int  $id
     * @return Response
     */
    // public function show($id)
    // {
    //     $session = Session::findOrFail($id);

    //     return View::make('sessions.show', compact('session'));
    // }

    /**
     * Show the form for editing the specified session.
     *
     * @param  int  $id
     * @return Response
     */
    // public function edit($id)
    // {
    //     $session = Session::find($id);

    //     return View::make('sessions.edit', compact('session'));
    // }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    // public function update($id)
    // {
    //     $session = Session::findOrFail($id);

    //     $validator = Validator::make($data = Input::all(), Session::$rules);

    //     if ($validator->fails())
    //     {
    //         return Redirect::back()->withErrors($validator)->withInput();
    //     }

    //     $session->update($data);

    //     return Redirect::route('sessions.index');
    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy()
    {
        // Session::destroy($id);

        // return Redirect::route('sessions.index');
        Auth::logout();

        return Redirect::route('sessions.login');
    }

}