<?php

namespace App\Http\Controllers;

use App\Grant;
use App\Offering;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GrantsController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $grants = Grant::all();

        $grants_total = $grants->sum('amount');
        $remaining_amount = $this->remainingAmount();

        return view('grants.index')->with([
            'grants' => $grants,
            'grants_total' => $grants_total,
            'remaining_amount' => $remaining_amount,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $remaining_amount = number_format(( $this->remainingAmount() ), 2);

        return view('grants.create')->with([
            'remaining_amount' => $remaining_amount
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(request(), [
          'description' => 'required',
          'amount' => 'required|numeric|max:' . $this->remainingAmount(),
        ]);

        Grant::create([
            'description' => request('description'),
            'amount'      => request('amount'),
            'status'      => 0,
        ]);

        return redirect()->route('grants.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Grant  $grant
     * @return \Illuminate\Http\Response
     */
    public function show(Grant $grant)
    {
        return view('grants.show')->with([
            'grant' => $grant
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Grant  $grant
     * @return \Illuminate\Http\Response
     */
    public function edit(Grant $grant)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Grant  $grant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Grant $grant)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Grant  $grant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Grant $grant)
    {
        //
    }

    public function remainingAmount()
    {
        $grants_total = DB::table('grants')->sum('amount');
        $offerings_total = DB::table('offerings')->sum('amount');
        $remaining_amount = $offerings_total - $grants_total;

        return $remaining_amount;
    }
}
