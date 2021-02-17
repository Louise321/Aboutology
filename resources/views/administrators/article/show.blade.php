<link href="/css/article/test.css" rel="stylesheet">

<x-admin-layout>

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('articles.index') }}">Article</a></li>
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
                        <li><i class="fas fa-eye"></i> {{ $article->views }}</li>
                    </ul>
                </div>

                <div v-html="articleText" class="article-cont">
                    {!! html_entity_decode($article->description) !!}
                </div>

                {{-- <div class="rela-block article-footnote">
                    <span>Footnote for links or whatever here</span>
                </div> --}}

            </div>
        </div>

        {{-- <div class="ques-cont">
            <div class="qcont">
                <div class="row" style="justify-content: center">
                    <h4 style="padding: 5;">Was this information helpful?</h4> 
                    <a href="#"><i class="inter fas fa-thumbs-up fa-2x"></i></a>
                    <a href="#"><i class="inter fas fa-thumbs-down fa-2x"></i></a>
                </div>
            </div>
        </div> --}}

        <div class="related-cont">
            <div class="rela-block article-container">
                <div class="sidebar2-item  recent">
                    <h3>Related Articles</h3>

                        @foreach($relatedpost as $data)
                        
                            <div class="media">
                                <div class="pull-left">
                                    <a href="/articles/{{ $data->id }}"><img class="img-recent2" src="{{ asset('uploads/image/' . $data->file_path) }}" alt=""></a>
                                </div>
                                <div class="media-body" style="margin-top: 8; margin-left: 20;">
                                    <h4><a href="/articles/{{ $data->id }}">{{ $data->title }}</a></h4>
                                    <p>{{ date_format($data->created_at, 'jS M Y') }}</p>
                                </div>
                            </div>

                        @endforeach

                    {{-- <div class="media">
                        <div class="pull-left">
                            <a href="#"><img class="img-recent2" src="img/cat.png" alt=""></a>
                        </div>
                        <div class="media-body" style="margin-top: 8; margin-left: 20;">
                            <h4><a href="#">Lorem ipsum dolor sit amet consectetur adipisicing elit,</a></h4>
                            <p>posted on  07 March 2014</p>
                        </div>
                    </div>
                    <div class="media">
                        <div class="pull-left">
                            <a href="#"><img class="img-recent2" src="img/cat.png" alt=""></a>
                        </div>
                        <div class="media-body " style="margin-top: 8; margin-left: 20;">
                            <h4><a href="#">Lorem ipsum dolor sit amet consectetur adipisicing elit,</a></h4>
                            <p>posted on  07 March 2014</p>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>

    </div>

</x-admin-layout>
