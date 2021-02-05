<script src="https://cdn.ckeditor.com/ckeditor5/25.0.0/classic/ckeditor.js"></script>
<x-admin-layout>

    <div class="row">
        <div class="col-12 col-xl-10"
            style="margin-right: auto; margin-left: auto; margin-top: 50px; margin-bottom: 50px;">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Add News</h5>
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

                    <form method="POST" action="{{ route('news.store') }}" enctype="multipart/form-data">

                        @csrf

                        <div class="form-group">
                            <label class="form-label">Title</label>
                            <input type="text" class="form-control" name="title" placeholder="Title Name">
                        </div>
                        <div class="form-group">
                            <label class="form-label">News Type</label>
                            <input type="text" class="form-control" name="news_type" placeholder="News/Events">
                        </div>
                       
                        <div class="form-group">
                            <label class="form-label">Description</label>
                            <textarea class="form-control" id="description" placeholder="Enter the Description"
                                name="description"></textarea>
                        </div>


                        <div class="form-group">
                            <label class="form-label w-100">File input</label> <br>
                            <input type="file" name="file_path">
                        </div>
                        <hr style=" border-top: 2px solid rgb(119, 119, 119);margin-top:35px;">
                        <br/>
                        <input type="checkbox" name="checkbox_event" id="myCheck" value="1" onclick="myFunction()">
                        <label>Is this an event?</label><br/>
                        <div id="text" style="display:none">
                            <!-- Starts At -->
                            <div class="form-group">
                                <label for="starts_at">Starts At</label>
                                <input class="form-control" placeholder="" name="starts_at" type="date" id="starts_at">
                            </div>
                            <!-- Ends At -->
                            <div class="form-group">
                                <label for="ends_at">Ends At</label>
                                <input class="form-control" placeholder="" name="ends_at" type="date" id="ends_at">
                            </div>
                        </div>
                        <br/><br/>
                        <button type="submit" class="btn btn-primary">Add</button>
                        <a class="btn btn-primary btn-close" href="{{ route('news.index') }}">Cancel</a>

                    </form>
                </div>
            </div>
        </div>

<script>

    ClassicEditor.create(document.querySelector('#description'), {
                cloudServices: {
                    tokenUrl: 'https://78158.cke-cs.com/token/dev/1012ba6a1b79ef5b8f4f50ddb21fabbf25b5e464ec32842e6afc48af86a2',
                    uploadUrl: 'https://78158.cke-cs.com/easyimage/upload/'
                }
            })

            .catch(error => {
                console.error(error);
            });

</script>

<script>
    function myFunction() {
    var checkBox = document.getElementById("myCheck");
    var text = document.getElementById("text");
    if (checkBox.checked == true){
        text.style.display = "block";
        /* document.getElementById('gadget_url').value = 'true'; */
    } else {
        text.style.display = "none";
        /* document.getElementById('gadget_url').value = 'false'; */
    }
    }
    </script>
</x-admin-layout>
