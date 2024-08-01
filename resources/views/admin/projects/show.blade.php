@extends('layouts.app')


@section('content')
    <div class="container py-5 text-light">
        <div class="row">
            <div class="card my-5 bg-dark text-light">

                <div class="card-header">
                    <h2 class="text-center my-3">
                        {{ $project->name }}
                    </h2>
                </div>

                <div class="card-body">
                    <h5>
                        Type: {{ $project->type?->title ?: 'Undefined' }}
                    </h5>

                    <hr class="text-black">

                    <h5>
                        Technologies used:
                    </h5>
                    <ul>
                        @foreach ($project->technologies as $technology)
                            <li>
                                {{ $technology->name }}
                            </li>
                        @endforeach
                    </ul>

                    <hr class="text-black">

                    <h5>
                        Description:
                    </h5>
                    <p>
                        {{ $project->description }}
                    </p>

                </div>

                <div class="card-footer py-3 d-flex justify-content-between align-items-center ">
                    <a href="{{ route('admin.projects.index') }}" class="btn btn-outline-secondary">
                        <i class="fas fa-arrow-left"></i>
                        Return of list Projects
                    </a>

                    <div class="">
                        <a href="{{ route('admin.projects.edit', $project) }}" class="btn btn-outline-warning">
                            <i class="far fa-pen-to-square"></i>
                            Edit Project
                        </a>

                        <button type="button" class="btn btn-outline-danger "data-bs-toggle="modal"
                            data-bs-target="#exampleModal{{ $project->id }}">
                            <i class="far fa-trash-can"></i>
                            Delete Project
                        </button>
                    </div>
                </div>

            </div>

            <div class="modal fade" id="exampleModal{{ $project->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog ">
                    <div class="modal-content bg-dark">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5 text-uppercase" id="exampleModalLabel">Attention!</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p>
                                If you press "
                                <span class="text-danger">
                                    Delete
                                </span>
                                " the project will deleted
                            </p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>

                            <form action="{{ route('admin.projects.destroy', $project->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger">Delete</button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
