<link href="/css/news/newspage.css" rel="stylesheet">

<x-app-layout>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="#">Knowledgebase</a></li>
            <li class="breadcrumb-item"><a href="{{ route('news.usernews')}}">News</a></li>
        </ol>
    </nav>

    <div class="rela-block page-container">
        <!-- PAGE STUFF -->

        <div class="rela-block gutter-container">
            <div class="rela-block article-container">
                <div class="rela-block article-info">
                    <div class="rela-inline author-info">
                        <div class="article-title">{{ $news -> title }}</div>
                            <div class="rela-block"><span>{{ date_format($news->created_at, 'jS M Y') }}</span></div>
                    </div>
                </div>
                
                <img src="{{ asset('uploads/image/' . $news->file_path) }}" class="img-responsive" alt="">
               
                <div class="post-bottom overflow"></div>
                    <div v-html="articleText" class="article-cont">
                        {{ $news->description }}
                    </div>
                    @if ($news->news_type == 'Events' || $news->news_type == 'events')
                        <div class="rela-block article-footnote">

                            <p><strong>Start Date:</strong> {{$news -> eventStartDate}} </p>
                            <p><strong>End Date:</strong> {{$news -> eventEndDate}} </p>
                        </div>

                        @else
                        <span> </span>

                        @endif
            </div>
                

        </div>
        <!-- Related News -->
        <div class="related-cont">
            <div class="rela-block article-container">
                <div class="sidebar2-item  recent">
                <h3>Recent News</h3>
                   @foreach ($relatednews as $item)
                        <div class="media">
                            <div class="media-body" style="margin-top: 8; margin-left: 20;">
                                <h4><a href="{{ route('news.userNewspage', $item->id) }}">{{$item -> title}}</a></h4>
                                <p>posted on {{$item -> created_at}}</p>
                            </div>
                        </div>
                    @endforeach
                 
                </div>
            </div>
        </div>

    </div>

</x-app-layout>
