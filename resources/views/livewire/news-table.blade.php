<section id="page-breadcrumb">
    <div class="vertical-center sun">
        <div class="container3">
            <div class="row">
                <div class="action">
                    <div class="col-sm-12">
                        <h1 class="title" style="margin-left: 7; margin-top: 5;">News</h1>
                    </div>
                </div>

                <div class="addnew">
                    <div class="button-style">
                        <a href="{{ route('articles.create') }}">
                            <i class="fa fa-plus-circle" aria-hidden="true"></i>Add New
                        </a>
                    </div>
                </div>

                {{-- <form action="{{ route('articles.index') }}" method="GET"
                    role="search">

                    <div class="input-group">
                        <span class="input-group-btn mr-5 mt-1">
                            <button class="btn btn-info" type="submit" title="Search">
                                <span class="fas fa-search"></span>
                            </button>
                        </span>
                        <input type="text" class="form-control mr-2" name="term" placeholder="Search projects"
                            id="term">
                        <a href="{{ route('articles.index') }}" class=" mt-1">
                            <span class="input-group-btn">
                                <button class="btn btn-danger" type="button" title="Refresh page">
                                    <span class="fas fa-sync-alt"></span>
                                </button>
                            </span>
                        </a>
                    </div>
                </form> --}}

            </div>
        </div>
    </div>
</section>

{{-- <div class="col-12 col-xl-12"
    style="margin-left: auto; margin-right: auto; padding-left: 40px; padding-right: 40px;">
    <div class="card">

        @if (Session::has('deleted'))
            <div class="alert alert-success" role="alert">
                {{ Session::get('deleted') }}
            </div>
        @endif

        <table class="table table-striped">
            <thead>
                <tr>
                    <th style="width:5%;">ID</th>
                    <th style="width:20%;">Title</th>
                    <th style="width:20%">Category</th>
                    <th class="d-none d-md-table-cell" style="width:25%">Description</th>
                    <th class="d-none d-md-table-cell" style="width:15%">Created_at</th>
                    <th class="d-none d-md-table-cell" style="width:15%">Updated_at</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($news as $news)
                    <tr>
                        <td>{{ $article->id }}</td>
                        <td><a href="/articles/{{ $article->id }}">{{ $article->title }}</a></td>
                        <td>{{ $article->category }}</td>
                        <td class="descrp">{{ $article->description }}</td>
                        <td class="d-none d-md-table-cell">{{ date_format($article->created_at, 'jS M Y') }}</td>
                        <td class="d-none d-md-table-cell">{{ date_format($article->updated_at, 'jS M Y') }}</td>
                        <td class="table-action">

                            <form action="{{ route('articles.destroy', $article->id) }}" method="POST">

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

{!! $articles->links('pagination::bootstrap-4') !!} --}}

<div class="w-full flex pb-10">
    <div class="w-3/6 mx-1">
        <input wire:model.live="search" type="text"
            class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
            placeholder="Search users...">
    </div>
    <div class="w-1/6 relative mx-1">
        <select wire:model="orderBy"
            class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
            id="grid-state">
            <option value="id">ID</option>
            <option value="title">Title</option>
            <option value="category">Category</option>
            <option value="description">Description</option>
            <option value="created_at">Created At</option>
            <option value="updated_at">Updated At</option>
        </select>
        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
            </svg>
        </div>
    </div>
    <div class="w-1/6 relative mx-1">
        <select wire:model="orderAsc"
            class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
            id="grid-state">
            <option value="1">Ascending</option>
            <option value="0">Descending</option>
        </select>
        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
            </svg>
        </div>
    </div>
    {{-- <div class="w-1/6 relative mx-1">
        <select wire:model="perPage"
            class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
            id="grid-state">
            <option>10</option>
            <option>25</option>
            <option>50</option>
            <option>100</option>
        </select>
        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
            </svg>
        </div>
    </div> --}}
</div>

<table class="table-auto w-full mb-6">
    <thead>
        <tr>
            <th class="px-4 py-2">ID</th>
            <th class="px-4 py-2">Title</th>
            <th class="px-4 py-2">Category</th>
            <th class="px-4 py-2">Description</th>
            <th class="px-4 py-2">Created At</th>
            <th class="px-4 py-2">Updated At</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($news as $new)
            <tr>
                <td class="border px-4 py-2">{{ $new->id }}</td>
                <td class="border px-4 py-2">{{ $new->title }}</td>
                <td class="border px-4 py-2">{{ $new->category }}</td>
                <td class="border px-4 py-2">{{ $new->description }}</td>
                <td class="border px-4 py-2">{{ $new->created_at->diffForHumans() }}</td>
                <td class="border px-4 py-2">{{ $new->updated_at->diffForHumans() }}</td>
            </tr>
        @endforeach
    </tbody>
</table>

{!! $news->links('pagination::bootstrap-4') !!}

