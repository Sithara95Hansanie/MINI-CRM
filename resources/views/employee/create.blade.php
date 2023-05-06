
@extends('layouts.app')

@section('content')

    <div class="container col-md-6">
        <div class="card">
            <div class="card-header">
                <div class="col-md-12">
                    <h3>Create employee</h3>
                </div>
            </div>

            <form action="{{ route('employee.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="col-md-12">
                        @if ($errors->any())
                            @foreach ($errors->all() as $error)
                                <span class="text-danger">{{$error}}</span> <br>
                            @endforeach
                        @endif
                    </div>
                    <div class="col-md-12">
                        <label for="">First Name</label>
                        <input type="text" class="form-control" name="first_name">
                    </div>
                    <div class="col-md-12">
                        <label for="">Last Name</label>
                        <input type="text" class="form-control" name="last_name">
                    </div>
                    <div class="col-md-12">
                        <label for="">Email</label>
                        <input type="email" class="form-control" name="email">
                    </div>
                    <div class="col-md-12">
                        <label for="">company</label>
                        {{-- <input type="text" class="form-control" name="company_id"> --}}
                        <select name="company_id" id="company_id" class="form-control">
                            @foreach($companies as $company)
                                <option value="{{$company->id}}">{{$company->name}}</option>
                            @endforeach
                        </select>

                    </div>
                    <div class="col-md-12">
                        <label for="">Phone</label>
                        <input type="tel" class="form-control" name="phone">
                    </div>
                    <div class="col-md-3 mt-2">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection

