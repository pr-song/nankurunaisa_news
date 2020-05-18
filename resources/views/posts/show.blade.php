@extends('layouts.main')

@section('title', $post->title)

@section('content')
<!-- ##### Post Details Area Start ##### -->
<section class="post-details-area mb-80">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="post-details-thumb mb-50">
                    <img src="{{ asset('img/bg-img/34.jpg') }}" alt="">
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            <!-- Post Details Content Area -->
            <div class="col-12 col-lg-8 col-xl-7">
                <div class="post-details-content">
                    <!-- Blog Content -->
                    <div class="blog-content">

                        <!-- Post Content -->
                        <div class="post-content mt-0">
                            @foreach ($post->categories as $category)
                            <a href="#" class="post-cata cata-sm cata-primary">
                                {{ $category->name }}
                            </a>
                            @endforeach
                            <a href="single-post.html" class="post-title mb-2">{{ $post->title }}</a>

                            <div class="d-flex justify-content-between mb-30">
                                <div class="post-meta d-flex align-items-center">
                                    <a href="#" class="post-author">By {{ $author->name }}</a>
                                    <i class="fa fa-circle" aria-hidden="true"></i>
                                    <span class="post-date font-weight-bold">{{ $post->created_at }}</span>
                                </div>
                                <div class="post-meta d-flex">
                                    <a href="#"><i class="fas fa-comments" aria-hidden="true"></i>
                                        {{ count($post->comments) }}</a>
                                    <a href="#"><i class="fas fa-eye" aria-hidden="true"></i>
                                        {{ $post->page_views }}</a>
                                    <a href="#"><i class="fas fa-thumbs-up" aria-hidden="true"></i> 7</a>
                                </div>
                            </div>
                        </div>

                        {!! $post->content !!}

                        <!-- Post Tags -->
                        <div class="post-tags mt-30">
                            <ul>
                                @foreach ($post->categories as $category)
                                <li><a href="#">{{ $category->name }}</a></li>
                                @endforeach
                            </ul>
                        </div>

                        <!-- Post Author -->
                        <div class="vizew-post-author d-flex align-items-center py-5">
                            <div class="post-author-thumb">
                                <img src="{{ asset('img/bg-img/30.jpg') }}" alt="author-avatar">
                            </div>
                            <div class="post-author-desc pl-4">
                                <a href="#" class="author-name">{{ $author->name }}</a>
                                <div class="post-author-social-info">
                                    <a href="#"><i class="fab fa-facebook"></i></a>
                                    <a href="#"><i class="fab fa-twitter"></i></a>
                                    <a href="#"><i class="fab fa-instagram"></i></a>
                                </div>
                            </div>
                        </div>

                        @if($related_posts->isNotEmpty())
                        <!-- Related Post Area -->
                        <div class="related-post-area mt-5">
                            <!-- Section Title -->
                            <div class="section-heading style-2">
                                <h4>Related Post</h4>
                                <div class="line"></div>
                            </div>
                            <div class="row">
                                @foreach ($related_posts as $related_post)
                                <!-- Single Blog Post -->
                                <div class="col-12 col-md-6">
                                    <div class="single-post-area mb-50">
                                        <!-- Post Thumbnail -->
                                        <div class="post-thumbnail">
                                            <img src="{{ asset('img/bg-img/11.jpg') }}" alt="">

                                            <!-- Video Duration -->
                                            <span
                                                class="video-duration">{{ $related_post->created_at->toDateString() }}</span>
                                        </div>

                                        <!-- Post Content -->
                                        <div class="post-content">
                                            @foreach ($related_post->categories as $category)
                                            <a href="#" class="post-cata cata-sm cata-success">
                                                {{ $category->name }}
                                            </a>
                                            @endforeach
                                            <a href="single-post.html" class="post-title">
                                                {{ $related_post->title }}
                                            </a>
                                            <div class="post-meta d-flex">
                                                <a href="#"><i class="fas fa-comments" aria-hidden="true"></i>
                                                    {{ count($related_post->comments)}}</a>
                                                <a href="#"><i class="fas fa-eye" aria-hidden="true"></i> 16</a>
                                                <a href="#"><i class="fas fa-thumbs-up" aria-hidden="true"></i> 15</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        @endif
                    </div>

                    <!-- Comment Area Start -->
                    <div class="comment_area clearfix mb-50">

                        <!-- Section Title -->
                        <div class="section-heading style-2">
                            <h4>Comment</h4>
                            <div class="line"></div>
                        </div>

                        <ul>
                            @foreach ($post->comments as $comment)
                            <!-- Single Comment Area -->
                            <li class="single_comment_area">
                                <!-- Comment Content -->
                                <div class="comment-content d-flex">
                                    <!-- Comment Author -->
                                    <div class="comment-author">
                                        <img src="{{ asset('img/bg-img/31.jpg') }}" alt="author">
                                    </div>
                                    <!-- Comment Meta -->
                                    <div class="comment-meta">
                                        <a href="#" class="comment-date">{{ $comment->created_at }}</a>
                                        <h6>{{ App\Models\User::find($comment->user_id)->name }}</h6>
                                        <p>{{ $comment->content }}</p>
                                        <div class="d-flex align-items-center">
                                            <a href="#" class="like">like</a>
                                            <a href="#" class="reply">Reply</a>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>

                    <!-- Post A Comment Area -->
                    <div class="post-a-comment-area">

                        <!-- Section Title -->
                        <div class="section-heading style-2">
                            <h4>Leave a reply</h4>
                            <div class="line"></div>
                        </div>

                        <!-- Reply Form -->
                        <div class="contact-form-area">
                            <form action="{{ route('app.new_comment') }}" method="post">
                                @csrf
                                <div class="row">
                                    <input type="hidden" class="form-control" id="user" name="user_id"
                                        value="@if(Auth::check()) {{ Auth::user()->id }} @endif">
                                    <input type="hidden" class="form-control" id="post" name="post_id"
                                        value="{{ $post->id }}">
                                    <div class="col-12">
                                        <textarea name="content" class="form-control" id="message"
                                            placeholder="Your comment"></textarea>
                                    </div>
                                    <div class="col-12">
                                        <button class="btn vizew-btn mt-30" type="submit">Submit Comment</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
            <!-- Sidebar Widget -->
            @if (Auth::check())
            <div class="col-12 col-md-6 col-lg-4 col-xl-3">
                <div class="sidebar-area">

                    <!-- ***** Single Widget ***** -->
                    <div class="single-widget share-post-widget mb-50">
                        <p>Share This Post</p>
                        <a href="#" class="facebook"><i class="fab fa-facebook" aria-hidden="true"></i> Facebook</a>
                        <a href="#" class="twitter"><i class="fab fa-twitter" aria-hidden="true"></i> Twitter</a>
                        <a href="#" class="google"><i class="fab fa-google" aria-hidden="true"></i> Google+</a>
                    </div>

                    <!-- ***** Single Widget ***** -->
                    <div class="single-widget p-0 author-widget">
                        <div class="p-4">
                            <img class="author-avatar" src="{{ asset('img/bg-img/30.jpg') }}" alt="">
                            <a href="#" class="author-name">{{ Auth::user()->name }}</a>
                            <div class="author-social-info">
                                <a href="#"><i class="fab fa-facebook"></i></a>
                                <a href="#"><i class="fab fa-twitter"></i></a>
                                <a href="#"><i class="fab fa-instagram"></i></a>
                            </div>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing</p>
                        </div>

                        <div class="authors--meta-data d-flex">
                            <p>Posted<span class="counter">{{ App\Models\Post::where('user_id', Auth::user()->id)->count() }}</span>
                            </p>
                            <p>Comments<span class="counter">{{ App\Models\Comment::where('user_id', Auth::user()->id)->count() }}</span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
</section>
<!-- ##### Post Details Area End ##### -->
@endsection