@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card-body">

                <div class="pager-top"></div>
                <table id="browse" class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Town</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($results as $result)
                        <tr>
                            <td>{{$result->id}}</td>
                            <td>{{$result->name}}</td>
                            <td>{{$result->email}}</td>
                            <td>{{$result->town}}</td>
                            <td><a href="/update/{{$result->id}}">Edit</a></td>
                            <td><form method="POST" action="/delete">
                                    {{csrf_field()}}
                                    <input type="hidden" name="id" value="{{$result->id}}">
                                    <button type="submit" class="btn btn-default btn-sm">Delete</button>
                                </form></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="pager-btm"></div>

            </div>
        </div>
    </div>
</div>
@endsection
