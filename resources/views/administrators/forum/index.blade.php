<link href="/css/article/test.css" rel="stylesheet">
<link rel="shortcut icon" href="images/ico/favicon.ico">

<x-admin-layout>

    <section id="page-breadcrumb">
        <div class="vertical-center sun">
            <div class="container3">
                <div class="row">
                    <div class="action">
                        <div class="col-sm-12">
                            <h1 class="title" style="margin-left: 7; margin-top: 5;">Forum</h1>
                        </div>
                    </div>

                    <form action="{{ route('aforum.index') }}" method="GET" role="filter" style="margin-top: 10; position:relative;">
                        <div class="input-group" style="padding-left:50px;">
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

                    <form action="{{ route('aforum.index') }}" method="GET" role="search" style="margin-top: 10; position:relative;">
 
                        <div class="input-group">
                            <a href="{{ route('aforum.index') }}" class=" mt-1">
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
                    @foreach ($forum as $forumss)
                        <tr>
                            <td>{{ $forumss->id }}</td>
                            <td>{{ $forumss->title }}</td>
                            <td>{{ $forumss->category->name }}</td>
                            <td class="descrp">{!! html_entity_decode($forumss->content) !!}</td> 
                            <td>{{ $forumss->views }}</td>
                            <td>{{ date_format($forumss->created_at, 'jS M Y') }}</td>
                            <td>{{ date_format($forumss->updated_at, 'jS M Y') }}</td>
                            <td class="table-action">

                                <form action="{{ route('aforum.destroy', $forumss->id) }}" method="POST"
                                    style="margin: 0">

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" title="delete"
                                        style="border: none; backsground-color:transparent;">
                                        <i class="fas fa-trash-alt fa-lg"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {!! $forum->links('pagination::bootstrap-4') !!}
        
    </div>
       

</x-admin-layout>

<script src="http://code.jquery.com/jquery-3.4.1.js"></script>
