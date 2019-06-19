@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h3>Location actions</h3>
                        <a href="{{ route('locations.index') }}" class="btn btn-secondary mb-3" title="Locations list"><i class="fas fa-list"></i> Locations list</a>
                        <a href="{{ route('locations.create') }}" class="btn btn-success mb-3" title="Add location"><i class="fas fa-map-marker-alt"></i> Add location</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
