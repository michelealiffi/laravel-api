@extends('layouts.app')


@section('content')
    <div class="container mt-3 text-light">

        <div class="row justify-content-center align-items-center">

            @foreach ($projects as $project)
                <div class=" col-4 my-3 ">

                    <div class="guest-card card bg-dark text-light">

                        <div class="card-header py-3">
                            <h4>
                                {{ $project->name }}
                            </h4>
                        </div>

                        <div class="card-body">
                            <p>
                                {{ $project->description }}
                            </p>
                        </div>

                        <div class="card-footer">
                            <a href="{{ route('projects.show', $project) }}" class="btn btn-outline-secondary btn-sm">
                                <i class="fas fa-binoculars"></i>
                            </a>
                        </div>

                    </div>

                </div>
            @endforeach

        </div>
    </div>
@endsection
