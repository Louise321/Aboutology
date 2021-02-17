<link href="/css/article/test.css" rel="stylesheet">

<x-app-layout>

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="knowledge">Knowledgebase</a></li>
            <li class="breadcrumb-item"><a href="{{ route('article') }}">Article</a></li>
        </ol>
    </nav>

    <div class="rela-block page-container">
        <div class="rela-block gutter-container">
            <div class="rela-block article-container">
                <div class="rela-block article-info">
                    <div class="rela-inline author-info">
                        <div class="article-title">{{ $article->title }}</div>
                            {{-- <div class="rela-block">Author Name</div> --}}
                            {{-- <div class="rela-block"><span>Author info here</span></div> --}}
                            <div class="rela-block"><span>{{ date_format($article->created_at, 'jS M Y') }}</span></div>
                    </div>
                </div>
                <img src="{{ asset('uploads/image/' . $article->file_path) }}" class="img-responsive" alt=""></a>

                    <div class="post-bottom overflow">
                        <ul class="nav nav-justified post-nav">
                            <li><i class="fas fa-eye"></i> {{ $article->views }} Views</li>
                        </ul>
                    </div>

                    <div v-html="articleText" class="article-cont">
                        {!! html_entity_decode($article->description) !!}
                    </div>
                
            </div>
        </div>

        <div class="related-cont">
            <div class="rela-block article-container">
                <div class="sidebar2-item  recent">
                    <h3>Related Articles</h3>

                    @foreach($relatedpost as $data)

                        <div class="media">
                            <div class="pull-left">
                                <a href="{{ route('article.detail', $data->id) }}"><img class="img-recent2" src="{{ asset('uploads/image/' . $data->file_path) }}" alt=""></a>
                            </div>
                            <div class="media-body" style="margin-top: 8; margin-left: 20;">
                                <h4><a href="{{ route('article.detail', $data->id) }}">{{ $data->title }}</a></h4>
                                <p>{{ date_format($data->created_at, 'jS M Y') }}</p>
                            </div>
                        </div>
                    
                    @endforeach
                </div>
            </div>
        </div>

    </div>

</x-app-layout>
