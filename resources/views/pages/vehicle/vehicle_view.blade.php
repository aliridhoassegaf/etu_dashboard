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
        <li class="ax-breadcrumb__item" aria-current="page">Vehicles</li>
        <li class="ax-breadcrumb__sep" aria-hidden="true"><svg class="ax-icon ax-icon--directional" viewBox="0 0 24 24"
            fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round"
            aria-hidden="true">
            <path d="M9 6l6 6l-6 6"></path>
          </svg></li>
        <li class="ax-breadcrumb__item"><a href="{{ url("user") }}">Vehicle</a></li>
        <li class="ax-breadcrumb__sep" aria-hidden="true"><svg class="ax-icon ax-icon--directional" viewBox="0 0 24 24"
            fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round"
            aria-hidden="true">
            <path d="M9 6l6 6l-6 6"></path>
          </svg></li>
        <li class="ax-breadcrumb__item" aria-current="page">{{ $result['plat_number'] ?? '-' }}</li>
      </ol>
    </nav>
    <section class="ax-card ax-col--12">
      <div class="ax-card__header">
        <div class="ax-card__titles">
          <h2 class="ax-card__title">{{ $title }}</h2>
          <p class="ax-card__subtitle">Viewing detail for <strong>{{ $result['plat_number'] ?? '-' }}</strong></p>
        </div>
      </div>
      <div class="ax-card__body"
        style="padding-top:20px;padding-bottom:30px;display:flex;flex-direction:column;gap:var(--ax-space-4);">
        <h6 class="ax-card__eyebrow" style="color:(--ax-text-muted);font-weight:bold">Main Data</h6>

        <div style="display:grid;grid-template-columns:1fr 1fr;gap:var(--ax-space-4);" class="ax-ci-2col">
          <div class="ax-field">
            <label class="ax-label" for="ci-name">Brand</label>
            <input class="ax-input" value="{{ $result['vehicle_brand_name'] ?? '-' }}" disabled
              style="color:var(--ax-text-muted);background:white">
          </div>
          <div class="ax-field">
            <label class="ax-label" for="ci-email">Model</label>
            <input class="ax-input" value="{{ $result['vehicle_model_name'] ?? '-' }}" disabled
              style="color:var(--ax-text-muted);background:white">
          </div>
          <div class="ax-field">
            <label class="ax-label" for="ci-email">Year</label>
            <input class="ax-input" value="{{ $result['year'] ?? '-' }}" disabled
              style="color:var(--ax-text-muted);background:white">
          </div>
          <div class="ax-field">
            <label class="ax-label" for="ci-name">Plat Number</label>
            <input class="ax-input" value="{{ $result['plat_number'] ?? '-' }}" disabled
              style="color:var(--ax-text-muted);background:white">
          </div>
          <div class="ax-field">
            <label class="ax-label" for="ci-email">Type</label>
            <input class="ax-input" value="{{ $result['vehicle_type_name'] ?? '-' }}" disabled
              style="color:var(--ax-text-muted);background:white">
          </div>
          <div class="ax-field">
            <label class="ax-label" for="ci-email">Rental Option</label>
            <input class="ax-input" value="{{ $result['company_vehicle_rental_option_name'] }}" disabled
              style="color:var(--ax-text-muted);background:white">
          </div>
          <div class="ax-field">
            <label class="ax-label" for="ci-email">Engine Number</label>
            <input class="ax-input" value="{{ $result['engine_number'] }}" disabled
              style="color:var(--ax-text-muted);background:white">
          </div>
          <div class="ax-field">
            <label class="ax-label" for="ci-email">Frame Number</label>
            <input class="ax-input" value="{{ $result['frame_number'] }}" disabled
              style="color:var(--ax-text-muted);background:white">
          </div>
          <div class="ax-field">
            <label class="ax-label" for="ci-email">STNK Expire Date</label>
            <input class="ax-input" value="{{ $result['stnk_expire_date_format'] }}" disabled
              style="color:var(--ax-text-muted);background:white">
          </div>
          <div class="ax-field">
            <label class="ax-label" for="ci-email">STNK Expire Date 5 Year</label>
            <input class="ax-input" value="{{ $result['stnk_expire_date_5_year_format'] }}" disabled
              style="color:var(--ax-text-muted);background:white">
          </div>
          <div class="ax-field">
            <label class="ax-label" for="ci-name">Color</label>
            <input class="ax-input" value="{{ $result['vehicle_color_name'] ?? '-' }}" disabled
              style="color:var(--ax-text-muted);background:white">
          </div>
          <div class="ax-field">
            <label class="ax-label" for="ci-email">Vehicle Ownership</label>
            <input class="ax-input" value="{{ $result['company_vehicle_ownership_name'] }}" disabled
              style="color:var(--ax-text-muted);background:white">
          </div>
          <div class="ax-field">
            <label class="ax-label" for="ci-email">Supplier</label>
            <input class="ax-input" value="{{ $result['vehicle_supplier_name'] }}" disabled
              style="color:var(--ax-text-muted);background:white">
          </div>
          <div class="ax-field">
            <label class="ax-label" for="ci-email">Pool</label>
            <input class="ax-input" value="{{ $result['company_pool_name'] }}" disabled
              style="color:var(--ax-text-muted);background:white">
          </div>
          <div class="ax-field">
            <label class="ax-label" for="ci-email">Status</label>
            <input class="ax-input" value="{{ $result['status_name'] }}" disabled
              style="color:var(--ax-text-muted);background:white">
          </div>
          <div class="ax-field">
            <label class="ax-label" for="ci-email">Created At</label>
            <input class="ax-input" value="{{ $result['created_at'] ?? '-' }}" disabled
              style="color:var(--ax-text-muted);background:white">
          </div>
        </div>

      </div>
    </section>
    <section class="ax-card ax-col--12">
      <div class="ax-card__body"
        style="padding-top:30px;padding-bottom:30px;display:flex;flex-direction:column;gap:var(--ax-space-4);">
        <h6 class="ax-card__eyebrow" style="color:(--ax-text-muted);font-weight:bold">Document</h6>

        <div style="display:grid;grid-template-columns:1fr 1fr;gap:var(--ax-space-4);" class="ax-ci-2col">
          <div class="ax-field">
            <label class="ax-label" for="ci-name">STNK</label>
            <div class="box-photo-container">
              <img src="{{ $result['document_stnk'] ?? '' }}" alt="STNK" class="box-photo">
            </div>
          </div>
          <div class="ax-field">
            <label class="ax-label" for="ci-name">Photo</label>
            <div class="box-photo-container">
              <img src="{{ $result['document_photo'] ?? '' }}" alt="Photo" class="box-photo">
            </div>
          </div>
          <div class="ax-field">
            <label class="ax-label" for="ci-name">BBM Barcode</label>
            <div class="box-photo-container">
              <img src="{{ $result['document_bbm_barcode'] ?? '' }}" alt="BBM Barcode" class="box-photo">
            </div>
          </div>
        </div>
      </div>
    </section>


  </div>
@endsection

@section('foot_custom')
@endsection