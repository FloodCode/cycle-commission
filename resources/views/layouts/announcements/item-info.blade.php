<p class="item-info">
    <span>{{ __('announcements.created') }}: </span><span class="muted">{{ $announcementsItem->created_at }}</span>
    <span class="horizontal-delimiter"></span>
    <span>{{ __('announcements.views') }}: </span><span class="muted">{{ $announcementsItem->views }}</span>
    <span class="horizontal-delimiter"></span>
    <span>{{ __('announcements.author') }}: </span><span class="muted">{{ $announcementsItem->user->name }}</span>
</p>