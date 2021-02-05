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

                                @foreach ($testing123 as $test)
                                    @foreach ($cat as $category)

                                        <li class="{{ $category->category_id == $test->category_id ? 'active' : '' }}">
                                            <a
                                                href="{{ route('article-cat', $category->category_id) }}">{{ $category->category->name }}</a>
                                        </li>

                                    @endforeach
                                @endforeach

                                {{-- <li class="active"><a href="#">Dolor sit amet<span
                                            class="pull-right">(8)</span></a></li>
                                <li><a href="#">Adipisicing elit<span class="pull-right">(4)</span></a></li>
                                <li><a href="#">Sed do<span class="pull-right">(9)</span></a></li>
                                <li><a href="#">Eiusmod<span class="pull-right">(3)</span></a></li>
                                <li><a href="#">Mockup<span class="pull-right">(4)</span></a></li>
                                <li><a href="#">Ut enim ad minim <span class="pull-right">(2)</span></a></li>
                                <li><a href="#">Veniam, quis nostrud <span class="pull-right">(8)</span></a></li>
                                --}}
                            </ul>
                        </div>

                        <div class="sidebar2-item  recent">
                            <h3>Recent Posts</h3>

                            @foreach ($data as $latest)
                                <div class="media">
                                    <div class="pull-left">
                                        <a href="#"><img class="img-recent" src="img/cat.png" alt=""></a>
                                    </div>
                                    <div class="media-body">
                                        <h4><a href="#">{{ $latest->title }}</a></h4>
                                        <p>{{ date_format($latest->created_at, 'jS M Y') }}</p>
                                    </div>
                                </div>
                            @endforeach

                            {{-- <div class="media">
                                <div class="pull-left">
                                    <a href="#"><img class="img-recent" src="img/cat.png" alt=""></a>
                                </div>
                                <div class="media-body">
                                    <h4><a href="#">Lorem ipsum dolor sit amet consectetur adipisicing elit,</a></h4>
                                    <p>posted on 07 March 2014</p>
                                </div>
                            </div>
                            <div class="media">
                                <div class="pull-left">
                                    <a href="#"><img class="img-recent" src="img/cat.png" alt=""></a>
                                </div>
                                <div class="media-body">
                                    <h4><a href="#">Lorem ipsum dolor sit amet consectetur adipisicing elit,</a></h4>
                                    <p>posted on 07 March 2014</p>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                </div>

                <div class="col-md-9 col-sm-7" style="padding-right: 30px;">
                    <div class="row">
                        @foreach ($testing123->chunk(2) as $chunk)
                            @foreach ($chunk as $articled)

                                <div class="col-md-6 col-sm-12 blog-padding-right">
                                    <div class="single-blog two-column">
                                        <div class="post-thumb">
                                            <a href="{{ route('article.detail', $articled->id) }}"><img
                                                    src="/img/01.jpg" class="img-responsive" alt=""></a>
                                            <div class="post-overlay">
                                            </div>
                                        </div>

                                        <div class="post-content overflow">
                                            <h2 class="post-title bold"><a
                                                    href="{{ route('article.detail', $articled->id) }}">{{ $articled->title }}</a>
                                            </h2>
                                            <h3 class="articledate">{{ date_format($articled->created_at, 'jS M Y') }}
                                            </h3>
                                            <p class="articledesc">{{ $articled->description }}</p>
                                            <a href="#" class="read-more">View More</a>
                                            <div class="post-bottom overflow">
                                                <ul class="nav nav-justified post-nav">
                                                    <li><a href="#"><i class="fas fa-eye"></i>58 Views</a></li>
                                                    <li><a href="#"><i
                                                                class="fas fa-thumbs-up"></i>{{ $articled->likes ?: 0 }}</a>
                                                    </li>
                                                    <li><a href="#"><i
                                                                class="fas fa-thumbs-down"></i>{{ $articled->dislikes ?: 0 }}</a>
                                                    </li>

                                                    {{-- <div
                                                        class="btn-group btn-group-sm" style="margin-left: 70">
                                                        <button class="align-middle" data-toggle="dropdown"
                                                            aria-haspopup="true" aria-expanded="false">
                                                            <i class="fas fa-ellipsis-h"></i>
                                                        </button>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <a class="dropdown-item align-middle"
                                                                href="{{ route('articles.edit', $article->id) }}"><i
                                                                    class="far fa-edit"></i> Edit</a>

                                                            <form action="{{ route('articles.destroy', $article->id) }}"
                                                                method="POST">

                                                                @csrf
                                                                @method('DELETE')

                                                                <a class="dropdown-item align-middle"><i
                                                                        class="fas fa-trash-alt"
                                                                        style="margin-right: 4"></i> Delete</a>

                                                            </form>

                                                        </div>
                                                    </div> --}}

                                                </ul>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                            @endforeach
                        @endforeach

                        {!! $article->links('pagination::bootstrap-4') !!}

                    </div>

                </div>

            </div>
        </div>
    </section>
    <!--/#blog-->

</x-app-layout>

<script type="text/javascript" src="js/article/jquery.js"></script>
<script type="text/javascript" src="js/article/bootstrap.min.js"></script>
<script type="text/javascript" src="js/article/lightbox.min.js"></script>
<script type="text/javascript" src="js/article/wow.min.js"></script>
<script type="text/javascript" src="js/article/main.js"></script>
