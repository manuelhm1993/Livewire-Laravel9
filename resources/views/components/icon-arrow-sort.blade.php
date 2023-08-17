<div class="fa-pull-right mt-1">
    @if ($this->sort === $sort)
        @if ($this->direction === $direction)
            <i class="fa fa-sort-alpha-asc" aria-hidden="true"></i>
        @else
            <i class="fa fa-sort-alpha-desc" aria-hidden="true"></i>
        @endif
    @else
        <i class="fa fa-sort" aria-hidden="true"></i>
    @endif
</div>