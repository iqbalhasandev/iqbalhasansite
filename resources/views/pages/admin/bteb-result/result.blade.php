<x-guest-layout>
    <x-box-card box-size="col-md-11 col-lg-9 col-xl-9">
        <x-slot name="title">
            <div class="">
                <img src="{{ admin_asset('images/bteb-logo.png') }}" width="250px">
                <h3>BTEB RESULT MANAGMENT SYSTEM</h3>
                <p class="text-primary">(Get Your Result Easily)</p>
            </div>

            <div class="text-right mb-5">
                <div class="float-end">
                    <a href="{{ route('bteb-result.result') }}" class="btn  btn-secondary">Search another</a>
                    <a href="{{ route('bteb-result.result.download',['roll'=>$roll,'session'=>$session]) }}"
                        class="btn  btn-primary" target="_blank">
                        Download
                    </a>
                </div>
            </div>
            <div class="mt-2">
                <table class="table table-hover text-capitalize">
                    <thead class="bg-dark text-light">
                        <tr>
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


        </x-slot>
    </x-box-card>

</x-guest-layout>
