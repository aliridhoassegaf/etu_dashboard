<!doctype html>
<html lang="en">

<head>
  @include('partials.head')
  @include('partials.head-auth-custom')
</head>

<body class="ax-standalone">
  @include('partials.loader')

  <main class="ax-center" id="ax-main" style="inline-size:100%;max-inline-size:400px;position:relative;z-index:1;">
    <div style="inline-size:100%;display:flex;flex-direction:column;gap:var(--ax-space-5);">

      <!-- ════ AUTH CARD ════ -->
      <section class="ax-card" role="region" aria-label="Sign in" x-data="axAuthForm()"
        style="border-radius:var(--ax-radius-xl);">
        <div class="ax-card__body"
          style="padding:var(--ax-space-8);display:flex;flex-direction:column;gap:var(--ax-space-5);">

          <!-- heading -->
          <header
            style="text-align:center;display:flex;flex-direction:column;align-items:center;gap:var(--ax-space-1);">
            <div>
              <img src="{{ asset('assets/img') }}/logo-express.png" style="max-width:200px;">
            </div>

            <p style="margin:0;font-size:var(--ax-text-sm);color:var(--ax-text-muted);">Welcome back — sign in to your
              workspace.</p>
          </header>

          <!-- global error -->
          @if(session('success'))
          <div role="alert" x-cloak x-transition class="ax-alert ax-alert--success"
            style="padding:var(--ax-space-3) var(--ax-space-4);">
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
          <div role="alert" x-cloak x-transition class="ax-alert ax-alert--danger"
            style="padding:var(--ax-space-3) var(--ax-space-4);">
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

          <!-- form -->
          <form method="POST" id="form_login" action="{{ route('admin.login.process') }}" class="ax-stack" style="display:flex;flex-direction:column;gap:var(--ax-space-4);"
            novalidate>
            @csrf
            <div class="ax-field">
              <label class="ax-label" for="si-email">Email</label>

              <div class="ax-field__control">
                <input id="si-email" value="aliridho@expressgroup.co.id" name="email" type="text" class="ax-input ax-input--with-trailing"
                  placeholder="you@website.com" aria-describedby="si-email-error">

                <span class="ax-field__affix ax-field__affix--trailing" aria-hidden="true"
                  style="color:var(--ax-danger-500);display:none;">
                  <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round">
                    <path d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0" />
                    <path d="M12 8v4" />
                    <path d="M12 16h.01" />
                  </svg>
                </span>
              </div>
            </div>


            <div class="ax-field">

              <div class="ax-cluster" style="justify-content:space-between;">
                <label class="ax-label" for="si-pass">Password</label>

                <a class="ax-link" href="#" style="font-size:var(--ax-text-xs);">
                  Forgot password?
                </a>
              </div>

              <div class="ax-field__control">

                <input id="si-pass" value="Password123!" name="password" class="ax-input ax-input--with-trailing"
                  autocomplete="current-password" placeholder="••••••••••" :type="reveal ? 'text' : 'password'"
                  aria-describedby="si-pass-error">

                <!-- Show / Hide Password -->
                <button type="button" class="ax-field__affix ax-field__affix--trailing ax-field__affix--button"
                  @click="reveal = !reveal" :aria-pressed="reveal"
                  :aria-label="reveal ? 'Hide password' : 'Show password'">

                  <!-- Eye -->
                  <svg x-show="!reveal" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75"
                    stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                    <path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                    <path d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6" />
                  </svg>

                  <!-- Eye Off -->
                  <svg x-show="reveal" x-cloak viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75"
                    stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                    <path d="M10.585 10.587a2 2 0 0 0 2.829 2.828" />

                    <path
                      d="M16.681 16.673a8.717 8.717 0 0 1 -4.681 1.327c-3.6 0 -6.6 -2 -9 -6c1.272 -2.12 2.712 -3.678 4.32 -4.674m2.86 -1.146a9.055 9.055 0 0 1 1.82 -.18c3.6 0 6.6 2 -9 6c-.666 1.11 -1.379 2.067 -2.138 2.87" />

                    <path d="M3 3l18 18" />
                  </svg>

                </button>

              </div>

            </div>

            <button type="submit" class="ax-btn ax-btn--primary ax-btn--lg ax-btn--block"
              :class="loading && 'is-loading'" :aria-busy="loading">
              <span class="ax-btn__spinner" aria-hidden="true"></span>
              <span class="ax-btn__label">Sign in</span>
            </button>
          </form>

        </div>
      </section>

      <p style="text-align:center;margin:0;font-size:var(--ax-text-2xs);color:var(--ax-text-subtle);">
        Need support? <a class="ax-link" href="#">Help Center</a>
      </p>
    </div>
  </main>

  @include('partials.foot-auth-custom')
  @include('partials.validation-auth-custom')
</body>

</html>