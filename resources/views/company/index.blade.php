@extends('layouts.app')

@section('content')

    <div class="container" ng-controller="companyController">
        <div class="row justify-content-center">
            <div class="col-md-12 text-right">
                <a href="{{ route('company.create') }}" class="btn btn-success">Create new company</a>
            </div>
            <div class="col-md-12 mt-2">
                <div class="card">
                        <table class="table table-bordered table-striped table-hover">
                            <thead>
                                <tr>
                                  <th scope="col">#</th>
                                  <th scope="col">Name</th>
                                  <th scope="col">Email</th>
                                  <th scope="col">Website</th>
                                  <th scope="col"></th>

    
                                </tr>
                              </thead>
                              <tbody>
                                @foreach($companies as $company)
                                <tr>
                                  <th scope="row">{{$company->id}}</th>
                                  <td>{{$company->name}}</td>
                                  <td>{{$company->email}}</td>
                                  <td>{{$company->website}}</td>
                                  <td>
                                    <div class="action-btn">
                                        <a class="btn btn-primary" href="{{ route('company.edit',$company->id) }}">Edit</a>
                                        <a class="btn btn-success" href="{{ route('company.show',$company->id) }}">show</a>
                
                                        <form action="{{ route('company.destroy',$company->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                              
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </div>
                                    
                                  </td>
                                </tr>
                                @endforeach
                              </tbody>
                        </table>

                    <nav aria-label="Page navigation">
                        <ul class="pagination justify-content-center">
                            <li class="page-item {{ $companies->previousPageUrl() ? '' : 'disabled' }}">
                                <a class="page-link" href="{{ $companies->previousPageUrl() }}" tabindex="-1">Previous</a>
                            </li>
                
                            @for ($i = 1; $i <= $companies->lastPage(); $i++)
                                <li class="page-item {{ $i == $companies->currentPage() ? 'active' : '' }}">
                                    <a class="page-link" href="{{ $companies->url($i) }}">{{ $i }}</a>
                                </li>
                            @endfor
                
                            <li class="page-item {{ $companies->nextPageUrl() ? '' : 'disabled' }}">
                                <a class="page-link" href="{{ $companies->nextPageUrl() }}">Next</a>
                            </li>
                        </ul>
                    </nav>

                </div>
            </div>
        </div>

      
    </div>

@endsection
