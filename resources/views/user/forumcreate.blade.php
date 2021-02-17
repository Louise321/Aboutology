
<!-- Styles -->
{{-- <link rel="stylesheet" href="{{ asset('css/app2.css') }}">
<script src="{{ asset('js/app2.js') }}" defer></script>


<x-app-layout>


    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Create Post</div>
                    <div class="card-body">
                        <form method="post" action="{{ route('forum.store') }}">
                            <div class="form-group">
                                @csrf
                                <label class="label">Forum Title: </label>
                                <input type="text" name="title" class="form-control" required/>
                            </div>
                            <div class="form-group">
                                <label class="label">Forum Content: </label>
                                <textarea name="content" rows="20" cols="30" class="form-control" required></textarea>
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-success" />
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout> --}}

<script src="https://cdn.ckeditor.com/ckeditor5/25.0.0/classic/ckeditor.js"></script>

<x-app-layout>

    <div class="row">
        <div class="col-12 col-xl-10"
            style="margin-right: auto; margin-left: auto; margin-top: 50px; margin-bottom: 50px;">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Create New Forum</h5>
                </div>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div><br />
                @endif

                @if (Session::has('success'))
                    <div class="alert alert-success" role="alert">
                        {{ Session::get('success') }}
                    </div>
                @endif

                <div class="card-body">

                    <form method="POST" action="{{ route('forums.store') }}" enctype="multipart/form-data">

                        @csrf

                        <div class="form-group">
                            <label class="form-label">Title</label>
                            <input type="text" class="form-control" name="title" placeholder="Title Name">
                        </div>

                        <div class="form-group">
                            <label class="form-label">Category</label>

                            <select class="form-control" name="category_id">

                                <option value="">Select Category</option>

                                @foreach ($cat_list as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}
                                    </option>
                                @endforeach

                            </select>
                        </div>

                        <div class="form-group">
                            <label class="form-label w-100">Image Upload</label> <br>
                            <input type="file" name="file_path">
                        </div>

                        <div class="form-group">
                            <label class="form-label">Content</label>
                            
                            <textarea class="form-control" id="content" placeholder="Enter the Content"
                                name="content"></textarea>
                        </div>
                        
                        <button type="submit" class="btn btn-primary">Add</button>
                        <a class="btn btn-primary btn-close" href="{{ route('forums.index') }}">Cancel</a>

                    </form>
                </div>
            </div>
        </div>

</x-app-layout>

<script>

    ClassicEditor
        
        .create(document.querySelector('#content'), {
                cloudServices: {
                    tokenUrl: 'https://78158.cke-cs.com/token/dev/1012ba6a1b79ef5b8f4f50ddb21fabbf25b5e464ec32842e6afc48af86a2',
                    uploadUrl: 'https://78158.cke-cs.com/easyimage/upload/'
                }
            })

            .catch(error => {
                console.error(error);
            });

</script>
