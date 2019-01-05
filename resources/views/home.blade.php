@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    <div>
                        <form action="/links/create" method="post">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" id="name" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="url">URL</label>
                                <input type="text" name="url" id="url"  class="form-control">
                            </div>
                            <button class="btn btn-primary">Add Link</button>
                        </form>
                    </div>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>Name</th>
                                <th>URL</th>
                                <th>action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($links as $link)
                            <tr>
                                <td>{{$link->id}}</td>
                                <td>{{$link->name}}</td>
                                <td>{{$link->url}}</td>
                                <td><a href="/links/remove/{{$link->id}}">Remove</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
