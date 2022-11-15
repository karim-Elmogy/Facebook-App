<div class="loadMore">
    <div class="central-meta item" style="display: inline-block;">
        @forelse($posts as $post)
        @include('site.posts.parts.post-card', ['edit' => true])
            <hr style="color: #fff ; height: 3px;font-size: 100px;background-color: #505050;">
            @empty
            Not Found Posts
        @endforelse
    </div>
</div>
