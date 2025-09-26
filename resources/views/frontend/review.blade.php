@extends('frontend.layouts.app',['meta_title' => $meta_title ?? "",'meta_keywords' => $meta_keywords ?? "",'meta_description' => $meta_description ?? ""])
@section('content')
    
<!-- Sub banner start -->
<div class="sub-banner" style="background : url('{{ asset('admin/siteImage/'.$sitesettings->review_breadcome_image)}}'); background-size :cover; background-position:center">
    <div class="container">
        <div class="breadcrumb-area">
            <h3>Review Us</h3>
        </div>
        <nav class="breadcrumbs">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('frontend.home') }}">Home</a></li>
                <li class="breadcrumb-item active">Review Us</li>
            </ol>
        </nav>
    </div>
</div>
<!-- Sub Banner end -->
<style>
    .review-section .col-md-4:nth-child(2) .happy-review .gif-icon img{
        padding:30px;
    
    }
</style>

<section class="review-section">
    <div class="container">
       <div class="reivw-inner-div">
       <div class="row justify-content-center">
        @foreach ($review as $data )
        <div class="col-md-4">
            <div class="happy-review">
               <a href="{{ $data->link }}">
               <div class="gif-icon">
                <img width="180" src="{{ asset('admin/reviewImages/'.$data->image) }}" alt="">
                </div>
                <h6>{{ $data->heading }}</h6>
               </a>
                <a class="btn-lg btn-4 btn-6" href="{{ $data->link }} "target="_blank">{{ $data->title }}</a>
            </div><!--review-img-->
        </div><!--col-md-10-->
        @endforeach
          
        </div><!--row-->
       </div><!--review-inner-div-->
    </div><!--container-->
</section><!--review-section-->
@endsection