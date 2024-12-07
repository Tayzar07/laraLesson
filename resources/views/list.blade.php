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
    {{-- fontawesome cdn link --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css"
        integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body style="background-color:rgba(245, 245, 220, 0.597);">
    <h2 class="text-primary text-center p-5">Students List : {{$list->total()}}</h2>

    <div class="d-flex justify-content-between px-5">
        <div>
            <a href="{{ route('admin.cusdeleteall') }}">
                <input class="btn btn-danger" type="button" value="Delete All Data...!!">
            </a>
        </div>
        <div>
            <form class="d-flex" action="{{route('admin.studentSearch')}}" method="get">
                <input class="form-control me-2" type="text" name="search" id="search" placeholder="search.." value="{{ isset($search) ? $search :''}}">
                <input class="btn btn-primary" type="submit" value="search">
            </form>
        </div>
    </div>


    @if (session('delete'))
        <div class="alert alert-danger alert-dismissible fade show m-auto" style="width:50%;" role="alert">
            <i class="fa-solid fa-circle-check me-3"></i><strong>{{ session('delete') }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @if (session('deleteall'))
        <div class="alert alert-danger alert-dismissible fade show m-auto" style="width:50%;" role="alert">
            <i class="fa-solid fa-circle-check me-3"></i></i><strong>{{ session('deleteall') }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if (count($list)==0)
    <div class="alert alert-warning w-50 m-auto mt-3 text-center" role="alert">
        There is no data about <strong class="text-danger">{{$search}}</strong>
      </div>
    @endif
    <section class="text-center row justify-content-center">
        @foreach ($list as $l)
            <div class="card m-4 shadow-lg bg-info" style="width: 18rem;">
                <div class="card-img-top py-2">
                    @if ($l->image == null)
                        <img class="img-thumbnail" width="200px" src="{{ asset('storage/public/noimage.jpg') }}" alt="student image">
                    @else
                        <img class="img-thumbnail" width="200px" src="{{ asset('storage/public/studentImage/' . $l->image) }}"
                            alt="student image">
                    @endif
                </div>
                <div class="card-body">
                    <h5 class="card-title">Name : {{ $l->name }}</h5>
                </div>
                <ul class="list-group list-group-flush rounded">
                    <li class="list-group-item">ID : {{ $l->id }}</li>
                    <li class="list-group-item">Age : {{ $l->age }}</li>
                    <li class="list-group-item">Email : {{ $l->email }}</li>
                    <li class="list-group-item">Address : {{ $l->address }}</li>
                </ul>
                <div class="card-body">
                    <a style="text-decoration: none" href="{{ route('admin.cusedit', $l->id) }}">
                        <input class="card-link btn btn-primary me-2" type="button" value="Edit..">
                    </a>
                    <a style="text-decoration: none" href="{{ route('admin.cusdelete', $l->id) }}">
                        <input class="card-link btn btn-danger" type="button" value="Delete..">
                    </a>
                </div>
            </div>
        @endforeach
    </section>
    {{-- pagination link --}}
    <div class="text-center m-auto" style="width: 70%">
        {{ $list->appends(request()->query())->links()}}
    </div>
</body>
{{-- bootstrap js cdn link --}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
</script>

</html>
