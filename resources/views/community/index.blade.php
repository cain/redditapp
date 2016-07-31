@extends('layouts.app')

@section('content')

<div class="row">
  <div class="col-md-8">

    <h1>Community</h1>
    <ul class="links">
      @foreach ($links as $link)
        <li class="Links__link">
          <span class="label label-default" style="background-color: {{ $link->channel->colour }};">{{ $link->channel->title }}</span>
          <a href="{{ $link->link }}" target="_blank">
            {{ $link->title }}
          </a>

          <small>
            Contributed By: <a href="#">{{ $link->creator->name }}</a> {{ $link->updated_at->diffForHumans() }}
          </small>
        </li>
      @endforeach
    </ul>
  </div>

  @include ('community.add-link')

</div>



@stop
