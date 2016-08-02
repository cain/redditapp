@extends('layouts.app')

@section('content')

<div class="row">
  <div class="col-md-8">

    <h3>
      <a href="/community">
        Community
      </a>
      @if($channel->exists)

        / {{ $channel->title }}

      @endif
    </h3>

  @include('community.list')

  </div>

  @include ('community.add-link')

</div>



@stop
