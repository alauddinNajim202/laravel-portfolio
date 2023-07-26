@extends('layouts.admin_layout')

@section('content')
    <main class="bg-danger p-2">
        <div class="container-fluid  px-4">
            <h1 class="mt-4">Edit service </h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item "><a class="text-dark" href=" {{ route('admin.dashboard')}} ">Dashboard</a></li>
                <li class="breadcrumb-item text-white active"><a class="text-dark" href=" {{ route('admin.services.list')}} ">list</a> </li>
            </ol>

            <form action=" {{ route('admin.services.update', $service->id) }} " method="POST" class="text-light" enctype="multipart/form-data" >
                @csrf

                    <div class="row">


                            <div class="form-group col-lg-4">

                                <div>
                                    <label for="icon"><h4>Font Awesome Icon</h4></label>
                                    <input type="text" name="icon" id="icon" " class="form-control @error('icon') is-invalid @enderror" value="{{$service->icon}}">
                                </div>
                                <div>
                                    <label for="title"><h4>Title</h4></label>
                                    <input type="text" name="title" id="title" " class="form-control @error('title') is-invalid @enderror" value="{{$service->title}}">
                                </div>

                                <div class="mt-3">
                                    <label for="description"><h4>Description</h4></label>
                                    <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description" cols="30" rows="5">{{$service->description}}"</textarea>

                                </div>


                            </div>


                    </div>
                    <button type="submit" class="btn btn-primary mt-4">Update</button>
            </form>


        </div>
    </main>

@endsection

