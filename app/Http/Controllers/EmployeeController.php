<?php

namespace App\Http\Controllers;

use App\Employee;
use Illuminate\Http\Request;
use App\Company;

class EmployeeController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $companies = Company::all();
        return view('employee.create_employee ', ['companies' => $companies]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {

        $this->validate($request, [
            'first_name' => 'required',
            'last_name' => 'required',
        ]);

        $data = $request->all();
        unset($data['_token']);
        Employee::create($data);
        return redirect(route('index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee) {
        $company = Company::find($employee->company_id);
        $employee->company = $company->name;
        return view('employee.show_employee', ['employee' => $employee]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee) {
        $companies = Company::all();

        return view('employee.edit_employee', [
            'employee' => $employee,
            'companies' => $companies,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee) {
        
        $this->validate($request, [
            'first_name' => 'required',
            'last_name' => 'required',
        ]);
        
        $data = $request->all();
        $employee_upd = Employee::find($employee->id);
        $employee_upd->first_name = $data['first_name'];
        $employee_upd->last_name = $data['last_name'];
        $employee_upd->company_id = $data['company_id'];
        $employee_upd->email = $data['email'];
        $employee_upd->phone = $data['phone'];
        $employee_upd->save();

        return redirect(route('index'));
    }

    public function delete(Employee $employee) {

        return view('employee.delete_employee', ['employee' => $employee]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee) {
        Employee::destroy($employee->id);
        return redirect(route('index'));
    }

}
