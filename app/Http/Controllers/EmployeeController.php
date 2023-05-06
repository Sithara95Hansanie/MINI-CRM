<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Repositories\EmployeeRepository;
use App\Repositories\CompanyRepository;

class EmployeeController extends Controller
{
    private $employee_repo;
    private $company_repo;
    public function __construct(EmployeeRepository $employeeRepository, CompanyRepository $companyRepository)
    {
        $this->middleware('auth');
        $this->employee_repo = $employeeRepository;
        $this->company_repo = $companyRepository;

    }
/**
     * Display a listing of the employees.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = $this->employee_repo->findAll([]);
        return view('employee.index')->with(['employees' => $employees]);
    }

    /**
     * Show the form for creating a new employee.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companies = $this->company_repo->findAll([]);

        return view('employee.create')->with(['companies' => $companies]);
    }

    /**
     * Store a newly created employee in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'company_id' => 'required',
            'phone' => 'required|digits:10',

        ]);
        $employee = new Employee();
        $employee->first_name = $request->input('first_name');
        $employee->last_name = $request->input('last_name');

        $employee->email = $request->input('email');
        $employee->phone = $request->input('phone');
        $employee->company_id = $request->input('company_id');
        $employee->save();

        return redirect()->route('employee.index')->with('success', 'Employee created successfully.');
    }

    /**
     * Display the specified employee.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $employee = $this->employee_repo->find($id);

        $com = $employee->company;

        return view('employee.show',['employee' => $employee,'company'=>$com]);

    }

    /**
     * Show the form for editing the specified employee.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employee = $this->employee_repo->find($id);
        $companies = $this->company_repo->findAll([]);

        // return view('employee.edit', compact('employee'));
        return view('employee.edit')->with(['employee' => $employee,'companies' => $companies]);

    }

    /**
     * Update the specified employee in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'company_id' => 'required',


        ]);
        $employee = $this->employee_repo->find($id);

        $employee->first_name = $request->input('first_name');
        $employee->last_name = $request->input('last_name');

        $employee->email = $request->input('email');
        $employee->phone = $request->input('phone');
        $employee->company_id = $request->input('company_id');
        $employee->save();

        return redirect()->route('employee.index')->with('success', 'Employee updated successfully.');
    }

    /**
     * Remove the specified employee from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employee = Employee::findOrFail($id);
        $employee->delete();

        return redirect()->route('employee.index')->with('success', 'Employee deleted successfully.');
    }
}
