@extends('layouts.app')
@section('content')
  <div class="row">
      <div class="col-md-8 col-md-offset-2" style="margin-top: 69px;">
          <div class="panel panel-default" style="border-top-color: #e74c3c;">
              <div class="panel-heading">Find your home, away from home</div>
              <div class="panel-body">
    <!-- Displays Each Hotel as a "Card" and a button to visit the hotels page. -->
    @foreach ($Hotels as $Hotel)
      <div class="card">
        <img class="card-img-top" src="{{$Hotel->thumbnail->path}}" alt="Card image">
        <div class="card-block">
          <h4 class="card-Title">{{ $Hotel->Name}}</h4>
          <p class ="card-text">{{$Hotel->description}}</p>
       </div>
        @if (Auth::check())
          <a href="/hotels/{{$Hotel->id}}" class="btn btn-primary">View</a>
          @else
            <a href="/login" class="btn btn-primary">View</a>
          @endif
       </div>
  @endforeach
</div>
  </div>
</div>
@endsection
