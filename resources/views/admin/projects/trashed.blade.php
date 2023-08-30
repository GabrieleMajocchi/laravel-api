@extends('layouts.app')

@section('content')
<div class="container">
    @auth
    <div class="row justify-content-center">
        <div class="col-12">

            <table class="table table-striped table-hover text-center table-bordered">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Title</th>
                        <th scope="col">Description</th>
                        <th scope="col">Programming Language</th>
                        <th scope="col">Link</th>
                        <th scope="col">Date</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($projects as $project)
                        <tr>
                            <th scope="row">
                                {{ $project->id }}
                            </th>
                            <td>
                                {{ $project->title }}
                            </td>
                            <td>
                                {{ $project->description }}
                            </td>
                            <td>
                                {{ $project->lang }}
                            </td>
                            <td>
                                {{ $project->link }}
                            </td>
                            <td>
                                {{ $project->date }}
                            </td>
                            <td>
                                <form class="d-inline-block me-2" action="{{ route('projects.restore', $project->id) }}" method="POST">
                                    @csrf
                                    @method('POST')

                                    <button type="submit" class="btn btn-sm btn-warning">
                                        Restore
                                    </button>
                                </form>
                                <form class="d-inline-block" action="{{ route('projects.hardDelete', $project->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="btn btn-sm btn-danger mt-2">
                                        Delete permanently
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach

                </tbody>

            </table>
            <a href="{{ route('projects.index') }}" class="btn btn-secondary mt-6 d-block col-1">Back to list</a>
            {{ $projects->links() }}

        </div>
    </div>
    @else
        <h1 class="text-center">You must be logged first!</h1>
    @endauth
</div>
@endsection
