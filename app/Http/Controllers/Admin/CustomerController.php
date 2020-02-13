<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Customer;
use Freshbitsweb\Laratables\Laratables;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:Create Customer')->only(['create', 'store']);
        $this->middleware('permission:View Customer')->only(['index', 'show']);
        $this->middleware('permission:Update Customer')->only(['edit', 'update']);
        $this->middleware('permission:Delete Customer')->only(['destroy']);
    }

    public function customers()
    {
        return Laratables::recordsOf(Customer::class, function($query)
        {
            return $query->latest('id');
        });
    }

    public function index()
    {
        return view('admin.customer.index');
    }

    public function create()
    {
        return view('admin.customer.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:customers',
            'phone' => 'nullable|string|max:11|min:11',
            'password' => 'required|string|min:8|confirmed'
        ]);

        $request['password'] = bcrypt($request->password);
        $create = Customer::create($request->all());

        if($create){
            return response()->json(['success' => 'Customer successfully created!']);
        }else{
            return response()->json(['error' => 'Ops! please try again!']); 
        }
    }

    public function show(Customer $customer)
    {
        return view('admin.customer.show', compact('customer'));
    }


    public function edit(Customer $customer)
    {
        return view('admin.customer.edit', compact('customer'));
    }

    public function update(Request $request, Customer $customer)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:customers,email,'.$customer->id,
            'phone' => 'nullable|string|max:11|min:11',
            'password' => 'nullable|string|min:8|confirmed'
        ]);

        if($request->password){
            $request['password'] = bcrypt($request->password);
        }else{
            $request['password'] = $customer->password;
        }

        $update = $customer->update($request->all());

        if($update){
            return response()->json(['success' => 'Customer successfully updated!']);
        }else{
            return response()->json(['error' => 'Ops! please try again!']); 
        }
    }

    public function destroy(Request $request)
    {
        $delete = Customer::destroy($request->id);

        if($delete){
            return response()->json(['success' => 'Customer successfully deleted!']);
        }else{
            return response()->json(['error' => 'Deleting failed! Please try again!']);
        }
    }
}
