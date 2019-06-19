@extends('layouts.app')
@section('content')
    <div class="container">
        <h1>Edit location: {{$location->name}}</h1>
        {{ Form::model($location, array('route' => array('locations.update', $location->id), 'method' => 'PUT')) }}

        @if($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="row">
            <div class="col-12">
                <div class="form-group">
                    {{ Form::label('name', 'Name', ['class' => 'mb-0']) }}
                    {{ Form::text('name', $location->name, ['class' => 'form-control','required']) }}
                </div>
            </div>
        </div>

        <button class="btn btn-success mb-3" type="submit"><i class="fas fa-save"></i> Save</button>
        <a href="{{ route('locations.show', $location->id) }}" class="btn btn-danger mb-3"><i class="far fa-times-circle"></i> Cancel</a>
    </div>

@endsection
