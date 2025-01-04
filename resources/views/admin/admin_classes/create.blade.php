<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Class</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/styleclasses.css') }}">
</head>

<body>

    <div class="container">
        <div class="profil">
            <button class="btn btn-primary">Profile</button>
            <h5><a href="#">Upload Photo</a></h5>
        </div>
        <<form action="{{ route('admin.classes.store') }}" method="POST">
    @csrf
    <div class="form">
        <div class="row">
            <div class="col-6">
                <div class="input mb-3">
                    <h5>Class Name</h5>
                    <input class="form-control" type="text" name="name_class" placeholder="Enter class name" required>
                </div>
                <div class="input mb-3">
                    <h5>Description</h5>
                    <textarea class="form-control" name="description" placeholder="Enter description" rows="3" required></textarea>
                </div>
                <div class="input mb-3">
                    <h5>Trainer</h5>
                    <select class="form-select" name="trainer_id" required>
                        @foreach($trainers as $trainer)
                            <option value="{{ $trainer->id }}">{{ $trainer->username }} ({{ ucfirst($trainer->role) }})</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-6">
                <div class="input mb-3">
                    <h5>Start Time</h5>
                    <input class="form-control" type="time" name="start_time" required>
                </div>
                <div class="input mb-3">
                    <h5>End Time</h5>
                    <input class="form-control" type="time" name="end_time" required>
                </div>
                <div class="input mb-3">
                    <h5>Capacity</h5>
                    <input class="form-control" type="number" name="capacity" placeholder="Enter capacity" required>
                </div>
            </div>
        </div>
        <div class="footer">
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </div>
</form>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
