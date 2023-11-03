<x-header_footer>
    <!--
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('ads.create') }}"> Create Ad</a>
            </div>
        </div>
    </div>-->
    
    <div class="card-deck m-5">
        <div class="row">
        @foreach ($ads as $ad)
        <div class="container border m-2 col-sm-5 col-lg-3"><!--global ad container-->
            <img class="float-start img-fluid" src="{{ $ad->photo }}" alt="Card image cap">
        <div class="float-end mb-5"><!--text contents-->
          <div>
            <h5 class="card-title p-1">{{ $ad->title }}</h5>
            <h5 class="text-left">{{ $ad->price }} €</h5>
        </div>

        <div>
            <p class="card-text">{{ $ad->description }}</p>
            <p class="card-text"><small class="text-muted">{{ $ad->category }}</small></p>
            <p class="card-text"><small class="text-muted">{{ $ad->location }}</small></p>
        </div>

        @auth
          <div class="d-flex justify-content-evenly mt-3">
            <a class="btn btn-success" href="{{ route('ads.show',$ad->id) }}">Show</a>
            <a class="btn btn-primary" href="{{ route('ads.edit',$ad->id) }}">Edit</a>
            <a class="btn btn-danger" href="{{ route('ads.edit',$ad->id) }}">Delete</a>
          </div>
          @else
          @endauth
        </div>
    </div>
        @endforeach
        </div>
    </div>


    <!--<table class="table table-bordered">
        <tr>
            <th>Photo</th>
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
            <td>{{ $ad->photo }}</td>
            <td>{{ $ad->title }}</td>
            <td>{{ $ad->category }}</td>
            <td>{{ $ad->description }}</td>
            <td>{{ $ad->price }}</td>
            <td>{{ $ad->location }}</td>

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
</div>-->

{{$ads->links()}}
</x-header_footer>