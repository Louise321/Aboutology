<x-admin-layout>

      <div class="row">
        <div class="col-12 col-xl-10"
            style="margin-right: auto; margin-left: auto; margin-top: 50px; margin-bottom: 50px;">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title" style="font-weight: 400;font-size: 26px;padding:20px 20px 0;
                    color: #495057;">Edit Banner</h3>
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
  
                @if(Session::has('flash_message_success'))
                    <div class="alert alert-success alert-block">
                        <button type="button" class="close" data-dismiss="alert"></button> 
                            <strong>{!! session('flash_message_success') !!}</strong>
                    </div>
                @endif
  
                <div class="card-body">
  
                    <form method="POST" action="{{ route('banners.update', $bannerDetails->id) }}" enctype="multipart/form-data">
  
                        @csrf
  
                        <div class="form-group">
                            <label class="form-label">Title</label>
                            <input type="text" class="form-control" name="title" id="title" value="{{ $bannerDetails->title }}">

                        </div>
                        <div class="form-group">
                          <label class="form-label">Link</label>
                          <input type="text" class="form-control" name="link" value="{{ $bannerDetails->link }}">
                        </div>
                        <div class="form-group">
                          <label class="form-label">Alternate Text</label>
                          <input type="text" class="form-control" name="alt"  value="{{ $bannerDetails->alt }}">
                        </div>
  
                        <div class="form-group">
                            <label class="form-label w-100">Image upload</label> <br>
                            <input type="file" name="image" id="image">
                        </div>
                        <div><img style="width:280px;margin-top:10px;" src="{{asset('uploads/banners_image/'.$bannerDetails->image)}}">
                        
                        
                        </div>
                        <div class="control-group">
                            <div class="controls">
                              <input type="checkbox" name="status" id="status" value="1" @if($bannerDetails->status=="1") checked @endif><label class="control-label">Enable</label>
                          </div>
                      </div>
                      <div class="form-actions">
                       {{--  <input type="submit" value="Edit Banner" class="btn btn-success"> --}}
                        <button type="submit" class="btn btn-primary">Update</button>
                        <a class="btn btn-primary btn-close" href="{{ route('banners.index') }}">Cancel</a>
                      </div>
      {{--  --}}
</x-admin-layout>