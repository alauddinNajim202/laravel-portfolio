@extends('layouts.admin_layout')

@section('content')
    <main class="bg-danger p-2">
        <div class="container-fluid  px-4">
            <h1 class="mt-4">Portfolio list </h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item "><a class="text-dark" href=" {{ route('admin.dashboard')}} ">Dashboard</a></li>
                <li class="breadcrumb-item text-white active"><a class="text-dark" href=" {{ route('admin.abouts.create')}} ">Create</a> </li>
            </ol>


            <table class="table table-light text-center table-striped table-hover p-3">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Sub-Title</th>
                    <th scope="col">Description</th>
                    <th scope="col">Image</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>

                    @if (count($abouts) > 0)
                        @foreach ($abouts as $about)
                            <tr>
                                <th scope="row">{{ $about->id }}</th>
                                <td>{{ $about->title }}</td>
                                <td>{{ $about->sub_title }}</td>
                                <td>{{ Str::limit(strip_tags($about->description),10) }}</td>
                                <td>
                                    <img src="{{ url('public/img/'.$about->image) }}"
                                    style="height: 100px; width: 100px;">
                                </td>

                                <td>
                                    <div class="row">
                                        <div class="col-sm-4 ">
                                            <a class="btn btn-primary " href=" {{route('admin.abouts.edit',$about->id)}} ">Edit </a>
                                        </div>

                                        <div class="col-sm-4 ">
                                            <form action="{{route('admin.abouts.destroy',$about->id)}}" method="POST">
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


























