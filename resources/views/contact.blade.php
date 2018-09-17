@extends('layouts/layout')

@section('content')
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="form-container col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <h1 class="mb-2">Contact Us</h1>

                    @if(session('message'))
                        <div class='alert alert-success'>
                            {{ session('message') }}
                        </div>
                    @endif

                    <form class="form form-horizontal" method="POST" action="/contact">
                        {{ csrf_field() }} 

                        <div class="form-group">
                            <input type="text" name="name" class="form-control" placeholder='Name' required>
                        </div>

                        <div class="form-group">
                            <input type="email" name="email" class="form-control" placeholder='Email' required>
                        </div>

                        <div class="form-group">
                            <input type="text" name="subject" class="form-control" placeholder='Subject' required>
                        </div>

                        <div class="form-group">
                            <textarea name="message" id="" class="form-control" rows="10" placeholder='Message' required></textarea>
                        </div>

                        <div class="form-group">
                            <input type="submit" class="btn btn-primary">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection