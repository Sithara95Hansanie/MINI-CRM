<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Http\Requests\CompanyStoreRequest;
use App\Repositories\CompanyRepository;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    private $comany_repo;

    public function __construct(CompanyRepository $companyRepository)
    {
        $this->middleware('auth');
        $this->company_repo = $companyRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = $this->company_repo->findAll([]);
        return view('company.index')->with(['companies' => $companies]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('company.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email'=>'required',
            'website'=>'required'
        ]);

        $company = new Company();
        $company->name = $request->name;
        $company->email = $request->email;

        $imageName = "";
        if ($request->logo != null) {
            $imageName = time() . '.' . $request->logo->getClientOriginalExtension();
        }

        if ($request->logo != null) {
            $request->logo->move(public_path('image'), $imageName);
        }

        $company->logo = $imageName;
        $company->website = $request->website;

        $this->company_repo->save($company);
        return redirect()->route('company.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $company = $this->company_repo->find($id);

        return view('company.show',['company' => $company]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $company = $this->company_repo->find($id);
        return view('company.edit')->with(['company' => $company]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email'=>'required',
            'website'=>'required'
        ]);

        $company = $this->company_repo->find($id);

        $company->name = $request->name;
        $company->email = $request->email;
        $company->website = $request->website;

        $imageName = "";
        if ($request->logo != null) {
            $imageName = time() . '.' . $request->logo->getClientOriginalExtension();
        }

        if ($request->logo != null) {
            $request->logo->move(public_path('image'), $imageName);
        }

        if ($request->logo != null) {
            $company->logo = $imageName;
        }

        $this->company_repo->save($company);

        return redirect()->route('company.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy(Company $company)
    {
        $company->delete();
        return redirect()->route('company.index')->with('success','Company has been deleted successfully');
    }
 
}
