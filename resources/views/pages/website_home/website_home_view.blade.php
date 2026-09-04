@extends('layouts.app')

{{-- Basic Tables — faithful re-expression of src/html/tables/basic.html.
Pure CSS table variants; same DOM/classes/ARIA, no page script. --}}
@section('head_custom')
@endsection

@section('content')

  <!-- ════════════════ CONTENT ════════════════ -->
  <div class="ax-dash-grid">
    <nav data-ax-breadcrumb aria-label="Breadcrumb">
      <ol class="ax-breadcrumb__list">
        <li class="ax-breadcrumb__item"><a class="ax-breadcrumb__link" href="javascript:void(0)" aria-label="Home"><svg
              class="ax-breadcrumb__home" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75"
              stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
              <path
                d="M19 8.71l-5.333 -4.148a2.666 2.666 0 0 0 -3.274 0l-5.334 4.148a2.665 2.665 0 0 0 -1.029 2.105v7.2a2 2 0 0 0 2 2h12a2 2 0 0 0 2 -2v-7.2c0 -.823 -.38 -1.6 -1.03 -2.105">
              </path>
              <path d="M16 15c-2.21 1.333 -5.792 1.333 -8 0"></path>
            </svg></a></li>
        <li class="ax-breadcrumb__sep" aria-hidden="true"><svg class="ax-icon ax-icon--directional" viewBox="0 0 24 24"
            fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round"
            aria-hidden="true">
            <path d="M9 6l6 6l-6 6"></path>
          </svg></li>
        <li class="ax-breadcrumb__item" aria-current="page">Website</li>
        <li class="ax-breadcrumb__sep" aria-hidden="true"><svg class="ax-icon ax-icon--directional" viewBox="0 0 24 24"
            fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round"
            aria-hidden="true">
            <path d="M9 6l6 6l-6 6"></path>
          </svg></li>
        <li class="ax-breadcrumb__item" aria-current="page">Home</li>
      </ol>
    </nav>
    <!-- ───── DEFAULT TABLE ───── -->
    <section class="ax-card ax-col--12" role="region" aria-label="Default table">
      <div class="ax-card__header">
        <div class="ax-card__titles">
          <h2 class="ax-card__title">{{ $title }}</h2>
          <p class="ax-card__subtitle">Manage administrator accounts and their access.</p>
        </div>
      </div>
      <div class="ax-card__body" style="padding-top:0;">
        <div class="ax-tabs ax-tabs--segmented">
          @include('partials.home_tab')
          <div class="ax-tabs__panel" role="tabpanel" x-show="isActive(1)" x-transition.opacity>
            <div class="ax-card__body p-0!" style="display:flex;flex-direction:column;gap:var(--ax-space-5);">
              <div class="ax-field">
                <label class="ax-label" for="fe-name">About Title</label>
                <input class="ax-input" value="{{ $result['about_title'] ?? '-' }}" disabled
                  style="color:var(--ax-text-muted);">
              </div>

              <div class="ax-field">
                <label class="ax-label" for="fe-name">About Short Description</label>
                <input class="ax-input" value="{{ $result['about_short_description'] ?? '-' }}" disabled
                  style="color:var(--ax-text-muted);">
              </div>

              <div class="ax-field">
                <label class="ax-label" for="fe-name">About Image</label>
                <input class="ax-input" value="{{ $result['about_image'] ?? '-' }}" disabled
                  style="color:var(--ax-text-muted);">
              </div>

              <div class="ax-field">
                <label class="ax-label" for="fe-name">Annual Report Title</label>
                <input class="ax-input" value="{{ $result['annual_report_title'] ?? '-' }}" disabled
                  style="color:var(--ax-text-muted);">
              </div>

              <div class="ax-field">
                <label class="ax-label" for="fe-name">Annual Report Short Description</label>
                <input class="ax-input" value="{{ $result['annual_report_short_description'] ?? '-' }}" disabled
                  style="color:var(--ax-text-muted);">
              </div>

            </div>
          </div>
        </div>
      </div>
    </section>


  </div>
@endsection

@section('foot_custom')
@endsection