<ul class="list-group">
  @foreach ($links as $link)
    <li class="list-group-item">
      <a href="/community/{{ $link->channel->slug }}" class="label label-default" style="background-color: {{ $link->channel->colour }};">{{ $link->channel->title }}</a>
      <a href="{{ $link->link }}" target="_blank">
        {{ $link->title }}
      </a>

      <small>
        Contributed By: <a href="#">{{ $link->creator->name }}</a> {{ $link->updated_at->diffForHumans() }}
      </small>
    </li>
  @endforeach
</ul>

{{ $links->links() }}
