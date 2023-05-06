@extends('layouts.app')

@section('content')

    <div class="container" ng-controller="employeeController">
        <div class="row justify-content-center">
            <div class="col-md-12 text-right">
                <a href="{{ route('employee.create') }}" class="btn btn-success">Create new employee</a>
            </div>
            <div class="col-md-12 mt-2">
                <div class="card">
                        <table class="table table-bordered table-striped table-hover">
                            <thead>
                                <tr>
                                  <th scope="col">#</th>
                                  <th scope="col">First name</th>
                                  <th scope="col">Last name</th>

                                  <th scope="col">Email</th>
                                  <th scope="col">Phone</th>
                                  <th scope="col">Company</th>

                                  <th scope="col"></th>

    
                                </tr>
                              </thead>
                              <tbody>
                                @foreach($employees as $employee)
                                <tr>
                                  <th scope="row">{{$employee->id}}</th>
                                  <td>{{$employee->first_name}}</td>
                                  <td>{{$employee->last_name}}</td>
                                  <td>{{$employee->email}}</td>
                                  <td>{{$employee->phone}}</td>
                                  <td>{{$employee->company->name}}</td>

                                  <td>
                                    <div class="action-btn">
                                        <a class="btn btn-primary" href="{{ route('employee.edit',$employee->id) }}">Edit</a>
                                        <a class="btn btn-success" href="{{ route('employee.show',$employee->id) }}">show</a>
                
                                        <form action="{{ route('employee.destroy',$employee->id) }}" method="POST">
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
                                <li class="page-item {{ $employees->previousPageUrl() ? '' : 'disabled' }}">
                                    <a class="page-link" href="{{ $employees->previousPageUrl() }}" tabindex="-1">Previous</a>
                                </li>
                    
                                @for ($i = 1; $i <= $employees->lastPage(); $i++)
                                    <li class="page-item {{ $i == $employees->currentPage() ? 'active' : '' }}">
                                        <a class="page-link" href="{{ $employees->url($i) }}">{{ $i }}</a>
                                    </li>
                                @endfor
                    
                                <li class="page-item {{ $employees->nextPageUrl() ? '' : 'disabled' }}">
                                    <a class="page-link" href="{{ $employees->nextPageUrl() }}">Next</a>
                                </li>
                            </ul>
                        </nav>

                </div>
            </div>
        </div>

     
    </div>

@endsection
