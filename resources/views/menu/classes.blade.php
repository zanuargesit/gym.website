@extends('layout.master')

@section('style')
<link rel="stylesheet" href="{{ asset('css/style3.css') }}">
@endsection

@section('content')
<div class="classes">
    <div class="col-12">
        <div class="head-1">
            <h2>Classes</h2>
            <button class="btn btn-primary">Filters</button>
        </div>
        <div class="kategori">
            <table class="table">
                <thead>
                    <tr>
                        <th>Class Name</th>
                        <th>Description</th>
                        <th>Trainer</th>
                        <th>Start Time</th>
                        <th>End Time</th>
                        <th>Capacity</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($classes as $class)
                    <tr>
                        <td>{{ $class->name_class }}</td>
                        <td>{{ $class->description }}</td>
                        <td>{{ $class->trainer->name }}</td>
                        <td>{{ $class->start_time }}</td>
                        <td>{{ $class->end_time }}</td>
                        <td>{{ $class->capacity }}</td>
                        <td>
                            @if(Auth::check() && Auth::user()->isActive())
                            @if(!\App\Models\JoinClass::where('user_id', Auth::id())->where('class_id', $class->id)->exists())
                            <form method="POST" action="{{ route('classes.joinClass', $class->id) }}">
                                @csrf
                                <button type="submit" class="btn btn-primary" onclick="return confirm('Are you sure you want to join this class?');">
                                    Join Class
                                </button>
                            </form>
                            @else
                            <button class="btn btn-secondary" disabled>Already Joined</button>
                            @endif
                            @else
                            <button class="btn btn-secondary" disabled>Your account is not active</button>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
