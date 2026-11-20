@extends('layout.site')

@section('body_class', 'about-page')

@section('content')
  @include('site._partial.ticker')

  @php
    $aboutBanner = ($banner && !empty($banner->url_image)) ? $banner->url_image : asset('assets/images/farms/tea-field.jpg');
    $pageBlocks = ($page && is_array($page->blocks) && count($page->blocks)) ? $page->blocks : null;
  @endphp

  <main class="about-page">
    @include('site._partial.breadcrumb', [
      'title' => $page->name ?? 'About Munaa Krishi',
      'nepali_title' => 'मुना कृषि लिमिटेड',
      'subtitle' => 'A mutual undertaking between NRNA and the Government of Nepal.',
      'bg_image' => $aboutBanner,
      'breadcrumbs' => ['About Us' => '']
    ])

    @if(!empty($pageBlocks))
      {{-- Modular Block-Based Architecture Rendering --}}
      @include('site._partial.render_blocks', ['blocks' => $pageBlocks])
    @else
      {{-- Fallback default layout using About record if blocks not seeded --}}
      @php
        $whoWeAre = [
          'label' => $about->who_we_are_label ?? 'Who we are',
          'title' => $about->who_we_are_title ?? 'Building a trusted national agricultural brand',
          'reg_info' => $about->who_we_are_reg_info ?? 'Registered under the Companies Act of Nepal · Regd. No. 232466/076/077',
          'content' => $about->who_we_are_content ?? null,
          'image' => $about->who_we_are_image ?? null,
        ];
        $visionMission = [
          'vision_title' => $about->vision_title ?? 'Vision',
          'vision_content' => $about->vision_content ?? null,
          'mission_title' => $about->mission_title ?? 'Mission',
          'mission_content' => $about->mission_content ?? null,
        ];
        $orgStructure = [
          'label' => $about->org_structure_label ?? 'Governance & Team',
          'title' => $about->org_structure_title ?? 'Organizational structure',
          'subtitle' => $about->org_structure_subtitle ?? 'From the Board of Directors and Advisory Committees down to operations, regional logistics and department leads.',
          'image' => $about->org_structure_image ?? null,
          'caption' => $about->org_structure_caption ?? 'Scroll horizontally to view the full organizational structure of Munaa Krishi Limited.',
        ];
        $aimsData = [
          'label' => $about->aims_label ?? 'Objectives',
          'title' => $about->aims_title ?? 'What Munaa Krishi aims to achieve',
          'items' => $about->aims_content ?? [],
        ];
        $implementationData = [
          'label' => $about->implementation_label ?? 'Implementation',
          'title' => $about->implementation_title ?? 'Implementation strategies',
          'items' => $about->implementation_content ?? [],
        ];
        $investorsData = [
          'label' => $about->investment_label ?? 'Investment opportunities',
          'title' => $about->investment_title ?? 'Who can invest',
          'items' => $about->investment_content ?? [],
        ];
      @endphp

      @include('site.home.sections.who_we_are', ['settings' => $whoWeAre])
      @include('site.home.sections.vision_mission', ['settings' => $visionMission])
      @include('site.home.sections.org_structure', ['settings' => $orgStructure])
      @include('site.home.sections.aims_to_achieve', ['settings' => $aimsData])
      @include('site.home.sections.implementation', ['settings' => $implementationData])
      @include('site.home.sections.who_can_invest', ['settings' => $investorsData])
    @endif

    {{-- Optional Milestone Timeline / History if present and not included as block --}}
    @if(isset($histories) && $histories->isNotEmpty() && (!$pageBlocks || !collect($pageBlocks)->contains('type', 'history')))
    <section class="section-padding bg-leaf-soft border-line-b">
      <div class="container">
        <div>
          <p class="section-label">Milestones & Progress</p>
          <h2 class="section-title">Our journey through the years</h2>
          <p class="section-copy">Key developments shaping Munaa Krishi into a nationwide agricultural initiative.</p>
        </div>

        <div style="margin-top: 2.5rem; display: grid; gap: 1.5rem; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));">
          @foreach($histories as $history)
            <div style="background: #ffffff; border-left: 4px solid var(--color-forest); padding: 1.5rem; box-shadow: var(--shadow-sm); border-radius: 4px;">
              <span style="font-size: 1.25rem; font-weight: 800; color: var(--color-sindoor);">{{ $history->year }}</span>
              <p style="margin-top: 0.5rem; font-size: 1rem; color: var(--color-ink); line-height: 1.6;">
                {{ $history->description }}
              </p>
            </div>
          @endforeach
        </div>
      </div>
    </section>
    @endif

    {{-- Optional Key Achievements if present and not included as block --}}
    @if(isset($achievements) && $achievements->isNotEmpty() && (!$pageBlocks || !collect($pageBlocks)->contains('type', 'achievements')))
    <section class="section-padding">
      <div class="container">
        <div>
          <p class="section-label">Certifications & Impact</p>
          <h2 class="section-title">Achievements & recognitions</h2>
        </div>

        <div style="margin-top: 2.5rem; display: grid; gap: 1.75rem; grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));">
          @foreach($achievements as $achievement)
            <div style="background: #ffffff; border: 1px solid var(--color-line); overflow: hidden; box-shadow: var(--shadow-sm); text-align: center; padding: 1.5rem; border-radius: 4px;">
              @if($achievement->image)
                <img loading="lazy" decoding="async" src="{{ $achievement->url_image }}" alt="{{ $achievement->name }}" style="max-height: 100px; object-fit: contain; margin: 0 auto 1rem;">
              @endif
              <h3 style="font-size: 1.15rem; font-weight: 700; color: var(--color-forest);">{{ $achievement->name }}</h3>
            </div>
          @endforeach
        </div>
      </div>
    </section>
    @endif
  </main>
@endsection
