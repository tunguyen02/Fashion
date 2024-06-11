@extends('front.layout.master')

@section('title', 'Blog')

@section('body')
    <!-- Breadcrumb Section Begin -->
    <div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <a href="./"><i class="fa fa-home"></i> Home</a>
                        <span>Blog</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section End -->

    <!-- Blog Section Begin -->
    <section class="blog-section spad">
        <div class="container">
            <div class="row">
                <!-- Sidebar Section Begin -->
                <div class="col-lg-3 col-md-6 col-sm-8 order-2 order-lg-1">
                    <!-- Nếu có phần sidebar, bạn có thể thêm vào đây -->
                </div>
                <!-- Sidebar Section End -->

                <!-- Main Content Section Begin -->
                <div class="col-lg-12 order-1 order-lg-2">
                    <div class="row">
                        @foreach($blogs as $blog)
                            <div class="col-lg-6 col-sm-6">
                                <div class="blog-item">
                                    <div class="bi-pic">
                                        <img src="{{ asset('front/img/blog/' . $blog->image) }}" alt="{{ $blog->title }}">
                                    </div>
                                    <div class="bi-text">
                                        <a href="{{ route('blog.show', $blog->id) }}">
                                            <h4>{{ $blog->title }}</h4>
                                        </a>
                                        <p>{{ $blog->category }}
                                            <span>
                                            @if($blog->created_at)
                                                    {{ $blog->created_at->format('M d, Y') }}
                                                @else

                                                @endif
                                        </span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
                <!-- Main Content Section End -->
            </div>
        </div>
    </section>
    <!-- Blog Section End -->
@endsection
