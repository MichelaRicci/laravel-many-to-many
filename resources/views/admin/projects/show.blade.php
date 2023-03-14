@extends('layouts.app')

@section('title','Projects-details')

@section('content')
<section>
    <div class="container">
        <div class="card mt-5">
          <div class="card-body text-center">
              <h1 class="card-title">{{ $project->title }}</h1>
              <p>{{ $project->type?->label }}</p>    
              <p class="card-text">{{ $project->content }}</p>
              <a href="{{ $project->github }}" class="btn btn-primary">GitHub</a>
          </div>
          <figure class="text-center">
              <img src="{{ asset('storage/'.$project->image) }}" class="img-fluid" alt="{{ $project->title }}">
          </figure>
        </div>
        <div class="d-flex justify-content-center align-items-center mt-3 mb-5 gap-3">  
            <a href="{{ route('admin.projects.index') }}">
                <div class="btn btn-secondary">Back</div>
            </a>                   
            <a href="{{ route('admin.projects.edit', $project->id) }}">
                <div class="btn btn-warning">Edit</div>
            </a>
            <form action="{{ route('admin.projects.destroy', $project->id) }}" method="POST">
                @method('DELETE')
                @csrf
                <button class="btn btn-danger" type="submit">Delete</button>
            </form>
         </div>
    </div>
</section>
@endsection