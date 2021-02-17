<link rel="stylesheet" href="{{ asset('css/knowledge.css') }}">


<x-app-layout>

    <div class="wraper">
        <main class="page-main">
            <div>
                <h1 style="position:relative;color:black;font-size:30px;justify-content:center;display:flex;padding-bottom:20px;">
                    How Can We Help You Today?
                </h1>
            </div>

            <form action="{{ route('knowledge.search') }}" method="GET">
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

    <!-- ----------------------------Article------------------------------ -->
   
        
    <div class="row_h">
        <div class="col-one">
            <h1 class="heading" style="padding-top:60px;">Article</h1>
        </div>
    </div>

    @if($article->isNotEmpty())

    <div class="row_cb">
        @foreach ($article->chunk(3) as $chunk)
            @foreach ($chunk as $post)
                <div class="col-thirds" style="padding-bottom:20px;">
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
    </div>

    @else 
        <div class="row_cb" style="justify-content:center">
            <div>
                {{-- <h3 style=position:absolute;left:40%;bottom:40px;font-size:30px;justify-content:center;display:flex;padding-top:20px;>No posts found</h3> --}}
                <h3>Oops! There are no related articles found.</h3>
            </div>
        </div>
    @endif
    

    <!-- ------------------Forum------------------------- -->

    <div class="row_h">
        <div class="col-one">
            <h1 class="heading" style="padding-top:30px;">Forum</h1>
        </div>
    </div> 

    @if($forum->isNotEmpty())

        <div class="row_cb">
            @foreach ($forum as $post)
                <div class="forum-alignment-container">
                    <div class="forum-card">
                        <div class="ibox-content forum-container">
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
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    @else 
        <div class="row_cb" style="justify-content:center">
            <div>
                {{-- <h3 style=position:absolute;left:40%;bottom:40px;font-size:30px;justify-content:center;display:flex;padding-top:20px;>No posts found</h3> --}}
                 <h3>Oops! There are no related forums found.</h3>
            </div>
        </div>
    @endif        
            
    


     <!-- ------------------News-------------------------  -->

    <div class="row_h">
        <div class="col-one">
            <h1 class="heading" style="padding-top:50px;">News</h1>
        </div>
    </div>

    <div class="row">

        @if($news->isNotEmpty())

            <div class="news">
                @foreach ($news->chunk(3) as $chunk)
                    @foreach ($chunk as $post)
                        <div class="column" style="padding-bottom:20px;">
                            <div class="news-card" >
                                <div class="news-card-image-wrapper">
                                    <img src="{{ asset('uploads/image/' . $post->file_path) }}" alt="" style="height:260px;">
                                    <div class="date"><span class="day">{{ date_format($post->created_at, 'd') }}</span><span class="month">{{ date_format($post->created_at, ' M ') }}</span></div>
                                    <i class="ion-checkmark"> </i>
                                </div>

                                <figcaption>
                                    <h3>{{ $post->title }}</h3>
                                    <div class="descrp_news">
                                        {!! html_entity_decode($post->description) !!}
                                    </div>
                                    <button>Read More</button>
                                </figcaption><a href="{{ route('news.userNewspage', $post->id) }}"></a>
                            </div>
                        </div>
                    @endforeach
                @endforeach
            </div>

        @else 
            <div class="row_cb" style="justify-content:center; padding-bottom:80px;">
                <div>
                    {{-- <h3 style=position:absolute;left:40%;bottom:40px;font-size:30px;justify-content:center;display:flex;padding-top:20px;>No posts found</h3> --}}
                    <h3>Oops! There are no related news found.</h3>
                </div>
            </div>
        @endif

        
    </div>
        
    


</x-app-layout>
