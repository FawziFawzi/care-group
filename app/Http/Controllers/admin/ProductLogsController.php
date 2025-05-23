<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\ProductLog;
use Illuminate\Http\Request;

class ProductLogsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $logs = ProductLog::with(['product','changer'])->latest()->paginate(8);
        return view('admin.products-logs', ['logs' => $logs]);
//        return view('admin.products-logs');
    }

    /**
     * Show Details of the logged data.
     */
    public function details(string $id)
    {
        $log = ProductLog::with(['product','changer'])->findOrFail($id);


        return view('admin.log-details', ['log' => $log]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
