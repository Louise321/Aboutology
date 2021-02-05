<link href="/css/forum/forum.css" rel="stylesheet">
<link
    href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800'
    rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="font-awesome-4.0.3/css/font-awesome.min.css">

<x-app-layout>
    <div class="container-fluid">
        <section id="page-breadcrumb">
            <div class="vertical-center sun">
                <div class="container3">
                    <div class="row">
                        <div class="action">
                            <div class="col-sm-12">
                                <h1 class="title">Forum</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <ul class="nav tm-category-list">
            <li class="nav-item tm-category-item"><a data-toggle="tab" href="#general"
                    class="nav-link tm-category-link active">General</a></li>
            <li class="nav-item tm-category-item"><a data-toggle="tab" href="#my_forum"
                    class="nav-link tm-category-link">My Forum</a></li>
        </ul>

        <div class="tm-categories-container mb-5">
            <div class="tab-content" style="width: 100%">

                <div class="tab-pane active" id="general">

                    <section id="blog" class="padding-top">
                        <div class="container2">
                            <div class="row">

                                <!-- -->
                                <div class="col-md-3 col-sm-5" style="padding-left: 30px; padding-right: 50px;">
                                    <div class="sidebar2 blog-sidebar">

                                        {{-- categories --}}

                                        <div class="sidebar2-item categories">
                                            <h3>Categories</h3>

                                            <ul class="nav2 navbar-stacked">

                                                <li><a href="{{ route('forum') }}">All<span
                                                            class="pull-right"></span></a></li>

                                                @foreach ($cat as $category)
                                                    <li><a href="{{ route('forum-cat', $category->category_id) }}">{{ $category->category->name }}<span
                                                                class="pull-right"></span></a></li>
                                                @endforeach

                                            </ul>
                                        </div>

                                        {{-- Recent Post --}}

                                        <div class="sidebar2-item  recent">
                                            <h3>Recent Posts</h3>


                                            @foreach ($data as $latest)
                                                <div class="media">
                                                    <!-- <div class="pull-left">
                                                        <a href="{{ route('forums.show', $latest->id) }}"><img class="img-recent" src="img/cat.png" alt=""></a>
                                                    </div> -->
                                                    <div class="media-body">
                                                        <h4><a href="{{ route('forums.show', $latest->id) }}">{{ $latest->title }}</a></h4>
                                                        <p>{{ date_format($latest->created_at, 'jS M Y') }}</p>
                                                    </div>
                                                </div>
                                            @endforeach

                                        </div>
                                    </div>
                                </div>



                                <div class="col-md-9 col-sm-7">
                                    <!-- POST -->

                                    {{-- @foreach ($forum->chunk(2) as $chunk) --}}
                                        @foreach ($forums as $forumss)
                                            <div class="post">
                                                <div class="wrap-ut pull-left">
                                                    <div class="userinfo pull-left">
                                                        <div class="avatar">
                                                            
                                                            <i class="fa fa-user-circle-o fa-3x" aria-hidden="true"></i>
                                                        </div>
                                                    </div>
                                                    <div class="posttext pull-left">
                                                        <h2><a
                                                                href="{{ route('forums.show', $forumss->id) }}">{{ $forumss->title }}</a>
                                                        </h2>
                                                        <div class="descrp">
                                                            {!! html_entity_decode($forumss->content) !!}
                                                        </div>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                </div>
                                                <div class="postinfo pull-left">
                                                    <div class="container_reac">
                                                        <!-- 1201px -->
                                                        {{-- <div class="forumc"><i class="fa fa-thumbs-up"
                                                                aria-hidden="true"></i>
                                                            {{ $forums->likes ?: 0 }}
                                                        </div> --}}
                                                        <div class="foruml"><i
                                                                class="fa fa-comments" aria-hidden="true"></i>
                                                            13
                                                        </div>
                                                        <div class="forumv"><i class="fa fa-eye"></i>
                                                            {{ $forumss->views }}
                                                        </div>
                                                        <div class="forumt"><i class="fa fa-clock-o"></i>
                                                            {{ date_format($latest->created_at, 'd/m/Y') }}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="clearfix"></div>
                                            </div>
                                        @endforeach
                                        {{--
                                    @endforeach --}}

                                    {!! $forums->links('pagination::bootstrap-4') !!}

                                </div>
                            </div>
                        </div>

                    </section>

                </div>

                <!----------------------------------------- My Forum ------------------------------------->

                <div class="tab-pane" id="my_forum">
                    <div class="addnew">
                        <div class="button-style">
                            <a href="{{ route('forums.create') }}">
                                <i class="fa fa-plus-circle" aria-hidden="true"></i>Add New
                            </a>
                        </div>
                    </div>

                    <section id="blog" class="padding-top">
                        <div class="container2">
                            <div class="row">

                                <div class="col-md-3 col-sm-5" style="padding-left: 30px; padding-right: 50px;">
                                    <div class="sidebar2 blog-sidebar">

                                        {{-- categories --}}

                                        <div class="sidebar2-item categories">
                                            <h3>Categories</h3>

                                            <ul class="nav2 navbar-stacked">

                                                <li><a href="{{ route('forum') }}">All<span
                                                            class="pull-right"></span></a></li>

                                                @foreach ($cat as $category)
                                                    <li><a href="{{ route('forum-cat', $category->category_id) }}">{{ $category->category->name }}<span
                                                                class="pull-right"></span></a></li>
                                                @endforeach

                                            </ul>
                                        </div>

                                        {{-- Recent Post --}}

                                        <div class="sidebar2-item  recent">
                                            <h3>Recent Posts</h3>

                                            @foreach ($data as $latest)
                                                <div class="media">
                                                    <!-- <div class="pull-left">
                                                        <a href="{{ route('forums.show', $latest->id) }}"><img class="img-recent" src="img/cat.png" alt=""></a>
                                                    </div> -->
                                                    <div class="media-body">
                                                        <h4><a href="{{ route('forums.show', $latest->id) }}">{{ $latest->title }}</a></h4>
                                                        <p>{{ date_format($latest->created_at, 'jS M Y') }}</p>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-9 col-sm-7">
                                    <!-- POST -->
                                    <div class="post">
                                        <div class="wrap-ut pull-left">
                                            <div class="userinfo pull-left">
                                                <div class="avatar">
                                                    <i class="fa fa-user-circle-o fa-3x" aria-hidden="true"></i>
                                                </div>
                                            </div>
                                            <div class="posttext pull-left">
                                                <h2><a href="02_topic.html">12121210 Kids
                                                        Unaware of Their Halloween
                                                        Costume</a></h2>
                                                <p>It's one thing to subject yourself to a
                                                    Halloween costume mishap
                                                    because, hey, that's your prerogative.</p>


                                                <div class="btn-group btn-group-sm" style="float:right">
                                                    <button class="align-middle" data-toggle="dropdown"
                                                        aria-haspopup="true" aria-expanded="false">
                                                        <i class="fas fa-ellipsis-h"></i>
                                                    </button>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item align-middle" href="#"><i
                                                                class="far fa-edit"></i> Edit</a>
                                                        <a class="dropdown-item align-middle" href="#"><i
                                                                class="fas fa-trash-alt" style="margin-right: 4"></i>
                                                            Delete</a>
                                                    </div>
                                                </div>

                                                <!-- <div class="ebutton-style">
                                                    <a href="#">
                                                        <i class="fa fa-pencil-square-o fa-lg" aria-hidden="true"></i>
                                                    </a>
                                                </div> -->

                                            </div>

                                            <div class="clearfix"></div>
                                        </div>

                                        <div class="postinfo pull-left">
                                            <div class="container_reac">
                                                <!-- 1201px -->
                                                <div class="forumc"><i class="fa fa-thumbs-up" aria-hidden="true"></i>
                                                    198</div>
                                                <div class="foruml"><i class="fa fa-comments" aria-hidden="true"></i> 67
                                                </div>
                                                <div class="forumv"><i class="fa fa-eye"></i>
                                                    1,568</div>
                                                <div class="forumt"><i class="fa fa-clock-o"></i> 24 min
                                                </div>
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div><!-- POST -->


                                    <!-- POST -->
                                    <div class="post">
                                        <div class="wrap-ut pull-left">
                                            <div class="userinfo pull-left">
                                                <div class="avatar">
                                                    <i class="fa fa-user-circle-o fa-3x" aria-hidden="true"></i>

                                                </div>


                                            </div>
                                            <div class="posttext pull-left">
                                                <h2><a href="02_topic.html">What Instagram Ads
                                                        Will Look Like</a></h2>
                                                <p>Instagram offered a first glimpse at what its
                                                    ads will look like in a
                                                    blog post Thursday. The sample ad, which you
                                                    can see below.</p>

                                                <div class="btn-group btn-group-sm" style="float:right">
                                                    <button class="align-middle" data-toggle="dropdown"
                                                        aria-haspopup="true" aria-expanded="false">
                                                        <i class="fas fa-ellipsis-h"></i>
                                                    </button>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item align-middle" href="#"><i
                                                                class="far fa-edit"></i> Edit</a>
                                                        <a class="dropdown-item align-middle" href="#"><i
                                                                class="fas fa-trash-alt" style="margin-right: 4"></i>
                                                            Delete</a>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="postinfo pull-left">
                                            <div class="container_reac">
                                                <!-- 1201px -->
                                                <div class="forumc"><i class="fa fa-thumbs-up" aria-hidden="true"></i>
                                                    198</div>
                                                <div class="foruml"><i class="fa fa-comments" aria-hidden="true"></i> 67
                                                </div>
                                                <div class="forumv"><i class="fa fa-eye"></i>
                                                    1,568</div>
                                                <div class="forumt"><i class="fa fa-clock-o"></i> 24 min
                                                </div>
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div><!-- POST -->


                                    <!-- POST -->
                                    <div class="post">
                                        <div class="wrap-ut pull-left">
                                            <div class="userinfo pull-left">
                                                <div class="avatar">
                                                    <i class="fa fa-user-circle-o fa-3x" aria-hidden="true"></i>

                                                </div>


                                            </div>
                                            <div class="posttext pull-left">
                                                <h2><a href="02_topic.html">The Future of
                                                        Magazines Is on Tablets</a>
                                                </h2>
                                                <p>Eric Schmidt has seen the future of
                                                    magazines, and it's on the
                                                    tablet. At a Magazine Publishers
                                                    Association.</p>

                                                <div class="btn-group btn-group-sm" style="float:right">
                                                    <button class="align-middle" data-toggle="dropdown"
                                                        aria-haspopup="true" aria-expanded="false">
                                                        <i class="fas fa-ellipsis-h"></i>
                                                    </button>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item align-middle" href="#"><i
                                                                class="far fa-edit"></i> Edit</a>
                                                        <a class="dropdown-item align-middle" href="#"><i
                                                                class="fas fa-trash-alt" style="margin-right: 4"></i>
                                                            Delete</a>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="postinfo pull-left">
                                            <div class="container_reac">
                                                <!-- 1201px -->
                                                <div class="forumc"><i class="fa fa-thumbs-up" aria-hidden="true"></i>
                                                    198</div>
                                                <div class="foruml"><i class="fa fa-comments" aria-hidden="true"></i> 67
                                                </div>
                                                <div class="forumv"><i class="fa fa-eye"></i>
                                                    1,568</div>
                                                <div class="forumt"><i class="fa fa-clock-o"></i> 24 min
                                                </div>
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div><!-- POST -->


                                    <!-- POST -->
                                    <div class="post">
                                        <div class="wrap-ut pull-left">
                                            <div class="userinfo pull-left">
                                                <div class="avatar">
                                                    <i class="fa fa-user-circle-o fa-3x" aria-hidden="true"></i>
                                                </div>
                                            </div>
                                            <div class="posttext pull-left">
                                                <h2><a href="02_topic.html">Pinterest Now Worth
                                                        $3.8 Billion</a></h2>
                                                <p>Pinterest's valuation is closing in on $4
                                                    billion after its latest
                                                    funding round of $225 million, according to
                                                    a report.</p>

                                                <div class="btn-group btn-group-sm" style="float:right">
                                                    <button class="align-middle" data-toggle="dropdown"
                                                        aria-haspopup="true" aria-expanded="false">
                                                        <i class="fas fa-ellipsis-h"></i>
                                                    </button>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item align-middle" href="#"><i
                                                                class="far fa-edit"></i> Edit</a>
                                                        <a class="dropdown-item align-middle" href="#"><i
                                                                class="fas fa-trash-alt" style="margin-right: 4"></i>
                                                            Delete</a>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="postinfo pull-left">
                                            <div class="container_reac">
                                                <!-- 1201px -->
                                                <div class="forumc"><i class="fa fa-thumbs-up" aria-hidden="true"></i>
                                                    198</div>
                                                <div class="foruml"><i class="fa fa-comments" aria-hidden="true"></i> 67
                                                </div>
                                                <div class="forumv"><i class="fa fa-eye"></i>
                                                    1,568</div>
                                                <div class="forumt"><i class="fa fa-clock-o"></i> 24 min
                                                </div>
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <!-- POST -->



                                    <!-- POST -->
                                    <div class="post">
                                        <div class="wrap-ut pull-left">
                                            <div class="userinfo pull-left">
                                                <div class="avatar">
                                                    <i class="fa fa-user-circle-o fa-3x" aria-hidden="true"></i>
                                                </div>
                                            </div>
                                            <div class="posttext pull-left">
                                                <h2><a href="02_topic.html">Pinterest Now Worth
                                                        $3.8 Billion</a></h2>
                                                <p>Pinterest's valuation is closing in on $4
                                                    billion after its latest
                                                    funding round of $225 million, according to
                                                    a report.</p>

                                                <div class="btn-group btn-group-sm" style="float:right">
                                                    <button class="align-middle" data-toggle="dropdown"
                                                        aria-haspopup="true" aria-expanded="false">
                                                        <i class="fas fa-ellipsis-h"></i>
                                                    </button>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item align-middle" href="#"><i
                                                                class="far fa-edit"></i> Edit</a>
                                                        <a class="dropdown-item align-middle" href="#"><i
                                                                class="fas fa-trash-alt" style="margin-right: 4"></i>
                                                            Delete</a>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="postinfo pull-left">
                                            <div class="container_reac">
                                                <!-- 1201px -->
                                                <div class="forumc"><i class="fa fa-thumbs-up" aria-hidden="true"></i>
                                                    198</div>
                                                <div class="foruml"><i class="fa fa-comments" aria-hidden="true"></i> 67
                                                </div>
                                                <div class="forumv"><i class="fa fa-eye"></i>
                                                    1,568</div>
                                                <div class="forumt"><i class="fa fa-clock-o"></i> 24 min
                                                </div>
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <!-- POST -->


                                    <!-- POST -->
                                    <div class="post">
                                        <div class="wrap-ut pull-left">
                                            <div class="userinfo pull-left">
                                                <div class="avatar">
                                                    <i class="fa fa-user-circle-o fa-3x" aria-hidden="true"></i>
                                                </div>
                                            </div>
                                            <div class="posttext pull-left">
                                                <h2><a href="02_topic.html">Pinterest Now Worth
                                                        $3.8 Billion</a></h2>
                                                <p>Pinterest's valuation is closing in on $4
                                                    billion after its latest
                                                    funding round of $225 million, according to
                                                    a report.</p>

                                                <div class="btn-group btn-group-sm" style="float:right">
                                                    <button class="align-middle" data-toggle="dropdown"
                                                        aria-haspopup="true" aria-expanded="false">
                                                        <i class="fas fa-ellipsis-h"></i>
                                                    </button>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item align-middle" href="#"><i
                                                                class="far fa-edit"></i> Edit</a>
                                                        <a class="dropdown-item align-middle" href="#"><i
                                                                class="fas fa-trash-alt" style="margin-right: 4"></i>
                                                            Delete</a>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="postinfo pull-left">
                                            <div class="container_reac">
                                                <!-- 1201px -->
                                                <div class="forumc"><i class="fa fa-thumbs-up" aria-hidden="true"></i>
                                                    198</div>
                                                <div class="foruml"><i class="fa fa-comments" aria-hidden="true"></i> 67
                                                </div>
                                                <div class="forumv"><i class="fa fa-eye"></i>
                                                    1,568</div>
                                                <div class="forumt"><i class="fa fa-clock-o"></i> 24 min
                                                </div>
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <!-- POST -->


                                    <!-- POST -->
                                    <div class="post">
                                        <div class="wrap-ut pull-left">
                                            <div class="userinfo pull-left">
                                                <div class="avatar">
                                                    <i class="fa fa-user-circle-o fa-3x" aria-hidden="true"></i>
                                                </div>
                                            </div>
                                            <div class="posttext pull-left">
                                                <h2><a href="02_topic.html">Pinterest Now Worth
                                                        $3.8 Billion</a></h2>
                                                <p>Pinterest's valuation is closing in on $4
                                                    billion after its latest
                                                    funding round of $225 million, according to
                                                    a report.</p>

                                                <div class="btn-group btn-group-sm" style="float:right">
                                                    <button class="align-middle" data-toggle="dropdown"
                                                        aria-haspopup="true" aria-expanded="false">
                                                        <i class="fas fa-ellipsis-h"></i>
                                                    </button>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item align-middle" href="#"><i
                                                                class="far fa-edit"></i> Edit</a>
                                                        <a class="dropdown-item align-middle" href="#"><i
                                                                class="fas fa-trash-alt" style="margin-right: 4"></i>
                                                            Delete</a>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="postinfo pull-left">
                                            <div class="container_reac">
                                                <!-- 1201px -->
                                                <div class="forumc"><i class="fa fa-thumbs-up" aria-hidden="true"></i>
                                                    198</div>
                                                <div class="foruml"><i class="fa fa-comments" aria-hidden="true"></i> 67
                                                </div>
                                                <div class="forumv"><i class="fa fa-eye"></i>
                                                    1,568</div>
                                                <div class="forumt"><i class="fa fa-clock-o"></i> 24 min
                                                </div>
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <!-- POST -->

                                    <div class="blog-pagination">
                                        <ul class="pagination">
                                            <li><a href="#"><i class="align-middle" data-feather="chevron-left"></i></a>
                                            </li>
                                            <li><a href="#">1</a></li>
                                            <li><a href="#">2</a></li>
                                            <li class="active"><a href="#">3</a></li>
                                            <li><a href="#">4</a></li>
                                            <li><a href="#">5</a></li>
                                            <li><a href="#">6</a></li>
                                            <li><a href="#">7</a></li>
                                            <li><a href="#">8</a></li>
                                            <li><a href="#">9</a></li>
                                            <li><a href="#"><i class="align-middle"
                                                        data-feather="chevron-right"></i></a>
                                            </li>
                                        </ul>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>


</x-app-layout>

<!-- get jQuery from the google apis -->
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.js"></script>
<script>
    var $icon = $('.zc-dots-icon');
    $icon.click(function() {
        $icon.next().show();
        $(window).on('click.zcrellistdd', function(e) {
            if ($icon.is(e.target) || $icon.is(e.target.parent)) {
                return;
            }
            $icon.next().hide();
            $(window).off('click.zcrellistdd');
        })
    })

</script>
