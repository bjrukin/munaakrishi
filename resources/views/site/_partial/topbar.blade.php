@php
    $general_setting = \App\Models\GeneralSetting::first();
    $social_links = \App\Models\SocialLink::first();
    $address = $general_setting->address ?? 'Sanepa, Lalitpur, Nepal';
    $phone = $general_setting->phone ?? '+977-98031 65605';
    $email = $general_setting->email ?? 'info@munaa.com.np';
    $fb = $social_links->facebook ?? 'https://www.facebook.com/munaabazar';
    $yt = $social_links->youtube ?? 'https://www.youtube.com/channel/UC9BHnImyXSO6p79Gxta9wsg';
@endphp
<!-- Top Bar -->
<div class="top-bar">
  <div class="container top-bar-inner">
    <div class="top-bar-info">
      <span class="top-bar-item">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg>
        {{ $address }}
      </span>
      <span class="top-bar-item">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>
        <a href="tel:{{ preg_replace('/[^0-9+]/', '', $phone) }}">{{ $phone }}</a>
      </span>
      <span class="top-bar-item">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
        <a href="mailto:{{ $email }}">{{ $email }}</a>
      </span>
    </div>
    <div class="top-bar-actions">
      <div class="lang-switcher">
        <button type="button" class="lang-btn lang-btn-en active">EN</button>
        <button type="button" class="lang-btn lang-btn-np">NP</button>
        <span id="google_translate_element" class="google-translate-host"></span>
      </div>
      <div class="top-divider"></div>
      <div class="social-links">
        @if($fb)
        <a href="{{ $fb }}" target="_blank" rel="noreferrer" class="social-link" aria-label="Facebook">
          <svg viewBox="0 0 24 24"><path d="M13.5 21v-7.5h2.6l.4-3h-3V8.6c0-.9.3-1.5 1.5-1.5h1.6V4.4c-.3 0-1.2-.1-2.3-.1-2.3 0-3.8 1.4-3.8 3.9v2.3H7.9v3h2.6V21h3z"/></svg>
        </a>
        @endif
        @if($yt)
        <a href="{{ $yt }}" target="_blank" rel="noreferrer" class="social-link" aria-label="YouTube">
          <svg viewBox="0 0 24 24"><path d="M21.6 7.2a2.5 2.5 0 0 0-1.8-1.8C18.2 5 12 5 12 5s-6.2 0-7.8.4A2.5 2.5 0 0 0 2.4 7.2 26 26 0 0 0 2 12a26 26 0 0 0 .4 4.8 2.5 2.5 0 0 0 1.8 1.8c1.6.4 7.8.4 7.8.4s6.2 0 7.8-.4a2.5 2.5 0 0 0 1.8-1.8A26 26 0 0 0 22 12a26 26 0 0 0-.4-4.8zM10 15V9l5.2 3L10 15z"/></svg>
        </a>
        @endif
      </div>
    </div>
  </div>
</div>
