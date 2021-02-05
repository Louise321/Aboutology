<script src="https://cdn.ckeditor.com/ckeditor5/25.0.0/classic/ckeditor.js"></script>

<x-admin-layout>

    <div class="row">
        <div class="col-12 col-xl-10"
            style="margin-right: auto; margin-left: auto; margin-top: 50px; margin-bottom: 50px;">
            <div class="card">
                <div class="card-header">
                    <h1 class="card-title">Edit Article</h1>
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

                    <form method="POST" action="{{ route('articles.update', $article->id) }}" enctype="multipart/form-data">

                        @csrf
                        @method('PATCH')

                        <div class="form-group">
                            <label class="form-label">Title</label>
                            <input type="text" class="form-control" name="title" placeholder="Title Name"
                                value="{{ $article->title }}">
                        </div>

                        {{-- <div class="form-group">
                            <label class="form-label">Category</label>
                            <input type="text" class="form-control" name="category" placeholder="Category"
                                value="{{ $article->category }}">
                        </div> --}}

                        <label class="form-label">Category</label>
                        <select class="form-control" name="category_id">

                            <option value="">Select Category</option>

                            {{-- @foreach ($testing123 as $test)
                                @foreach($cat as $category)
                                    <option value="{{$category->id}}" {{ $category->category_id == $test->category_id ? 'selected' : ''}}>{{$category->category->name}}
                                    </option>
                                @endforeach
                            @endforeach --}}
                            
                            @foreach($cat_list as $category)
                                    <option value="{{$category->id}}" 
                                        @if ($category->id === $article->category_id)
                                            selected
                                        @endif
                                    >
                                        {{$category->name}}
                                    </option>
                            @endforeach

                        </select>

                        <div class="form-group">
                            <br>
                            <label class="form-label w-100">File input</label> 
                            <input type="file" name="file_path" value="{{ $article->file_path }}">
                        </div>


                        <div class="form-group">
                            <label class="form-label">Description</label>
                            <textarea class="form-control" id="description" placeholder="Enter the Description" name="description">
                                {!! html_entity_decode($article->description) !!}
                            </textarea>
                        </div>
                        
                        {{-- <div class="form-group">
                            <label class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input">
                                <span class="custom-control-label">Check me out</span>
                            </label>
                        </div> --}}

                        <button type="submit" class="btn btn-primary">Update</button>
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