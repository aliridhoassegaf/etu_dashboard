@extends('layouts.app')

{{-- Basic Tables — faithful re-expression of src/html/tables/basic.html.
Pure CSS table variants; same DOM/classes/ARIA, no page script. --}}

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
        <li class="ax-breadcrumb__item" aria-current="page">Admin</li>
      </ol>
    </nav>
    <!-- ───── DEFAULT TABLE ───── -->
    <section class="ax-card ax-col--12" role="region" aria-label="Default table">
      <div class="ax-card__header">
        <div class="ax-card__titles">
          <h2 class="ax-card__title">Admin</h2>
          <p class="ax-card__subtitle">Manage administrator accounts and their access.</p>
        </div>
        <div class="ax-card__actions">
          <div x-data="axModal()">
            <button type="button" class="ax-btn ax-btn--soft-info ax-btn--icon" @click="show()">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                class="icon icon-tabler icons-tabler-outline icon-tabler-filter">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <path
                  d="M4 4h16v2.172a2 2 0 0 1 -.586 1.414l-4.414 4.414v7l-6 2v-8.5l-4.48 -4.928a2 2 0 0 1 -.52 -1.345v-2.227" />
              </svg>
              <span class="ax-badge ax-badge--count ax-badge--primary" aria-hidden="true"
                style="position:absolute;top:-2px;inset-inline-end:-2px;">5</span>

            </button>
            <template x-teleport="body">
              <div class="ax-modal ax-modal--centered" x-show="open" x-cloak @keydown.escape.window="hide()" role="dialog"
                aria-modal="true" aria-labelledby="m-md-title">
                <div class="ax-modal__backdrop" x-show="open" x-transition.opacity @click="hide()"></div>
                <div class="ax-modal__dialog" x-show="open" x-transition x-trap.inert.noscroll="open">
                  <div class="ax-modal__header">
                    <h2 class="ax-modal__title" id="m-md-title">Filter</h2>
                    <button type="button" class="ax-modal__close" @click="hide()" aria-label="Close dialog"><svg
                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round"
                        stroke-linejoin="round" aria-hidden="true">
                        <path d="M18 6l-12 12" />
                        <path d="M6 6l12 12" />
                      </svg></button>
                  </div>
                  <div class="ax-modal__body" style="display:flex;flex-direction:column;gap:var(--ax-space-5);">
                    <div class="ax-field">
                      <label class="ax-label" for="fe-name">Search</label>
                      <input id="fe-name" type="text" class="ax-input" placeholder="Search fullname, email, phone">
                    </div>

                    <div class="ax-field">
                      <label class="ax-label" for="fe-name">Role Access</label>
                      <select id="fe-country" class="ax-select">
                        <option>--All--</option>
                        <option>United Kingdom</option>
                        <option>Germany</option>
                        <option>Japan</option>
                        <option>Australia</option>
                      </select>
                    </div>

                    <div class="ax-field">
                      <label class="ax-label" for="fe-name">Status</label>
                      <select id="fe-country" class="ax-select">
                        <option>--All--</option>
                        <option>United Kingdom</option>
                        <option>Germany</option>
                        <option>Japan</option>
                        <option>Australia</option>
                      </select>
                    </div>
                  </div>
                  <div class="ax-modal__footer"><button type="button" class="ax-btn ax-btn--ghost"
                      @click="hide()">Reset</button><button type="button" class="ax-btn ax-btn--primary"
                      @click="hide()">Filter Now</button></div>
                </div>
              </div>
            </template>
          </div>
          <button type="button" class="ax-btn ax-btn--secondary ax-btn--icon" aria-label="Edit">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none"
              stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
              class="icon icon-tabler icons-tabler-outline icon-tabler-download">
              <path stroke="none" d="M0 0h24v24H0z" fill="none" />
              <path d="M4 17v2a2 2 0 0 0 2 2h12a2 2 0 0 0 2 -2v-2" />
              <path d="M7 11l5 5l5 -5" />
              <path d="M12 4l0 12" />
            </svg>
          </button>
          <button type="button" class="ax-btn ax-btn--primary">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none"
              stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
              class="icon icon-tabler icons-tabler-outline icon-tabler-plus">
              <path stroke="none" d="M0 0h24v24H0z" fill="none" />
              <path d="M12 5l0 14" />
              <path d="M5 12l14 0" />
            </svg>
            <span class="ax-btn__label">Create</span>
          </button>
        </div>
      </div>
      <div class="ax-card__body"
        style="padding-top:0;padding-bottom:0;display:flex;flex-direction:column;gap:var(--ax-space-3);">
        <div id="selectionAlert" class="ax-alert ax-alert--accent" role="status" style="margin-bottom:24px;display:none;">

          <svg class="ax-alert__icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75"
            stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
            <path d="M12 9v4" />
            <path
              d="M10.363 3.591l-8.106 13.534a1.914 1.914 0 0 0 1.636 2.871h16.214a1.914 1.914 0 0 0 1.636 -2.87l-8.106 -13.536a1.914 1.914 0 0 0 -3.274 0" />
            <path d="M12 16h.01" />
          </svg>

          <div class="ax-alert__content">

            <p class="ax-alert__title" id="selectionTitle">
              0 Data Selected
            </p>

            <p class="ax-alert__message" id="selectionMessage">
              You have selected 0 data. Please choose an action to continue.
            </p>

            <div class="ax-alert__actions" style="padding-top:10px;">
              <button type="button" class="ax-btn ax-btn--primary ax-btn--solid ax-btn--sm" id="deleteSelected">
                <span class="ax-btn__label">Delete</span>
              </button>
            </div>

          </div>

          <button type="button" class="ax-alert__dismiss" id="dismissSelection" aria-label="Dismiss selection alert">

            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
              stroke-linejoin="round" aria-hidden="true">
              <path d="M18 6l-12 12" />
              <path d="M6 6l12 12" />
            </svg>

          </button>
        </div>
      </div>
      <div class="ax-card__body pt-0!">
        <div style="display:flex;flex-wrap:wrap;gap:var(--ax-space-2);min-height:24px;">

          <span class="ax-badge ax-badge--soft ax-badge--accent ax-badge--chip">
            <span>Search : Aldo</span>
            <button type="button" class="ax-badge__remove" aria-label="Remove Lighting">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round"
                stroke-linejoin="round" aria-hidden="true">
                <path d="M18 6l-12 12" />
                <path d="M6 6l12 12" />
              </svg>
            </button>
          </span>

          <span class="ax-badge ax-badge--soft ax-badge--accent ax-badge--chip">
            <span>Role Access : Technology</span>
            <button type="button" class="ax-badge__remove" aria-label="Remove In stock">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round"
                stroke-linejoin="round" aria-hidden="true">
                <path d="M18 6l-12 12" />
                <path d="M6 6l12 12" />
              </svg>
            </button>
          </span>

          <span class="ax-badge ax-badge--soft ax-badge--accent ax-badge--chip">
            <span>Status : Active</span>
            <button type="button" class="ax-badge__remove" aria-label="Remove Under $100">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round"
                stroke-linejoin="round" aria-hidden="true">
                <path d="M18 6l-12 12" />
                <path d="M6 6l12 12" />
              </svg>
            </button>
          </span>


        </div>

        <button type="button" class="ax-btn ax-btn--link ax-btn--sm" style="margin-top:var(--ax-space-3);">
          <span class="ax-btn__label">Reset filters</span>
        </button>
      </div>
      <div class="ax-table-wrap">
        <table class="ax-table ax-table--striped ax-table--hover">
          <caption class="ax-visually-hidden">Northwind Labs team — directory with role, department and status
          </caption>
          <thead class="ax-table__head">
            <tr>
              <th class="ax-table__th" scope="col">
                <label class="ax-check"
                  style="display:flex;gap:var(--ax-space-3);align-items:center;min-height:auto;padding-inline-start:var(--ax-space-5);">
                  <input type="checkbox" class="ax-checkbox" id="checkAll">
                </label>
              </th>
              <th class="ax-table__th" scope="col">Fullname</th>
              <th class="ax-table__th" scope="col">Email</th>
              <th class="ax-table__th" scope="col">Phone</th>
              <th class="ax-table__th" scope="col">Role Access</th>
              <th class="ax-table__th" scope="col">Status</th>
              <th class="ax-table__th" scope="col"></th>
            </tr>
          </thead>
          <tbody>
            <tr class="ax-table__row">
              <td class="ax-table__td" style="color:var(--ax-text-muted);">
                <label class="ax-check"
                  style="display:flex;gap:var(--ax-space-3);align-items:center;min-height:auto;padding-inline-start:var(--ax-space-5);">
                  <input type="checkbox" class="ax-checkbox row-checkbox">
                </label>
              </td>
              <td class="ax-table__td" style="font-weight:var(--ax-weight-medium);color:var(--ax-text-strong);">
                <a href="#">Ali Ridho</a>
              </td>
              <td class="ax-table__td" style="color:var(--ax-text-muted);">aliridho@expressgroup.co.id</td>
              <td class="ax-table__td" style="color:var(--ax-text-muted);">082246054709</td>
              <td class="ax-table__td" style="color:var(--ax-text-muted);">Technology</td>
              <td class="ax-table__td"><span class="ax-badge ax-badge--soft ax-badge--success ax-badge--pill"><span
                    class="ax-badge__dot"></span>Active</span></td>
              <td class="ax-table__td">
                <div class="ax-cluster" style="gap:6px;flex-wrap:nowrap;">

                  <a class="ax-btn ax-btn--secondary ax-btn--sm ax-btn--icon" href="#" aria-label="Email">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none"
                      stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                      class="icon icon-tabler icons-tabler-outline icon-tabler-eye">
                      <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                      <path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                      <path d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6" />
                    </svg>
                  </a>

                  <a class="ax-btn ax-btn--secondary ax-btn--sm ax-btn--icon" href="#" aria-label="Email"><svg
                      xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none"
                      stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                      class="icon icon-tabler icons-tabler-outline icon-tabler-edit">
                      <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                      <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1" />
                      <path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415" />
                      <path d="M16 5l3 3" />
                    </svg></a>

                  <div x-data="axModal()">
                    <button type="button" class="ax-btn ax-btn--secondary ax-btn--sm ax-btn--icon" @click="show()">
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                        class="icon icon-tabler icons-tabler-outline icon-tabler-trash">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M4 7l16 0" />
                        <path d="M10 11l0 6" />
                        <path d="M14 11l0 6" />
                        <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
                        <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
                      </svg>
                    </button>
                    <template x-teleport="body">
                      <div class="ax-modal ax-modal--centered" x-show="open" x-cloak @keydown.escape.window="hide()"
                        role="alertdialog" aria-modal="true" aria-labelledby="m-confirm-title"
                        aria-describedby="m-confirm-desc">
                        <div class="ax-modal__backdrop" x-show="open" x-transition.opacity @click="hide()"></div>
                        <div class="ax-modal__dialog ax-modal__dialog--sm" x-show="open" x-transition
                          x-trap.inert.noscroll="open">
                          <div class="ax-modal__body"
                            style="text-align:center;display:flex;flex-direction:column;align-items:center;gap:var(--ax-space-3);">
                            <span class="ax-modal__status ax-modal__status--danger"><svg viewBox="0 0 24 24" width="24"
                                height="24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round"
                                stroke-linejoin="round" aria-hidden="true">
                                <path d="M12 9v4" />
                                <path d="M12 16v.01" />
                                <path
                                  d="M5 19h14a2 2 0 0 0 1.84 -2.75l-7.1 -12.25a2 2 0 0 0 -3.5 0l-7.1 12.25a2 2 0 0 0 1.75 2.75" />
                              </svg></span>
                            <h2 class="ax-modal__title" id="m-confirm-title">Are you sure?</h2>
                            <p id="m-confirm-desc" style="margin:0;color:var(--ax-text-muted);">Are you sure you
                              want to delete this data? This action cannot be undone.</p>
                          </div>
                          <div class="ax-modal__footer" style="justify-content:center;">
                            <button type="button" class="ax-btn ax-btn--ghost" @click="hide()">Cancel</button>
                            <button type="button" class="ax-btn ax-btn--primary"
                              style="background:var(--ax-danger-500);box-shadow:none;"
                              @click="hide(); $toast({ msg:'Invoice deleted', ttl:3000 })">Delete</button>
                          </div>
                        </div>
                      </div>
                    </template>
                  </div>

                </div>
              </td>
            </tr>
            <tr class="ax-table__row">
              <td class="ax-table__td" style="color:var(--ax-text-muted);">
                <label class="ax-check"
                  style="display:flex;gap:var(--ax-space-3);align-items:center;min-height:auto;padding-inline-start:var(--ax-space-5);">
                  <input type="checkbox" class="ax-checkbox row-checkbox">
                </label>
              </td>
              <td class="ax-table__td" style="font-weight:var(--ax-weight-medium);color:var(--ax-text-strong);">
                <a href="#">Aldo Assegaf</a>
              </td>
              <td class="ax-table__td" style="color:var(--ax-text-muted);">aliridho@expressgroup.co.id</td>
              <td class="ax-table__td" style="color:var(--ax-text-muted);">082246054709</td>
              <td class="ax-table__td" style="color:var(--ax-text-muted);">Technology</td>
              <td class="ax-table__td"><span class="ax-badge ax-badge--soft ax-badge--success ax-badge--pill"><span
                    class="ax-badge__dot"></span>Active</span></td>
              <td class="ax-table__td">
                <div class="ax-cluster" style="gap:6px;flex-wrap:nowrap;">

                  <a class="ax-btn ax-btn--secondary ax-btn--sm ax-btn--icon" href="#" aria-label="Email">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none"
                      stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                      class="icon icon-tabler icons-tabler-outline icon-tabler-eye">
                      <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                      <path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                      <path d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6" />
                    </svg>
                  </a>

                  <a class="ax-btn ax-btn--secondary ax-btn--sm ax-btn--icon" href="#" aria-label="Email"><svg
                      xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none"
                      stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                      class="icon icon-tabler icons-tabler-outline icon-tabler-edit">
                      <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                      <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1" />
                      <path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415" />
                      <path d="M16 5l3 3" />
                    </svg></a>

                  <div x-data="axModal()">
                    <button type="button" class="ax-btn ax-btn--secondary ax-btn--sm ax-btn--icon" @click="show()">
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                        class="icon icon-tabler icons-tabler-outline icon-tabler-trash">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M4 7l16 0" />
                        <path d="M10 11l0 6" />
                        <path d="M14 11l0 6" />
                        <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
                        <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
                      </svg>
                    </button>
                    <template x-teleport="body">
                      <div class="ax-modal ax-modal--centered" x-show="open" x-cloak @keydown.escape.window="hide()"
                        role="alertdialog" aria-modal="true" aria-labelledby="m-confirm-title"
                        aria-describedby="m-confirm-desc">
                        <div class="ax-modal__backdrop" x-show="open" x-transition.opacity @click="hide()"></div>
                        <div class="ax-modal__dialog ax-modal__dialog--sm" x-show="open" x-transition
                          x-trap.inert.noscroll="open">
                          <div class="ax-modal__body"
                            style="text-align:center;display:flex;flex-direction:column;align-items:center;gap:var(--ax-space-3);">
                            <span class="ax-modal__status ax-modal__status--danger"><svg viewBox="0 0 24 24" width="24"
                                height="24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round"
                                stroke-linejoin="round" aria-hidden="true">
                                <path d="M12 9v4" />
                                <path d="M12 16v.01" />
                                <path
                                  d="M5 19h14a2 2 0 0 0 1.84 -2.75l-7.1 -12.25a2 2 0 0 0 -3.5 0l-7.1 12.25a2 2 0 0 0 1.75 2.75" />
                              </svg></span>
                            <h2 class="ax-modal__title" id="m-confirm-title">Are you sure?</h2>
                            <p id="m-confirm-desc" style="margin:0;color:var(--ax-text-muted);">Are you sure you
                              want to delete this data? This action cannot be undone.</p>
                          </div>
                          <div class="ax-modal__footer" style="justify-content:center;">
                            <button type="button" class="ax-btn ax-btn--ghost" @click="hide()">Cancel</button>
                            <button type="button" class="ax-btn ax-btn--primary"
                              style="background:var(--ax-danger-500);box-shadow:none;"
                              @click="hide(); $toast({ msg:'Invoice deleted', ttl:3000 })">Delete</button>
                          </div>
                        </div>
                      </div>
                    </template>
                  </div>

                </div>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="ax-card__body">
        <div class="ax-cluster" style="justify-content:space-between;gap:var(--ax-space-4);">
          <div class="ax-cluster" style="gap:var(--ax-space-4);">
            <span class="ax-pagination__summary ax-num">Showing <b
                style="font-family:var(--ax-font-mono);color:var(--ax-text-strong);">21–40</b> of <b
                style="font-family:var(--ax-font-mono);color:var(--ax-text-strong);">1,248</b></span>
            <label class="ax-cluster"
              style="gap:var(--ax-space-2);font-size:var(--ax-text-sm);color:var(--ax-text-muted);">Rows
              <select class="ax-select ax-select--sm" aria-label="Rows per page" style="width:auto;">
                <option>10</option>
                <option selected>20</option>
                <option>50</option>
                <option>100</option>
              </select>
            </label>
          </div>
          <nav class="ax-pagination" aria-label="Transactions pages">
            <button type="button" class="ax-pagination__prev" aria-label="First page"><svg viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round"
                aria-hidden="true">
                <path d="M11 7l-5 5l5 5" />
                <path d="M17 7l-5 5l5 5" />
              </svg></button>
            <button type="button" class="ax-pagination__prev" aria-label="Previous page"><svg viewBox="0 0 24 24"
                fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round"
                aria-hidden="true">
                <path d="M15 6l-6 6l6 6" />
              </svg></button>
            <ul class="ax-pagination__pages">
              <li><a class="ax-pagination__page" href="#" aria-label="Page 1">1</a></li>
              <li><a class="ax-pagination__page" href="#" aria-current="page" aria-label="Page 2">2</a></li>
              <li><a class="ax-pagination__page" href="#" aria-label="Page 3">3</a></li>
              <li><a class="ax-pagination__page" href="#" aria-label="Page 4">4</a></li>
              <li aria-hidden="true"><span class="ax-pagination__ellipsis">…</span></li>
              <li><a class="ax-pagination__page" href="#" aria-label="Page 63">63</a></li>
            </ul>
            <button type="button" class="ax-pagination__next" aria-label="Next page"><svg viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round"
                aria-hidden="true">
                <path d="M9 6l6 6l-6 6" />
              </svg></button>

            <button type="button" class="ax-pagination__next" aria-label="Last page"><svg viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round"
                aria-hidden="true">
                <path d="M7 7l5 5l-5 5" />
                <path d="M13 7l5 5l-5 5" />
              </svg></button>
          </nav>
        </div>
      </div>
    </section>


  </div>
@endsection