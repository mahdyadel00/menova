<div class="col-md-12 border-right">
  <div class="p-3 ">
    <div class=" row pt-3 ">
        <h4 class=" col-md-12 text-left profilepicname">@lang('site.trending_topics')</h4>
        <div class="col-md-12 ">
          @foreach ($trending_topics as $topic)
        
            <div class="bordprooject">
              <span>{{$topic->name}}</span>
              <span class="float-right"> <i class="fa fa-comments" aria-hidden="true"></i>
                <span class="ml-1">{{$topic->discusses->count()}}</span></span>
            </div>
          @endforeach
        </div>
    </div>
  </div>
</div>
