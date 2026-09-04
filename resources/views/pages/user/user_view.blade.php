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
        <li class="ax-breadcrumb__item" aria-current="page">Drivers</li>
        <li class="ax-breadcrumb__sep" aria-hidden="true"><svg class="ax-icon ax-icon--directional" viewBox="0 0 24 24"
            fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round"
            aria-hidden="true">
            <path d="M9 6l6 6l-6 6"></path>
          </svg></li>
        <li class="ax-breadcrumb__item"><a href="{{ url("user") }}">Leads</a></li>
        <li class="ax-breadcrumb__sep" aria-hidden="true"><svg class="ax-icon ax-icon--directional" viewBox="0 0 24 24"
            fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round"
            aria-hidden="true">
            <path d="M9 6l6 6l-6 6"></path>
          </svg></li>
        <li class="ax-breadcrumb__item" aria-current="page">{{ $result['email'] ?? '-' }}</li>
      </ol>
    </nav>
    <section class="ax-card ax-col--12">
      <div class="ax-card__header">
        <div class="ax-card__titles">
          <h2 class="ax-card__title">{{ $title }}</h2>
          <p class="ax-card__subtitle">Viewing detail for <strong>{{ $result['email'] ?? '-' }}</strong></p>
        </div>
      </div>
      <div class="ax-card__body"
        style="padding-top:20px;padding-bottom:30px;display:flex;flex-direction:column;gap:var(--ax-space-4);">
        <h6 class="ax-card__eyebrow" style="color:(--ax-text-muted);font-weight:bold">Main Data</h6>

        <div style="display:grid;grid-template-columns:1fr 1fr;gap:var(--ax-space-4);" class="ax-ci-2col">
          <div class="ax-field">
            <label class="ax-label" for="ci-name">Full Name</label>
            <input class="ax-input" value="{{ $result['full_name'] ?? '-' }}" disabled
              style="color:var(--ax-text-muted);background:white">
          </div>
          <div class="ax-field">
            <label class="ax-label" for="ci-email">Identity Number (NIK)</label>
            <input class="ax-input" value="{{ $result['nik'] ?? '-' }}" disabled
              style="color:var(--ax-text-muted);background:white">
          </div>
          <div class="ax-field">
            <label class="ax-label" for="ci-email">Email</label>
            <input class="ax-input" value="{{ $result['email'] ?? '-' }}" disabled
              style="color:var(--ax-text-muted);background:white">
          </div>
          <div class="ax-field">
            <label class="ax-label" for="ci-email">Phone</label>
            <input class="ax-input" value="{{ $result['phone'] ?? '-' }}" disabled
              style="color:var(--ax-text-muted);background:white">
          </div>
          <div class="ax-field">
            <label class="ax-label" for="ci-email">Vehicle Catalog</label>
            <input class="ax-input" value="{{ $result['phone'] ?? '-' }}" disabled
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
        <h6 class="ax-card__eyebrow" style="color:(--ax-text-muted);font-weight:bold">Personal Data</h6>
        <div style="display:grid;grid-template-columns:1fr 1fr;gap:var(--ax-space-4);" class="ax-ci-2col">
          <div class="ax-field">
            <label class="ax-label" for="ci-name">Date of Birth</label>
            <input class="ax-input" value="{{ $result['dob_format'] ?? '-' }}" disabled
              style="color:var(--ax-text-muted);background:white">
          </div>
          <div class="ax-field">
            <label class="ax-label" for="ci-email">Highest Education Level</label>
            <input class="ax-input" value="{{ $result['user_education_name'] ?? '-' }}" disabled
              style="color:var(--ax-text-muted);background:white">
          </div>
          <div class="ax-field">
            <label class="ax-label" for="ci-email">SIM Type</label>
            <input class="ax-input" value="{{ $result['user_sim_type_name'] }}" disabled
              style="color:var(--ax-text-muted);background:white">
          </div>
          <div class="ax-field">
            <label class="ax-label" for="ci-email">SIM Number</label>
            <input class="ax-input" value="{{ $result['sim_number'] }}" disabled
              style="color:var(--ax-text-muted);background:white">
          </div>
          <div class="ax-field">
            <label class="ax-label" for="ci-email">Province</label>
            <input class="ax-input" value="{{ $result['province_name'] }}" disabled
              style="color:var(--ax-text-muted);background:white">
          </div>
          <div class="ax-field">
            <label class="ax-label" for="ci-email">City</label>
            <input class="ax-input" value="{{ $result['city_name'] }}" disabled
              style="color:var(--ax-text-muted);background:white">
          </div>
          <div class="ax-field">
            <label class="ax-label" for="ci-email">District</label>
            <input class="ax-input" value="{{ $result['district_name'] }}" disabled
              style="color:var(--ax-text-muted);background:white">
          </div>
          <div class="ax-field">
            <label class="ax-label" for="ci-email">Village</label>
            <input class="ax-input" value="{{ $result['village_name'] }}" disabled
              style="color:var(--ax-text-muted);background:white">
          </div>
        </div>
        <div class="ax-field">
          <label class="ax-label" for="ci-client">Full Address</label>
          <input class="ax-input" value="{{ $result['full_address'] ?? '-' }}" disabled
            style="color:var(--ax-text-muted);background:white">
        </div>

        <div style="display:grid;grid-template-columns:1fr 1fr;gap:var(--ax-space-4);" class="ax-ci-2col">
          <div class="ax-field">
            <label class="ax-label" for="ci-name">Selfie Photo</label>
            <div class="box-photo-container">
              <img src="{{ $result['selfie_photo'] ?? '' }}" alt="Selfie Photo" class="box-photo">
            </div>
          </div>
          <div class="ax-field">
            <label class="ax-label" for="ci-name">ID Card Photo</label>
            <div class="box-photo-container">
              <img src="{{ $result['id_card_photo'] ?? '' }}" alt="ID Card Photo" class="box-photo">
            </div>
          </div>
          <div class="ax-field">
            <label class="ax-label" for="ci-name">Family Card Photo</label>
            <div class="box-photo-container">
              <img src="{{ $result['family_card_photo'] ?? '' }}" alt="Family Card Photo" class="box-photo">
            </div>
          </div>
          <div class="ax-field">
            <label class="ax-label" for="ci-name">SIM Photo</label>
            <div class="box-photo-container">
              <img src="{{ $result['sim_photo'] ?? '' }}" alt="SIM Photo" class="box-photo">
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="ax-card ax-col--12">
      <div class="ax-card__body"
        style="padding-top:30px;padding-bottom:30px;display:flex;flex-direction:column;gap:var(--ax-space-4);">
        <h6 class="ax-card__eyebrow" style="color:(--ax-text-muted);font-weight:bold">Residence Data</h6>
        
        <div style="display:grid;grid-template-columns:1fr 1fr;gap:var(--ax-space-4);" class="ax-ci-2col">
          <div class="ax-field">
            <label class="ax-label" for="ci-name">Residential Address</label>
            <input class="ax-input" value="{{ $result['dob_format'] ?? '-' }}" disabled
              style="color:var(--ax-text-muted);background:white">
          </div>
          <div class="ax-field">
            <label class="ax-label" for="ci-email">Length of Residence</label>
            <input class="ax-input" value="{{ $result['user_length_of_stay_name'] }}" disabled
              style="color:var(--ax-text-muted);background:white">
          </div>
          <div class="ax-field">
            <label class="ax-label" for="ci-email">Province (Residence)</label>
            <input class="ax-input" value="{{ $result['user_sim_type_name'] }}" disabled
              style="color:var(--ax-text-muted);background:white">
          </div>
          <div class="ax-field">
            <label class="ax-label" for="ci-email">City (Residence)</label>
            <input class="ax-input" value="{{ $result['sim_number'] }}" disabled
              style="color:var(--ax-text-muted);background:white">
          </div>
          <div class="ax-field">
            <label class="ax-label" for="ci-email">District (Residence)</label>
            <input class="ax-input" value="{{ $result['province_name'] }}" disabled
              style="color:var(--ax-text-muted);background:white">
          </div>
          <div class="ax-field">
            <label class="ax-label" for="ci-email">Village (Residence)</label>
            <input class="ax-input" value="{{ $result['city_name'] }}" disabled
              style="color:var(--ax-text-muted);background:white">
          </div>
        </div>
        <div class="ax-field">
          <label class="ax-label" for="ci-email">Full Address (Residence)</label>
          <input class="ax-input" value="{{ $result['district_name'] }}" disabled
            style="color:var(--ax-text-muted);background:white">
        </div>
          
          <div class="ax-field">
            <label class="ax-label" for="ci-name">Certificate of Residence</label>
            <div class="box-photo-container">
              <img src="{{ $result['sim_photo'] ?? '' }}" alt="SIM Photo" class="box-photo">
            </div>
          </div>
      </div>
    </section>
    <section class="ax-card ax-col--12">
      <div class="ax-card__body"
        style="padding-top:30px;padding-bottom:30px;display:flex;flex-direction:column;gap:var(--ax-space-4);">
        <h6 class="ax-card__eyebrow" style="color:(--ax-text-muted);font-weight:bold">Supporting Data</h6>
        
        <div style="display:grid;grid-template-columns:1fr 1fr;gap:var(--ax-space-4);" class="ax-ci-2col">
          <div class="ax-field">
            <label class="ax-label" for="ci-name">Work Experience</label>
            <input class="ax-input" value="{{ $result['user_work_experience_name'] ?? '-' }}" disabled
              style="color:var(--ax-text-muted);background:white">
          </div>
          <div class="ax-field">
            <label class="ax-label" for="ci-email">Online Application</label>
            <input class="ax-input" value="{{ $result['user_online_application_name'] }}" disabled
              style="color:var(--ax-text-muted);background:white">
          </div>
          <div class="ax-field">
            <label class="ax-label" for="ci-email">Emergency Contact Name</label>
            <input class="ax-input" value="{{ $result['user_sim_type_name'] }}" disabled
              style="color:var(--ax-text-muted);background:white">
          </div>
          <div class="ax-field">
            <label class="ax-label" for="ci-email">Emergency Contact Phone</label>
            <input class="ax-input" value="{{ $result['sim_number'] }}" disabled
              style="color:var(--ax-text-muted);background:white">
          </div>
          <div class="ax-field">
            <label class="ax-label" for="ci-email">Relationship to Emergency Contact</label>
            <input class="ax-input" value="{{ $result['sim_number'] }}" disabled
              style="color:var(--ax-text-muted);background:white">
          </div>
          <div class="ax-field">
            <label class="ax-label" for="ci-email">Information Source</label>
            <input class="ax-input" value="{{ $result['user_lead_source_name'] }}" disabled
              style="color:var(--ax-text-muted);background:white">
          </div>
        </div>
          
      </div>
    </section>
    

  </div>
@endsection

@section('foot_custom')
@endsection