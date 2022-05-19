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
                                    @foreach($departments as $item)
                                    <tr>

                                    <td>{{$item}}
                                    </td>
                                     <td>
                                        <form action="{{route('storeCounter',$item)}}" method="POST">
                                            @csrf
                                          <input STYLE=" background-color:transparent" type="text" name="counter" required>
                                          <button type="submit" class="btn btn-secondary">save</button>
                                </form>
                                    </td>

                                        </tr>
                                        @endforeach

                                    </tbody>

                                </table>

                            </div>
                        </div>
                    </div>
 @endsection
