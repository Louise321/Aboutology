<link rel="stylesheet" href="{{ asset('css/knowledge.css') }}">

<x-app-layout>
    <!-- {{-- <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Knowledge') }}
        </h2>
    </x-slot> --}}

    {{-- <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    Knowledge Page!
                </div>
            </div>
        </div>
    </div> --}}

    {{-- @if ($posts->isNotEmpty())
        @foreach ($posts as $post)
            <div class="post-list">
                <p>{{ $post->title }}</p>
                <img src="{{ $post->image }}">
            </div>
        @endforeach
    @else
        <div>
            <h2>No posts found</h2>
        </div>
    @endif --}} -->

    <div class="wraper">
        <main class="page-main">
            <div>
                <h1 style="position:relative;color:#f2f2f2;font-size:30px;justify-content:center;display:flex;padding-bottom:20px;">
                    How Can We Help You Today?
                </h1>
            </div>

            <!-- <div class="wrap"> -->
                <div class="search">
                    <form action="{{ url('/knowledge-search') }}" method="GET">
                        <input class="searchTerm" type="text" name="search"
                            placeholder="Search the Knowledge Based" required>
                      
                        <!-- {{-- <a href="{{ route('knowledge.index') }}" class=" mt-1"> --}} -->
                       
                        <button type="submit" class="searchButton">
                            <i class="fas fa-search"></i>
                        </button>
                        <!-- </a> -->

                        <!-- {{-- <input type="text" name="search" required />
                        <button type="submit">Search</button> --}} -->
                    </form> 
                    
                </div>
            <!-- </div> -->
        </main>
    </div>

    <!-------------------------------------Category-------------------------------------->
    <!--
    <div class="row">
        <div class="col-one"> 
        <h1 class="heading">Service Boxes</h1>
        </div>
    </div>
    -->
    <div class="row_cb">
        <div class="col-thirds">
            <div class="service-box">
                <div class="service-box-icon">
                    <i class="fas fa-file-alt"></i>
                </div>
                <div class="service-box-title">
                    <h2>Articles</h2>
                </div>
                <div class="service-box-content">
                    Ullamco in enim cupidatat dolor et incididunt veniam ad aliqua excepteur. Quis pariatur dolore culpa
                    aliqua
                    amet cillum mollit proident cillum anim ullamco occaecat anim.
                </div>
                <div class="service-box-button">
                    <a href="articles">Click here</a>
                </div>
            </div>
        </div>
        <div class="col-thirds">
            <div class="service-box">
                <div class="service-box-icon">
                    <i class="fas fa-comments"></i>
                </div>
                <div class="service-box-title">
                    <h2>Forums</h2>
                </div>
                <div class="service-box-content">
                    Ullamco in enim cupidatat dolor et incididunt veniam ad aliqua excepteur. Quis pariatur dolore culpa
                    aliqua
                    amet cillum mollit proident cillum anim ullamco occaecat anim.
                </div>
                <div class="service-box-button">
                    <a href="forum">Click here</a>
                </div>
            </div>
        </div>
        <div class="col-thirds">
            <div class="service-box">
                <div class="service-box-icon">
                    <i class="far fa-newspaper"></i>
                </div>
                <div class="service-box-title">
                    <h2>News</h2>
                </div>
                <div class="service-box-content">
                    Ullamco in enim cupidatat dolor et incididunt veniam ad aliqua excepteur. Quis pariatur dolore culpa
                    aliqua
                    amet cillum mollit proident cillum anim ullamco occaecat anim.
                </div>
                <div class="service-box-button">
                    <a href="news-user">Click here</a>
                </div>
            </div>
        </div>
    </div>

    <!-- ----------------------------Article------------------------------ -->
    {{-- @if ($posts->isNotEmpty())
        @foreach ($posts as $post)
            <div class="row_h">
                <div class="col-one">
                    <h1 class="heading"><a href="/articles/{{ $article->id }}">{{ $post->title }}</a></h1>
                </div>
            </div>
            <div class="row_cb">
                <div class="col-thirds">
                    <div class="media-card">
                        <div class="media-card-image-wrapper">
                            <!-- <img src="https://images.unsplash.com/photo-1504204267155-aaad8e81290d" alt=""> -->
                            <img src="{{ $post->image }}">
                            <div class="media-card-meta-taxonomy">
                                {{ $post->category }}
                            </div>
                        </div>
                        <div class="media-card-title">
                            <h2>New Article</h2>
                            <div class="media-card-meta-date">
                                {{ $post->date }}
                            </div>
                        </div>
                        <div class="media-card-content">
                            {{ $post->content }}
                        </div>
                        <div class="media-card-button">
                            <a href="#">Read more</a>
                        </div>
                    </div>
                </div>
                <div class="col-thirds">
                    <div class="media-card">
                        <div class="media-card-image-wrapper">
                            <img src="https://images.unsplash.com/photo-1489844097929-c8d5b91c456e" alt="">
                            <div class="media-card-meta-taxonomy">
                                Stations
                            </div>
                        </div>
                        <div class="media-card-title">
                            <h2>New Article</h2>
                            <div class="media-card-meta-date">
                                12.01.2021
                            </div>
                        </div>
                        <div class="media-card-content">
                            Ullamco in enim cupidatat dolor et incididunt veniam ad aliqua excepteur. Quis pariatur
                            dolore culpa aliqua
                            amet cillum mollit proident cillum anim ullamco occaecat anim.
                        </div>
                        <div class="media-card-button">
                            <a href="#">Read more</a>
                        </div>
                    </div>
                </div>
                <div class="col-thirds">
                    <div class="media-card">
                        <div class="media-card-image-wrapper">
                            <img src="https://images.unsplash.com/photo-1449247709967-d4461a6a6103" alt="">
                            <div class="media-card-meta-taxonomy">
                                Policy
                            </div>
                        </div>
                        <div class="media-card-title">
                            <h2>New Article</h2>
                            <div class="media-card-meta-date">
                                12.01.2020
                            </div>
                        </div>
                        <div class="media-card-content">
                            Ullamco in enim cupidatat dolor et incididunt veniam ad aliqua excepteur. Quis pariatur
                            dolore culpa aliqua
                            amet cillum mollit proident cillum anim ullamco occaecat anim.
                        </div>
                        <div class="media-card-button">
                            <a href="#">Read more</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row_h">
                <div class="col-one">
                    <h1 class="heading">Forum</h1>
                </div>
            </div> 
        @endforeach
    @endif --}}

            <!-- ------------------Forum------------------------- -->
            <div class="row_cb">
                <div class="forum-alignment-container">
                    <div class="forum-card">
                        <div class="ibox-content forum-container">

                            <div class="forum-title">
                                <!-- <div class="pull-right forum-desc"> -->
                                <small>Total posts: 320,800</small>
                                <br>
                            </div>

                            <div class="forum-item">
                                <div class="row">
                                    <div class="col-md-9">
                                        <div class="forum-icon">
                                            <i class="fa fa-shield"></i>
                                        </div>
                                        <a href="forum_post.html" class="forum-item-title">General Discussion</a>
                                        <div class="forum-sub-title">Talk about services, station, fuel, products and so
                                            on.</div>
                                    </div>
                                    <div class="col-md-1 forum-info">
                                        <span class="views-number">
                                            1216
                                        </span>
                                        <div>
                                            <small>Views</small>
                                        </div>
                                    </div>
                                    <div class="col-md-1 forum-info">
                                        <span class="views-number">
                                            368
                                        </span>
                                        <div>
                                            <small>Topics</small>
                                        </div>
                                    </div>
                                    <div class="col-md-1 forum-info">
                                        <span class="views-number">
                                            140
                                        </span>
                                        <div>
                                            <small>Posts</small>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="forum-item">
                                <div class="row">
                                    <div class="col-md-9">
                                        <div class="forum-icon">
                                            <i class="fa fa-bolt"></i>
                                        </div>
                                        <a href="forum_post.html" class="forum-item-title">Query Discussion</a>
                                        <div class="forum-sub-title">Query about services, product, shops and others
                                        </div>
                                    </div>
                                    <div class="col-md-1 forum-info">
                                        <span class="views-number">
                                            890
                                        </span>
                                        <div>
                                            <small>Views</small>
                                        </div>
                                    </div>
                                    <div class="col-md-1 forum-info">
                                        <span class="views-number">
                                            120
                                        </span>
                                        <div>
                                            <small>Topics</small>
                                        </div>
                                    </div>
                                    <div class="col-md-1 forum-info">
                                        <span class="views-number">
                                            154
                                        </span>
                                        <div>
                                            <small>Posts</small>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="forum-item">
                                <div class="row">
                                    <div class="col-md-9">
                                        <div class="forum-icon">
                                            <i class="fa fa-star"></i>
                                        </div>
                                        <a href="forum_post.html" class="forum-item-title">Staff Discussion</a>
                                        <div class="forum-sub-title">This forum is for private, staff member only
                                            discussions, usually pertaining to the community itself. </div>
                                    </div>
                                    <div class="col-md-1 forum-info">
                                        <span class="views-number">
                                            1450
                                        </span>
                                        <div>
                                            <small>Views</small>
                                        </div>
                                    </div>
                                    <div class="col-md-1 forum-info">
                                        <span class="views-number">
                                            652
                                        </span>
                                        <div>
                                            <small>Topics</small>
                                        </div>
                                    </div>
                                    <div class="col-md-1 forum-info">
                                        <span class="views-number">
                                            572
                                        </span>
                                        <div>
                                            <small>Posts</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- ------------------News------------------------- -->

            <div class="row_h">
                <div class="col-one">
                    <h1 class="heading">News</h1>
                </div>
            </div>

            <div class="row">
                <div class="news">
                    <div class="column">
                        <div class="news-card">
                            <div class="news-card-image-wrapper">
                                <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/331810/sample6.jpg"
                                    alt="sample6">
                                <div class="date"><span class="day">01</span><span class="month">Dec</span></div>
                                <i class="ion-checkmark"> </i>
                            </div>

                            <figcaption>
                                <h3>Down with this sort of thing</h3>
                                <p>
                                    I don't need to compromise my principles, because they don't have the slightest
                                    bearing on what happens to me anyway.
                                </p>
                                <button>Read More</button>
                            </figcaption><a href="#"></a>
                        </div>
                    </div>

                    <div class="column">
                        <div class="news-card">
                            <div class="news-card-image-wrapper">
                                <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/331810/sample6.jpg"
                                    alt="sample6">
                                <div class="date"><span class="day">01</span><span class="month">Dec</span></div>
                                <i class="ion-checkmark"> </i>
                            </div>

                            <figcaption>
                                <h3>Down with this sort of thing</h3>
                                <p>
                                    I don't need to compromise my principles, because they don't have the slightest
                                    bearing on what happens to me anyway.
                                </p>
                                <button>Read More</button>
                            </figcaption><a href="#"></a>
                        </div>
                    </div>

                    <div class="column">
                        <div class="news-card">
                            <div class="news-card-image-wrapper">
                                <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/331810/sample6.jpg"
                                    alt="sample6">
                                <div class="date"><span class="day">01</span><span class="month">Dec</span></div>
                                <i class="ion-checkmark"> </i>
                            </div>

                            <figcaption>
                                <h3>Down with this sort of thing</h3>
                                <p>
                                    I don't need to compromise my principles, because they don't have the slightest
                                    bearing on what happens to me anyway.
                                </p>
                                <button>Read More</button>
                            </figcaption><a href="#"></a>
                        </div>
                    </div>
                </div>
            </div>


</x-app-layout>
