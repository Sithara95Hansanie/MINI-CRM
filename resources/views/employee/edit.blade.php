

@extends('layouts.app')

@section('content')

    <div class="container col-md-6">
        <div class="card">
            <div class="card-header">
                <div class="col-md-12">
                    <h3>Edit employee</h3>
                </div>
            </div>

            <form action="{{ route('employee.update',$employee->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
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
                        <input type="text" class="form-control" name="first_name" value="{{$employee->first_name}}">
                    </div>
                    <div class="col-md-12">
                        <label for="">Last Name</label>
                        <input type="text" class="form-control" name="last_name" value="{{$employee->last_name}}">
                    </div>
                    <div class="col-md-12">
                        <label for="">Email</label>
                        <input type="text" class="form-control" name="email" value="{{$employee->email}}">
                    </div>
                    <div class="col-md-12">
                        <label for="">Phone</label>
                        <input type="text" class="form-control" name="phone" value="{{$employee->phone}}">
                    </div>
                    <div class="col-md-12">
                        <label for="">Company</label>
                        <select name="company_id" id="company_id" class="form-control">
                            @foreach($companies as $company)
                                <option value="{{$company->id}}" @php echo $company->name == $company->id ? 'selected' : ''; @endphp>{{$company->name}}</option>
                            @endforeach
                        </select>
                        {{-- <input type="text" class="form-control" name="company_id" value="{{$employee->company_id}}"> --}}
                    </div>
                    <div class="col-md-3 mt-2">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection

