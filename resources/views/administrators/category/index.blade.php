<link href="/css/article/test.css" rel="stylesheet">
<link rel="shortcut icon" href="images/ico/favicon.ico">

<x-admin-layout>

    <section id="page-breadcrumb">
        <div class="vertical-center sun">
            <div class="container3">
                <div class="row">
                    <div class="action">
                        <div class="col-sm-12">
                            <h1 class="title" style="margin-left: 7; margin-top: 5;">Category</h1>
                        </div>
                    </div>

                    <div class="addnew">
                        <div class="button-style">
                            <a href="{{ route('category.create') }}">
                                <i class="fa fa-plus-circle" aria-hidden="true"></i>Add New
                            </a>
                        </div>
                    </div>

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
                        <th style="width:55%">Name</th>
                        <th style="width:15%">Created_At</th>
                        <th style="width:15%">Updated_At</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($category as $cat)
                        <tr>
                            <td>{{ $cat->id }}</td>
                            <td>{{ $cat->name }}</td>
                            <td>{{ date_format($cat->created_at, 'jS M Y') }}</td>
                            <td>{{ date_format($cat->updated_at, 'jS M Y') }}</td>
                          
                            <td class="table-action">

                                <form action="{{ route('category.destroy', $cat->id) }}" method="POST"
                                    style="margin: 0">

                                    <a href="{{ route('category.edit', $cat->id) }}">
                                        <i class="fas fa-edit fa-lg"></i>
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

            {{-- {!! $category->links('pagination::bootstrap-4') !!} --}}

        </div>
    </div>

</x-admin-layout>

<script src="http://code.jquery.com/jquery-3.4.1.js"></script>