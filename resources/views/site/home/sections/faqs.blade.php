<!-- FAQs Block (Dynamic from faqs table) -->
<section class="section-padding bg-leaf-soft border-line-y" id="faqs-section">
  <div class="container container-narrow">
    <div style="text-align: center; margin-bottom: 2.5rem;">
      <p class="section-label">{{ $settings['subtitle'] ?? 'Help Center' }}</p>
      <h2 class="section-title" style="margin-left: auto; margin-right: auto;">{{ $settings['title'] ?? 'Frequently Asked Questions' }}</h2>
      <p class="section-copy" style="margin-left: auto; margin-right: auto; font-size: 1.05rem;">
        {{ $settings['copy'] ?? 'Common questions regarding products, farmer partnerships, outlets, and delivery.' }}
      </p>
    </div>

    @php
      $faqItems = (isset($faqs) && count($faqs) > 0) ? $faqs : \App\Models\Faq::where('status', 1)->orderBy('order', 'asc')->get();
    @endphp

    @if(isset($faqItems) && count($faqItems) > 0)
      <div class="accordion" id="block-faq-accordion">
        @foreach($faqItems as $idx => $faq)
          <div class="accordion-item {{ $idx === 0 ? 'open' : '' }}" style="background: #ffffff; border: 1px solid var(--color-line); margin-bottom: 0.75rem; border-radius: 4px; overflow: hidden;">
            <button type="button" class="accordion-header" style="width: 100%; text-align: left; background: none; border: none; padding: 1.25rem 1.5rem; display: flex; justify-content: space-between; align-items: center; cursor: pointer; font-weight: 700; font-size: 1.08rem; color: var(--color-forest);" onclick="$(this).parent().toggleClass('open')">
              <span>{{ $faq->question }}</span>
              <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="6 9 12 15 18 9"></polyline></svg>
            </button>
            <div class="accordion-body" style="padding: 0 1.5rem 1.25rem; font-size: 1rem; color: var(--color-muted); line-height: 1.7; display: {{ $idx === 0 ? 'block' : 'none' }};">
              <p style="margin: 0;">{{ $faq->answer }}</p>
            </div>
          </div>
        @endforeach
      </div>
    @endif
  </div>
</section>
