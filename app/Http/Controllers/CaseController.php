<?php

namespace App\Http\Controllers;

use App\Http\Requests\CaseRequest;
use App\Models\Cases;
use App\Models\CaseType;
use App\Models\Client;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CaseController extends Controller
{
    public function index()
    {
        $cases = Cases::latest()->paginate(5);

        return view('cases.index', compact('cases'));
    }

    public function create()
    {
        $clients = Client::all();
        $casesType = CaseType::all();
        return view('cases.create', compact('clients', 'casesType'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cases  $cases
     * @return \Illuminate\Http\Response
     */
    public function new(Request $request)
    {

        $timestamp = Carbon::now()->timestamp;

        $data = [
            'client_id' => $request->client_id,
            'cases_type_id' => $request->cases_type_id,
            'start_date' => '2024-04-23 17:09:14',
            'observation' => $request->observation,
            'status' => 'ACTIVE'
        ];

//        dd($data);



        Cases::create($data);

        return redirect()->route('cases-create')
            ->with('success', 'Product created successfully.');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cases  $cases
     * @return \Illuminate\Http\Response
     */
    public function show(Cases $cases)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cases  $cases
     * @return \Illuminate\Http\Response
     */
    public function edit(Cases $cases)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cases  $cases
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cases $cases)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cases  $cases
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cases $cases)
    {
        //
    }
}
