@extends('Ads.layout')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Create</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('ads.create') }}"> Create New Ad</a>
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
            <th>ID</th>
            <th>Title</th>
            <th>Details</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($Ads as $ad)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $ad->name }}</td>
            <td>{{ $ad->detail }}</td>
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
      
@endsection