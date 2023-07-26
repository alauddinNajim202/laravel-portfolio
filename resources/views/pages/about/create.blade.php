@extends('layouts.admin_layout')

@section('content')
    <main class="bg-light p-2">
        <div class="container-fluid  px-4">
            <h1 class="mt-4">About - Create </h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item "><a class="text-dark" href=" {{ route('admin.dashboard')}} ">Dashboard</a></li>
                <li class="breadcrumb-item text-white active"><a class="text-dark" href=" {{ route('admin.abouts.list')}} ">list</a> </li>
            </ol>

            <form action="{{ route('admin.abouts.store') }}" method="POST" enctype="multipart/form-data" >
                @csrf
                {{ method_field('PUT') }}
                    <div class="row p-3">
                            <div class="form-group col-md-6">
                                <h4>Title </h4>
                                <input class="mt-3" type="text" name="title" id="title">
                            </div>
                            <div class="form-group col-md-6">
                                <h4>Sub Title </h4>
                                <input class="my-4" type="text" name="sub_title" id="sub_title">
                            </div>

                            <div class="form-group  col-md-3 col-lg-6">
                                <h4>Description</h4>
                               <textarea class="form-control" name="description" id="" cols="" rows="5"></textarea>
                            </div>

                            <div class="form-group col-md-6">
                                <h4>Image </h4>
                                <img style="height: 20vh " src="{{ asset('assets/img/download.jpg') }} " >
                                <input class="mt-3" type="file" name="image" id="image">
                            </div>

                    </div>
                        <button type="submit" class="btn btn-primary mt-4">Submit</button>
            </form>


        </div>
    </main>

@endsection

