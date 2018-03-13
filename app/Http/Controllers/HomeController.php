<?php

namespace App\Http\Controllers;

use App\Customer;

class HomeController extends Controller
{

    public function index()
    {
        $customers = Customer::all();
        return view('customers.table', compact('customers'));
    }

    public function getRowDetails()
    {
        return view('customers.row_details');
    }

    public function getMasterDetails()
    {
        return view('customers.master_details');
    }

    public function getColumnSearch()
    {
        return view('customers.column_search');
    }

    public function getRowAttributes()
    {
        return view('customers.row_attributes');
    }

    public function getCarbon()
    {
        return view('customers.carbon');
    }
}
