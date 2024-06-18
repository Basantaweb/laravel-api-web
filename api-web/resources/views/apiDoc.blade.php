@extends('layouts.app')

@section('title', 'API Documentation')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">API Documentation</div>
                    <div class="card-body">
                        <h4>POST: http://127.0.0.1:8000/api/items</h4>
                        <ul>
                            <li>JSON 
                                <p>{
                                    "name": "Sample Item 3",
                                    "description": "This is a sample item",
                                    "price": 19.99
                                }</p>
                            </li>
                        </ul>
                        <h4>GET: http://127.0.0.1:8000/api/items</h4>
                        <h4>GET: http://127.0.0.1:8000/api/items/{id}</h4>
                        <h4>PUT: http://127.0.0.1:8000/api/items/{id}</h4>
                        <h4>DELETE: http://127.0.0.1:8000/api/items/{id}</h4>
                    </div>
                    <div class="card-footer text-muted">
                        <a href="https://laravel.com/docs/8.x/routing#api-routes" target="_blank">Laravel API Documentation</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection