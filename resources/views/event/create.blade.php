<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Tatvasoft Test</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>

<body>
    <div class="container  mt-5">
        <div class="card">
            <div class="card-header">
                Create Event
            </div>
            <div class="card-body">
                @if($errors->any())
                <div class="row">
                    <div class="col-md-12">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li class="text-danger">
                                    {{ $error }}
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                @endif
                <form action="{{ route('event.store') }}" method="POST">
                    @csrf
                    @include('event.form')
                </form>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.js"
        integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
</body>

</html>
