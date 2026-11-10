@extends('layout.site')

@section('body_class', 'faq-page')

@section('content')
  @php
    $faqs = $faqs ?? [];
  @endphp
  @include('site._partial.ticker')

  <main>
    @include('site._partial.breadcrumb', [
      'title' => 'Frequently Asked Questions',
      'nepali_title' => 'प्राय सोधिने प्रश्नहरू',
      'subtitle' => 'Helpful information about products, farmer partnerships, outlets and enquiries.',
      'bg_image' => 'assets/images/farms/tea-field.jpg',
      'breadcrumbs' => ['FAQ' => '']
    ])

    <section class="section-padding">
      <div class="container container-narrow">
        <!-- Section Title & Intro -->
        <div style="text-align: center; margin-bottom: 2rem;">
          <p class="section-label">Help Center</p>
          <h2 class="section-title" style="margin-left: auto; margin-right: auto;">Answers to common questions</h2>
          <p class="section-copy" style="margin-left: auto; margin-right: auto; font-size: 1.05rem;">
            Find answers about how we source from local farms, our retail outlets, organic certifications, and wholesale partnerships.
          </p>
        </div>

        <!-- Quick Search Bar -->
        <div class="faq-search-wrap">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
          <input type="text" id="faq-search-input" class="faq-search-input" placeholder="Search questions (e.g. delivery, organic, payment, outlets)..." aria-label="Search frequently asked questions">
        </div>

        <!-- Filter Pills -->
        <div class="category-filters" style="justify-content: center; margin-bottom: 2rem;">
          <button type="button" class="filter-pill active" data-faq-filter="all">All Questions</button>
          <button type="button" class="filter-pill" data-faq-filter="products">Products & Delivery</button>
          <button type="button" class="filter-pill" data-faq-filter="farmers">Farmers & Payments</button>
          <button type="button" class="filter-pill" data-faq-filter="institutions">Institutions & Outlets</button>
        </div>

        <!-- Accordion List -->
        <div class="accordion" id="faq-accordion-list">
          @if(isset($faqs) && count($faqs) > 0)
            @foreach($faqs as $idx => $faq)
              <div class="accordion-item {{ $idx === 0 ? 'open' : '' }}" data-faq-category="products" data-faq-text="{{ strtolower($faq->question . ' ' . $faq->answer) }}">
                <button type="button" class="accordion-header" aria-expanded="{{ $idx === 0 ? 'true' : 'false' }}">
                  <span>{{ $faq->question }}</span>
                  <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="6 9 12 15 18 9"></polyline></svg>
                </button>
                <div class="accordion-body">
                  <div class="accordion-content">
                    <p>{{ $faq->answer }}</p>
                  </div>
                </div>
              </div>
            @endforeach
          @else
            <!-- Question 1 -->
            <div class="accordion-item open" data-faq-category="products" data-faq-text="what products does the company supply inputs fresh produce tea herbs spices grains">
              <button type="button" class="accordion-header" aria-expanded="true">
                <span>What products does the company supply?</span>
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="6 9 12 15 18 9"></polyline></svg>
              </button>
              <div class="accordion-body">
                <div class="accordion-content">
                  <p>The catalogue includes agricultural inputs, fresh produce, natural farm products, tea, herbs and spices. Availability varies by season and outlet.</p>
                </div>
              </div>
            </div>

            <!-- Question 2 -->
            <div class="accordion-item" data-faq-category="products" data-faq-text="can i order online or get home delivery esewa khalti delivery weekly restaurants">
              <button type="button" class="accordion-header" aria-expanded="false">
                <span>Can I order online or get home delivery?</span>
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="6 9 12 15 18 9"></polyline></svg>
              </button>
              <div class="accordion-body">
                <div class="accordion-content">
                  <p>For now you can visit any of our outlets. Restaurants, schools and offices inside Kathmandu Valley can arrange weekly delivery through a bulk inquiry. Online ordering is expanding.</p>
                </div>
              </div>
            </div>

            <!-- Question 3 -->
            <div class="accordion-item" data-faq-category="products" data-faq-text="are all your products certified organic chemical free pesticide testing residue">
              <button type="button" class="accordion-header" aria-expanded="false">
                <span>Are all your products certified organic?</span>
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="6 9 12 15 18 9"></polyline></svg>
              </button>
              <div class="accordion-body">
                <div class="accordion-content">
                  <p>Some farms hold organic certification and many are chemical free but not yet certified. Every shelf label specifies origin and farming practice, and we test for pesticide residues regularly.</p>
                </div>
              </div>
            </div>

            <!-- Question 4 -->
            <div class="accordion-item" data-faq-category="farmers" data-faq-text="how can farmers work with the company cooperatives location crops harvest volume">
              <button type="button" class="accordion-header" aria-expanded="false">
                <span>How can farmers work with the company?</span>
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="6 9 12 15 18 9"></polyline></svg>
              </button>
              <div class="accordion-body">
                <div class="accordion-content">
                  <p>Farmers and cooperatives can contact the support team with information about their location, crops, expected volume and harvest period. Our field coordinators conduct site assessments and assist with buy-back agreements.</p>
                </div>
              </div>
            </div>

            <!-- Question 5 -->
            <div class="accordion-item" data-faq-category="farmers" data-faq-text="how do farmers get paid bank cooperative payment fifteen days collection centre">
              <button type="button" class="accordion-header" aria-expanded="false">
                <span>How do farmers get paid?</span>
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="6 9 12 15 18 9"></polyline></svg>
              </button>
              <div class="accordion-body">
                <div class="accordion-content">
                  <p>We agree the price with the farm or cooperative before harvest. Produce is weighed at collection points transparently, and payments are settled reliably via bank accounts or cooperative accounts within fifteen days.</p>
                </div>
              </div>
            </div>

            <!-- Question 6 -->
            <div class="accordion-item" data-faq-category="institutions" data-faq-text="do you offer bulk wholesale supplies for restaurants and hotels kathmandu">
              <button type="button" class="accordion-header" aria-expanded="false">
                <span>Do you offer wholesale supplies for restaurants and hotels?</span>
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="6 9 12 15 18 9"></polyline></svg>
              </button>
              <div class="accordion-body">
                <div class="accordion-content">
                  <p>Yes. We supply premium orthodox teas, high-altitude Marsi rice, cold-pressed oils, and seasonal vegetables directly to hotels, restaurants, and catering services across Kathmandu and Pokhara.</p>
                </div>
              </div>
            </div>
          @endif
        </div>

        <div style="margin-top: 3.5rem; background: var(--color-leaf-soft); border-left: 4px solid var(--color-forest); padding: 2rem; border-radius: 4px; text-align: center;">
          <h3 style="font-size: 1.35rem; font-weight: 800; color: var(--color-forest);">Still have a question?</h3>
          <p style="margin-top: 0.35rem; font-size: 0.98rem; color: var(--color-muted);">We are here to help farmers, consumers and institutional partners.</p>
          <a href="{{ route('contact') }}" class="btn btn-forest" style="margin-top: 1rem;">
            Contact our team
          </a>
        </div>
      </div>
    </section>
  </main>

  <script>
    document.addEventListener('DOMContentLoaded', () => {
      const searchInput = document.getElementById('faq-search-input');
      const filterPills = document.querySelectorAll('[data-faq-filter]');
      const items = document.querySelectorAll('#faq-accordion-list .accordion-item');

      let currentFilter = 'all';

      function applyFaqFilters() {
        const query = (searchInput?.value || '').toLowerCase().trim();
        items.forEach(item => {
          const cat = item.getAttribute('data-faq-category') || '';
          const text = (item.getAttribute('data-faq-text') || item.textContent).toLowerCase();
          const matchesCat = currentFilter === 'all' || cat === currentFilter;
          const matchesQuery = !query || text.includes(query);

          if (matchesCat && matchesQuery) {
            item.style.display = 'block';
          } else {
            item.style.display = 'none';
          }
        });
      }

      searchInput?.addEventListener('input', applyFaqFilters);

      filterPills.forEach(pill => {
        pill.addEventListener('click', () => {
          filterPills.forEach(p => p.classList.remove('active'));
          pill.classList.add('active');
          currentFilter = pill.getAttribute('data-faq-filter');
          applyFaqFilters();
        });
      });
    });
  </script>
@endsection
