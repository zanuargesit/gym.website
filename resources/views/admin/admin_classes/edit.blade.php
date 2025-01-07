<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Class</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/styleclasses.css') }}">
</head>

<body>

    <div class="container">
        <div class="profil">
            <button class="btn btn-primary">Profil</button>
            <h5><a href="">Upload Photo</a></h5>
        </div>
        <form action="{{ route('admin.classes.update', $class->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form">
                <div class="row">
                    <div class="col-6">
                        <div class="input">
                            <h5>Class Name</h5>
                            <input class="form-control" type="text" name="name_class" value="{{ old('name_class', $class->name_class) }}" placeholder="Enter class name" required>
                            @error('name_class')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="input">
                            <h5>Description</h5>
                            <textarea class="form-control" name="description" placeholder="Enter class description" required>{{ old('description', $class->description) }}</textarea>
                            @error('description')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="input">
                            <h5>Trainer</h5>
                            <select class="form-select" name="trainer_id" required>
                                @foreach($trainers as $trainer)
                                    <option value="{{ $trainer->id }}" {{ old('trainer_id', $class->trainer_id) == $trainer->id ? 'selected' : '' }}>{{ $trainer->username }}</option>
                                @endforeach
                            </select>
                            @error('trainer_id')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="input">
                            <h5>Start Time</h5>
                            <input class="form-control" type="time" name="start_time" value="{{ old('start_time') }}" required>
                            @error('start_time')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="input">
                            <h5>Start Date</h5>
                            <input class="form-control" type="date" name="start_date" value="{{ old('start_date', \Carbon\Carbon::parse($class->start_time)->format('Y-m-d')) }}" required>
                            @error('start_date')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="input">
                            <h5>End Time</h5>
                            <input class="form-control" type="time" name="end_time" value="{{ old('end_time') }}" required>
                            @error('end_time')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="input">
                            <h5>End Date</h5>
                            <input class="form-control" type="date" name="end_date" value="{{ old('end_date', \Carbon\Carbon::parse($class->end_time)->format('Y-m-d')) }}" required>
                            @error('end_date')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="input">
                    <h5>Capacity</h5>
                    <input class="form-control" type="number" name="capacity" value="{{ old('capacity', $class->capacity) }}" placeholder="Enter class capacity" required>
                    @error('capacity')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="footer">
                <button class="btn btn-primary" type="submit">Update Class</button>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>

</html>
