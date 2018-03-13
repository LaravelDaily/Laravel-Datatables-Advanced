<?php

namespace App\Http\Controllers;

use App\Customer;
use Yajra\Datatables\Datatables;

class APIController extends Controller
{
    public function getRowDetailsData()
    {
        $customers = Customer::select(['id', 'first_name', 'last_name', 'email', 'created_at', 'updated_at']);

        return Datatables::of($customers)->make(true);
    }

    public function getMasterDetailsData()
    {
        $customers = Customer::select();

        return Datatables::of($customers)
            ->addColumn('details_url', function($customer) {
                return route('api.master_single_details', $customer->id);
            })->make(true);
    }

    public function getMasterDetailsSingleData($id)
    {
        $purchases = Customer::findOrFail($id)->purchases;

        return Datatables::of($purchases)->make(true);
    }

    public function getColumnSearchData()
    {
        $customers = Customer::select();

        return Datatables::of($customers)->make(true);
    }

    public function getRowAttributesData()
    {
        $customers = Customer::select(['id', 'first_name', 'last_name', 'email', 'created_at', 'updated_at']);

        return Datatables::of($customers)
            ->addColumn('action', function ($customer) {
                return '<a href="#edit-'. $customer->id.'" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</a>';
            })
            ->editColumn('id', '{{$id}}')
            ->removeColumn('updated_at')
            ->setRowId('id')
            ->setRowClass(function ($user) {
                return $user->id % 2 == 0 ? 'alert-success' : 'alert-warning';
            })
            ->setRowData([
                'id' => 'test',
            ])
            ->setRowAttr([
                'color' => 'red',
            ])
            ->make(true);
    }

    public function getCarbonData()
    {
        $customers = Customer::select(['id', 'first_name', 'last_name', 'email', 'created_at', 'updated_at']);

        return Datatables::of($customers)
            ->editColumn('created_at', '{!! $created_at !!}')
            ->editColumn('updated_at', function ($customer) {
                return $customer->updated_at->format('Y/m/d');
            })
            ->filterColumn('updated_at', function ($query, $keyword) {
                $query->whereRaw("DATE_FORMAT(updated_at,'%Y/%m/%d') like ?", ["%$keyword%"]);
            })
            ->make(true);
    }
}
