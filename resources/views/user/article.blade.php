{{--
<link href="css/article/bootstrap.min.css" rel="stylesheet"> --}}
{{--
<link href="css/article/font-awesome.min.css" rel="stylesheet"> --}}
{{--
<link href="css/article/lightbox.css" rel="stylesheet">
<link href="css/article/animate.min.css" rel="stylesheet"> --}}
<link href="/css/article/test.css" rel="stylesheet">
{{--
<link href="css/article/responsive.css" rel="stylesheet"> --}}
<link rel="shortcut icon" href="images/ico/favicon.ico">

<x-app-layout>

    <section id="page-breadcrumb">
        <div class="vertical-center sun">
            <div class="container3">
                <div class="row">
                    <div class="action">
                        <div class="col-sm-12">
                            <h1 class="title">Article</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/#action-->

    <section id="blog" class="padding-top">
        <div class="container2">
            <div class="row">

                <div class="col-md-3 col-sm-5" style="padding-left: 30px; padding-right: 50px;">
                    <div class="sidebar2 blog-sidebar">
                        <div class="sidebar2-item categories">
                            <h3>Categories</h3>

                            <ul class="nav2 navbar-stacked">

                                <li><a href="{{ route('article') }}">All<span class="pull-right"></span></a></li>

                                @foreach ($cat as $category)
                                    <li><a href="{{ route('article-cat', $category->category_id) }}">{{ $category->category->name }}<span
                                                class="pull-right"></span></a></li>
                                @endforeach

                            </ul>

                        </div>

                        <div class="sidebar2-item  recent">
                            <h3>Popular Posts</h3>

                            @foreach ($data as $latest)
                                <div class="media">
                                    <div class="pull-left">
                                        <a href="{{ route('article.detail', $latest->id) }}"><img class="img-recent" src="{{ asset('uploads/image/' . $latest->file_path) }}" alt=""></a>
                                    </div>
                                    <div class="media-body">
                                        <h4><a href="{{ route('article.detail', $latest->id) }}">{{ $latest->title }}</a></h4>
                                        <p>{{ date_format($latest->created_at, 'jS M Y') }}</p>
                                    </div>
                                </div>
                            @endforeach

                          
                        </div>
                    </div>
                </div>


                <div class="col-md-9 col-sm-7" style="padding-right: 30px;">
                    <div class="row">

                        @foreach ($article->chunk(2) as $chunk)
                            @foreach ($chunk as $articled)

                                <div class="col-md-6 col-sm-12 blog-padding-right">

                                    <div class="single-blog two-column">
                                        <div class="post-thumb">
                                            <a href="{{ route('article.detail', $articled->id) }}">
                                                <img src="{{ asset('uploads/image/' . $articled->file_path) }}" class="img-responsive" alt="" style="height: 250px; width:100%;"></a>
                                            <div class="post-overlay">
                                            </div>
                                        </div>

                                        <div class="post-content overflow">
                                            <h2 class="post-title bold">
                                                <a
                                                    href="{{ route('article.detail', $articled->id) }}">{{ $articled->title }}</a>
                                            </h2>
                                            <h3 class="articledate">{{ date_format($articled->created_at, 'jS M Y') }}
                                            </h3>

                                            <div class="articledesc">
                                            <p>{!! html_entity_decode($articled->description) !!}</p>
                                            </div>

                                            <a href="{{ route('article.detail', $articled->id) }}" class="read-more">View More</a>

                                            {{-- <a href="#" class="read-more">View More</a> --}}
                                            <div class="post-bottom overflow">
                                                <ul class="nav nav-justified post-nav">
                                                    <li><i class="fas fa-eye"></i> {{ $articled->views }}  Views</li>
                                                    

                                                </ul>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                            @endforeach
                        @endforeach

                    </div>

                    {!! $article->links('pagination::bootstrap-4') !!}

                </div>

            </div>
        </div>

    </section>
    <!--/#blog-->

</x-app-layout>
