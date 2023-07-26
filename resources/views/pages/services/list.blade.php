@extends('layouts.admin_layout')

@section('content')
    <main class="bg-warning p-2">
        <div class="container-fluid  px-4">
            <h1 class="mt-4">Service list </h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item "><a class="text-dark" href=" {{ route('admin.dashboard')}} ">Dashboard</a></li>
                <li class="breadcrumb-item text-white active"><a class="text-dark" href=" {{ route('admin.services.create')}} ">Create</a> </li>
            </ol>


            <table class="table table-light text-center table-striped table-hover p-3">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Icon</th>
                    <th scope="col">Title</th>
                    <th scope="col">Description</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>

                    @if (count($services) > 0)
                        @foreach ($services as $service)
                            <tr>
                                <th scope="row">{{ $service->id }}</th>
                                <td>{{ $service->icon }}</td>
                                <td>{{ $service->title }}</td>
                                <td>{{ Str::limit(strip_tags($service->description),40) }}</td>
                                <td>
                                    <div class="row">
                                        <div class="col-sm-4 ">
                                            <a class="btn btn-primary " href=" {{route('admin.services.edit',$service->id)}} ">Edit </a>
                                        </div>

                                        <div class="col-sm-4 ">
                                            <form action="{{route('admin.services.destroy',$service->id)}}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <input type="submit" value="Delete" name="submit" class="btn btn-danger">
                                            </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    @endif


                </tbody>
              </table>


        </div>
    </main>

@endsection


























