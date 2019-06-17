@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Update User ID: {{$results[0]->id}}</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{$error}}</li>
                                    @endforeach
                            </ul>
                        </div>
                    @endif

                        <form action="/store" method="POST">
                            {{csrf_field()}}
                            <div class="form-group">
                                <input type="hidden" name="id" value="{{old('name', $results[0]->id)}}">
                            </div>
                            <div class="form-group">
                                <label for="name">Name:</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{old('name', $results[0]->name)}}">
                            </div>
                            <div class="form-group">
                                <label for="mail">Mail:</label>
                                <input type="text" class="form-control" id="email" name="email" value="{{old('mail', $results[0]->email)}}">
                            </div>
                            <div class="form-group">
                                <label for="town">Town:</label>
                                <input type="text" class="form-control" id="town" name="town" value="{{old('town', $results[0]->town)}}">
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
