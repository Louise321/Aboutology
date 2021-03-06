<script src="https://cdn.ckeditor.com/ckeditor5/25.0.0/classic/ckeditor.js"></script>

<x-admin-layout>

    <div class="row">
        <div class="col-12 col-xl-10"
            style="margin-right: auto; margin-left: auto; margin-top: 50px; margin-bottom: 50px;">
            <div class="card">
                <div class="card-header">
                    <h1 class="card-title">Edit Category</h1>
                </div>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    <br />
                @endif

                @if (Session::has('updated'))
                    <div class="alert alert-success" role="alert">
                        {{ Session::get('updated') }}
                    </div>
                @endif

                <div class="card-body">

                    <form method="POST" action="{{ route('category.update', $category->id) }}" enctype="multipart/form-data">

                        @csrf
                        @method('PATCH')

                        <div class="form-group">
                            <label class="form-label">Category Name</label>
                            <input type="text" class="form-control" name="name" placeholder="Category Name" value="{{ $category->name }}">
                        </div>

                        <button type="submit" class="btn btn-primary">Update</button>
                        <a class="btn btn-primary btn-close" href="{{ route('category.index') }}">Cancel</a>

                    </form>
                </div>
            </div>
        </div>

</x-admin-layout>

<script>
    ClassicEditor

        .create(document.querySelector('#description'), {
            cloudServices: {
                tokenUrl: 'https://78158.cke-cs.com/token/dev/1012ba6a1b79ef5b8f4f50ddb21fabbf25b5e464ec32842e6afc48af86a2',
                uploadUrl: 'https://78158.cke-cs.com/easyimage/upload/'
            }
        })

        .catch(error => {
            console.error(error);
        });

</script>