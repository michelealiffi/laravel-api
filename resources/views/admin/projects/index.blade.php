@extends('layouts.app')


@section('content')
    <div class="container mt-3 text-light">
        <div class="row">
            <div class="col mt-3">
                <h1 class="text-center">List Project</h1>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <a href="{{ route('admin.projects.create') }}" class="btn btn-outline-secondary btn-sm mt-5 mb-3">
                    <i class="far fa-plus"></i>
                    Add new Project
                </a>
                <ul class="list-group bg-dark ">
                    @foreach ($projects as $project)
                        <li class="list-group-item d-flex justify-content-between align-items-center bg-dark text-light">
                            <div>
                                <h5>
                                    {{ $project->name }}
                                </h5>
                            </div>
                            <div>
                                <a href="{{ route('admin.projects.show', $project) }}"
                                    class="btn btn-outline-secondary btn-sm">
                                    <i class="fas fa-binoculars"></i>
                                </a>
                                <a href="{{ route('admin.projects.edit', $project) }}"
                                    class="btn btn-outline-warning btn-sm">
                                    <i class="far fa-pen-to-square"></i>
                                </a>

                                <button type="button" class="btn btn-outline-danger btn-sm"data-bs-toggle="modal"
                                    data-bs-target="#exampleModal{{ $project->id }}">
                                    <i class="far fa-trash-can"></i>
                                </button>

                                {{-- Modale --}}
                                <div class="modal fade" id="exampleModal{{ $project->id }}" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog ">
                                        <div class="modal-content bg-dark">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5 text-uppercase" id="exampleModalLabel">
                                                    Attention!</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
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
                                                <button type="button" class="btn btn-outline-secondary"
                                                    data-bs-dismiss="modal">Close</button>

                                                <form action="{{ route('admin.projects.destroy', $project->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-outline-danger">Delete</button>
                                                </form>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </li>
                    @endforeach
                </ul>
            </div>

        </div>
    </div>
@endsection
