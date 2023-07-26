@extends('layouts.admin_layout')

@section('content')
    <main class="bg-light p-2">
        <div class="container-fluid  px-4">
            <h1 class="mt-4">Edit Portfolio </h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item "><a class="text-dark" href=" {{ route('admin.dashboard')}} ">Dashboard</a></li>
                <li class="breadcrumb-item text-white active"><a class="text-dark" href=" {{ route('admin.abouts.list')}} ">list</a> </li>
            </ol>

            <form action="{{ route('admin.abouts.update', $abouts->id) }} " method="POST" class="text-dark" enctype="multipart/form-data" >
                @csrf

                <div class="row p-3">

                   <div class="col-md-6">
                    <div class="form-group  col-md-3">
                        <h4>Title </h4>
                        <input  type="text" name="title" id="title" value=" {{ $abouts->title}} " >
                    </div>


                        <div class="form-group mt-5 col-md-3">
                            <h4>Sub Title </h4>
                            <input class="" type="text" name="sub_title" id="sub_title" value=" {{ $abouts->sub_title}} ">
                        </div>
                   </div>

                    <div class="col-md-6">
                        <div class="form-group  col-md-3 col-md-12">
                            <h4>Description</h4>
                            <textarea class="form-control" name="description" id="" cols="" rows="5"> {{$abouts->description}} </textarea>
                        </div>


                        <div class="form-group mt-5 col-md-3">
                            <h4>Image </h4>
                            <img style="height: 30vh" src="{{ url('public/img/'.$abouts->image) }} " >
                            <input class="mt-3" type="file" name="image" id="image">
                        </div>
                    </div>






            </div>
                    <button type="submit" class="btn btn-primary m-4">Update</button>
            </form>


        </div>
    </main>

@endsection

