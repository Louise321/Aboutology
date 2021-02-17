 <div class="card">
  <table class="table table-striped" > 
      <thead>
          <tr>
              <th style="width:5%;">ID</th>
              <th style="width:20%;">Title</th>
              <th style="width:10%">Type</th>
              <th class="d-none d-md-table-cell" style="width:25%">Description</th>
              <th class="d-none d-md-table-cell" style="width:15%">Created_at</th>
              <th class="d-none d-md-table-cell" style="width:15%">Updated_at</th>
              <th>Actions</th>
          </tr>
      </thead>
      <tbody>
          @foreach ($news as $newsdata)
              <tr>
                  <td>{{ $newsdata->id }}</td>
                  <td><a href="/news/{{ $newsdata->id }}">{{ $newsdata->title }}</a></td>
                  <td>{{$newsdata->news_type}}</td>
                  <td class="descrp">{!! html_entity_decode($newsdata->description) !!}</td> 
                  <td class="d-none d-md-table-cell">{{ $newsdata->created_at }}</td>
                  <td class="d-none d-md-table-cell">{{ $newsdata->updated_at }}</td>
                  <td class="table-action">

                      <form action="{{ route('news.destroy', $newsdata->id) }}" method="POST">

                          <a href="{{ route('news.edit', $newsdata->id) }}">
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
  {!! $news->links('pagination::bootstrap-4') !!}  