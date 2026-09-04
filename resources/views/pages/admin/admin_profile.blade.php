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

  <!-- ════════════════ SETTINGS LAYOUT ════════════════ -->
  <div class="ax-dash-grid pt-0!">
    <!-- LEFT TAB RAIL -->
    @include('partials.account_tab')

    <!-- RIGHT PANELS -->
    <div class="ax-col--9" style="display:flex;flex-direction:column;gap:var(--ax-space-6);">

      <!-- ░░░ ACCOUNT ░░░ -->
      <div role="tabpanel" aria-label="Account settings" class="ax-stack" style="--ax-gap:var(--ax-space-6);">

        <section class="ax-card" role="region" aria-label="Personal information">
          <div class="ax-card__header">
            <div class="ax-card__titles">
              <h2 class="ax-card__title">Personal information</h2>
            </div>
          </div>
          <div class="ax-card__body"
            style="padding-top:0;display:grid;grid-template-columns:1fr 1fr;gap:var(--ax-space-5);">
            <div class="ax-field" style="grid-column:1 / -1;"><label class="ax-label"
                for="full_name">Full Name</label><input id="full_name" name="full_name" type="text" class="ax-input" disabled
                style="color:var(--ax-text-muted);" value="{{ $result['full_name'] ?? '-' }}"></div>

            <div class="ax-field" style="grid-column:1 / -1;"><label class="ax-label" for="email">Email</label><input
                id="email" name="email" type="text" class="ax-input" disabled style="color:var(--ax-text-muted);"
                value="{{ $result['email'] ?? '-' }}"></div>

            <div class="ax-field" style="grid-column:1 / -1;"><label class="ax-label" for="phone">Phone</label><input
                id="phone" name="phone" type="text" class="ax-input" disabled style="color:var(--ax-text-muted);"
                value="{{ $result['phone'] ?? '-' }}"></div>

            <div class="ax-field" style="grid-column:1 / -1;"><label class="ax-label" for="email">Role
                Access</label><input id="admin_role_name" name="admin_role_name" type="text" class="ax-input" disabled
                style="color:var(--ax-text-muted);" value="{{ $result['admin_role_name'] ?? '-' }}"></div>

            <div class="ax-field" style="grid-column:1 / -1;"><label class="ax-label" for="status">Status</label><input
                id="status" name="status" type="text" class="ax-input" disabled style="color:var(--ax-text-muted);"
                value="{{ $result['status_name'] ?? '-' }}"></div>

          </div>
        </section>
      </div>

      <!-- ░░░ SECURITY ░░░ -->
      <div role="tabpanel" aria-label="Security settings" x-show="tab==='security'" x-cloak class="ax-stack"
        style="--ax-gap:var(--ax-space-6);">
        <section class="ax-card" role="region" aria-label="Change password"
          x-data="{ pw:'', get score(){ let s=0; if(this.pw.length>=8)s++; if(/[A-Z]/.test(this.pw))s++; if(/[0-9]/.test(this.pw))s++; if(/[^A-Za-z0-9]/.test(this.pw))s++; return s; } }">
          <div class="ax-card__header">
            <div class="ax-card__titles">
              <h2 class="ax-card__title">Change password</h2>
              <p class="ax-card__subtitle">Use at least 8 characters with a mix of letters, numbers and symbols.</p>
            </div>
          </div>
          <div class="ax-card__body"
            style="padding-top:0;display:flex;flex-direction:column;gap:var(--ax-space-5);max-width:480px;">
            <div class="ax-field"><label class="ax-label" for="ps-cur">Current password</label><input id="ps-cur"
                type="password" class="ax-input" autocomplete="current-password" @input="dirty=true"></div>
            <div class="ax-field">
              <label class="ax-label" for="ps-new">New password</label>
              <input id="ps-new" type="password" class="ax-input" autocomplete="new-password" x-model="pw"
                @input="dirty=true">
              <div class="ax-strength" aria-hidden="true">
                <div class="ax-strength__bars">
                  <span class="ax-strength__bar"
                    :class="{ 'is-weak': score>=1, 'is-medium': score>=3, 'is-strong': score>=4 }"></span>
                  <span class="ax-strength__bar"
                    :class="{ 'is-weak': score>=2, 'is-medium': score>=3, 'is-strong': score>=4 }"></span>
                  <span class="ax-strength__bar" :class="{ 'is-medium': score>=3, 'is-strong': score>=4 }"></span>
                  <span class="ax-strength__bar" :class="{ 'is-strong': score>=4 }"></span>
                </div>
                <span class="ax-strength__label" x-text="['Too short','Weak','Fair','Good','Strong'][score]"></span>
              </div>
            </div>
            <div class="ax-field"><label class="ax-label" for="ps-conf">Confirm new password</label><input id="ps-conf"
                type="password" class="ax-input" autocomplete="new-password" @input="dirty=true"></div>
          </div>
        </section>

        <section class="ax-card" role="region" aria-label="Two-factor authentication">
          <div class="ax-card__header">
            <div class="ax-card__titles">
              <h2 class="ax-card__title">Two-factor authentication</h2>
            </div>
          </div>
          <div class="ax-card__body" style="padding-top:0;">
            <div class="ax-cluster" style="justify-content:space-between;flex-wrap:nowrap;gap:var(--ax-space-4);">
              <div style="min-width:0;">
                <div class="ax-cluster" style="gap:var(--ax-space-2);"><span
                    style="font-weight:var(--ax-weight-medium);color:var(--ax-text-strong);font-size:var(--ax-text-sm);">Authenticator
                    app</span><span class="ax-badge ax-badge--soft ax-badge--success ax-badge--pill"><span
                      class="ax-badge__dot"></span>Enabled</span></div>
                <p style="font-size:var(--ax-text-xs);color:var(--ax-text-subtle);margin-top:2px;">Codes are generated by
                  your authenticator app. Recovery codes were last viewed Jun 02.</p>
              </div>
              <div class="ax-cluster" style="gap:var(--ax-space-2);flex-shrink:0;">
                <button type="button" class="ax-btn ax-btn--ghost ax-btn--sm">Recovery codes</button>
                <button type="button" class="ax-btn ax-btn--secondary ax-btn--sm">Manage</button>
              </div>
            </div>
          </div>
        </section>

        <section class="ax-card" role="region" aria-label="Active sessions"
          x-data="{ sessions: [
                            { id:1, dev:'MacBook Pro · Lisbon', meta:'Chrome 126 · 84.91.12.4', cur:true,  when:'Active now' },
                            { id:2, dev:'iPhone 15 · Lisbon',   meta:'Safari · Mobile',        cur:false, when:'3 hours ago' },
                            { id:3, dev:'Windows PC · Madrid',   meta:'Edge 126 · 88.4.220.9',  cur:false, when:'Yesterday' } ] }">
          <div class="ax-card__header">
            <div class="ax-card__titles">
              <h2 class="ax-card__title">Active sessions</h2>
            </div>
            <button type="button" class="ax-btn ax-btn--ghost ax-btn--sm"
              @click="sessions = sessions.filter(s => s.cur)">Revoke all others</button>
          </div>
          <div class="ax-card__body" style="padding-top:0;">
            <ul class="ax-list">
              <template x-for="s in sessions" :key="s.id">
                <li class="ax-list__row" style="padding-inline:0;">
                  <span class="ax-list__leading"><span class="ax-avatar ax-avatar--sm ax-avatar--squircle"
                      style="background:var(--ax-surface-subtle);color:var(--ax-text-muted);"><svg class="ax-avatar__icon"
                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round"
                        stroke-linejoin="round" aria-hidden="true">
                        <path d="M3 5a1 1 0 0 1 1 -1h16a1 1 0 0 1 1 1v10a1 1 0 0 1 -1 1h-16a1 1 0 0 1 -1 -1z" />
                        <path d="M7 20h10" />
                        <path d="M9 16v4" />
                        <path d="M15 16v4" />
                      </svg></span></span>
                  <span class="ax-list__content"><span class="ax-list__title" x-text="s.dev"></span><span
                      class="ax-list__meta ax-num" style="font-family:var(--ax-font-mono);" x-text="s.meta"></span></span>
                  <span class="ax-list__trailing" style="display:flex;align-items:center;gap:var(--ax-space-3);">
                    <span x-show="s.cur" class="ax-badge ax-badge--soft ax-badge--success ax-badge--pill">This
                      device</span>
                    <span style="font-size:var(--ax-text-xs);color:var(--ax-text-subtle);" x-text="s.when"></span>
                    <button type="button" class="ax-btn ax-btn--ghost ax-btn--sm" x-show="!s.cur"
                      @click="sessions = sessions.filter(x => x.id !== s.id)">Revoke</button>
                  </span>
                </li>
              </template>
            </ul>
          </div>
        </section>
      </div>

      <!-- ░░░ NOTIFICATIONS ░░░ -->
      <div role="tabpanel" aria-label="Notification settings" x-show="tab==='notifications'" x-cloak class="ax-stack"
        style="--ax-gap:var(--ax-space-6);">
        <section class="ax-card" role="region" aria-label="Notification channels">
          <div class="ax-card__header">
            <div class="ax-card__titles">
              <h2 class="ax-card__title">Notification channels</h2>
              <p class="ax-card__subtitle">Choose how you want to be notified for each event.</p>
            </div>
          </div>
          <div class="ax-table-wrap">
            <table class="ax-table">
              <thead class="ax-table__head">
                <tr>
                  <th class="ax-table__th" scope="col">Event</th>
                  <th class="ax-table__th" scope="col" style="text-align:center;">Email</th>
                  <th class="ax-table__th" scope="col" style="text-align:center;">Push</th>
                  <th class="ax-table__th" scope="col" style="text-align:center;">In-app</th>
                </tr>
              </thead>
              <tbody>
                <tr class="ax-table__row">
                  <td class="ax-table__td">
                    <div style="font-weight:var(--ax-weight-medium);color:var(--ax-text-strong);">New comment</div>
                    <div style="font-size:var(--ax-text-xs);color:var(--ax-text-subtle);">When someone replies to you
                    </div>
                  </td>
                  <td class="ax-table__td" style="text-align:center;"><input type="checkbox" class="ax-switch"
                      aria-label="Email — New comment" checked @change="dirty=true"></td>
                  <td class="ax-table__td" style="text-align:center;"><input type="checkbox" class="ax-switch"
                      aria-label="Push — New comment" checked @change="dirty=true"></td>
                  <td class="ax-table__td" style="text-align:center;"><input type="checkbox" class="ax-switch"
                      aria-label="In-app — New comment" checked @change="dirty=true"></td>
                </tr>
                <tr class="ax-table__row">
                  <td class="ax-table__td">
                    <div style="font-weight:var(--ax-weight-medium);color:var(--ax-text-strong);">Mentions</div>
                    <div style="font-size:var(--ax-text-xs);color:var(--ax-text-subtle);">When you're @mentioned</div>
                  </td>
                  <td class="ax-table__td" style="text-align:center;"><input type="checkbox" class="ax-switch"
                      aria-label="Email — Mentions" checked @change="dirty=true"></td>
                  <td class="ax-table__td" style="text-align:center;"><input type="checkbox" class="ax-switch"
                      aria-label="Push — Mentions" checked @change="dirty=true"></td>
                  <td class="ax-table__td" style="text-align:center;"><input type="checkbox" class="ax-switch"
                      aria-label="In-app — Mentions" checked @change="dirty=true"></td>
                </tr>
                <tr class="ax-table__row">
                  <td class="ax-table__td">
                    <div style="font-weight:var(--ax-weight-medium);color:var(--ax-text-strong);">Weekly digest</div>
                    <div style="font-size:var(--ax-text-xs);color:var(--ax-text-subtle);">Summary of your activity</div>
                  </td>
                  <td class="ax-table__td" style="text-align:center;"><input type="checkbox" class="ax-switch"
                      aria-label="Email — Weekly digest" checked @change="dirty=true"></td>
                  <td class="ax-table__td" style="text-align:center;"><input type="checkbox" class="ax-switch"
                      aria-label="Push — Weekly digest" @change="dirty=true"></td>
                  <td class="ax-table__td" style="text-align:center;"><input type="checkbox" class="ax-switch"
                      aria-label="In-app — Weekly digest" @change="dirty=true"></td>
                </tr>
                <tr class="ax-table__row">
                  <td class="ax-table__td">
                    <div style="font-weight:var(--ax-weight-medium);color:var(--ax-text-strong);">Billing &amp; receipts
                    </div>
                    <div style="font-size:var(--ax-text-xs);color:var(--ax-text-subtle);">Invoices and payment alerts
                    </div>
                  </td>
                  <td class="ax-table__td" style="text-align:center;"><input type="checkbox" class="ax-switch"
                      aria-label="Email — Billing and receipts" checked @change="dirty=true"></td>
                  <td class="ax-table__td" style="text-align:center;"><input type="checkbox" class="ax-switch"
                      aria-label="Push — Billing and receipts" @change="dirty=true"></td>
                  <td class="ax-table__td" style="text-align:center;"><input type="checkbox" class="ax-switch"
                      aria-label="In-app — Billing and receipts" checked @change="dirty=true"></td>
                </tr>
                <tr class="ax-table__row">
                  <td class="ax-table__td">
                    <div style="font-weight:var(--ax-weight-medium);color:var(--ax-text-strong);">Security alerts</div>
                    <div style="font-size:var(--ax-text-xs);color:var(--ax-text-subtle);">New sign-ins and changes</div>
                  </td>
                  <td class="ax-table__td" style="text-align:center;"><input type="checkbox" class="ax-switch"
                      aria-label="Email — Security alerts" checked @change="dirty=true"></td>
                  <td class="ax-table__td" style="text-align:center;"><input type="checkbox" class="ax-switch"
                      aria-label="Push — Security alerts" checked @change="dirty=true"></td>
                  <td class="ax-table__td" style="text-align:center;"><input type="checkbox" class="ax-switch"
                      aria-label="In-app — Security alerts" checked @change="dirty=true"></td>
                </tr>
              </tbody>
            </table>
          </div>
        </section>

        <section class="ax-card" role="region" aria-label="Delivery preferences">
          <div class="ax-card__header">
            <div class="ax-card__titles">
              <h2 class="ax-card__title">Delivery preferences</h2>
            </div>
          </div>
          <div class="ax-card__body"
            style="padding-top:0;display:grid;grid-template-columns:1fr 1fr;gap:var(--ax-space-5);">
            <div class="ax-field"><label class="ax-label" for="ps-digest">Digest frequency</label><select id="ps-digest"
                class="ax-select" @change="dirty=true">
                <option>Daily</option>
                <option selected>Weekly</option>
                <option>Monthly</option>
                <option>Off</option>
              </select></div>
            <div class="ax-field"><label class="ax-label" for="ps-quiet">Quiet hours</label><select id="ps-quiet"
                class="ax-select" @change="dirty=true">
                <option>Off</option>
                <option selected>22:00 – 07:00</option>
                <option>20:00 – 08:00</option>
              </select></div>
            <div class="ax-cluster"
              style="grid-column:1 / -1;justify-content:space-between;padding-top:var(--ax-space-2);border-top:1px solid var(--ax-border);">
              <div>
                <div style="font-weight:var(--ax-weight-medium);color:var(--ax-text-strong);font-size:var(--ax-text-sm);">
                  Mute all notifications</div>
                <div style="font-size:var(--ax-text-xs);color:var(--ax-text-subtle);">Temporarily pause every channel
                </div>
              </div>
              <input type="checkbox" class="ax-switch" aria-label="Mute all notifications" @change="dirty=true">
            </div>
          </div>
        </section>
      </div>

      <!-- ░░░ BILLING ░░░ -->
      <div role="tabpanel" aria-label="Billing settings" x-show="tab==='billing'" x-cloak class="ax-stack"
        style="--ax-gap:var(--ax-space-6);">
        <section class="ax-card ax-card--accent-edge" role="region" aria-label="Current plan">
          <div class="ax-card__body">
            <div class="ax-cluster"
              style="justify-content:space-between;align-items:flex-start;flex-wrap:wrap;gap:var(--ax-space-4);">
              <div>
                <div class="ax-cluster" style="gap:var(--ax-space-2);"><span class="ax-card__eyebrow">Current
                    plan</span><span class="ax-badge ax-badge--soft ax-badge--success ax-badge--pill"><span
                      class="ax-badge__dot"></span>Active</span></div>
                <div class="ax-cluster" style="gap:var(--ax-space-2);align-items:baseline;margin-top:6px;"><b
                    style="font-family:var(--ax-font-display);font-size:var(--ax-text-xl);color:var(--ax-text-strong);">Pro</b><span
                    class="ax-num" style="font-family:var(--ax-font-mono);color:var(--ax-text-muted);">$48/mo</span></div>
                <p style="font-size:var(--ax-text-xs);color:var(--ax-text-subtle);margin-top:2px;">Renews <span
                    class="ax-num" style="font-family:var(--ax-font-mono);">Jul 14, 2026</span> · 8 seats included</p>
              </div>
              <a class="ax-btn ax-btn--primary" href="/pages/billing">
                <svg class="ax-btn__icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75"
                  stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                  <path d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0" />
                  <path d="M9 12l2 2l4 -4" />
                </svg>
                <span class="ax-btn__label">Manage billing</span>
              </a>
            </div>
          </div>
        </section>

        <section class="ax-card" role="region" aria-label="Payment methods">
          <div class="ax-card__header">
            <div class="ax-card__titles">
              <h2 class="ax-card__title">Payment methods</h2>
            </div>
            <button type="button" class="ax-btn ax-btn--secondary ax-btn--sm"><svg class="ax-btn__icon"
                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round"
                stroke-linejoin="round" aria-hidden="true">
                <path d="M12 5l0 14" />
                <path d="M5 12l14 0" />
              </svg><span class="ax-btn__label">Add card</span></button>
          </div>
          <div class="ax-card__body" style="padding-top:0;">
            <ul class="ax-list">
              <li class="ax-list__row" style="padding-inline:0;">
                <span class="ax-list__leading"><span class="ax-avatar ax-avatar--sm ax-avatar--squircle"
                    style="background:color-mix(in oklab,var(--ax-viz-cyan) 16%,transparent);color:var(--ax-viz-cyan);"><svg
                      class="ax-avatar__icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75"
                      stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                      <path d="M3 8a3 3 0 0 1 3 -3h12a3 3 0 0 1 3 3v8a3 3 0 0 1 -3 3h-12a3 3 0 0 1 -3 -3l0 -8" />
                      <path d="M3 10l18 0" />
                    </svg></span></span>
                <span class="ax-list__content"><span class="ax-list__title">Visa ending <span class="ax-num"
                      style="font-family:var(--ax-font-mono);">4921</span></span><span class="ax-list__meta ax-num"
                    style="font-family:var(--ax-font-mono);">Expires 08/27</span></span>
                <span class="ax-list__trailing" style="display:flex;align-items:center;gap:var(--ax-space-3);"><span
                    class="ax-badge ax-badge--soft ax-badge--accent ax-badge--pill">Default</span><button type="button"
                    class="ax-btn ax-btn--ghost ax-btn--icon ax-btn--sm" aria-label="Card options"><svg
                      class="ax-btn__icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75"
                      stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                      <path d="M11 12a1 1 0 1 0 2 0a1 1 0 0 0 -2 0" />
                      <path d="M11 19a1 1 0 1 0 2 0a1 1 0 0 0 -2 0" />
                      <path d="M11 5a1 1 0 1 0 2 0a1 1 0 0 0 -2 0" />
                    </svg></button></span>
              </li>
              <li class="ax-list__row" style="padding-inline:0;">
                <span class="ax-list__leading"><span class="ax-avatar ax-avatar--sm ax-avatar--squircle"
                    style="background:color-mix(in oklab,var(--ax-viz-amber) 16%,transparent);color:var(--ax-viz-amber);"><svg
                      class="ax-avatar__icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75"
                      stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                      <path d="M3 8a3 3 0 0 1 3 -3h12a3 3 0 0 1 3 3v8a3 3 0 0 1 -3 3h-12a3 3 0 0 1 -3 -3l0 -8" />
                      <path d="M3 10l18 0" />
                    </svg></span></span>
                <span class="ax-list__content"><span class="ax-list__title">Mastercard ending <span class="ax-num"
                      style="font-family:var(--ax-font-mono);">7045</span></span><span class="ax-list__meta ax-num"
                    style="font-family:var(--ax-font-mono);">Expires 02/26</span></span>
                <span class="ax-list__trailing" style="display:flex;align-items:center;gap:var(--ax-space-3);"><button
                    type="button" class="ax-btn ax-btn--ghost ax-btn--sm">Set default</button><button type="button"
                    class="ax-btn ax-btn--ghost ax-btn--icon ax-btn--sm" aria-label="Card options"><svg
                      class="ax-btn__icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75"
                      stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                      <path d="M11 12a1 1 0 1 0 2 0a1 1 0 0 0 -2 0" />
                      <path d="M11 19a1 1 0 1 0 2 0a1 1 0 0 0 -2 0" />
                      <path d="M11 5a1 1 0 1 0 2 0a1 1 0 0 0 -2 0" />
                    </svg></button></span>
              </li>
            </ul>
          </div>
        </section>
      </div>
    </div>
  </div>
@endsection