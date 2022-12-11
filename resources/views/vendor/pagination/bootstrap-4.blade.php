@if ($paginator->hasPages())
	<div class="blog-pagination">
		<ul class="pagination">
			{{-- Previous Page Link --}}
			@if ($paginator->onFirstPage())
				<li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
					<a class="page-link" aria-hidden="true">&lsaquo;</a>
				</li>
			@else
				<li class="page-item">
					<a class="page-link" href="{{ $paginator->previousPageUrl() }}" aria-label="@lang('pagination.previous')"
						rel="prev">&lsaquo;</a>
				</li>
			@endif

			{{-- Pagination Elements --}}
			@foreach ($elements as $element)
				{{-- "Three Dots" Separator --}}
				@if (is_string($element))
					<li class="page-item disabled" aria-disabled="true"><span class="page-link">{{ $element }}</span></li>
				@endif

				{{-- Array Of Links --}}
				@if (is_array($element))
					@foreach ($element as $page => $url)
						@if ($page == $paginator->currentPage())
							<li class="page-item active" aria-current="page"><span class="page-link">{{ $page }}</span></li>
						@else
							<li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
						@endif
					@endforeach
				@endif
			@endforeach

			{{-- Next Page Link --}}
			@if ($paginator->hasMorePages())
				<li class="page-item">
					<a class="page-link" href="{{ $paginator->nextPageUrl() }}" aria-label="@lang('pagination.next')"
						rel="next">&rsaquo;</a>
				</li>
			@else
				<li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
					<a class="page-link" aria-hidden="true">&rsaquo;</a>
				</li>
			@endif
		</ul>
	</div>
@endif
