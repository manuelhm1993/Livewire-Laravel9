{{-- Componente para validar el ordenamiento MH --}}
<div class="float-right mt-1">
    @if ($this->sort === $sort)
        @if ($this->direction === $direction)
            @if ($this->sort === 'id')
                <i class="fa-solid fa-arrow-up-1-9"></i>
            @else
                <i class="fa-solid fa-arrow-up-a-z"></i>
            @endif
        @else 
            @if ($this->sort === 'id')
                <i class="fa-solid fa-arrow-down-9-1"></i>
            @else 
                <i class="fa-solid fa-arrow-down-z-a"></i>
            @endif
        @endif
    @else
        <i class="fa-solid fa-sort"></i>
    @endif
</div>
