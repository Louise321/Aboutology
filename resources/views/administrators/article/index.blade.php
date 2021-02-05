<link href="/css/article/test.css" rel="stylesheet">
<link rel="shortcut icon" href="images/ico/favicon.ico">

<x-admin-layout>

    <section id="page-breadcrumb">
        <div class="vertical-center sun">
            <div class="container3">
                <div class="row">
                    <div class="action">
                        <div class="col-sm-12">
                            <h1 class="title" style="margin-left: 7; margin-top: 5;">Article</h1>
                        </div>
                    </div>

                    <div class="addnew">
                        <div class="button-style">
                            <a href="{{ route('articles.create') }}">
                                <i class="fa fa-plus-circle" aria-hidden="true"></i>Add New
                            </a>
                        </div>
                    </div>

                    <form action="{{ route('articles.index') }}" method="GET" role="filter" style="width: 200">

                        <select class="form-control" name="category_id">

                            <option value="">Select Category</option>

                            @foreach ($cat_list as $item)
                                <option value="{{ $item->id }}"
                                    {{ $item->id == $selected_id['category_id'] ? 'selected' : '' }}>{{ $item->name }}
                                </option>
                            @endforeach


                        </select>
                            <!-- Testing button from search bar -->
                            <span class="input-group-btn mt-1">
                                <button class="btn " type="submit" title="Search">
                                    <span class="fas fa-search"></span>
                                </button>
                            </span>

                            <!-- Testing end  -->
                         </form>

                    <form action="{{ route('articles.index') }}" method="GET" role="search" style="margin-top: 10; position:relative; left: 400">
 
                        <div class="input-group">
                            <a href="{{ route('articles.index') }}" class=" mt-1">
                                <span class="input-group-btn">
                                    <button class="btn" type="button" title="Refresh page">
                                        <span class="fas fa-sync-alt"></span>
                                    </button>
                                </span>
                            </a>

                            <input type="text" class="form-control" name="term" placeholder="Search projects" id="term">

                            <span class="input-group-btn mt-1">
                                <button class="btn " type="submit" title="Search">
                                    <span class="fas fa-search"></span>
                                </button>
                            </span>

                        </div>
                    </form>

                </div>
            </div>
        </div>
    </section>
    <!--/#action-->

    {{-- <div class="addnew">
        <div class="button-style">
            <a href="{{ route('articles.create') }}">
                <i class="fa fa-plus-circle" aria-hidden="true"></i>Add New
            </a>
        </div>
    </div> --}}

    {{-- @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif --}}

    {{-- <section id="blog" class="padding-top">
        <div class="container2">
            <div class="row">

                <div class="col-md-3 col-sm-5" style="padding-left: 30px; padding-right: 50px;">
                    <div class="sidebar2 blog-sidebar">
                        <div class="sidebar2-item categories">
                            <h3>Categories</h3>
                            <ul class="nav2 navbar-stacked">
                                <li><a href="#">Lorem ipsum<span class="pull-right">(1)</span></a></li>
                                <li class="active"><a href="#">Dolor sit amet<span class="pull-right">(8)</span></a>
                                </li>
                                <li><a href="#">Adipisicing elit<span class="pull-right">(4)</span></a></li>
                                <li><a href="#">Sed do<span class="pull-right">(9)</span></a></li>
                                <li><a href="#">Eiusmod<span class="pull-right">(3)</span></a></li>
                                <li><a href="#">Mockup<span class="pull-right">(4)</span></a></li>
                                <li><a href="#">Ut enim ad minim <span class="pull-right">(2)</span></a></li>
                                <li><a href="#">Veniam, quis nostrud <span class="pull-right">(8)</span></a></li>
                            </ul>
                        </div>

                        <div class="sidebar2-item  recent">
                            <h3>Recent Posts</h3>
                            <div class="media">
                                <div class="pull-left">
                                    <a href="#"><img class="img-recent" src="/img/cat.png" alt=""></a>
                                </div>
                                <div class="media-body">
                                    <h4><a href="#">{{ $article->title }}</a></h4>
                                    <p>{{ date_format($article->created_at, 'jS M Y') }}</p>
                                </div>
                            </div>
                            <div class="media">
                                <div class="pull-left">
                                    <a href="#"><img class="img-recent" src="/img/cat.png" alt=""></a>
                                </div>
                                <div class="media-body">
                                    <h4><a href="#">Lorem ipsum dolor sit amet consectetur adipisicing elit,</a></h4>
                                    <p>posted on 07 March 2014</p>
                                </div>
                            </div>
                            <div class="media">
                                <div class="pull-left">
                                    <a href="#"><img class="img-recent" src="/img/cat.png" alt=""></a>
                                </div>
                                <div class="media-body">
                                    <h4><a href="#">Lorem ipsum dolor sit amet consectetur adipisicing elit,</a></h4>
                                    <p>posted on 07 March 2014</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                @if (Session::has('deleted'))
                    <div class="alert alert-success" role="alert">
                        {{ Session::get('deleted') }}
                    </div>
                @endif

                <div class="col-md-9 col-sm-7" style="padding-right: 30px;">
                    <div class="row">
                        @foreach ($articles->chunk(2) as $chunk)
                            @foreach ($chunk as $article)

                                <div class="col-md-6 col-sm-12 blog-padding-right">
                                    <div class="single-blog two-column">
                                        <div class="post-thumb">
                                            <a href="/articles/{{ $article->id }}"><img src="/img/01.jpg"
                                                    class="img-responsive" alt=""></a>
                                            <div class="post-overlay">
                                            </div>
                                        </div>

                                        <div class="post-content overflow">
                                            <h2 class="post-title bold"><a
                                                    href="/articles/{{ $article->id }}">{{ $article->title }}</a></h2>
                                            <h3 class="articledate">{{ date_format($article->created_at, 'jS M Y') }}
                                            </h3>
                                            <p class="articledesc">{{ $article->description }}</p>
                                            <a href="#" class="read-more">View More</a>
                                            <div class="post-bottom overflow">
                                                <ul class="nav nav-justified post-nav">
                                                    <li><a href="#"><i class="fas fa-eye"></i>58 Views</a></li>
                                                    <li><a href="#"><i class="fas fa-thumbs-up"></i>30 Likes</a></li>
                                                    <li><a href="#"><i class="fas fa-thumbs-down"></i>5 Dislikes</a>
                                                    </li>

                                                    <div class="btn-group btn-group-sm" style="margin-left: 70">
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
                                                    </div>

                                                </ul>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                            @endforeach
                        @endforeach

                        {!! $articles->links('pagination::bootstrap-4') !!}

                        <div class="col-md-6 col-sm-12 blog-padding-right">
                            <div class="single-blog two-column">
                                <div class="post-thumb">
                                    <a href="blogdetails.html"><img src="/img/01.jpg" class="img-responsive" alt=""></a>
                                    <div class="post-overlay">
                                    </div>
                                </div>

                                @foreach ($articles as $article)

                                    <div class="post-content overflow">
                                        <h2 class="post-title bold"><a href="blogdetails.html">{{ $article->title }}</a>
                                        </h2>
                                        <h3 class="post-author"><a
                                                href="#">{{ date_format($article->created_at, 'jS M Y') }}</a></h3>
                                        <p>{{ $article->description }}</p>
                                        <a href="#" class="read-more">View More</a>
                                        <div class="post-bottom overflow">
                                            <ul class="nav nav-justified post-nav">
                                                <li><a href="#"><i class="fas fa-eye"></i>58 Views</a></li>
                                                <li><a href="#"><i class="fas fa-thumbs-up"></i>30 Likes</a></li>
                                                <li><a href="#"><i class="fas fa-thumbs-down"></i>5 Dislikes</a></li>

                                                <div class="btn-group btn-group-sm" style="margin-left: 70">
                                                    <button class="align-middle" data-toggle="dropdown"
                                                        aria-haspopup="true" aria-expanded="false">
                                                        <i class="fas fa-ellipsis-h"></i>
                                                    </button>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item align-middle"
                                                            href="{{ route('articles.edit', $article->id) }}"><i
                                                                class="far fa-edit"></i> Edit</a>

                                                        <form action="{{ route('articles.destroy', $article->id) }}"
                                                            method="POST">

                                                            @csrf
                                                            @method('DELETE')

                                                            <a class="dropdown-item align-middle"
                                                                href="{{ route('articles.destroy', $article->id) }}"><i
                                                                    class="fas fa-trash-alt"
                                                                    style="margin-right: 4"></i> Delete</a>

                                                        </form>

                                                    </div>
                                                </div>

                                            </ul>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="col-md-6 col-sm-12 blog-padding-right">
                            <div class="single-blog two-column">
                                <div class="post-thumb">
                                    <a href="blogdetails.html"><img src="/img/01.jpg" class="img-responsive" alt=""></a>
                                    <div class="post-overlay">
                                    </div>
                                </div>
                                <div class="post-content overflow">
                                    <h2 class="post-title bold"><a href="blogdetails.html">Advanced business cards
                                            design</a></h2>
                                    <h3 class="post-author"><a href="#">Posted by micron News</a></h3>
                                    <p>Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie
                                        consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan
                                        et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis
                                        dolore te feugait nulla facilisi. Nam liber [...]</p>
                                    <a href="#" class="read-more">View More</a>
                                    <div class="post-bottom overflow">
                                        <ul class="nav nav-justified post-nav">
                                            <li><a href="#"><i class="fas fa-eye"></i>58 Views</a></li>
                                            <li><a href="#"><i class="fas fa-thumbs-up"></i>30 Likes</a></li>
                                            <li><a href="#"><i class="fas fa-thumbs-down"></i>5 Dislikes</a></li>

                                            <div class="btn-group btn-group-sm" style="margin-left: 70">
                                                <button class="align-middle" data-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false">
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

                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12 blog-padding-right">
                            <div class="single-blog two-column">
                                <div class="post-thumb">
                                    <a href="blogdetails.html"><img src="/img/01.jpg" class="img-responsive" alt=""></a>
                                    <div class="post-overlay">
                                    </div>
                                </div>
                                <div class="post-content overflow">
                                    <h2 class="post-title bold"><a href="blogdetails.html">Advanced business cards
                                            design</a></h2>
                                    <h3 class="post-author"><a href="#">Posted by micron News</a></h3>
                                    <p>Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie
                                        consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan
                                        et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis
                                        dolore te feugait nulla facilisi. Nam liber [...]</p>
                                    <a href="#" class="read-more">View More</a>
                                    <div class="post-bottom overflow">
                                        <ul class="nav nav-justified post-nav">
                                            <li><a href="#"><i class="fas fa-eye"></i>58 Views</a></li>
                                            <li><a href="#"><i class="fas fa-thumbs-up"></i>30 Likes</a></li>
                                            <li><a href="#"><i class="fas fa-thumbs-down"></i>5 Dislikes</a></li>

                                            <div class="btn-group btn-group-sm" style="margin-left: 70">
                                                <button class="align-middle" data-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false">
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

                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12 blog-padding-right">
                            <div class="single-blog two-column">
                                <div class="post-thumb">
                                    <a href="blogdetails.html"><img src="/img/01.jpg" class="img-responsive" alt=""></a>
                                    <div class="post-overlay">
                                    </div>
                                </div>
                                <div class="post-content overflow">
                                    <h2 class="post-title bold"><a href="blogdetails.html">Advanced business cards
                                            design</a></h2>
                                    <h3 class="post-author"><a href="#">Posted by micron News</a></h3>
                                    <p>Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie
                                        consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan
                                        et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis
                                        dolore te feugait nulla facilisi. Nam liber [...]</p>
                                    <a href="#" class="read-more">View More</a>
                                    <div class="post-bottom overflow">
                                        <ul class="nav nav-justified post-nav">
                                            <li><a href="#"><i class="fas fa-eye"></i>58 Views</a></li>
                                            <li><a href="#"><i class="fas fa-thumbs-up"></i>30 Likes</a></li>
                                            <li><a href="#"><i class="fas fa-thumbs-down"></i>5 Dislikes</a></li>

                                            <div class="btn-group btn-group-sm" style="margin-left: 70">
                                                <button class="align-middle" data-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false">
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

                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12 blog-padding-right">
                            <div class="single-blog two-column">
                                <div class="post-thumb">
                                    <a href="blogdetails.html"><img src="/img/01.jpg" class="img-responsive" alt=""></a>
                                    <div class="post-overlay">
                                    </div>
                                </div>
                                <div class="post-content overflow">
                                    <h2 class="post-title bold"><a href="blogdetails.html">Advanced business cards
                                            design</a></h2>
                                    <h3 class="post-author"><a href="#">Posted by micron News</a></h3>
                                    <p>Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie
                                        consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan
                                        et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis
                                        dolore te feugait nulla facilisi. Nam liber [...]</p>
                                    <a href="#" class="read-more">View More</a>
                                    <div class="post-bottom overflow">
                                        <ul class="nav nav-justified post-nav">
                                            <li><a href="#"><i class="fas fa-eye"></i>58 Views</a></li>
                                            <li><a href="#"><i class="fas fa-thumbs-up"></i>30 Likes</a></li>
                                            <li><a href="#"><i class="fas fa-thumbs-down"></i>5 Dislikes</a></li>

                                            <div class="btn-group btn-group-sm" style="margin-left: 70">
                                                <button class="align-middle" data-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false">
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

                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="blog-pagination">
                        <ul class="pagination">
                            <li><a href="#"><i class="align-middle" data-feather="chevron-left"></i></a></li>
                            <li><a href="active">1</a></li>
                            <li><a href="#">2</a></li>
                            <li class="#"><a href="#">3</a></li>
                            <li><a href="#">4</a></li>
                            <li><a href="#">5</a></li>
                            <li><a href="#">6</a></li>
                            <li><a href="#">7</a></li>
                            <li><a href="#">8</a></li>
                            <li><a href="#">9</a></li>
                            <li><a href="#"><i class="align-middle" data-feather="chevron-right"></i></a></li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </section> --}}
    <!--/#blog-->

    @if (Session::has('deleted'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('deleted') }}
        </div>
    @endif

    <div class="col-12 col-md-12">
        <div class="card">

            <table class="table fixed table-striped">
                <thead>
                    <tr>
                        <th style="width:5%;">ID</th>
                        <th style="width:15%">Name</th>
                        <th style="width:15%">Category</th>
                        <th style="width:20%">Description</th>
                        <th style="width:10%;">Views</th>
                        <th style="width:10%">Created_At</th>
                        <th style="width:10%">Updated_At</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($articles as $article)
                        <tr>
                            <td>{{ $article->id }}</td>
                            <td><a href="/articles/{{ $article->id }}">{{ $article->title }}</a></td>
                            <td>{{ $article->category->name }}</td>
                             <td class="descrp">{!! html_entity_decode($article->description) !!}</td> 
                            <td>{{ $article->views }}</td>
                            <td>{{ date_format($article->created_at, 'jS M Y') }}</td>
                            <td>{{ date_format($article->updated_at, 'jS M Y') }}</td>
                            <td class="table-action">

                                <form action="{{ route('articles.destroy', $article->id) }}" method="POST"
                                    style="margin: 0">

                                    <a href="{{ route('articles.edit', $article->id) }}">
                                        <i class="fas fa-edit  fa-lg"></i>
                                    </a>

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" title="delete"
                                        style="border: none; background-color:transparent;">
                                        <i class="fas fa-trash-alt fa-lg"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    {!! $articles->links('pagination::bootstrap-4') !!}

</x-admin-layout>

{{-- @endsection --}}

{{-- <script type="text/javascript" src="js/article/jquery.js"></script>
<script type="text/javascript" src="js/article/bootstrap.min.js"></script>
<script type="text/javascript" src="js/article/lightbox.min.js"></script>
<script type="text/javascript" src="js/article/wow.min.js"></script>
<script type="text/javascript" src="js/article/main.js"></script> --}}

<script src="http://code.jquery.com/jquery-3.4.1.js"></script>
