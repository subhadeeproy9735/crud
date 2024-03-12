<!doctype html>
<html lang="en">

<head>
    <title>Students</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
</head>

<body class="  px-10 py-3">
    <form action="{{$url }}" method="post" class=" px-5 py-8 bg-teal-500">
        @csrf
        <h1 class="text-center text-xl font-bold">{{$title}}</h1>
        <div class="mb-3">
            <label for="" class="form-label">Name</label>
            <input type="text" class="form-control" name="Name" id="" aria-describedby="helpId"
                placeholder="" value="{{ isset($student) ? $student->Name : '' }}"  />
        </div>
       
        
        <div class="mb-3">
            <label for="" class="form-label">Email</label>
            <input type="email" class="form-control" name="Email" id="" aria-describedby="helpId"
                placeholder="" value="{{ isset($student) ? $student->Email : '' }}" />
        </div>
        
        <div class="mb-3">
            <label for="" class="form-label">Password</label>
            <input required type="password" class="form-control" name="password" id="" aria-describedby="helpId"
                placeholder=""  />
            {{-- <small id="helpId" class="form-text text-muted">Help text</small> --}}
        </div>
        <button type="submit" class="btn btn-primary bg-blue-800 mx-auto">
            Submit
        </button>

    </form>

</body>

</html>
