@extends('layouts.admin_layout')

@section('content')
    <main class="bg-info p-2">
        <div class="container-fluid  px-4">
            <h1 class="mt-4">Main </h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item "><a class="text-dark" href=" {{ route('admin.dashboard')}} ">Dashboard</a></li>
                <li class="breadcrumb-item text-white active">Main </li>
            </ol>

            <form action="{{ route('admin.main.update') }}" method="POST" enctype="multipart/form-data" >
                @csrf
                {{ method_field('PUT') }}
                    <div class="row">
                            <div class="form-group col-lg-4">
                                <h4>Background Image</h4>
                                <img style="height: 30vh " src=" {{ url($main->bc_img) }} " >
                                <input class="mt-3" type="file" name="bc_img" id="bc_img">
                            </div>

                            <div class="form-group col-lg-4">
                                <div>
                                    <label for="title"><h4>Title</h4></label>
                                    <input type="text" name="title" id="title" value="{{$main->title }}" class="form-control @error('title') is-invalid @enderror" value="{{$main->title }}">
                                </div>

                                <div class="mt-3">
                                    <label for="sub_title"><h4>Sub-Title</h4></label>
                                    <input type="sub_title" name="sub_title" id="sub_title"  class="form-control @error('sub_title') is-invalid @enderror " value="{{$main->sub_title }}">
                                </div>

                                <div class="mt-5" >
                                    <h5>Upload resume</h5>
                                    <input type="file" name="resume" id="resume">
                                </div>
                            </div>


                    </div>
                    <button type="submit" class="btn btn-primary mt-4">Submit</button>
            </form>


        </div>
    </main>

@endsection

