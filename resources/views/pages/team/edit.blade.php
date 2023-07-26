@extends('layouts.admin_layout')

@section('content')
    <main class="bg-light p-2">
        <div class="container-fluid  px-4">
            <h1 class="mt-4">Team Member Edit  </h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item "><a class="text-dark" href=" {{ route('admin.dashboard')}} ">Dashboard</a></li>
                <li class="breadcrumb-item text-white active"><a class="text-dark" href=" {{ route('admin.teams.list')}} ">list</a> </li>
            </ol>

            <form action="{{ route('admin.teams.update', $teams->id) }} " method="POST" class="text-dark" enctype="multipart/form-data" >
                @csrf

                <div class="row p-3">

                   <div class="col-md-6">
                    <div class="form-group  col-md-6">
                        <h4>Member Name </h4>
                        <input class="form-control" type="text" name="name" id="name" value=" {{ $teams->name}} " >
                    </div>


                        <div class="form-group mt-5 col-md-6">
                            <h4>Position </h4>
                            <input class="form-control" type="text" name="position" id="position" value=" {{ $teams->position}} ">
                        </div>
                   </div>

                    <div class="col-md-6">
                        <div class="form-group col-md-6">
                            <h4>Image </h4>
                            <img style="height: 40vh" src="{{ url('public/img/'.$teams->image) }} " >
                            <input class="" type="file" name="image" id="image">
                        </div>
                    </div>

            </div>
                    <button type="submit" class="btn btn-primary m-4">Update</button>
            </form>


        </div>
    </main>

@endsection

