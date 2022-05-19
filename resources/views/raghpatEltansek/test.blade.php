@extends('layout_admin')
@section('content')
            <div id="layoutSidenav_content">
                <main>

                        <div class="card mb-4">
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>


                                        <th scope="col">Student_ID</th>
	                                    <th scope="col">Grade</th>

                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>

                                        <th scope="col">Department</th>
	                                    <th scope="col">Counter</th>

                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    <form method="post" action="hbhb">
                                    @foreach($departments as $item)
                                    <tr>
                                    <td>{{$item}}

                                    </td>
                                    <td>
                                        @php ($counter = [2,3,4])
                                        <input type="number" name="counter[]" >
                                    </td>
                                    @endforeach
                                    <a class="btn btn-primary btn-lg" href="{{route('storeCounter',$counter)}}" role="button">create</a>
                                        </tr>
                                       </form>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
 @endsection
