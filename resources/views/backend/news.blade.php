@extends('backend.dash')

@section('dash-content')
<div class="container-fluid">
    <div class="card">
      <div class="card-body">
        
        @if (Session::has('news_add_success'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('news_add_success') }}
        </div>
        @endif

        @if (Session::has('news_updated_success'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('news_updated_success') }}
        </div>
        @endif

        <div class="campaign-card-top">
            <h5 class="card-title fw-semibold mb-4">Latest News</h5>
            
            <!-- Button trigger modal -->
            <a href="{{ route('dash.news.add.new.form') }}" type="button" class="btn btn-primary">
                Add News
            </a>

        </div>

        <table class="table table-hover">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">News Title</th>
              <th scope="col">Post Date</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
           
            @php
                $i = 1;
            @endphp
          
          @foreach ($all_news as $single_news)
          <tr>
            <th scope="row">{{ $i++ }}</th>
            <td>{{ $single_news->title }}</td>
          
            <td>{{ $single_news->post_date }}</td>
            <td> <a href="{{ URL::to('news-edit-form/'.$single_news->id) }}">Edit</a> || <a href="{{ URL::to('news-delete/'.$single_news->id) }}" onclick="return confirm('Are you sure to Delete')">Delete</a></td>
          </tr> 
          @endforeach
            
          </tbody>
      </table>
       
      </div>
    </div>
</div>
@endsection