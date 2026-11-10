@if($featured_notice ?? null)
<!-- Notice Popup Modal -->
<div id="notice-popup" class="modal-backdrop notice-popup" role="dialog" aria-modal="true" aria-labelledby="notice-popup-title" aria-describedby="notice-popup-summary" data-notice-id="{{ $featured_notice->id }}" data-notice-version="{{ $featured_notice->updated_at->timestamp }}">
  <article class="modal-dialog notice-popup-dialog">
    <button type="button" class="modal-close-btn" aria-label="Close notice">✕</button>
    <div class="notice-popup-heading">
      <span class="notice-popup-mark" aria-hidden="true">सूचना</span>
      <p>{{ \Carbon\Carbon::parse($featured_notice->date)->format('F d, Y') }}</p>
    </div>
    @if($featured_notice->image)
    <div class="notice-popup-image" style="margin: 0.75rem 0; overflow: hidden; border-radius: 8px;">
      <img src="{{ $featured_notice->url_image }}" alt="{{ $featured_notice->name }}" loading="lazy" decoding="async" style="width: 100%; max-height: 280px; object-fit: cover; display: block;">
    </div>
    @endif
    <div class="notice-popup-content">
      <h2 id="notice-popup-title">{{ $featured_notice->name }}</h2>
      <p id="notice-popup-summary">{{ \Illuminate\Support\Str::limit(strip_tags($featured_notice->description), 220) }}</p>
      <a class="btn btn-forest" href="{{ route('news.detail', \Illuminate\Support\Str::slug($featured_notice->name)) }}">Read full notice</a>
    </div>
  </article>
</div>
@endif

<!-- Product Inquiry Modal -->
<div id="product-inquiry-modal" class="modal-backdrop" role="dialog" aria-modal="true" aria-labelledby="inquiry-modal-title">
  <div class="modal-dialog" style="max-width: 540px;">
    <button type="button" class="modal-close-btn" aria-label="Close modal">✕</button>
    <h2 id="inquiry-modal-title" style="font-size: 1.5rem; font-weight: 800; color: var(--color-forest-dark);">
      Product Enquiry
    </h2>
    <p style="margin-top: 0.25rem; font-size: 0.95rem; color: var(--color-muted);">
      Ask about availability, bulk order pricing or delivery for <strong id="inquiry-product-name" style="color: var(--color-haldi);">this product</strong>.
    </p>

    <form id="modal-inquiry-form" style="margin-top: 1.5rem; display: flex; flex-direction: column; gap: 1rem;" novalidate>
      <input type="hidden" name="product_name" value="">

      <div class="form-group">
        <label class="form-label">Your Name <span class="required">*</span></label>
        <input type="text" name="name" class="form-input" placeholder="Ram Bahadur Shrestha" required>
        <span class="form-error"></span>
      </div>

      <div class="form-group">
        <label class="form-label">Phone Number <span class="required">*</span></label>
        <input type="tel" name="phone" class="form-input" placeholder="98XXXXXXXX" required>
        <span class="form-error"></span>
      </div>

      <div class="form-group">
        <label class="form-label">Email (Optional)</label>
        <input type="email" name="email" class="form-input" placeholder="your@email.com">
      </div>

      <div class="form-group">
        <label class="form-label">Enquiry Type</label>
        <select name="type" class="form-input">
          <option>Availability at nearest outlet</option>
          <option>Bulk order (above 25 kg)</option>
          <option>Pricing for school, hotel or office</option>
        </select>
      </div>

      <div class="form-group">
        <label class="form-label">Message / Quantity Required</label>
        <textarea name="message" rows="3" class="form-input" placeholder="Tell us how much you need and which location..."></textarea>
      </div>

      <div class="form-group">
        <div class="math-challenge">
          <span class="math-challenge-text">What is 4 + 3?</span>
          <input type="number" name="math_answer" class="form-input" style="width: 80px;" required>
        </div>
        <span class="form-error"></span>
      </div>

      <div style="margin-top: 0.5rem;">
        <button type="submit" class="btn btn-forest" style="width: 100%; padding: 0.85rem;">Submit Enquiry</button>
      </div>
    </form>
  </div>
</div>

<!-- Full-Screen Lightbox Modal -->
<div id="gallery-lightbox" class="lightbox-modal" role="dialog" aria-modal="true">
  <div class="lightbox-header">
    <span id="lightbox-counter" style="font-size: 0.95rem; opacity: 0.85;">1 of 12</span>
    <button type="button" id="lightbox-close" style="width: 40px; height: 40px; border-radius: 50%; color: #fff; font-size: 1.5rem; background: rgba(255,255,255,0.1); display: flex; align-items: center; justify-content: center; border: none; cursor: pointer;" aria-label="Close photo">✕</button>
  </div>

  <div class="lightbox-body">
    <img loading="lazy" decoding="async" src="{{ asset('assets/images/farms/nepal-terrace-farm.jpg') }}" alt="" class="lightbox-img">
    <button type="button" class="lightbox-arrow prev" aria-label="Previous photo">
      <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="15 18 9 12 15 6"></polyline></svg>
    </button>
    <button type="button" class="lightbox-arrow next" aria-label="Next photo">
      <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="9 18 15 12 9 6"></polyline></svg>
    </button>
  </div>

  <div class="lightbox-caption">
    <p id="lightbox-caption" style="font-size: 1.15rem; font-weight: 700;">Carrying the first paddy</p>
    <p id="lightbox-place" style="font-size: 0.9rem; opacity: 0.75; margin-top: 0.25rem;">Sinja, Jumla</p>
  </div>
</div>

<!-- Cookie Consent Banner -->
<div id="cookie-banner" class="cookie-banner" role="dialog" aria-labelledby="cookie-title">
  <div style="display: flex; gap: 0.85rem; align-items: flex-start;">
    <span style="display: inline-flex; width: 36px; height: 36px; border-radius: 50%; background: var(--color-haldi-soft); color: var(--color-haldi); align-items: center; justify-content: center; flex-shrink: 0;">
      <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 2a10 10 0 1 0 10 10 4 4 0 0 1-5-5 4 4 0 0 1-5-5"></path><path d="M8.5 8.5v.01"></path><path d="M16 15.5v.01"></path><path d="M12 12v.01"></path><path d="M11 17v.01"></path><path d="M7 13v.01"></path></svg>
    </span>
    <div>
      <h3 id="cookie-title" style="font-size: 1.1rem; font-weight: 800; color: var(--color-ink);">We use a few cookies</h3>
      <p style="margin-top: 0.35rem; font-size: 0.92rem; color: var(--color-muted); line-height: 1.5;">
        Some cookies keep this site working. With your permission we also use cookies to remember preferences. Read our <a href="{{ route('cookie-policy') }}" style="color: var(--color-forest); text-decoration: underline; font-weight: 600;">Cookie Policy</a>.
      </p>
    </div>
  </div>

  <div id="cookie-custom-section" style="display: none; margin-top: 1rem; border-top: 1px solid var(--color-line); padding-top: 0.85rem;">
    <div style="display: flex; justify-content: space-between; align-items: center; padding: 0.4rem 0;">
      <div>
        <strong style="font-size: 0.9rem; color: var(--color-ink);">Necessary</strong>
        <p style="font-size: 0.78rem; color: var(--color-muted);">Always on for core website features.</p>
      </div>
      <input type="checkbox" checked disabled>
    </div>
    <div style="display: flex; justify-content: space-between; align-items: center; padding: 0.4rem 0;">
      <div>
        <strong style="font-size: 0.9rem; color: var(--color-ink);">Preferences</strong>
        <p style="font-size: 0.78rem; color: var(--color-muted);">Remembers selected outlet and language.</p>
      </div>
      <input type="checkbox" id="cookie-pref-toggle" checked>
    </div>
    <div style="display: flex; justify-content: space-between; align-items: center; padding: 0.4rem 0;">
      <div>
        <strong style="font-size: 0.9rem; color: var(--color-ink);">Analytics</strong>
        <p style="font-size: 0.78rem; color: var(--color-muted);">Helps us improve pages via anonymized traffic.</p>
      </div>
      <input type="checkbox" id="cookie-anal-toggle">
    </div>
  </div>

  <div id="cookie-standard-actions" style="margin-top: 1.15rem; display: flex; flex-wrap: wrap; gap: 0.5rem;">
    <button type="button" id="cookie-accept-all" class="btn btn-forest" style="flex: 1;">Accept all</button>
    <button type="button" id="cookie-necessary-only" class="btn btn-outline-forest" style="flex: 1;">Necessary only</button>
    <button type="button" id="cookie-customise-btn" style="width: 100%; font-size: 0.85rem; color: var(--color-muted); text-decoration: underline; text-align: center; margin-top: 0.25rem; background: none; border: none; cursor: pointer;">Customise</button>
  </div>

  <div id="cookie-custom-actions" style="display: none; margin-top: 1rem; gap: 0.5rem;">
    <button type="button" id="cookie-save-custom" class="btn btn-forest" style="width: 100%;">Save my choices</button>
  </div>
</div>
