@if (Auth::check())
<div class="col-md-4">

  <h3>Contribute A Link</h3>

  <div class="panel panel-default">
    <div class="panel-body">

      <form action="community" method="POST">
        {{ csrf_field() }}

        <div class="form-group {{ $errors->has('channel_id') ? 'has-error' : '' }}">
            <label for="Channel">Channel</label>

            <select name="channel_id" class="form-control">
                <option selected disabled>Pick a Channel</option>

                @foreach ($channels as $channel)
                <option value="{{ $channel->id }}" {{ old('channel_id') == $channel->id ? 'selected' : ''}}>{{ $channel->title }}</option>
                @endforeach

            </select>

            {!! $errors->first('channel_id', '<span class="help-block">:message</span>') !!}

        </div>

        <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
          <label for="title">Title</label>
          <input type="text" class="form-control" id="title" name="title" placeholder="Enter a Title" required value="{{ old('title') }}">
            {!! $errors->first('title', '<span class="help-block">:message</span>') !!}
        </div>

        <div class="form-group {{ $errors->has('link') ? 'has-error' : '' }}">
          <label for="link">Link</label>
          <input type="text" class="form-control" id="link" name="link" placeholder="Enter a URL" required value="{{ old('title') }}">
            {!! $errors->first('link', '<span class="help-block">:message</span>') !!}

        </div>
        <div class="form-group">
          <button class="btn btn-primary">Contribute Link</button
        </div>
      </form>


    </div>
  </div>

</div>
@else

Please <a href="login">Sign in</a> To Post
@endif
