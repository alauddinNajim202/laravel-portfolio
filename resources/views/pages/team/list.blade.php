@extends('layouts.admin_layout')

@section('content')
    <main class="bg-secondary p-2">
        <div class="container-fluid  px-4">
            <h1 class="mt-4 text-light">Team members list </h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item "><a class="text-light" href=" {{ route('admin.dashboard')}} ">Dashboard</a></li>
                <li class="breadcrumb-item text-white active"><a class="text-light" href=" {{ route('admin.abouts.create')}} ">Create</a> </li>
            </ol>


            <table class="table table-light text-center table-striped table-hover p-3">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Member Name</th>
                    <th scope="col">Positions</th>
                    <th scope="col">Image</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>

                    @if (count($teams) > 0)
                        @foreach ($teams as $team)
                            <tr>
                                <th scope="row">{{ $team->id }}</th>
                                <td>{{ $team->name }}</td>
                                <td>{{ $team->position }}</td>

                                <td>
                                    <img src="{{ url('public/img/'.$team->image) }}"
                                    style="height: 100px; width: 100px;">
                                </td>

                                <td>
                                    <div class="row ">

                                        <div class="col-md-6">
                                            <a class="btn btn-primary " href=" {{route('admin.teams.edit',$team->id)}} ">Edit </a>
                                        </div>

                                        <div class="col-md-6">
                                            <form action="{{route('admin.teams.destroy',$team->id)}}" method="POST">
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


























