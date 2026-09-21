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
        <li class="ax-breadcrumb__item"><a href="{{ url("assignment") }}">Assignment</a></li>
        <li class="ax-breadcrumb__sep" aria-hidden="true"><svg class="ax-icon ax-icon--directional" viewBox="0 0 24 24"
            fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round"
            aria-hidden="true">
            <path d="M9 6l6 6l-6 6"></path>
          </svg></li>
        <li class="ax-breadcrumb__item" aria-current="page">{{ $title }}</li>
      </ol>
    </nav>
    <section class="ax-card ax-col--12">
      <div class="ax-card__header">
        <div class="ax-card__titles">
          <h2 class="ax-card__title">{{ $title }}</h2>
        </div>
      </div>
      <div class="ax-card__body"
        style="padding-top:20px;padding-bottom:30px;display:flex;flex-direction:column;gap:var(--ax-space-4);">

        <div style="display:grid;grid-template-columns:1fr 1fr;gap:var(--ax-space-4);" class="ax-ci-2col">
          <div class="ax-field">
            <label class="ax-label" for="vehicle_id">Vehicle <span class="ax-field__required" aria-hidden="true">*</span></label>
            <select id="vehicle_id" class="ax-select" name="vehicle_id">
              <option value="">--All--</option>

              @forelse ($vehicle as $value_select)
                <option
                    value="{{ $value_select['id'] }}"
                    {{ request('vehicle_id') == $value_select['id'] ? 'selected' : '' }}
                >
                    {{ $value_select['vehicle_brand_name'] }} - {{ $value_select['vehicle_model_name'] }} - {{ $value_select['year'] }} 
                </option>
              @empty
                <option value="" disabled>No data available</option>
              @endforelse
            </select>
          </div>
          
          <div class="ax-field">
            <label class="ax-label" for="user_id">Driver <span class="ax-field__required" aria-hidden="true">*</span></label>
            <select id="user_id" class="ax-select" name="user_id">
              <option value="">--All--</option>

              @forelse ($user as $value_select)
                <option
                    value="{{ $value_select['id'] }}"
                    {{ request('user_id') == $value_select['id'] ? 'selected' : '' }}
                >
                    {{ $value_select['full_name'] }}
                </option>
              @empty
                <option value="" disabled>No data available</option>
              @endforelse
            </select>
          </div>

      </div>
    </section>
  </div>
@endsection

@section('foot_custom')
@endsection