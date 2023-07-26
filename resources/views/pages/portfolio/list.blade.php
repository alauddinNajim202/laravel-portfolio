@extends('layouts.admin_layout')

@section('content')
    <main class="bg-danger p-2">
        <div class="container-fluid  px-4">
            <h1 class="mt-4">About list </h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item "><a class="text-dark" href=" {{ route('admin.dashboard')}} ">Dashboard</a></li>
                <li class="breadcrumb-item text-white active"><a class="text-dark" href=" {{ route('admin.portfolios.create')}} ">Create</a> </li>
            </ol>


            <table class="table table-light text-center table-striped table-hover p-3">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Sub-Title</th>
                    <th scope="col">Large Image</th>
                    <th scope="col">Middle Image</th>
                    <th scope="col">Description</th>
                    <th scope="col">Client</th>
                    <th scope="col">Category</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>

                    @if (count($portfolios) > 0)
                        @foreach ($portfolios as $portfolio)
                            <tr>
                                <th scope="row">{{ $portfolio->id }}</th>
                                <td>{{ $portfolio->title }}</td>
                                <td>{{ $portfolio->sub_title }}</td>
                                <td>
                                    <img src="{{ url('public/img/'.$portfolio->big_img) }}"
                                    style="height: 50px; width: 100px;">
                                </td>
                                <td>
                                    <img src="{{ url('public/img/'.$portfolio->small_img) }}"
                                    style="height: 50px; width: 100px;">

                                </td>
                                <td>{{ Str::limit(strip_tags($portfolio->description),10) }}</td>
                                <td>{{ $portfolio->client }}</td>
                                <td>{{ $portfolio->category }}</td>

                                <td>
                                    <div class="row">
                                        <div class="col-sm-4 ">
                                            <a class="btn btn-primary " href=" {{route('admin.portfolios.edit',$portfolio->id)}} ">Edit </a>
                                        </div>

                                        <div class="col-sm-4 ">
                                            <form action="{{route('admin.portfolios.destroy',$portfolio->id)}}" method="POST">
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


























