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

                                                <li><a href="{{ route('forums.index') }}">All<span
                                                            class="pull-right"></span></a></li>

                                                @foreach ($cat as $category)
                                                    <li class="{{ $category->category_id == $cat_id ? 'active' : '' }}"><a href="{{ route('forum-cat', $category->category_id) }}">{{ $category->category->name }}<span
                                                                class="pull-right"></span></a></li>
                                                @endforeach

                                            </ul>
                                        </div>

                                        {{-- Recent Post --}}

                                        <div class="sidebar2-item  recent">
                                            <h3>Popular Posts</h3>


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

                                    @foreach ($testing123->chunk(2) as $chunk)
                                        @foreach ($chunk as $forumss)
        
                                        <!-- POST -->
                                        <div class="post">
                                            <div class="wrap-ut pull-left">
                                                <div class="userinfo pull-left" style="margin-top:3%;">
                                                    <div class="avatar">
                                                        {{-- <img alt="" src="{{asset('uploads/profilePic/'.$forumss->pic)}}"
                                                        class="avatar img-fluid rounded mr-1" width="128"
                                                        height="128" /> --}}
                                                        
                                                        <img alt="" src="{{asset('uploads/profilePic/'.$forumss->pic)}}"
                                                        class="avatar" style="height:50px; width:50px;" />
                                                    </div>
                                                </div>

                                                <div class="posttext pull-left" style="height:150px;">
                                                
                                                    <h2><a href="{{ route('forums.show', $forumss->id) }}">{{ $forumss->title }}</a></h2>
                                                    <div class="descrp">
                                                        {!! html_entity_decode($forumss->content) !!}
                                                    </div>

                                                </div>
                                                <div class="clearfix"></div>
                                            </div>
                                            <div class="postinfo pull-left">
                                                <div class="container_reac">
                                                    <!-- 1201px -->
                                                    {{-- <div class="forumc"><i class="fa fa-thumbs-up" aria-hidden="true"></i>
                                                        198
                                                    </div> --}}
                                                    
                                                    
                                                    {{-- <div class="foruml"><i class="fa fa-comments" aria-hidden="true"></i>
                                                        Comments:{{ }}
                                                    </div> --}}
                                                   

                                                    {{-- <div class="foruml"><i class="fa fa-comments" aria-hidden="true"></i>
                                                        200
                                                    </div>

                                                    @foreach($commentCount as $comment)
                                                        <div class="foruml"><i class="fa fa-comments" aria-hidden="true"></i>
                                                            Count: {{ $comment }}
                                                        </div>
                                                    @endforeach --}}

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
                                    @endforeach

                                    {!! $forum->links('pagination::bootstrap-4') !!}

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

                                                <li><a href="{{ route('forums.index') }}">All<span
                                                            class="pull-right"></span></a></li>

                                                @foreach ($cat as $category)
                                                    <li class="{{ $category->category_id == $cat_id ? 'active' : '' }}"><a href="{{ route('forum-cat', $category->category_id) }}">{{ $category->category->name }}<span
                                                                class="pull-right"></span></a></li>
                                                @endforeach

                                            </ul>
                                        </div>

                                        {{-- Recent Post --}}

                                        <div class="sidebar2-item  recent">
                                            <h3>Popular Posts</h3>

                                            @foreach ($data as $latest)
                                                <div class="media">
                                                    <!-- <div class="pull-left">
                                                        <a href="{{ route('forums.show', $latest->id) }}"><img class="img-recent" src="img/cat.png" alt=""></a>
                                                    </div> -->
                                                    <div class="media-body">
                                                        <h4><a
                                                                href="{{ route('forums.show', $latest->id) }}">{{ $latest->title }}</a>
                                                        </h4>
                                                        <p>{{ date_format($latest->created_at, 'jS M Y') }}</p>
                                                    </div>
                                                </div>
                                            @endforeach

                                        </div>
                                    </div>
                                </div>

                                {{-- My Forum --}}

                                <div class="col-md-9 col-sm-7">

                                    @foreach ($myforum as $forumss)
        
                                        <!-- POST -->
                                        <div class="post">
                                            <div class="wrap-ut pull-left">
                                                <div class="userinfo pull-left">
                                                    <div class="avatar">
                                                        {{-- <img alt="" src="{{asset('uploads/profilePic/'.$forumss->pic)}}"
                                                        class="avatar img-fluid rounded mr-1" width="128"
                                                        height="128" /> --}}
                                                        <img alt="" src="{{asset('uploads/profilePic/'.App\Http\Controllers\ProfileController::userProfile()->profilepic_path)}}"
                                                        class="avatar" style="height:50px; width:50px;" />
                                                    </div>
                                                </div>

                                                <div class="posttext pull-left">
                                                
                                                    <h2><a href="{{ route('forums.show', $forumss->id) }}">{{ $forumss->title }}</a></h2>
                                                    <div class="descrp">
                                                        {!! html_entity_decode($forumss->content) !!}
                                                    </div>

                                                    <div class="btn-group btn-group-sm" style="float:right">
                                                        <button class="align-middle" data-toggle="dropdown"
                                                            aria-haspopup="true" aria-expanded="false">
                                                            <i class="fas fa-ellipsis-h"></i>
                                                        </button>
                                                        <div class="dropdown-menu">
                                                            <a class="dropdown-item align-middle" href="{{ route('forums.edit', $forumss->id) }}">
                                                                <i class="far fa-edit"></i> 
                                                                Edit
                                                            </a>

                                                            <form method="POST" action="{{ route('forums.destroy', $forumss->id) }}">

                                                                @csrf
                                                                @method('DELETE')
                                                                
                                                                <button type="submit" class="dropdown-item align-middle"><i class="fas fa-trash-alt"></i> Delete</button>

                                                            </form>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="clearfix"></div>
                                            </div>
                                            <div class="postinfo pull-left">
                                                <div class="container_reac">
                                                    <!-- 1201px -->
                                                    {{-- <div class="forumc"><i class="fa fa-thumbs-up" aria-hidden="true"></i>
                                                        198
                                                    </div> --}}
                                                    {{-- 
                                                    @foreach ( $commentCount as $count )
                                                    <div class="foruml"><i class="fa fa-comments" aria-hidden="true"></i>
                                                        {{ $count->comment_count }}
                                                    </div>
                                                    @endforeach --}}

                                                    {{-- @foreach($commentCount as $comment) --}}
                                                        {{-- <div class="foruml"><i class="fa fa-comments" aria-hidden="true"></i>
                                                            {{ 'Count: ',$commentCount->count() }}
                                                        </div> --}}
                                                    {{-- @endforeach --}}

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

                                    {{-- {!! $myforum->links('pagination::bootstrap-4') !!} --}}

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