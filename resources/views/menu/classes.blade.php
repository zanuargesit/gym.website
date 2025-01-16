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
                            @php
                            $membership = Auth::check() ? Auth::user()->membership : null;
                            $memberStatus = $membership ? $membership->status : 'non-aktif';
                            $joinedClassesCount = Auth::check() ? \App\Models\JoinClass::where('user_id', Auth::id())->count() : 0;
                            @endphp

                            @if(Auth::check())
                            @if($memberStatus == 'non-aktif')
                            <button class="btn btn-secondary" disabled>Your membership is inactive</button>
                            @elseif($memberStatus == 'silver')
                            @if($joinedClassesCount < 3)
                                <!-- Jika status Silver dan jumlah kelas yang diikuti kurang dari 3 -->
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
                                <button class="btn btn-secondary" disabled>You have reached the maximum number of classes for your Silver membership.</button>
                                @endif
                                @elseif($memberStatus == 'gold')
                                <!-- Jika status Gold, pengguna dapat bergabung dengan kelas tanpa batasan -->
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
                                @endif
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