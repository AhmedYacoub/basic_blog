<div class="card shadow">
  <div class="card-body">
    <h4 class="card-title">{{ $post->title }}</h4>
    <small class="text-muted">Posted by: <b>{{ $post->owner->name }}</b> on {{ $post->created_at->format('M d, Y H:i:s') }}</small>

    <p class="card-text">{{ $post->body }}</p>

    <hr>
    @include('posts.partials.comments')
  </div>
</div>
