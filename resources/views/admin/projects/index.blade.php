@extends('layouts.app')

@section('title', 'Admin Projects Index')

@section('content')
    <div class="container-fluid px-5">

    @auth
        <div class="row">
            <div class="col-12">
                <h1 class="m-3 text-center">
                    Admin Projects Index Panel
                </h1>
            </div>
        </div>
        <div class="row">
            @if (session('deleted'))
                <div class="col-12">
                    <div class="alert alert-warning">
                        {{ session('deleted') }} has been deleted succesfully
                    </div>
                </div>
            @elseif (session('created'))
                <div class="col-12">
                    <div class="alert alert-primary">
                        {{ session('created') }} has been created succesfully
                    </div>
                </div>
            @elseif (session('restored'))
                <div class="col-12">
                    <div class="alert alert-success">
                        {{ session('restored') }} has been restored succesfully
                    </div>
                </div>
            @elseif (session('hardDelete'))
                <div class="col-12">
                    <div class="alert alert-danger">
                        {{ session('hardDelete') }} has been hard deleted succesfully
                    </div>
                </div>
            @endif
            <a href="{{ route('projects.create') }}" class="btn btn-success">Add a new Project</a>
            <a href="{{ route('projects.trashed') }}" class="btn btn-danger">Check deleted Projects</a>
            <div class="col-12">
                <table class="table table-striped table-hover text-center table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Author</th>
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
                                    {{ $project->user->name }}
                                </td>
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
                                    <a class="btn btn-sm btn-primary me-2"
                                        href="{{ route('projects.show', $project->id) }}">
                                        View
                                    </a>
                                    <a class="btn btn-sm btn-warning me-2"
                                        href="{{ route('projects.edit', $project->id) }}">Edit
                                    </a>
                                    <form action="{{ route('projects.destroy', $project) }}" class="d-inline form-deleter" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger me-2">
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            {{ $projects->links() }}

            </div>
        </div>
    @else
        <h1 class="text-center">You must be logged first!</h1>
    @endauth
    </div>
@endsection

@section('custom-script-tail')
    <script>
        const deleteFormElements = document.querySelectorAll('form.form-deleter');
        deleteFormElements.forEach(formElement => {
            formElement.addEventListener('submit', function(event) {
                event.preventDefault();
                const userConfirm = window.confirm('Are you sure you want to delete this project?');
                if (userConfirm) {
                    this.submit();
                }
            });
        });
    </script>
@endsection
