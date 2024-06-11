@extends('front.layout.master')

@section('title', $blog->title)

@section('body')
    <!-- Phần Chi tiết Blog -->
    <div class="blog-details">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="blog-details-inner">
                        <div class="blog-detail-title">
                            <h2>{{ $blog->title }}</h2>
                            <p>{{ $blog->category }}
                                <span>-
                                    {{ $blog->created_at ? $blog->created_at->format('M d, Y') : 'Không có thông tin ngày tạo' }}
                                </span>
                            </p>
                        </div>
                        <div class="blog-large-pic">
                            <img src="{{ asset('front/img/blog/' . ($blog->image_path ?? 'default.jpg')) }}" alt="{{ $blog->title }}">
                        </div>
                        <div class="blog-detail-desc">
                            <p>{{ $blog->content }}</p>
                        </div>
                        <div class="blog-quote">
                            <p>
                                {{ $blog->quote }}
                            </p>
                        </div>
                        <div class="blog-more">
                            <div class="row">
                                @if(isset($blog->additional_images) && is_iterable($blog->additional_images))
                                    @foreach($blog->additional_images as $image)
                                        <div class="col-sm-4">
                                            <img src="{{ asset('front/img/blog/' . $image->path) }}" alt="">
                                        </div>
                                    @endforeach
                                @else
                                    <p>Không có hình ảnh bổ sung.</p>
                                @endif
                            </div>
                        </div>
                        <div class="tag-share">
                            <div class="details-tag">
                                <ul>
                                    <li><i class="fa fa-tags"></i></li>
                                    <li>{{ $blog->category }}</li>
                                    <li>{{ $blog->tags }}</li>
                                </ul>
                            </div>
                        </div>
                        <!-- Thêm các phần khác nếu cần -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Kết thúc Phần Chi tiết Blog -->
@endsection
