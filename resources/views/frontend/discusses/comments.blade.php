{{-- Comments --}}
@forelse ($comments as $comment)
<div class="media-block  mt-3  col-12">
  <div class="d-flex flex-start">
    <div class="col-2">
      <img class="rounded-circle shadow-1-strong me-3"
      src="{{$comment->user->image_path}}" alt="{{$comment->user->full_name}}" width="50"
      height="50" />
    </div>
    <div class="col-10 bgsetting1">
      <div class="m-1">
        <span class="float-right m-3 bordproojecttext">{{$discuss->created_at->diffForHumans()}}</span>
        <h6 class="fw-bold mb-1 ml-2">{{$comment->user->full_name}}</h6>
        <p class="text-muted small mb-0 ml-2">Shared publicly - Jan 2020</p>
        <p class="bgsetting1  ml-2">{!! $comment->comment !!}</p>
      </div>
    </div>
  </div>
</div>
@empty
@endforelse
{{-- end of Comments --}}
