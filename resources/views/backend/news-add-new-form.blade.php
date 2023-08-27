@extends('backend.dash')

@section('dash-content')
<div class="container-fluid">
    <div class="card">
      <div class="card-body">
        
        <h3>Add New News</h3>

        <form action="{{ route('dash.news.add.new.form.process') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3 mt-5">
                <label for="news-title" class="form-label">News Title</label>
                <input type="text" class="form-control" id="news-title" name="news_title" pattern="[A-Za-z\s]+[0-9]*" title="Please start with letters first" required>
            </div>
            <div class="mb-3">
                <label for="news-description" class="form-label">News Description</label><br/>
                <textarea name="news_description" class="form-control" id="news-description" cols="30" rows="10"></textarea>
            </div>

            <div class="mb-3">
                <label for="post-date" class="form-label">News Description</label><br/>
                <input type="date" name="post_date" id="post-date" class="form-control">
            </div>


            <div class="mb-3 mt-5">
                <label for="news-thumbnail" class="form-label">News Thumbnail</label>
                <input type="file" class="form-control" id="news-thumbnail" name="news_thumbnail" accept="image/*" required>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      
      </div>
    </div>
</div>
@endsection