@extends('layouts.partials')

@section('content')
    <div class="container">
        <div class="row">
            <h1>My Conference List</h1>
        </div>
        <div class="row">
            <a class="btn btn-success" href="/conference/new">New</a>
        </div>
        <div class="row dashboard-table">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Capacity</th>
                    <th>Owner</th>
                    <th>Enabled</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($conferences as $conference)
                    <tr>
                        <td scope="row">{{ $conference['id'] }}</td>
                        <td>{{ $conference['name'] }}</td>
                        <td>{{ $conference['capacity'] }}</td>
                        <td>{{ $conference['owner_name'] }}</td>
                        <td>{{ $conference['open'] == 1 ? "Yes" : "No" }}</td>
                        <td class="text-right">
                            <form action="{{ URL('/conference/'. $conference['remember_token'] . '/destroy') }}" method="post">
                                {!! csrf_field() !!}
                                {!! method_field('DELETE') !!}
                                <a class="btn btn-success" href="{{ URL('/conference/view/'. $conference['remember_token']) }}"><span class="oi oi-eye"></span> View</a>
                                <a class="btn btn-primary" href="{{ URL('/conference/edit/'. $conference['remember_token']) }}"><span class="oi oi-pencil"></span> Edit</a>
                                <button class="btn btn-danger"><span class="oi oi-delete"></span> Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection