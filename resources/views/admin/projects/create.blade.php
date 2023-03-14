@extends('layouts.app')

@section('title', 'Create')
    
@section('content')        
    <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row row-cols-3">
            <div class= "m-3">
                <label class="form-label" for="title">Project Title: </label>
                <input class="ms-2" type="text" name="title" id="title" placeholder="Title" required/>
            </div>
            <div class= "col d-flex m-3">
            <label for="content">Content</label>
            <input class="ms-2" type="text"  id="content" name="content" placeholder="Write a description of this project" required/>
            </div>
            <div class= "col d-flex m-3">
                <label for="type_id">Choose type</label>
                <select class="form-select" name="type_id" id="type_id">
                    <option value="">None</option>
                    @foreach($types as $type)
                    <option value="{{ $type->id }}">{{ $type->label }}</option>
                    @endforeach
                </select>
            </div>
            <div class= "col d-flex m-3">
                <label for="github">Link github</label>
                <input class="ms-2" type="text" id="github" name="github" placeholder="Link github" required />
            </div>
            <div class= "col d-flex m-3">
            <label for="image">Image</label>
            <input class="ms-2" type="file"  id="image" name="image" />
            </div>
            
            <div class= "col-12 d-flex m-3">
                <button type= "submit" href="" class="bg-primary text-white fw-bold btn btn-primary">
                    <h6>Add project</h6>
                </button>
            </div>
        </div>   
    </form>

@endsection