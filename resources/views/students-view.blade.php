<!doctype html>
<html lang="en">
    <head>
        <title>view</title>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />

        <!-- Bootstrap CSS v5.2.1 -->
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
            crossorigin="anonymous"
        />
        <script src="https://cdn.tailwindcss.com"></script>

    </head>

    <body>
        <h2 class=" uppercase w-full font-semibold  text-2xl bg-slate-500 py-3 flex items-center justify-center text-white">students details</h2>
        <div class="container">
            
            <div
                class="table-responsive py-6"
            >
                <table
                    class="table table-primary"
                >
                {{-- <pre>{{print_r($students)}}</pre> --}}
                    <thead>
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Password</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($students as $student)
                        <tr class="">
                            <td scope="row">{{$student->Name}}</td>
                            <td scope="row">{{$student->Email}}</td>
                            <td scope="row">{{$student->Password}}</td>
                            <td>
                                {{-- <a href="{{url('/students/delete/')}}/{{$student->id}}">
                                    <button class="btn btn-danger">Delete</button>
                                </a> --}}
                                <a href="{{route('student.delete',['id' =>$student->id])}}">
                                    <button class="btn btn-danger">Delete</button>
                                </a>
                                <a href="{{route('student.edit',['id' =>$student->id])}}">
                                <button class="btn btn-primary">Edit</button>

                                </a>

                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            
            <a href="{{route('student.create')}}" class="">
                <button class="btn btn-primary uppercase w-full font-semibold hover:text-gray-800 hover:bg-zinc-300">Add new Student</button>
            </a>
        </div>
    </body>
</html>
