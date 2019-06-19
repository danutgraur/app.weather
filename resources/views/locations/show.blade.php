@extends('layouts.app')
@section('content')
    <div class="container">
        <h1>Location: <b class="text-primary">{{$location->title}}</b></h1>

        <a href="{{ route('locations.index') }}" class="btn btn-secondary mb-3" title="Locations list"><i class="fas fa-list"></i> Locations list</a>
        <a href="{{ route('locations.edit', $location->id) }}" class="btn btn-success mb-3" title="Modify location"><i class="far fa-edit"></i> Modify location</a>
        {!! Form::open(['route' =>['locations.destroy', $location->id], 'class' => 'd-inline-block', 'method' => 'DELETE']) !!}
        <button class="btn btn-danger mb-3" title="Delete location"><i class="fas fa-trash"></i> Delete location</button>
        {!! Form::close() !!}

        <div class="row">
            <div class="col-12">
                <table class="table table-striped">
                    <thead class="bg-secondary text-white">
                        <th>Name</th>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{$location->name}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
