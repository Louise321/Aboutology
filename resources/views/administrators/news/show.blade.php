<link href="/css/article/test.css" rel="stylesheet">

<x-admin-layout>

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="news">News</a></li>
        </ol>
    </nav>

    <div class="rela-block page-container">
        <div class="rela-block gutter-container">
            <div class="rela-block article-container">
                <div class="rela-block article-info">
                    <div class="rela-inline author-info">
                        <div class="article-title">{{ $news -> title }}</div>
                            {{-- <div class="rela-block">Author Name</div> --}}
                            {{-- <div class="rela-block"><span>Author info here</span></div> --}}
                            <div class="rela-block"><span>{{ date_format($news->created_at, 'jS M Y') }}</span></div>
                    </div>
                </div>
                <div class="rela-block article-pic"></div>

                    <div v-html="articleText" class="article-cont">
                        {{ $news->description }}
                    </div>
                <div class="rela-block article-footnote">
                    <span>Footnote for links or whatever here</span>
                </div>
            </div>
        </div>

        <div class="related-cont">
            <div class="rela-block article-container">
                <div class="sidebar2-item  recent">
                <h3>Related News</h3>
                   @foreach ($data as $item)
                        <div class="media">
                            <div class="media-body" style="margin-top: 8; margin-left: 20;">
                                <h4><a href="/news/{{ $item->id }}">{{$item -> title}}</a></h4>
                                <p>posted on {{$item -> created_at}}</p>
                            </div>
                        </div>
                    @endforeach
                 
                </div>
            </div>
        </div>

    </div>

</x-admin-layout>
