<ul>

    @foreach($childs as $child)

        <li category-id="{{ $child->id }}" class="{{ $child->childs()->count() > 0 ? 'has-childs' : '' }} tree-item">

            @if($child->childs()->count() > 0)

                <i class="glyphicon glyphicon-plus"></i>

            @endif

            {{ $child->title }}
            
            <ul></ul>

        </li>

    @endforeach

</ul>