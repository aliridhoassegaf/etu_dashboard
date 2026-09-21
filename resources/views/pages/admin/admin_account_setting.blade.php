@extends('layouts.app')

@section('content')
  <!-- ════════════════ PAGE HEAD ════════════════ -->
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
            <li class="ax-breadcrumb__item" aria-current="page">Account</li>
            <li class="ax-breadcrumb__sep" aria-hidden="true"><svg class="ax-icon ax-icon--directional"
                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round"
                stroke-linejoin="round" aria-hidden="true">
                <path d="M9 6l6 6l-6 6"></path>
              </svg></li>
            <li class="ax-breadcrumb__item" aria-current="page">{{ $title }}</li>
          </ol>
        </nav>
        <h1 class="ax-page-head__title">{{ $title }}</h1>
      </div>
      <div class="ax-page-head__actions">
        <span x-show="dirty" x-cloak class="ax-cluster"
          style="gap:6px;color:var(--ax-warning-500);font-size:var(--ax-text-xs);">
          <span style="width:7px;height:7px;border-radius:50%;background:var(--ax-warning-500);"></span>Unsaved changes
        </span>
      </div>
    </div>
  </div>

  <!-- ════════════════ SETTINGS LAYOUT ════════════════ -->
  <div class="ax-dash-grid pt-0!">
    <!-- LEFT TAB RAIL -->
    @include('partials.account_tab')

    <!-- RIGHT PANELS -->
    <div class="ax-col--9" style="display:flex;flex-direction:column;gap:var(--ax-space-6);">

      <!-- ░░░ ACCOUNT ░░░ -->
      <div class="ax-stack" style="--ax-gap:var(--ax-space-6);">

        <section class="ax-card">
          <div class="ax-card__header">
            <div class="ax-card__titles">
              <h2 class="ax-card__title">Update Password</h2>
            </div>
            <!-- global error -->
          </div>



          <form method="POST" id="form_update_password" action="{{ url('admin-update-password') }}">
            @csrf
            <div class="ax-card__body"
              style="padding-top:0;display:grid;grid-template-columns:1fr 1fr;gap:var(--ax-space-5);">

              @if(session('success'))
                <div role="alert" class="ax-alert ax-alert--success"
                  style="grid-column:1 / -1; padding:var(--ax-space-3) var(--ax-space-4);">
                  <svg class="ax-alert__icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75"
                    stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                    <path d="M3 12a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" />
                    <path d="M12 8v4" />
                    <path d="M12 16h.01" />
                  </svg>
                  <div class="ax-alert__content">
                    <p class="ax-alert__message" style="color:var(--ax-success-500);">{{ session('success') }}</p>
                  </div>
                </div>
              @endif

              @if(session('error'))
                <div role="alert" class="ax-alert ax-alert--danger"
                  style="grid-column:1 / -1; padding:var(--ax-space-3) var(--ax-space-4);">
                  <svg class="ax-alert__icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75"
                    stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                    <path d="M3 12a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" />
                    <path d="M12 8v4" />
                    <path d="M12 16h.01" />
                  </svg>
                  <div class="ax-alert__content">
                    <p class="ax-alert__message" style="color:var(--ax-danger-500);">{{ session('error') }}</p>
                  </div>
                </div>
              @endif

              <div class="ax-field" x-data="{ show:false }" style="grid-column:1 / -1;">
                <label class="ax-label" for="current_password">Current Password</label>
                <div class="ax-field__control">
                  <input :type="show ? 'text' : 'password'" class="ax-input ax-input--with-trailing" id="current_password"
                    name="current_password" autocomplete="off">
                  <button type="button" class="ax-field__affix ax-field__affix--trailing ax-field__affix--button"
                    @click="show=!show" :aria-label="show ? 'Hide password' : 'Show password'">
                    <svg x-show="!show" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75"
                      stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                      <path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                      <path d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6" />
                    </svg>
                    <svg x-show="show" x-cloak viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75"
                      stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                      <path d="M10.585 10.587a2 2 0 0 0 2.829 2.828" />
                      <path
                        d="M16.681 16.673a8.717 8.717 0 0 1 -4.681 1.327c-3.6 0 -6.6 -2 -9 -6c1.272 -2.12 2.712 -3.678 4.32 -4.674m2.86 -1.146a9.055 9.055 0 0 1 1.82 -.18c3.6 0 6.6 2 9 6c-.666 1.11 -1.379 2.067 -2.138 2.87" />
                      <path d="M3 3l18 18" />
                    </svg>
                  </button>
                </div>
              </div>

              <div class="ax-field" x-data="{ show:false }" style="grid-column:1 / -1;">
                <label class="ax-label" for="new_password">New Password</label>
                <div class="ax-field__control">
                  <input :type="show ? 'text' : 'password'" class="ax-input ax-input--with-trailing" id="new_password"
                    name="new_password" autocomplete="off">
                  <button type="button" class="ax-field__affix ax-field__affix--trailing ax-field__affix--button"
                    @click="show=!show" :aria-label="show ? 'Hide password' : 'Show password'">
                    <svg x-show="!show" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75"
                      stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                      <path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                      <path d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6" />
                    </svg>
                    <svg x-show="show" x-cloak viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75"
                      stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                      <path d="M10.585 10.587a2 2 0 0 0 2.829 2.828" />
                      <path
                        d="M16.681 16.673a8.717 8.717 0 0 1 -4.681 1.327c-3.6 0 -6.6 -2 -9 -6c1.272 -2.12 2.712 -3.678 4.32 -4.674m2.86 -1.146a9.055 9.055 0 0 1 1.82 -.18c3.6 0 6.6 2 9 6c-.666 1.11 -1.379 2.067 -2.138 2.87" />
                      <path d="M3 3l18 18" />
                    </svg>
                  </button>
                </div>
              </div>

              <div class="ax-field" x-data="{ show:false }" style="grid-column:1 / -1;">
                <label class="ax-label" for="confirm_new_password">Confirm New Password</label>
                <div class="ax-field__control">
                  <input :type="show ? 'text' : 'password'" class="ax-input ax-input--with-trailing"
                    id="confirm_new_password" name="confirm_new_password" autocomplete="off">
                  <button type="button" class="ax-field__affix ax-field__affix--trailing ax-field__affix--button"
                    @click="show=!show" :aria-label="show ? 'Hide password' : 'Show password'">
                    <svg x-show="!show" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75"
                      stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                      <path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                      <path d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6" />
                    </svg>
                    <svg x-show="show" x-cloak viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75"
                      stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                      <path d="M10.585 10.587a2 2 0 0 0 2.829 2.828" />
                      <path
                        d="M16.681 16.673a8.717 8.717 0 0 1 -4.681 1.327c-3.6 0 -6.6 -2 -9 -6c1.272 -2.12 2.712 -3.678 4.32 -4.674m2.86 -1.146a9.055 9.055 0 0 1 1.82 -.18c3.6 0 6.6 2 9 6c-.666 1.11 -1.379 2.067 -2.138 2.87" />
                      <path d="M3 3l18 18" />
                    </svg>
                  </button>
                </div>
              </div>

            </div>
            <div class="ax-cluster m-5! mt-0!" style="gap:var(--ax-space-3); justify-content:flex-end;">
              <button type="submit" class="ax-btn ax-btn--primary">
                <span class="ax-btn__label">Save Data</span>
              </button>
            </div>
          </form>
        </section>
      </div>

    </div>
  </div>
@endsection

@section('foot_custom')
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.21.0/dist/jquery.validate.min.js"></script>
  <script src="{{ asset('assets') }}/js/validation-custom.js"></script>
@endsection