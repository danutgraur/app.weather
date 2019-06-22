@extends('layouts.app')
@section('content')
    <div class="container">
        <h1>Locations list</h1>

        <a href="{{ route('locations.create') }}" class="btn btn-success mb-3" title="Add location"><i class="fas fa-map-marker-alt"></i> Add location</a>
        <a href="{{ route('welcome') }}" class="btn btn-primary mb-3" title="Add location"><i class="fas fa-temperature-high"></i> City forecast</a>

        @if($locations->count() == 0)
            <div>No available locations</div>
        @else
            <table class="table table-striped">
                <thead class="bg-secondary text-white">
                    <tr>
                        <th>Location name</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($locations as $location)
                        <tr>
                            <td>{{$location->name}}</td>
                            <td class="text-center ico text-lg-right">
                                <div class="btn-group align-items-start" role="group" aria-label="User buttons">
                                    <a class="btn btn-sm btn-success" href="{{route('locations.show',$location->id)}}"><i class="far fa-eye"></i></a>
                                    {!! Html::decode(link_to_route('locations.edit', '<i class="far fa-edit"></i>', array($location->id), array('class' => 'btn btn-sm btn-primary'))) !!}
                                    {!! Form::open(['route' =>['locations.destroy', $location->id], 'method' => 'DELETE']) !!}
                                    <button class="btn btn-sm btn-danger mb-3" style="border-bottom-left-radius: 0; border-top-left-radius: 0; margin-left:-1px;"><i class="fas fa-trash"></i></button>
                                    {!! Form::close() !!}
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
