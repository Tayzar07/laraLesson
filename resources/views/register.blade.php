<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    {{-- bootstrap cdn link --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>

<body>
    <h2 class="text-center text-primary my-5">Student Registeration Form</h2>
    <div class="w-25 rounded-5 m-auto" style="border: 1px solid black; padding:70px; min-width: 400px">
        <form class="m-auto" action="{{ route('reg.form') }}" method="post" enctype="multipart/form-data">
            @csrf
            <label class="form-label" for="name">Student Name : </label><br>
            <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" id="name" value="{{ old('name') }}">
            {{-- error msg --}}
            @error('name')
                <div class="text-danger">{{ $message }}</div>
            @enderror
            <br>
            <label class="form-label" for="age">Student Age : </label><br>
            <input class="form-control @error('age') is-invalid @enderror" type="text" name="age" id="age" value="{{ old('age') }}">
            {{-- error msg --}}
            @error('age')
                <div class="text-danger">{{ $message }}</div>
            @enderror
            <br>
            <label class="form-label" for="email">Student Email : </label><br>
            <input class="form-control @error('email') is-invalid @enderror" type="text" name="email" id="email" value="{{ old('email') }}">
            {{-- error msg --}}
            @error('email')
                <div class="text-danger">{{ $message }}</div>
            @enderror
            <br>
            <label class="form-label" for="address">Student Address : </label><br>
            <input class="form-control" type="text" name="address" id="address" value="{{ old('address') }}">
            <br>
            <label class="form-label" for="image">Student Image : </label><br>
            <input class="form-control @error('image') is-invalid @enderror" type="file" name="image" id="image">
            {{-- error msg --}}
            @error('image')
                <div style="color: red;">{{ $message }}</div>
            @enderror
            <br><br>
            <input class="btn btn-lg btn-primary float-end" type="submit" value="send...">
        </form>
    </div>
</body>
{{-- bootstrap js cdn link --}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
</script>

</html>
