@extends('layout.site')

@section('body_class', 'policy-page')

@section('content')
  @include('site._partial.ticker')

  @include('site._partial.breadcrumb', [
    'title' => 'Privacy Policy',
    'nepali_title' => 'गोपनीयता नीति',
    'subtitle' => 'Last updated: Asoj 18, 2083 BS (October 4, 2026)',
    'bg_image' => 'assets/images/farms/nepal-terrace-farm.jpg',
    'breadcrumbs' => ['Privacy Policy' => '']
  ])

  <main class="section-padding">
    <div class="container policy-grid">

      <!-- Sticky Table of Contents -->
      <aside class="policy-toc">
        <h2 class="policy-toc-title">On this page</h2>
        <nav aria-label="On this page">
          <a href="#who-we-are" class="policy-toc-link">1. Who we are</a>
          <a href="#what-we-collect" class="policy-toc-link">2. Information we collect</a>
          <a href="#how-we-use" class="policy-toc-link">3. How we use your information</a>
          <a href="#legal-basis" class="policy-toc-link">4. Our legal basis</a>
          <a href="#sharing" class="policy-toc-link">5. Who we share it with</a>
          <a href="#retention" class="policy-toc-link">6. How long we keep it</a>
          <a href="#security" class="policy-toc-link">7. Keeping it safe</a>
          <a href="#your-rights" class="policy-toc-link">8. Your rights</a>
          <a href="#children" class="policy-toc-link">9. Children</a>
          <a href="#changes" class="policy-toc-link">10. Changes to this policy</a>
          <a href="#contact" class="policy-toc-link">11. Contact us about privacy</a>
        </nav>
      </aside>

      <!-- Policy Content -->
      <article class="prose-policy">
        <p style="font-size: 1.15rem; line-height: 1.8; color: var(--color-ink); font-weight: 500; margin-bottom: 2rem;">
          Your trust matters to us as much as the quality of our produce. This policy explains, in plain language, what information we collect through this website, why we collect it and how you can control it.
        </p>

        <section id="who-we-are" style="margin-bottom: 2.5rem; scroll-margin-top: 7rem;">
          <h2>1. Who we are</h2>
          <p>
            This website is run by Munaa Krishi Limited, a company registered in Nepal (Reg. No. 232466/076/077) with its head office at Sanepa, Lalitpur, Nepal. In this policy, &ldquo;we&rdquo;, &ldquo;us&rdquo; and &ldquo;Munaa Krishi&rdquo; mean this company.
          </p>
        </section>

        <section id="what-we-collect" style="margin-bottom: 2.5rem; scroll-margin-top: 7rem;">
          <h2>2. Information we collect</h2>
          <p>We only collect what we need to reply to you and run the website.</p>
          <ul>
            <li><strong>Contact and product inquiries:</strong> your name, phone number, email address, nearest outlet and the message you write.</li>
            <li><strong>Farmer and supplier applications:</strong> your name or group name, mobile number, district, municipality, crop types, land area, expected harvest and farming practice.</li>
            <li><strong>Technical information:</strong> your browser type, device, pages visited and an anonymised IP address, only if you allow analytics cookies.</li>
          </ul>
          <p>We do not ask for citizenship numbers, bank details or payment information on this website.</p>
        </section>

        <section id="how-we-use" style="margin-bottom: 2.5rem; scroll-margin-top: 7rem;">
          <h2>3. How we use your information</h2>
          <ul>
            <li>To answer your questions and give quotes for bulk or institutional orders.</li>
            <li>To review farmer applications, call applicants and plan farm visits.</li>
            <li>To improve the website by understanding which pages are useful.</li>
            <li>To keep the website safe and block spam and misuse.</li>
          </ul>
        </section>

        <section id="legal-basis" style="margin-bottom: 2.5rem; scroll-margin-top: 7rem;">
          <h2>4. Our legal basis</h2>
          <p>
            We handle personal information in line with the Individual Privacy Act, 2075 (2018), the Electronic Transactions Act, 2063 (2008) and other laws of Nepal. We process your information because you have asked us to contact you, because you have given consent (for example to analytics cookies), or because we need it to meet a legal duty.
          </p>
        </section>

        <section id="sharing" style="margin-bottom: 2.5rem; scroll-margin-top: 7rem;">
          <h2>5. Who we share it with</h2>
          <p>We never sell or rent your personal information. We share it only when needed:</p>
          <ul>
            <li>With the outlet or field officer who will handle your request.</li>
            <li>With our hosting provider and email service, who store data for us under confidentiality terms.</li>
            <li>With Google, when you load an outlet map or allow analytics. See our <a href="{{ route('cookie.policy') }}" style="color: var(--color-forest); text-decoration: underline; font-weight: 600;">Cookie Policy</a>.</li>
            <li>With government authorities if the law requires it.</li>
          </ul>
        </section>

        <section id="retention" style="margin-bottom: 2.5rem; scroll-margin-top: 7rem;">
          <h2>6. How long we keep it</h2>
          <ul>
            <li><strong>General inquiries:</strong> up to 2 years after our last contact with you.</li>
            <li><strong>Farmer applications:</strong> up to 3 years, or for as long as we work together.</li>
            <li><strong>Analytics data:</strong> up to 14 months, in anonymised form.</li>
          </ul>
        </section>

        <section id="security" style="margin-bottom: 2.5rem; scroll-margin-top: 7rem;">
          <h2>7. Keeping it safe</h2>
          <p>
            The website uses HTTPS encryption, encrypted passwords, protection against form forgery and SQL injection, and role-based access so that staff only see what they need. Backups are stored safely. No system is perfectly secure, but we take reasonable care and will inform affected people if a serious breach happens.
          </p>
        </section>

        <section id="your-rights" style="margin-bottom: 2.5rem; scroll-margin-top: 7rem;">
          <h2>8. Your rights</h2>
          <p>Under Nepali privacy law you can:</p>
          <ul>
            <li>Ask what information we hold about you.</li>
            <li>Ask us to correct mistakes in your information.</li>
            <li>Ask us to delete your contact or farmer details if we no longer need them.</li>
            <li>Withdraw consent to analytics cookies at any time via the Cookie Settings in the footer.</li>
          </ul>
        </section>

        <section id="children" style="margin-bottom: 2.5rem; scroll-margin-top: 7rem;">
          <h2>9. Children</h2>
          <p>This website is not aimed at children under 16, and we do not knowingly collect information from them.</p>
        </section>

        <section id="changes" style="margin-bottom: 2.5rem; scroll-margin-top: 7rem;">
          <h2>10. Changes to this policy</h2>
          <p>When we update this policy we will change the &ldquo;Last updated&rdquo; date at the top. For big changes we will put a notice on the homepage.</p>
        </section>

        <section id="contact" style="scroll-margin-top: 7rem;">
          <h2>11. Contact us about privacy</h2>
          <p>If you have questions about this policy or your personal information:</p>
          <ul>
            <li><strong>Email:</strong> <a href="mailto:info@munaa.com.np" style="color: var(--color-forest); font-weight: 600;">info@munaa.com.np</a></li>
            <li><strong>Phone:</strong> <a href="tel:+9779803165605" style="color: var(--color-forest); font-weight: 600;">+977-98031 65605</a></li>
            <li><strong>Post:</strong> Privacy Officer, Munaa Krishi Limited, Sanepa, Lalitpur, Nepal</li>
          </ul>
        </section>
      </article>

    </div>
  </main>
@endsection
