@php
    $general_setting = \App\Models\GeneralSetting::first();
    $address = $general_setting->address ?? 'Sanepa, Lalitpur';
    $phone = $general_setting->phone ?? '+977-98031 65605';
    $email = $general_setting->email ?? 'info@munaa.com.np';
@endphp
<!-- Footer -->
<footer class="site-footer">
  <div class="container footer-grid">
    <div>
      <div class="footer-logo">
        <img loading="lazy" decoding="async" src="{{ asset('assets/images/brand/munaa-logo-enhanced.png') }}" alt="Munaa Krishi">
      </div>
      <p class="footer-desc">
        A social enterprise and agribusiness initiative jointly envisioned by NRNA and the Government of Nepal.
      </p>
      <p class="footer-reg-no">
        Regd. No. 232466/076/077
      </p>
    </div>

    <div>
      <h2 class="footer-heading">COMPANY</h2>
      <ul class="footer-links">
        <li><a href="{{ route('about') }}">Company Profile</a></li>
        <li><a href="{{ route('chairman.message') }}">Chairman's Message</a></li>
        <li><a href="{{ route('board.of.directors') }}">Board of Directors</a></li>
        <li><a href="{{ route('team') }}">Our Team</a></li>
      </ul>
    </div>

    <div>
      <h2 class="footer-heading">BUSINESS</h2>
      <ul class="footer-links">
        <li><a href="{{ route('products') }}">Product Catalogue</a></li>
        <li><a href="{{ route('farms') }}">Farmer Partners</a></li>
        <li><a href="{{ route('outlets') }}">Our Outlets</a></li>
        <li><a href="{{ route('news') }}">News & Stories</a></li>
      </ul>
    </div>

    <div>
      <h2 class="footer-heading">CONTACT</h2>
      <ul class="footer-contact-list">
        <li class="footer-contact-item">
          <svg class="footer-contact-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg>
          <span>{{ $address }}</span>
        </li>
        <li class="footer-contact-item">
          <svg class="footer-contact-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>
          <a href="tel:{{ preg_replace('/[^0-9+]/', '', $phone) }}">{{ $phone }}</a>
        </li>
        <li class="footer-contact-item">
          <svg class="footer-contact-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
          <a href="mailto:{{ $email }}">{{ $email }}</a>
        </li>
      </ul>
    </div>
  </div>

  <div class="footer-bottom">
    <div class="container footer-bottom-inner">
      <p>© {{ date('Y') }} Munaa Krishi Limited. All rights reserved.</p>
      <div class="footer-policy-links">
        <a href="{{ route('privacy-policy') }}">Privacy policy</a>
        <a href="{{ route('cookie-policy') }}">Cookie policy</a>
        <button type="button" id="open-cookie-settings">Cookie settings</button>
      </div>
    </div>
  </div>
</footer>