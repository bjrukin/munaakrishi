@php
use App\Models\SocialLink;
$sociallink = SocialLink::first();
@endphp
<div class="social_icon-link">
    @if($sociallink->facebook)
    <a href="{{ $sociallink->facebook }}" target="_blank" class="fb-logo" title="Nepal Fashion on Facebook"
        aria-label="Nepal Fashion on Facebook, Opens in a new tab" target="_blank"
        rel="nofollow noopener noreferrer"></a>
    @endif
    @if($sociallink->instagram)
    <a href="{{ $sociallink->instagram }}" target="_blank" class="ig-logo" title="Nepal Fashion on Instagram"
        aria-label="Nepal Fashion on Instagram, Opens in a new tab" target="_blank"
        rel="nofollow noopener noreferrer"></a>
    @endif
    @if($sociallink->youtube)
    <a href="{{ $sociallink->youtube }}" target="_blank" class="yt-logo" title="Nepal Fashion on Youtube"
        aria-label="Nepal Fashion on Youtub, Opens in a new tab" target="_blank" rel="nofollow noopener noreferrer"></a>
    @endif
    @if($sociallink->pinterest)
    <a href="{{ $sociallink->pinterest }}" target="_blank" class="pin-logo" title="Nepal Fashion on Pinterest"
        aria-label="Nepal Fashion on Pinterest, Opens in a new tab" target="_blank"
        rel="nofollow noopener noreferrer"></a>
    @endif
    @if($sociallink->x)
    <a href="{{ $sociallink->x }}" target="_blank" class="x-logo" title="Nepal Fashion on Twitter"
        aria-label="Nepal Fashion on Twitter, Opens in a new tab" target="_blank"
        rel="nofollow noopener noreferrer"></a>
    @endif
    @if($sociallink->linkedin)
    <a href="{{ $sociallink->linkedin }}" target="_blank" class="in-logo" title="Nepal Fashion on Linkedin"
        aria-label="Nepal Fashion on Linkedin, Opens in a new tab" target="_blank"
        rel="nofollow noopener noreferrer"></a>
    @endif
    @if($sociallink->whatsapp)
    <a href="{{ $sociallink->whatsapp }}" target="_blank" class="wapp-logo" title="Nepal Fashion on Whatsapp"
        aria-label="Nepal Fashion on Whatsapp, Opens in a new tab" target="_blank"
        rel="nofollow noopener noreferrer"></a>
    @endif
</div>