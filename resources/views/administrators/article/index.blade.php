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

                    <form action="{{ route('articles.index') }}" method="GET" role="filter" style="margin-top: 10; position:relative">
                        <div class="input-group">
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
                            </div>
                            <!-- Testing end  -->
                         </form>

                    <form action="{{ route('articles.index') }}" method="GET" role="search" style="margin-top: 10; position:relative;">
 
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

    @if (Session::has('deleted'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('deleted') }}
        </div>
    @endif

    <div class="col-12 col-md-12" style="margin-left: auto; margin-right: auto; padding-left: 40px; padding-right: 40px;">
        <div class="card">

            <table class="table fixed table-striped">
                <thead>
                    <tr>
                        <th style="width:5%;">ID</th>
                        <th style="width:20%">Name</th>
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

        {!! $articles->links('pagination::bootstrap-4') !!}

    </div>

</x-admin-layout>

<script src="http://code.jquery.com/jquery-3.4.1.js"></script>