<div class="widgetsetting">
  <label class="widget-title2 ">
    <a href="{{route('frontend.discusses.create')}}" class="m-10 text {{ request()->is('frontend.discusses.create') ? 'active' : '' }}">
      <span class="mt-10">
        <i class="fa fa-question-circle " aria-hidden="true"></i>
        <span class="m-3">@lang('site.ask_question')</span> 
      </span>
    </a>
  </label>
  <div class="widget-title3 mt-3">
    <a href="{{route('frontend.discusses.index')}}" class="m-10 text {{ request()->is('frontend.discusses.index') ? 'active' : '' }}">
      <i class="fa fa-chart-line" aria-hidden="true"></i>
      <span class="m-3">@lang('site.trending')</span> 
    </a>
  </div> 
</div> 
