<script src="https://cdn.ckeditor.com/ckeditor5/25.0.0/classic/ckeditor.js"></script>

<x-admin-layout>

    <div class="row">
        <div class="col-12 col-xl-10"
            style="margin-right: auto; margin-left: auto; margin-top: 50px; margin-bottom: 50px;">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Add Article</h5>
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

                    <form method="POST" action="{{ route('articles.store') }}" enctype="multipart/form-data">

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
                            <label class="form-label w-100">File input</label> <br>
                            <input type="file" name="file_path">
                        </div>

                        <div class="form-group">
                            <label class="form-label">Description</label>
                            {{-- <textarea class="form-control" name="description"
                                placeholder="Description. . ." rows="10"></textarea> --}}
                            <textarea class="form-control" id="description" placeholder="Enter the Description"
                                name="description"></textarea>
                        </div>
                        {{-- <div class="form-group">
                            <label class="form-label w-100">File input</label>
                            <input type="file">
                            <small class="form-text text-muted">Example block-level help text here.</small>
                        </div>
                        <div class="form-group">
                            <label class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input">
                                <span class="custom-control-label">Check me out</span>
                            </label>
                        </div> --}}
                        <button type="submit" class="btn btn-primary">Add</button>
                        <a class="btn btn-primary btn-close" href="{{ route('articles.index') }}">Cancel</a>

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
