@extends('layouts.app')
  
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Companies List') }}</div>
  
                <div class="card-body">
                    <a href="{{ url('/company/create') }}" class="btn btn-success">Create new company</a>

                    <table class="table table-bordered table-striped table-hover">
                        <thead>
                            <tr>
                              <th scope="col">Name</th>
                              <th scope="col">Address</th>
                              <th scope="col">Email</th>
                              <th scope="col">Website</th>
                              <th scope="col"></th>

                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <th scope="row">1</th>
                              <td>Mark</td>
                              <td>Otto</td>
                              <td>@mdo</td>
                              <td>
                                <button class="btn btn-success">Edit</button>
                                <button class="btn btn-danger">
                                    Delete
                                </button>
                              </td>
                            </tr>
                          </tbody>
                    </table>                </div>
            </div>
        </div>
    </div>
</div>
@endsection