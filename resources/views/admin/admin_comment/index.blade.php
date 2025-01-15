@extends('layout.master')

@section('style')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('css/adminaccount.css') }}">
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-3 left">
            <h4>Manage</h4>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-danger">Logout</button>
            </form>
            <br>
            <ul class="menu">
                <li><a href="{{ route('admin.username.index') }}" class="btn btn-outline-secondary">Users</a></li>
                <li><a href="{{ route('admin.classes.index') }}" class="btn btn-outline-secondary">Classes</a></li>
                <li><a href="{{ route('admin.store.index') }}" class="btn btn-outline-secondary">Products</a></li>
                <li><a href="{{ route('comments.index') }}" class="btn btn-secondary">Comments</a></li>
                </ul>
        </div>

        <div class="col-6 right">
            <h2>Manage Comments</h2>
            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>User</th>
                            <th>Comment</th>
                            <th>Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($comments as $comment)
                        <tr>
                            <td>{{ $comment->user->name }}</td>
                            <td>{{ $comment->content }}</td>
                            <td>{{ $comment->created_at->format('Y-m-d H:i') }}</td>
                            <td>
                                <form action="{{ route('admin.comments.destroy', $comment->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $comments->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
