<div class="clearfix">
    <a href="/announcements/view/{{ $announcementsItem->id }}">
        <h3 style="display: inline-block" class="no-margin-top">{{ $announcementsItem->title }}</h3>
    </a>
    {!! $announcementsItem->message !!}
</div>
@include('layouts.announcements.item-info')
<hr class="no-margin-top">