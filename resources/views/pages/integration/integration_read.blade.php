@extends('layouts.app')

@section('head_custom')
@endsection

@section('content')
<div class="ax-page-head">
  <div class="ax-page-head__row">
    <div>
      <nav data-ax-breadcrumb aria-label="Breadcrumb" class="pb-4!">
        <ol class="ax-breadcrumb__list">
          <li class="ax-breadcrumb__item"><a class="ax-breadcrumb__link" href="javascript:void(0)"
              aria-label="Home"><svg class="ax-breadcrumb__home" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                <path
                  d="M19 8.71l-5.333 -4.148a2.666 2.666 0 0 0 -3.274 0l-5.334 4.148a2.665 2.665 0 0 0 -1.029 2.105v7.2a2 2 0 0 0 2 2h12a2 2 0 0 0 2 -2v-7.2c0 -.823 -.38 -1.6 -1.03 -2.105">
                </path>
                <path d="M16 15c-2.21 1.333 -5.792 1.333 -8 0"></path>
              </svg></a></li>
          <li class="ax-breadcrumb__sep" aria-hidden="true"><svg class="ax-icon ax-icon--directional"
              viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round"
              stroke-linejoin="round" aria-hidden="true">
              <path d="M9 6l6 6l-6 6"></path>
            </svg></li>
          <li class="ax-breadcrumb__item" aria-current="page">Integration</li>
        </ol>
      </nav>
      <h1 class="ax-page-head__title">{{ $title }}</h1>
      <p class="ax-page-head__subtitle">Manage your account, security, notifications and billing.</p>
    </div>
    <div class="ax-page-head__actions">
      <span x-show="dirty" x-cloak class="ax-cluster"
        style="gap:6px;color:var(--ax-warning-500);font-size:var(--ax-text-xs);">
        <span style="width:7px;height:7px;border-radius:50%;background:var(--ax-warning-500);"></span>Unsaved changes
      </span>
    </div>
  </div>
</div>
<div class="ax-dash-grid pt-0!">
  <section class="ax-card ax-col--4 ax-card--interactive" role="region" aria-label="Website Company">
    <div class="ax-card__body" style="display:flex;flex-direction:column;gap:var(--ax-space-3);">
      <span class="ax-avatar ax-avatar--lg ax-avatar--squircle" style="background:color-mix(in oklab,var(--ax-viz-cyan) 18%,transparent);color:var(--ax-viz-cyan);"><svg class="ax-avatar__icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M4 13a8 8 0 0 1 7 7a6 6 0 0 0 3 -5a9 9 0 0 0 6 -8a3 3 0 0 0 -3 -3a9 9 0 0 0 -8 6a6 6 0 0 0 -5 3"/><path d="M7 14a6 6 0 0 0 -3 6a6 6 0 0 0 6 -3"/><path d="M14 9a1 1 0 1 0 2 0a1 1 0 1 0 -2 0"/></svg></span>
      <div>
        <h3 style="font-weight:var(--ax-weight-semibold);color:var(--ax-text-strong);font-size:var(--ax-text-md);">Website Company</h3>
        <p style="color:var(--ax-text-muted);font-size:var(--ax-text-sm);margin-top:4px;">Set up your account, create a workspace and invite your team.</p>
      </div>
      <button type="button" class="ax-btn ax-btn--secondary">
                <span class="ax-btn__label">Continue</span>
                <svg class="ax-btn__icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M5 12l14 0"/><path d="M13 18l6 -6"/><path d="M13 6l6 6"/></svg>
              </button>
    </div>
  </section>
</div>
@endsection

@section('foot_custom')
@endsection