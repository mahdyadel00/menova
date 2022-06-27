@if ($published)
  <span class="text-success border-success"><i class="fas fa-check-circle"></i> @lang('site.published')</span>
@else
  <span class="text-danger border-danger"><i class="fas fa-times-circle"></i> @lang('site.unpublished')</span>
@endif
