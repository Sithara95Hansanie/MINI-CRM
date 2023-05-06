

@extends('layouts.app')

@section('content')

    <div class="container col-md-6">
        <div class="card">
            <div class="card-header">
                <div class="col-md-12">
                    <h3> Details</h3>
                </div>
            </div>

        
                <div class="card-body">
                    <table>
                        <tbody>
                            <tr>
                                <td>First Name : </td>
                                <td>{{$employee->first_name}}</td>
                            </tr>
                            <tr>
                                <td>Last Name : </td>
                                <td>{{$employee->last_name}}</td>
                            </tr>
                            <tr>
                                <td>Email : </td>
                                <td>{{$employee->email}}</td>
                            </tr>
                            <tr>
                                <td>Phone :</td>
                                <td>{{$employee->phone}}</td>
                            </tr>
                            <tr>
                                <td>Company :</td>
                                <td>{{$company->name}}</td>
                            </tr>
                        </tbody>
                    </table>
                    
                    
                    
                </div>
        </div>
    </div>

@endsection

