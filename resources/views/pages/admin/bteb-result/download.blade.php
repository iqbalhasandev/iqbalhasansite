<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Bootstrap Css -->
    <link href="{{ admin_asset('css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <style>
        body {
            background: #ffffff
        }
    </style>
    <title>BTEB RESULTSHIT</title>
</head>

<body>

    <div class="container-fluid text-center ">
        <div class="">
            <x-logo type="dark" />
            <br><br>
            <img src="{{ admin_asset('images/bteb-logo.png') }}" width="250px">
            <br>
            <p>BTEB RESULT MANAGMENT SYSTEM</p>
            <p class="text-primary">(Get Your Result Easily)</p>
        </div>


        <div class="mt-2">
            <table class="table table-hover text-capitalize">
                <thead>
                    <tr class="bg-dark text-white">
                        <th scope="col">Semester</th>
                        <th scope="col">Roll</th>
                        <th scope="col">Session</th>
                        <th scope="col">Point</th>
                        <th scope="col">Grade</th>
                        <th scope="col">Fail Subjects</th>
                        <th scope="col">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($results as $semester=>$result)
                    <tr>
                        <td>{{ implode(' ',explode('_',$semester))}}</td>
                        <td>{{ $result['roll']??'-'}}</td>
                        <td>{{ $result['session']??'-'}}</td>
                        <td>{{ $result['point']??'-'}}</td>
                        <td>{{ $result['grade']??'-'}}</td>
                        <td>{{ $result['ref_subject']??'-'}}</td>
                        <td>{{ $result['message']??'-'}}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-muted text-center">No Result Found..</td>
                    </tr>
                    @endforelse

                </tbody>
            </table>


            <div class="mt-2">
                <p class="text-muted">
                    <strong>N.B:</strong>
                    All of the above information is analyzed by searching through our automatic algorithm system
                    from PDF published by "BTEB" So any information can be wrong, the developer or this web site is
                    not responsible for the wrong
                    information.
                </p>

            </div>
        </div>
        <x-admin.auth-footer class="text-black" />
    </div>

</body>

</html>
