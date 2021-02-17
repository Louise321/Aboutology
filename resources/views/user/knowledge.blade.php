<link rel="stylesheet" href="{{ asset('css/knowledge.css') }}">


<x-app-layout>

    <div class="wraper">
        <main class="page-main">
            <div>
                <h1 style="position:relative;color:#000000;font-size:30px;justify-content:center;display:flex;padding-bottom:20px;">
                    How Can We Help You Today?
                </h1>
            </div>

            <!-- <div class="wrap"> -->
            
            <form action="{{ url('/knowledge-search') }}" method="GET">
                <div class="search">
                    <input class="searchTerm" type="text" name="search"
                        placeholder="Search the Knowledge Based" required>
                    <button type="submit" class="searchButton">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </form>
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
   
        
            <div class="row_h">
                <div class="col-one">
                    <h1 class="heading">Article</h1>
                </div>
            </div>

            
            <div class="row_cb">

                @foreach ($article->chunk(3) as $chunk)
                @foreach ($chunk as $post)
                <div class="col-thirds">

                
                    <div class="media-card">
                        <div class="media-card-image-wrapper">
                            <img src="{{ asset('uploads/image/' . $post->file_path) }}" alt="" style="height:240px">
                            <div class="media-card-meta-taxonomy">
                                <a href="{{ route('article.detail', $post->id) }}" style="color:white;">
                                {{$post->category->name}}
                            </div>
                        </div>
                        <div class="media-card-title">
                            <h2>{{ $post->title }}</h2>
                            <div class="media-card-meta-date">
                                {{ date_format($post->created_at, 'jS M Y') }}
                            </div>
                        </div>
                        <div class="media-card-content">
                            <div class="descrp_article">
                                {!! html_entity_decode($post->description) !!}
                            </div>
                        </div>
                        <div class="media-card-button">
                            <a href="{{ route('article.detail', $post->id) }}">Read more</a>
                        </div>
                    </div>
                   
                </div>
                @endforeach
                @endforeach
                 
                <div class="extra2" style="padding-top:30px;">
                    <a href="article" style="font-size:18px; color: #00B4CC;">View more >></a>
                </div>

            </div>
            
            
        

        <!-- ------------------Forum------------------------- -->

            <div class="row_h">
                <div class="col-one">
                    <h1 class="heading">Forum</h1>
                </div>
            </div> 

            <div class="row_cb">
                <div class="forum-alignment-container">
                    <div class="forum-card">
                        <div class="ibox-content forum-container">
                            <div class="forum-title" style="padding-bottom:20px;">
                                <small>Total Forum: {{ $forumCount->count() }}</small>
                                <br>
                            </div>

                            @foreach ($forum as $post)

                            <div class="forum-item">
                                <div class="row">
                                    <div class="col-md-9">
                                        <div class="forum-icon">
                        
                                            <img alt="" src="{{asset('uploads/profilePic/'.$post->pic)}}"
                                                        class="avatar img-fluid mr-1" width="128"
                                                        height="128" />
                                        </div>
                                        <a href="{{ route('forums.show', $post->id) }}" class="forum-item-title">{{ $post->title }}</a>
                                        <div class="forum-sub-title descrp">{!! html_entity_decode($post->content) !!}</div>
                                    </div>

                                    <div class="col-md-1 forum-info">
                                    </div>
                                    <div class="col-md-1 forum-info">
                                    </div>
                                    
                                    <div class="col-md-1 forum-info">
                                        <span class="views-number">
                                            {{ $post->views }}
                                        </span>
                                        <div>
                                            <small>Views</small>
                                        </div>
                                    </div>
                                    <!-- <div class="col-md-1 forum-info">
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
                                    </div> -->
                                </div>
                            </div>

                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="extra2" style="padding-top:30px;">
                    <a href="forums" style="font-size:18px; color: #00B4CC;">View more >></a>
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

                    @foreach ($news->chunk(3) as $chunk)
                    @foreach ($chunk as $post)
                    <div class="column">
                        <div class="news-card">
                            <div class="news-card-image-wrapper">
                                {{-- <img src="{{ asset('uploads/image/' . $post->file_path) }}" alt=""> --}}
                                <img src="{{ asset('uploads/image/' . $post->file_path) }}" alt="" style="height:260px;">
                                <div class="date"><span class="day">{{ date_format($post->created_at, 'd') }}</span><span class="month">{{ date_format($post->created_at, ' M ') }}</span></div>
                                <i class="ion-checkmark"> </i>
                            </div>

                            <figcaption>
                                <a href="{{ route('news.userNewspage', $post->id) }}" style="text-decoration:none">
                                    <h3>{{ $post->title }}</h3>
                                </a>
                                <div class="descrp_news">
                                    {!! html_entity_decode($post->description) !!}
                                </div>
                                <button>
                                    <a href="{{ route('news.userNewspage', $post->id) }}" style="text-color:white;">Read More</a>
                                </button>
                            </figcaption><a href="{{ route('news.userNewspage', $post->id) }}"></a>
                        </div>
                    </div>
                    @endforeach
                    @endforeach

                    {{-- <div class="column">
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
                    </div> --}}
                    <div class="extra2" style="padding-top:30px;">
                        <a href="news-user" style="font-size:18px; color: #00B4CC;">View more >></a>
                    </div>
                </div>
            </div>

</x-app-layout>
