<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;
use App\Employee;

class IndexController extends Controller {

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index() {
        
        
        $companies = Company::paginate(10, ['*'], 'company');
        $employees = Employee::paginate(10, ['*'], 'employee');

        for ($i = 0; $i < count($employees); $i++) {
            for ($j = 0; $j < count($companies); $j++) {
                if ($employees[$i]->company_id == $companies[$j]->id) {
                    $employees[$i]->company = $companies[$j]->name;
                    break;
                }
            }
        }

        return view('index', [
            'companies' => $companies,
            'employees' => $employees,
        ]);
    }

}
