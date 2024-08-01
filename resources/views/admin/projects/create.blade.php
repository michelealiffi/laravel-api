@extends('layouts.app')


@section('content')
    <div class="container py-5">
        <div class="row">
            <h1 class="text-center text-light my-3">
                Create Project
            </h1>
            <div class="card py-3 my-5 bg-dark text-light">
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('admin.projects.store') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label for="title" class="form-label">Project Name</label>
                            <input type="text" class="form-control bg-black text-light" id="name" name="name"
                                value="{{ old('name') }}" required />
                        </div>

                        <div class="mb-3">
                            <label for="title" class="form-label">Project type</label>
                            <select name="type_id" class="form-select bg-black text-light"
                                aria-label="Default select example">
                                <option disabled selected>Select type of project</option>
                                <option value="">No Type</option>
                                @foreach ($types as $type)
                                    <option value="{{ $type->id }}" @if (old('type_id') == $type->id) selected @endif>
                                        {{ $type->title }}</option>
                                @endforeach
                            </select>
                        </div>


                        <div class="mb-3">
                            <label for="project-content" class="form-label">Technlogies used:</label>

                            <div>
                                @foreach ($technologies as $technology)
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="technologies[]"
                                            id="tec-{{ $technology->id }}" value="{{ $technology->id }}"
                                            {{ in_array($technology->id, old('technologies', [])) ? 'checked' : '' }}>
                                        <label class="form-check-label"
                                            for="tec-{{ $technology->id }}">{{ $technology->name }}</label>
                                    </div>
                                @endforeach

                            </div>

                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Description Project</label>
                            <input type="text" class="form-control bg-black text-light" id="description"
                                name="description" value="{{ old('description') }}" required />
                        </div>

                        <div class="d-flex justify-content-between align-items-center mt-5">
                            <a href="{{ route('admin.projects.index') }}" class="btn btn-outline-secondary">
                                <i class="fas fa-arrow-left"></i>
                                Return List of Projects
                            </a>
                            <button type="submit" class="btn btn-outline-secondary">
                                <i class="far fa-plus"></i>
                                Create
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
@endsection
