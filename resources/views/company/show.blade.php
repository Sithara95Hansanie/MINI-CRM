

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
                        <thead>
                            <tr>
                                <td colspan="2">
                                    @if(!empty($company->logo))
                                        <img class="company-logo" src="{{ asset('image/' . $company->logo) }}" alt="Uploaded Image">                                        
                                    @else
                                        image not available
                                    @endif
                                </td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Name  : </td>
                                <td>{{$company->name}}</td>
                            </tr>
                            <tr>
                                <td>Email  :</td>
                                <td>{{$company->email}}</td>
                            </tr>
                            <tr>
                                <td>Website  :</td>
                                <td>{{$company->website}}</td>
                            </tr>
                           
                        </tbody>
                    </table>
                    
                    
                    
                </div>
        </div>
    </div>

@endsection

