

@extends('layouts.app')

@section('content')

    <div class="container col-md-6">
        <div class="card">
            <div class="card-header">
                <div class="col-md-12">
                    <h3>Edit company</h3>
                </div>
            </div>

            <form action="{{ route('company.update',$company->id) }}" method="post" enctype="multipart/form-data">
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
                        <label for="">Name</label>
                        <input type="text" class="form-control" name="name" value="{{$company->name}}">
                    </div>
                    
                    <div class="col-md-12">
                        <label for="">Email</label>
                        <input type="text" class="form-control" name="email" value="{{$company->email}}">
                    </div>
                    <div class="col-md-12">
                        <label for="">Website</label>
                        <input type="text" class="form-control" name="website" value="{{$company->website}}">
                    </div>
                    <div class="col-md-12">
                        <label for="">Image</label>
                        <input type="file" class="form-control" name="logo">
                    </div>
                    <div class="col-md-3 mt-2">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection

