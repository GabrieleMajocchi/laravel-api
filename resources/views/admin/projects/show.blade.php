@extends('layouts.app')

@section("title", "Show a Project")

@section("content")
    <main>
        @auth
        <div class="container">
            @if (session('stored'))
                <div class="col-12">
                    <div class="alert alert-success">
                        {{ session('stored') }} has been created
                    </div>
                </div>
            @elseif (session('updated'))
            <div class="col-12">
                <div class="alert alert-success">
                    {{ session('updated') }} has been updated succesfully
                </div>
            </div>
            @endif

            <p>
                Project Author: {{ $project->user->name}}
            </p>
            <p>
                Project Name: {{ $project->title }}
            </p>
            <p>
                Type: {{ $project->type->name }}
            </p>
            @if ( count($project->technologies) > 0)
                <p>
                    @foreach ($project->technologies as $technology)
                        {{ $technology->name }} --
                    @endforeach
                </p>
            @endif
            <p>
                Description: {{ $project->description }}
            </p>
            <p>
                Programming Language: {{ $project->lang }}
            </p>
            <p>
                Link: {{ $project->link }}
            </p>
            <p>
                Date: {{ $project->date }}
            </p>
            <p>
                @if (str_starts_with($project->image, 'http' ))
                    <img src="{{ $project->image }}" alt="{{ $project->title }}">
                @else
                    <img src="{{ asset('storage/' . $project->image) }}" alt="{{ $project->title }}">
                @endif
            </p>
            <a href="{{ route('projects.index') }}" class="btn btn-secondary mt-6 d-block col-1">Back to list</a>
        </div>
        @else
        <h1 class="text-center">You must be logged first!</h1>
        @endauth
    </main>
@endsection
