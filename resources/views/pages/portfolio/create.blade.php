@extends('layouts.admin_layout')

@section('content')
    <main class="bg-light p-2">
        <div class="container-fluid  px-4">
            <h1 class="mt-4">Portfolio - Create </h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item "><a class="text-dark" href=" {{ route('admin.dashboard')}} ">Dashboard</a></li>
                <li class="breadcrumb-item text-white active"><a class="text-dark" href=" {{ route('admin.portfolios.list')}} ">list</a> </li>
            </ol>

            <form action="{{ route('admin.portfolios.create') }}" method="POST" enctype="multipart/form-data" >
                @csrf
                {{ method_field('PUT') }}
                    <div class="row p-3">
                            <div class="form-group col-md-6">
                                <h4>Big Image</h4>
                                <img style="height: 30vh " src="{{ asset('assets/img/download.jpg') }}" >
                                <input class="mt-3" type="file" name="big_img" id="big_img">
                            </div>
                            <div class="form-group col-md-6">
                                <h4>Small Image</h4>
                                <img style="height: 20vh " src="{{ asset('assets/img/img1.jpg') }} " >
                                <input class="mt-3" type="file" name="small_img" id="small_img">
                            </div>

                            <div class="form-group  col-md-3 col-lg-6">
                                <h4>Description</h4>
                               <textarea class="form-control" name="description" id="" cols="" rows="5"></textarea>
                            </div>

                            <div class="form-group col-lg-6">
                                <div>
                                    <label for="title"><h4>Title</h4></label>
                                    <input type="text" name="title" id="title"  class="form-control @error('title') is-invalid @enderror" >
                                </div>

                                <div>
                                    <label for="sub_title"><h4>sub - Title</h4></label>
                                    <input type="text" name="sub_title" id="sub_title"  class="form-control @error('sub_title') is-invalid @enderror" >
                                </div>

                                <div class="mt-3">
                                    <label for="client"><h4>Client</h4></label>
                                    <input type="text" name="client" id="client"  class="form-control @error('client') is-invalid @enderror " >
                                </div>

                                <div class="mt-3">
                                    <label for="category"><h4>Category</h4></label>
                                    <input type="text" name="category" id="category"  class="form-control @error('category') is-invalid @enderror " >
                                </div>


                            </div>


                    </div>
                    <button type="submit" class="btn btn-primary mt-4">Submit</button>
            </form>


        </div>
    </main>

@endsection

