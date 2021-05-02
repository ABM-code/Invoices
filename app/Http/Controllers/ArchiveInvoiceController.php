<?php

namespace App\Http\Controllers;

use App\ArchiveInvoice;
use App\Invoices;
use Illuminate\Http\Request;

class ArchiveInvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $invoices = Invoices::onlyTrashed()->get();
        return view('invoices.invoice_archive',compact('invoices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ArchiveInvoice  $archiveInvoice
     * @return \Illuminate\Http\Response
     */
    public function show(ArchiveInvoice $archiveInvoice)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ArchiveInvoice  $archiveInvoice
     * @return \Illuminate\Http\Response
     */
    public function edit(ArchiveInvoice $archiveInvoice)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ArchiveInvoice  $archiveInvoice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $id = $request->invoice_id;
        $flight = Invoices::withTrashed()->where('id', $id)->restore();

        session()->flash('restore_invoice');
        return redirect('/invoices');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ArchiveInvoice  $archiveInvoice
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $invoices = invoices::withTrashed()->where('id', $request->invoice_id)->first();

        $invoices->forceDelete();
        session()->flash('delete_invoice');
        return redirect('/Invoices_Archive');
    }
}
