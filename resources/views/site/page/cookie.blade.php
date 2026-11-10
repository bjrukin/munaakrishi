@extends('layout.site')

@section('body_class', 'policy-page')

@section('content')
  @include('site._partial.ticker')

  @include('site._partial.breadcrumb', [
    'title' => 'Cookie Policy',
    'nepali_title' => 'कुकी नीति',
    'subtitle' => 'Last updated: Asoj 18, 2083 BS (October 4, 2026)',
    'bg_image' => 'assets/images/farms/nepal-terrace-farm.jpg',
    'breadcrumbs' => ['Cookie Policy' => '']
  ])

  <main class="section-padding">
    <div class="container policy-grid">

      <!-- Sticky Table of Contents -->
      <aside class="policy-toc">
        <h2 class="policy-toc-title">On this page</h2>
        <nav aria-label="On this page">
          <a href="#what-are-cookies" class="policy-toc-link">1. What cookies are</a>
          <a href="#types" class="policy-toc-link">2. The types we use</a>
          <a href="#list" class="policy-toc-link">3. Full list of cookies</a>
          <a href="#manage" class="policy-toc-link">4. How to change your choice</a>
          <a href="#contact" class="policy-toc-link">5. Questions</a>
        </nav>
      </aside>

      <!-- Policy Content -->
      <article class="prose-policy">
        <p style="font-size: 1.15rem; line-height: 1.8; color: var(--color-ink); font-weight: 500; margin-bottom: 2rem;">
          This page explains which cookies our website uses, why we use them and how you can switch them off. We keep cookies to a minimum and never use them for advertising.
        </p>

        <section id="what-are-cookies" style="margin-bottom: 2.5rem; scroll-margin-top: 7rem;">
          <h2>1. What cookies are</h2>
          <p>
            Cookies are small text files that a website saves in your browser. Some are needed for the site to work. Others help us remember your choices or understand how the site is used.
          </p>
        </section>

        <section id="types" style="margin-bottom: 2.5rem; scroll-margin-top: 7rem;">
          <h2>2. The types we use</h2>
          <ul>
            <li><strong>Necessary:</strong> security, form protection and remembering your cookie choice. These are always on.</li>
            <li><strong>Preferences:</strong> remember things like your nearest outlet. Only with your permission.</li>
            <li><strong>Analytics:</strong> Google Analytics 4 with anonymised IP, so we can see which pages help visitors. Only with your permission.</li>
            <li><strong>Third party:</strong> Google Maps may set cookies when you view an outlet map.</li>
          </ul>
        </section>

        <section id="list" style="margin-bottom: 2.5rem; scroll-margin-top: 7rem;">
          <h2>3. Full list of cookies</h2>
          <div class="table-wrap" style="margin: 1.5rem 0;">
            <table class="data-table">
              <thead>
                <tr>
                  <th scope="col">Cookie</th>
                  <th scope="col">Type</th>
                  <th scope="col">Purpose</th>
                  <th scope="col">Duration</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td style="font-family: monospace; font-weight: 700; color: var(--color-ink);">munaa_cookie_consent_v1</td>
                  <td>Necessary</td>
                  <td style="color: var(--color-muted);">Remembers your cookie choices</td>
                  <td style="color: var(--color-muted);">12 months</td>
                </tr>
                <tr>
                  <td style="font-family: monospace; font-weight: 700; color: var(--color-ink);">XSRF-TOKEN</td>
                  <td>Necessary</td>
                  <td style="color: var(--color-muted);">Protects forms from forgery</td>
                  <td style="color: var(--color-muted);">Session</td>
                </tr>
                <tr>
                  <td style="font-family: monospace; font-weight: 700; color: var(--color-ink);">munaa_session</td>
                  <td>Necessary</td>
                  <td style="color: var(--color-muted);">Keeps the site working while you browse</td>
                  <td style="color: var(--color-muted);">2 hours</td>
                </tr>
                <tr>
                  <td style="font-family: monospace; font-weight: 700; color: var(--color-ink);">munaa_pref_outlet</td>
                  <td>Preferences</td>
                  <td style="color: var(--color-muted);">Remembers your nearest outlet and filters</td>
                  <td style="color: var(--color-muted);">6 months</td>
                </tr>
                <tr>
                  <td style="font-family: monospace; font-weight: 700; color: var(--color-ink);">_ga</td>
                  <td>Analytics</td>
                  <td style="color: var(--color-muted);">Google Analytics 4, counts unique visitors</td>
                  <td style="color: var(--color-muted);">2 years</td>
                </tr>
              </tbody>
            </table>
          </div>
        </section>

        <section id="manage" style="margin-bottom: 2.5rem; scroll-margin-top: 7rem;">
          <h2>4. How to change your choice</h2>
          <p>You can change your cookie preferences anytime using the button below or directly in your browser settings.</p>
          <button type="button" class="btn btn-forest open-cookie-modal" style="margin-top: 1rem;">
            Open cookie settings
          </button>
        </section>

        <section id="contact" style="scroll-margin-top: 7rem;">
          <h2>5. Questions</h2>
          <p>
            If you have questions about how we use cookies, please see our <a href="{{ route('privacy.policy') }}" style="color: var(--color-forest); font-weight: 600; text-decoration: underline;">Privacy Policy</a> or email us at <a href="mailto:info@munaa.com.np" style="color: var(--color-forest); font-weight: 600;">info@munaa.com.np</a>.
          </p>
        </section>
      </article>

    </div>
  </main>
@endsection
