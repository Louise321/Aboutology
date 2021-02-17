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