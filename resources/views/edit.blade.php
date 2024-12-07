<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Studet Edit Page</title>
    {{-- bootstrap css link --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body{
            background-color:rgba(245, 245, 220, 0.597) ;
        }
    </style>
</head>

<body>
    <h2 class="text-center my-3">Edit Student's Profile</h2>
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show m-auto" style="width:50%;" role="alert">
            <i class="fa-solid fa-circle-check me-3"></i><strong>{{ session('success') }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="ms-5 mb-4">
        <a href="{{route('admin.stu.list')}}">
            <button class="btn btn-primary btn-sm">Student List Page</button>
        </a>
    </div>
    <div style="min-width: 350px;" class="w-25 border m-auto px-3 py-2 rounded-3 shadow-lg bg-info">
        <form action="{{ route('admin.cusupdate') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div>
                @if ($editdata['image'] == null)
                    <img class="img-thumbnail" width="120px" src="{{ asset('storage/public/noimage.jpg') }}"
                        alt="student image">
                @else
                    <img class="img-thumbnail" width="120px"
                        src="{{ asset('storage/public/studentImage/' . $editdata['image']) }}" alt="">
                @endif
            </div>
            <br>
            <label class="form-label" for="image">Student Image : </label><br>
            <input class="form-control" type="file" name="image" id="image">
            @error('image')
                <div style="color: red;">{{ $message }}</div>
            @enderror
            <br>
            <label class="form-label" for="name">Student Name : </label><br>
            <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" id="name"
                value="{{ old('name', $editdata['name']) }}">
            @error('name')
                <div style="color: red;">{{ $message }}</div>
            @enderror
            <br>
            <label class="form-label" for="id">Student ID : </label><br>
            <input class="form-control" type="text" name="id" id="id" value="{{ $editdata['id'] }}"
                readonly>
            <br>
            <label class="form-label" for="age">Student Age : </label><br>
            <input class="form-control @error('age') is-invalid @enderror" type="text" name="age" id="age"
                value="{{ old('age', $editdata['age']) }}">
            @error('age')
                <div style="color: red;">{{ $message }}</div>
            @enderror
            <br>
            <label class="form-label" for="email">Student Email : </label><br>
            <input class="form-control @error('email') is-invalid @enderror" type="text" name="email" id="email"
                value="{{ old('email', $editdata['email']) }}">
            @error('email')
                <div style="color: red;">{{ $message }}</div>
            @enderror
            <br>
            <label class="form-label" for="address">Student Address : </label><br>
            <input class="form-control" type="text" name="address" id="address"
                value="{{ old('address', $editdata['address']) }}">
            <br>
            <input class="btn btn-primary" type="submit" value="update..">

        </form>
    </div>
</body>
{{-- bootstrap js link --}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
</script>

</html>
