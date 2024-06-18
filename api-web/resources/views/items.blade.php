@extends('layouts.app')

@section('title', 'Items Listing')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Items list</div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Price</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($items as $item)
                                    <tr>
                                        <td>{{$item->id}}</td>
                                        <td>{{$item->name}}</td>
                                        <td>{{$item->description}}</td>
                                        <td>{{$item->price}}</td>
                                        <td>
                                            <a href="{{url('/items', $item->id)}}">view</a>
                                            {{-- <a href="{{route('items.edit', $item->id)}}" class="btn btn-primary">Edit</a>
                                            <a href="{{route('items.destroy', $item->id)}}" class="btn btn-danger">Delete</a> --}}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer text-muted">
                        <a href="https://laravel.com/docs/8.x/routing#api-routes" target="_blank">Laravel API Documentation</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection