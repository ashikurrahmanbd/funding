@extends('backend.dash')

@section('dash-content')
<div class="container-fluid">
    <div class="card">
      <div class="card-body">
        
        <h3>Add New Campaign</h3>

        @if ($errors->any())
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif

        <form action="{{ route('add-new-campaign') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3 mt-5">
                <label for="campaign-title" class="form-label">Campaign Title</label>
                <input type="text" class="form-control" id="campaign-title" name="campaign_title" pattern="[A-Za-z\s]+[0-9]*" title="Please start with letters first" required>
            </div>
            <div class="mb-3">
                <label for="campaign-description" class="form-label">Campaign Description</label><br/>
                <textarea name="campaign_description" class="form-control" id="campaign-description" cols="30" rows="10"></textarea>
            </div>

            <div class="input-group mb-3">
                <span class="input-group-text" id="already-raised">৳</span>
                <input type="number" name="already_raised" class="form-control" placeholder="Already Raised" min="0" required>
            </div>

            <div class="input-group mb-3">
                <span class="input-group-text" id="goal-amount">৳</span>
                <input type="number" name="goal" min="0" class="form-control" placeholder="Goal Amount" required>
            </div>

            <div class="mb-3 mt-5">
                <label for="campaign-cover" class="form-label">Campaign Cover</label>
                <input type="file" class="form-control" id="campaign-cover" name="campaign_cover" accept="image/*" required>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      
      </div>
    </div>
</div>
@endsection