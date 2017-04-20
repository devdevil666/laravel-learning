<?php

namespace App\Http\Controllers;

use App\Flyer;
use App\Http\Requests\ChangeFlyerRequest;
use App\Http\Requests\FlyerRequest;
use App\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Event;

class FlyersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => 'show']);
        parent::__construct();
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('flyers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param FlyerRequest|Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(FlyerRequest $request)
    {
        $flyer = \Auth::user()->publish(new Flyer($request->all()));
        flash('Объявление добавлено!');
        return redirect(flyer_path($flyer));
    }

    /**
     * Display the specified resource.
     *
     * @param $zip
     * @param $street
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function show($zip, $street)
    {
        $flyer = Flyer::locatedAt($zip, $street)->first();

        return view('flyers.show', compact('flyer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
