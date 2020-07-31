<div class="ml-auto">
    <div class="input-group input-group-sm">
        <div class="input-group-prepend">
            <span class="input-group-text"><i class="fas fa-search"></i></span>
        </div>
        <input type="text" class="form-control" placeholder="Pencarian" wire:model="keyword">
        @if($results->count() > 0)
        <div class="search-result mt-5 shadow-sm">
            <ul class="pl-0">
                @foreach($results as $result)
                <li>
                    <a
                        href="{{ route('guest.post.show', [$result->category->slug, $result]) }}">{{ $result['title'] }}</a>
                </li>
                <hr />
                @endforeach
            </ul>
        </div>
        @endif
    </div>
</div>