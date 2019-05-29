<?php

namespace App\Http\Controllers;

use App\Company;
use Illuminate\Http\Request;
use App\Employee;
use Illuminate\Support\Facades\Storage;

class CompanyController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('company.create_company');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {

        $this->validate($request, [
            'name' => 'required',
            'logo' => 'dimensions:min_width=100,min_height=100',
        ]);

        $data = $request->all();
        

        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $file_name = 'logo_' . $data['name'] . '.' . $file->clientExtension();
            Storage::putFileAs('public', $file, $file_name);
            $data['logo'] = 'storage' . DIRECTORY_SEPARATOR . 'logo_' . $data['name'] . '.' . $file->clientExtension();
        }

        unset($data['_token']);
//        unset($data['logo']);
        Company::create($data);

        return redirect(route('index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company) {
        return view('company.show_company', ['company' => $company]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company) {
        return view('company.edit_company', ['company' => $company]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Company $company) {

        $this->validate($request, [
            'name' => 'required',
            'logo' => 'dimensions:min_width=100,min_height=100',
        ]);

        $data = $request->all();

        $company_upd = Company::find($company->id);
        $company_upd->name = $data['name'];
        $company_upd->email = $data['email'];
        $company_upd->website = $data['website'];
        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $file_name = 'logo_' . $data['name'] . '.' . $file->clientExtension();
            Storage::putFileAs('public', $file, $file_name);
            $data['logo'] = 'storage' . DIRECTORY_SEPARATOR . 'logo_' . $data['name'] . '.' . $file->clientExtension();
        }
        $company_upd->logo = $data['logo'];
        $company_upd->save();
        return redirect(route('index'));
    }

    public function delete(Company $company) {

        return view('company.delete_company', ['company' => $company]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company) {
        $employee_ids = Employee::where('company_id', $company->id)->pluck('id');
        Employee::destroy($employee_ids);
        Company::destroy($company->id);
        if (isset($company->logo) && file_exists($company->logo)) {
            unlink($company->logo);
        }
        return redirect(route('index'));
    }

}
