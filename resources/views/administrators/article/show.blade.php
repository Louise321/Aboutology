<link href="/css/article/test.css" rel="stylesheet">

<x-admin-layout>

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="#">Knowledgebase</a></li>
            <li class="breadcrumb-item"><a href="#">Article</a></li>
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

                <div v-html="articleText" class="article-cont">
                    {!! html_entity_decode($article->description) !!}

            

                </div>

                <div class="rela-block article-footnote">
                    <span>Footnote for links or whatever here</span>
                </div>

                <div class="post-bottom overflow">
                    <ul class="nav nav-justified post-nav">
                        <li><a href="#"><i class="fas fa-eye"></i>58 Views</a></li>
                        <li><a href="#"><i class="fas fa-thumbs-up"></i>30 Likes</a></li>
                        <li><a href="#"><i class="fas fa-thumbs-down"></i>5 Dislikes</a></li>
                    </ul>
                </div>

            </div>
        </div>

        <div class="ques-cont">
            <div class="qcont">
                <div class="row" style="justify-content: center">
                    <h4 style="padding: 5;">Was this information helpful?</h4> 
                    <a href="#"><i class="inter fas fa-thumbs-up fa-2x"></i></a>
                    <a href="#"><i class="inter fas fa-thumbs-down fa-2x"></i></a>
                </div>
            </div>
        </div>

        <div class="related-cont">
            <div class="rela-block article-container">
                <div class="sidebar2-item  recent">
                    <h3>Related Articles</h3>
                    <div class="media">
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
                    </div>
                </div>
            </div>
        </div>

    </div>

</x-admin-layout>
