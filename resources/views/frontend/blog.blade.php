@extends('frontend.layouts.app',['meta_title' => $meta_title ?? "",'meta_keywords' => $meta_keywords ?? "",'meta_description' => $meta_description ?? ""])
@section('content')
<!-- Sub banner start -->
<div class="sub-banner" style="background : url('{{ asset('admin/siteImage/'.$sitesettings->blogs_breadcome_image)}}'); background-size :cover; background-position:center">
    <div class="container">
        <div class="breadcrumb-area">
            <h3>Blogs</h3>
        </div>
        <nav class="breadcrumbs">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('frontend.home') }}">Home</a></li>
                <li class="breadcrumb-item active">Blogs</li>
            </ol>
        </nav>
    </div>
</div>
<!-- Sub Banner end -->

<section class="blog-section" data-aos="fade-up" data-aos-duration="1500">
    <div class="container">
        <div class="row">
            @foreach ($blog as $data )
                
            <div class="col-md-4">
            <div class="blog-1">
                    <div class="blog-image">
                           
                        @php
                        $images = json_decode($data->images, true); // Decode as associative array
                    @endphp
                    @if (is_array($images) && !empty($images) && isset($images[0]))
                        <img src="{{ asset('admin/blogImage/'.$images[0]['path']) }}" alt="image" class="img-fluid w-100">
                        @else
                        <p>No image available</p>
                    @endif
                        <div class="profile-user">
                            <a href="{{ route('frontend.blog-details',$data->slug) }}">
                            <img src="{{ asset('admin/blogImage/'.$data->author_image ) }}" alt="user">
                            </a>
                        </div>
                        <div class="date-box">
                            <span>{{ \Carbon\Carbon::parse($data->publish_date)->format('d') }}</span>{{ \Carbon\Carbon::parse($data->publish_date)->format('M ') }}
                        </div>
                    </div>
                    <div class="detail">
                        <div class="post-meta clearfix">
                            <ul>
                                <li>
                                    <strong><a href="{{ route('frontend.blog-details',$data->slug) }}">By: {{ $data->author }}</a></strong>
                                </li>
                                <li class="float-right mr-0"><a href="{{ route('frontend.blog-details',$data->slug) }}"><i class="fa fa-calendar"></i></a>{{ \Carbon\Carbon::parse($data->publish_date)->format('d M Y') }}</li>
                               
                            </ul>
                        </div>
                        <h3>
                            <a href="{{ route('frontend.blog-details',$data->slug) }}">{{ $data->title }}</a>
                        </h3>
                        <p>{{ $data->short_description }}</p>
                    </div>
                </div>
            </div><!--col-md-4-->
            @endforeach
         
            
         
        </div><!--row-->
    </div><!--container-->
</section><!--blog-section-->
@endsection