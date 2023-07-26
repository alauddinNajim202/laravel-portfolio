@extends('layouts.admin_layout')

@section('content')
    <main class="bg-light p-2">
        <div class="container-fluid  px-4">
            <h1 class="mt-4">Team Member - Create </h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item "><a class="text-dark" href=" {{ route('admin.dashboard')}} ">Dashboard</a></li>
                <li class="breadcrumb-item text-white active"><a class="text-dark" href=" {{ route('admin.teams.list')}} ">list</a> </li>
            </ol>

            <form action="{{ route('admin.teams.store') }}" method="POST" enctype="multipart/form-data" >
                @csrf
                {{ method_field('PUT') }}
                    <div class="row p-3">

                        <div class="form-group col-md-6">
                            <h4>Image </h4>
                            <img style="height: 20vh " src="{{ asset('assets/img/download.jpg') }} " >
                            <input class="m-3" type="file" name="image" id="image">
                        </div>

                            <div class="col-md-6">
                                <div class="form-group  col-md-12">
                                    <h4>Name</h4>
                                    <input class="form-control" type="text" name="name" id="name">
                                </div>

                                <div class="form-group col-md-12 mt-5 ">
                                    <h4>Member Position </h4>
                                    <input class="form-control" type="text" name="position" id="position">
                                </div>
                            </div>


                    </div>
                        <button type="submit" class="btn btn-primary mt-4">Submit</button>
            </form>


        </div>
    </main>

@endsection

