<x-header_footer>


<h1>All ads</h1>
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Title</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('ads.create') }}"> Create Ad</a>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-bordered">
        <tr>
            <th>Title</th>
            <th>Category</th>
            <th>Description</th>
            <th>Price</th>
            <th>Location</th>
            <th>Actions</th>
            
            <th width="280px"></th>
        </tr>
        @foreach ($ads as $ad)
        <tr>
            <td>{{ $ad->title }}</td>
            <td>{{ $ad->category }}</td>
            <td>{{ $ad->description }}</td>
            <td>{{ $ad->Price }}</td>
            <td>{{ $ad->Location }}</td>

            <td>
                <form action="{{ route('ads.destroy',$ad->id) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('ads.show',$ad->id) }}">Show</a>
    
                    <a class="btn btn-primary" href="{{ route('ads.edit',$ad->id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
    {!! $ads->links() !!}
      
</x-header_footer>