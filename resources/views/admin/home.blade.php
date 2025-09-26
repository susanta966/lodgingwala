@extends('admin.layout.app')

@section('maincontent')
    <style>
        .card {
            border-radius: 0.5rem;
            height: 100%;
        }

        .card-body {
            padding: 1rem;
        }

        .card-body h5 {
            font-size: 1.25rem;
            margin-bottom: 0.5rem;
        }

        .card-body p {
            font-size: 1rem;
        }

        .text-decoration-none {
            text-decoration: none !important;
        }
    </style>
@section('title')
    Dashboard
@endsection
<div class="col-md-12">
    <div class="row">
    <div class="col-md-3 mb-3">
            <div class="card bg-gradient-primary px-3 py-3 border-0">
                <a href="{{ route('rooms.index') }}" class="text-decoration-none">
                    <div class="card-body text-center">
                        <h5 class="h5 text-white">Rooms</h5>
                        <p class="mt-2 mb-0 text-white">
                            {{$room}}
                        </p>
                    </div>
                </a>
            </div>
        </div>

        <div class="col-md-3 mb-3">
            <div class="card bg-gradient-dark px-3 py-3 border-0">
                <a href="{{ route('admin.enquiry.index') }}" class="text-decoration-none">
                    <div class="card-body text-center">
                        <h5 class="h5 text-white">Enquiries</h5>
                        <p class="mt-2 mb-0 text-white">
                            {{ $enquiry }}
                        </p>
                    </div>
                </a>
            </div>
        </div>
       
        <div class="col-md-3 mb-3">
            <div class="card bg-gradient-primary px-3 py-3 border-0">
                <a href="{{ route('blogs.index') }}" class="text-decoration-none">
                    <div class="card-body text-center">
                        <h5 class="h5 text-white"> Blogs</h5>
                        <p class="mt-2 mb-0 text-white">
                            {{ $blog }}
                        </p>
                    </div>
                </a>
            </div>
        </div> 

 

        <div class="col-3 mb-3">
            <div class="card bg-gradient-dark px-3 py-3 border-0">
                <a href="{{ route('booknow.index') }}" class="text-decoration-none">
                    <div class="card-body text-center">
                        <h5 class="h5 text-white">Book-Now</h5>
                        <p class="mt-2 mb-0 text-white">
                            {{ $booknow }}
                        </p>
                    </div>
                </a>
            </div>
        </div>   
      

    
    </div>

</div>
@endsection
