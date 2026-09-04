@extends('layouts.app')

{{-- Basic Tables — faithful re-expression of src/html/tables/basic.html.
Pure CSS table variants; same DOM/classes/ARIA, no page script. --}}
@section('head_custom')
<style>
    #selectionAlert {
        overflow: hidden;
    }

    @media (max-width: 767px) {

        .ax-pagination__page,
        .ax-pagination__prev,
        .ax-pagination__next {
        min-width: 25px;
        height: 25px;
        padding-inline: 0;
        font-size: var(--ax-text-sm);
        }
    }
</style>
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
        <li class="ax-breadcrumb__item" aria-current="page">System Data</li>
        <li class="ax-breadcrumb__sep" aria-hidden="true"><svg class="ax-icon ax-icon--directional" viewBox="0 0 24 24"
            fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round"
            aria-hidden="true">
            <path d="M9 6l6 6l-6 6"></path>
          </svg></li>
        <li class="ax-breadcrumb__item" aria-current="page">{{ $title }}</li>
      </ol>
    </nav>
    <!-- ───── DEFAULT TABLE ───── -->
    <section class="ax-card ax-col--12" role="region" aria-label="Default table">
      <div class="ax-card__header">
        <div class="ax-card__titles">
          <h2 class="ax-card__title">{{ $title }}</h2>
          <p class="ax-card__subtitle">Define administrator roles and manage their access permissions.</p>
        </div>
        @if($data_state === 'has_data' || $data_state === 'filtered_empty')
          <div class="ax-card__actions">
            @php
                $filterCount = collect([
                    request()->filled('search'),
                    request()->filled('status')
                ])->filter()->count();
            @endphp
            <div x-data="axModal()">
              <button
                  type="button"
                  class="ax-btn ax-btn--icon {{ $filterCount > 0 ? 'ax-btn--soft-info ax-btn--icon' : 'ax-btn--secondary ax-btn--icon' }}"
                  @click="show()"
              >
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none"
                  stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                  class="icon icon-tabler icons-tabler-outline icon-tabler-filter">
                  <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                  <path
                    d="M4 4h16v2.172a2 2 0 0 1 -.586 1.414l-4.414 4.414v7l-6 2v-8.5l-4.48 -4.928a2 2 0 0 1 -.52 -1.345v-2.227" />
                </svg>
                @if($filterCount > 0)
                    <span
                        class="ax-badge ax-badge--count ax-badge--primary"
                        aria-hidden="true"
                        style="position:absolute;top:-2px;inset-inline-end:-2px;"
                    >
                        {{ $filterCount }}
                    </span>
                @endif

              </button>
              
              <template x-teleport="body">
                <div class="ax-modal ax-modal--centered" x-show="open" x-cloak @keydown.escape.window="hide()" role="dialog"
                  aria-modal="true" aria-labelledby="m-md-title">
                  <div class="ax-modal__backdrop" x-show="open" x-transition.opacity @click="hide()"></div>
                  <div class="ax-modal__dialog" x-show="open" x-transition x-trap.inert.noscroll="open">
                    <form method="GET">
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
                          <input id="fe-name" type="text" name="search" class="ax-input" placeholder="Search name" value="{{ request('search') }}">
                        </div>

                        <div class="ax-field">
                          <label class="ax-label" for="fe-name">Status</label>
                          <select id="fe-country" class="ax-select" name="status">
                            <option value="">--All--</option>
                            <option value="1" {{ request('status') == '1' ? 'selected' : '' }}>Active</option>
                            <option value="2" {{ request('status') == '2' ? 'selected' : '' }}>Not Active</option>
                          </select>
                        </div>
                      </div>
                      <div class="ax-modal__footer">
                          <button
                              type="button"
                              class="ax-btn ax-btn--ghost"
                              @click="window.location.href = window.location.pathname"
                          >
                              Reset
                          </button>

                          <button class="ax-btn ax-btn--primary"
                          @click="hide()">Filter Now</button></div>
                    </form>
                  </div>
                </div>
              </template>
            </div>
            <button type="button" class="ax-btn ax-btn--secondary ax-btn--icon" aria-label="Export">
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
        @endif
      </div>
      @if($data_state === 'has_data')
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
      @endif
      @if(request('search') || request('status'))
        <div class="ax-card__body pt-0!">

          <div style="display:flex;flex-wrap:wrap;gap:var(--ax-space-2);min-height:24px;">

              {{-- Search Filter --}}
              @if(request('search'))
                  <span class="ax-badge ax-badge--soft ax-badge--accent ax-badge--chip">
                      <span>Search : {{ request('search') }}</span>

                      <button
                          type="button"
                          class="ax-badge__remove"
                          aria-label="Remove Search"
                          onclick="removeFilter('search')"
                      >
                          <svg
                              viewBox="0 0 24 24"
                              fill="none"
                              stroke="currentColor"
                              stroke-width="2.4"
                              stroke-linecap="round"
                              stroke-linejoin="round"
                              aria-hidden="true"
                          >
                              <path d="M18 6l-12 12" />
                              <path d="M6 6l12 12" />
                          </svg>
                      </button>
                  </span>
              @endif

              {{-- Status Filter --}}
              @if(request('status'))
                  <span class="ax-badge ax-badge--soft ax-badge--accent ax-badge--chip">

                      <span>
                          Status :
                          {{ request('status') == '1' ? 'Active' : 'Not Active' }}
                      </span>

                      <button
                          type="button"
                          class="ax-badge__remove"
                          aria-label="Remove Status"
                          onclick="removeFilter('status')"
                      >
                          <svg
                              viewBox="0 0 24 24"
                              fill="none"
                              stroke="currentColor"
                              stroke-width="2.4"
                              stroke-linecap="round"
                              stroke-linejoin="round"
                              aria-hidden="true"
                          >
                              <path d="M18 6l-12 12" />
                              <path d="M6 6l12 12" />
                          </svg>
                      </button>

                  </span>
              @endif

          </div>


          {{-- Reset All Filters --}}
          @if(request('search') || request('status'))

              <button
                  type="button"
                  class="ax-btn ax-btn--link ax-btn--sm"
                  style="margin-top:var(--ax-space-3);"
                  onclick="resetFilters()"
              >
                  <span class="ax-btn__label">
                      Reset filters
                  </span>
              </button>

          @endif

        </div>
      @endif
      @if($data_state === 'has_data')
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
                <th class="ax-table__th" scope="col">Name</th>
                <th class="ax-table__th" scope="col">Sort</th>
                <th class="ax-table__th" scope="col">Status</th>
                <th class="ax-table__th" scope="col"></th>
              </tr>
            </thead>
            <tbody>
              @foreach($result as $value)
                <tr class="ax-table__row">
                  <td class="ax-table__td" style="color:var(--ax-text-muted);">
                    <label class="ax-check"
                      style="display:flex;gap:var(--ax-space-3);align-items:center;min-height:auto;padding-inline-start:var(--ax-space-5);">
                      <input type="checkbox" class="ax-checkbox row-checkbox" value="{{ $value['id'] }}">
                    </label>
                  </td>
                  <td class="ax-table__td" style="font-weight:var(--ax-weight-medium);color:var(--ax-text-strong);">
                    <a href="{{ url('user-work-experience/' . $value['id']) }}">{{ $value['name'] }}</a>
                  </td>
                  <td class="ax-table__td" style="color:var(--ax-text-muted);">{{ $value['sort'] ?? '-'}}</td>
                  <td class="ax-table__td"><span class="ax-badge ax-badge--soft ax-badge--success ax-badge--pill"><span
                        class="ax-badge__dot"></span>{{ $value['status_name'] }}</span></td>
                  <td class="ax-table__td">
                    <div class="ax-cluster" style="gap:6px;flex-wrap:nowrap;">

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
              @endforeach
            </tbody>
          </table>
        </div>
        <div class="ax-card__body">
          <div class="ax-cluster" style="justify-content:space-between;gap:var(--ax-space-4);">

              <div class="ax-cluster" style="gap:var(--ax-space-4);">

                {{-- Pagination Summary --}}
                <span class="ax-pagination__summary ax-num">
                    Showing
                    <b style="font-family:var(--ax-font-mono);color:var(--ax-text-strong);">
                        {{ $pagination['from'] ?? 0 }}–{{ $pagination['to'] ?? 0 }}
                    </b>
                    of
                    <b style="font-family:var(--ax-font-mono);color:var(--ax-text-strong);">
                        {{ number_format($pagination['total'] ?? 0) }}
                    </b>
                </span>

                {{-- Rows Per Page --}}
                <label
                    class="ax-cluster"
                    style="gap:var(--ax-space-2);font-size:var(--ax-text-sm);color:var(--ax-text-muted);"
                >
                    Rows

                    <select
                        class="ax-select ax-select--sm"
                        aria-label="Rows per page"
                        style="width:auto;"
                        onchange="changePerPage(this.value)"
                    >
                        @foreach ([10, 20, 50, 100] as $perPage)
                            <option
                                value="{{ $perPage }}"
                                {{ ($pagination['per_page'] ?? 20) == $perPage ? 'selected' : '' }}
                            >
                                {{ $perPage }}
                            </option>
                        @endforeach
                    </select>
                </label>

            </div>

              {{-- Pagination --}}
              @if (($pagination['last_page'] ?? 1) > 1)

                  <nav class="ax-pagination" aria-label="Admin roles pages">

                      {{-- First Page --}}
                      @if (($pagination['current_page'] ?? 1) > 1)
                          <a
                              href="{{ request()->fullUrlWithQuery(['page' => 1]) }}"
                              class="ax-pagination__prev"
                              aria-label="First page"
                          >
                              <svg viewBox="0 0 24 24" fill="none"
                                  stroke="currentColor" stroke-width="1.75"
                                  stroke-linecap="round" stroke-linejoin="round"
                                  aria-hidden="true">
                                  <path d="M11 7l-5 5l5 5" />
                                  <path d="M17 7l-5 5l5 5" />
                              </svg>
                          </a>
                      @else
                          <button
                              type="button"
                              class="ax-pagination__prev"
                              aria-label="First page"
                              disabled
                          >
                              <svg viewBox="0 0 24 24" fill="none"
                                  stroke="currentColor" stroke-width="1.75"
                                  stroke-linecap="round" stroke-linejoin="round"
                                  aria-hidden="true">
                                  <path d="M11 7l-5 5l5 5" />
                                  <path d="M17 7l-5 5l5 5" />
                              </svg>
                          </button>
                      @endif


                      {{-- Previous Page --}}
                      @if (($pagination['current_page'] ?? 1) > 1)
                          <a
                              href="{{ request()->fullUrlWithQuery(['page' => $pagination['current_page'] - 1]) }}"
                              class="ax-pagination__prev"
                              aria-label="Previous page"
                          >
                              <svg viewBox="0 0 24 24" fill="none"
                                  stroke="currentColor" stroke-width="1.75"
                                  stroke-linecap="round" stroke-linejoin="round"
                                  aria-hidden="true">
                                  <path d="M15 6l-6 6l6 6" />
                              </svg>
                          </a>
                      @else
                          <button
                              type="button"
                              class="ax-pagination__prev"
                              aria-label="Previous page"
                              disabled
                          >
                              <svg viewBox="0 0 24 24" fill="none"
                                  stroke="currentColor" stroke-width="1.75"
                                  stroke-linecap="round" stroke-linejoin="round"
                                  aria-hidden="true">
                                  <path d="M15 6l-6 6l6 6" />
                              </svg>
                          </button>
                      @endif


                      {{-- Page Numbers --}}
                      <ul class="ax-pagination__pages">

                          @php
                              $currentPage = $pagination['current_page'] ?? 1;
                              $lastPage = $pagination['last_page'] ?? 1;

                              $startPage = max(1, $currentPage - 2);
                              $endPage = min($lastPage, $currentPage + 2);
                          @endphp


                          {{-- First page --}}
                          @if ($startPage > 1)
                              <li>
                                  <a
                                      class="ax-pagination__page"
                                      href="{{ request()->fullUrlWithQuery(['page' => 1]) }}"
                                      aria-label="Page 1"
                                  >
                                      1
                                  </a>
                              </li>

                              @if ($startPage > 2)
                                  <li aria-hidden="true">
                                      <span class="ax-pagination__ellipsis">…</span>
                                  </li>
                              @endif
                          @endif


                          {{-- Dynamic Pages --}}
                          @for ($page = $startPage; $page <= $endPage; $page++)

                              <li>
                                  <a
                                      class="ax-pagination__page"
                                      href="{{ request()->fullUrlWithQuery(['page' => $page]) }}"
                                      @if ($page == $currentPage)
                                          aria-current="page"
                                      @endif
                                      aria-label="Page {{ $page }}"
                                  >
                                      {{ $page }}
                                  </a>
                              </li>

                          @endfor


                          {{-- Last page --}}
                          @if ($endPage < $lastPage)

                              @if ($endPage < $lastPage - 1)
                                  <li aria-hidden="true">
                                      <span class="ax-pagination__ellipsis">…</span>
                                  </li>
                              @endif

                              <li>
                                  <a
                                      class="ax-pagination__page"
                                      href="{{ request()->fullUrlWithQuery(['page' => $lastPage]) }}"
                                      aria-label="Page {{ $lastPage }}"
                                  >
                                      {{ $lastPage }}
                                  </a>
                              </li>

                          @endif

                      </ul>


                      {{-- Next Page --}}
                      @if ($currentPage < $lastPage)
                          <a
                              href="{{ request()->fullUrlWithQuery(['page' => $currentPage + 1]) }}"
                              class="ax-pagination__next"
                              aria-label="Next page"
                          >
                              <svg viewBox="0 0 24 24" fill="none"
                                  stroke="currentColor" stroke-width="1.75"
                                  stroke-linecap="round" stroke-linejoin="round"
                                  aria-hidden="true">
                                  <path d="M9 6l6 6l-6 6" />
                              </svg>
                          </a>
                      @else
                          <button
                              type="button"
                              class="ax-pagination__next"
                              aria-label="Next page"
                              disabled
                          >
                              <svg viewBox="0 0 24 24" fill="none"
                                  stroke="currentColor" stroke-width="1.75"
                                  stroke-linecap="round" stroke-linejoin="round"
                                  aria-hidden="true">
                                  <path d="M9 6l6 6l-6 6" />
                              </svg>
                          </button>
                      @endif


                      {{-- Last Page --}}
                      @if ($currentPage < $lastPage)
                          <a
                              href="{{ request()->fullUrlWithQuery(['page' => $lastPage]) }}"
                              class="ax-pagination__next"
                              aria-label="Last page"
                          >
                              <svg viewBox="0 0 24 24" fill="none"
                                  stroke="currentColor" stroke-width="1.75"
                                  stroke-linecap="round"
                                  stroke-linejoin="round"
                                  aria-hidden="true">
                                  <path d="M7 7l5 5l-5 5" />
                                  <path d="M13 7l5 5l-5 5" />
                              </svg>
                          </a>
                      @else
                          <button
                              type="button"
                              class="ax-pagination__next"
                              aria-label="Last page"
                              disabled
                          >
                              <svg viewBox="0 0 24 24" fill="none"
                                  stroke="currentColor" stroke-width="1.75"
                                  stroke-linecap="round"
                                  stroke-linejoin="round"
                                  aria-hidden="true">
                                  <path d="M7 7l5 5l-5 5" />
                                  <path d="M13 7l5 5l-5 5" />
                              </svg>
                          </button>
                      @endif

                  </nav>

              @endif

          </div>
        </div>
      @endif
      @if($data_state === 'filtered_empty')
        <div class="ax-card__body" style="padding-block:var(--ax-space-10);">
          <div
            style="max-width:420px;margin-inline:auto;display:flex;flex-direction:column;align-items:center;text-align:center;gap:var(--ax-space-5);">
            <!-- thin-line two-tone illustration (single accent highlight) -->
            <span aria-hidden="true"
              style="position:relative;display:grid;place-items:center;width:128px;height:128px;border-radius:50%;background:radial-gradient(circle at 50% 40%, var(--ax-accent-wash), transparent 70%);">
              <span style="position:absolute;inset:0;border-radius:50%;border:1px dashed var(--ax-border-strong);"></span>
              <svg viewBox="0 0 24 24" width="56" height="56" fill="none" stroke="var(--ax-text-muted)" stroke-width="1.4"
                stroke-linecap="round" stroke-linejoin="round">
                <path d="M14 3v4a1 1 0 0 0 1 1h4" />
                <path d="M5 21v-16a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z" />
                <path d="M12 11l0 6" stroke="var(--ax-accent)" />
                <path d="M9 14l3 -3l3 3" stroke="var(--ax-accent)" />
              </svg>
            </span>
            <div>
              <h2
                style="margin:0;font-family:var(--ax-font-display);font-size:var(--ax-text-lg);font-weight:var(--ax-weight-semibold);color:var(--ax-text-strong);">
                No Results Found</h2>
              <p
                style="margin:var(--ax-space-2) 0 0;font-size:var(--ax-text-sm);color:var(--ax-text-muted);line-height:1.55;">
                We couldn't find any data matching your current filters. Try adjusting or clearing your filters.</p>
            </div>
            <div class="ax-cluster" style="gap:var(--ax-space-3);justify-content:center;">
              <button
                type="button"
                class="ax-btn ax-btn--ghost"
                onclick="resetFilters()"
            >
                <svg
                    class="ax-btn__icon"
                    viewBox="0 0 24 24"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="1.75"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    aria-hidden="true"
                >
                    <path d="M3 12a9 9 0 1 0 3-6.7" />
                    <path d="M3 4v5h5" />
                </svg>

                <span class="ax-btn__label">
                    Reset Filters
                </span>
              </button>
            </div>
          </div>
        </div>
      @endif
      @if($data_state === 'empty')
        <div class="ax-card__body" style="padding-block:var(--ax-space-10);">
          <div
            style="max-width:420px;margin-inline:auto;display:flex;flex-direction:column;align-items:center;text-align:center;gap:var(--ax-space-5);">
            <!-- thin-line two-tone illustration (single accent highlight) -->
            <span aria-hidden="true"
              style="position:relative;display:grid;place-items:center;width:128px;height:128px;border-radius:50%;background:radial-gradient(circle at 50% 40%, var(--ax-accent-wash), transparent 70%);">
              <span style="position:absolute;inset:0;border-radius:50%;border:1px dashed var(--ax-border-strong);"></span>
              <svg viewBox="0 0 24 24" width="56" height="56" fill="none" stroke="var(--ax-text-muted)" stroke-width="1.4"
                stroke-linecap="round" stroke-linejoin="round">
                <path d="M14 3v4a1 1 0 0 0 1 1h4" />
                <path d="M5 21v-16a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z" />
                <path d="M12 11l0 6" stroke="var(--ax-accent)" />
                <path d="M9 14l3 -3l3 3" stroke="var(--ax-accent)" />
              </svg>
            </span>
            <div>
              <h2
                style="margin:0;font-family:var(--ax-font-display);font-size:var(--ax-text-lg);font-weight:var(--ax-weight-semibold);color:var(--ax-text-strong);">
                No Data Available</h2>
              <p
                style="margin:var(--ax-space-2) 0 0;font-size:var(--ax-text-sm);color:var(--ax-text-muted);line-height:1.55;">
                There is currently no data available to display.</p>
            </div>
            <div class="ax-cluster" style="gap:var(--ax-space-3);justify-content:center;">
              <button type="button" class="ax-btn ax-btn--primary">
                <svg class="ax-btn__icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75"
                  stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                  <path d="M12 5l0 14" />
                  <path d="M5 12l14 0" />
                </svg>
                <span class="ax-btn__label">Create</span>
              </button>
            </div>
          </div>
        </div>
      @endif
    </section>


  </div>
@endsection

@section('foot_custom')
  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
  <script>
    function changePerPage(perPage) {
        const url = new URL(window.location.href);

        // Ubah jumlah data per halaman
        url.searchParams.set('per_page', perPage);

        // Kembali ke halaman pertama
        url.searchParams.set('page', 1);

        window.location.href = url.toString();
    }
  </script>
  <script>
    $(document).ready(function () {

      let hasFocusedAlert = false;

      $('#dismissSelection').on('click', function () {

        // Uncheck semua checkbox
        $('.row-checkbox').prop('checked', false);

        // Uncheck Check All
        $('#checkAll')
          .prop('checked', false)
          .prop('indeterminate', false);

        // Tutup warning
        $('#selectionAlert')
          .stop(true, true)
          .slideUp(250);

        // Reset agar centang berikutnya dianggap selection pertama
        hasFocusedAlert = false;

      });

      function focusSelectionAlert() {

        const $alert = $('#selectionAlert');

        if (!$alert.length) {
          return;
        }

        setTimeout(function () {

          const alertElement = $alert[0];

          // Cari header sticky
          const $stickyHeader = $('header:visible').filter(function () {
            const position = $(this).css('position');
            return position === 'sticky' || position === 'fixed';
          }).first();

          let headerHeight = 0;

          if ($stickyHeader.length) {
            headerHeight = $stickyHeader.outerHeight();
          }

          // Tambahkan jarak agar alert tidak menempel ke header
          const spacing = 20;

          const rect = alertElement.getBoundingClientRect();

          const currentScroll =
            window.pageYOffset ||
            document.documentElement.scrollTop;

          const targetScroll =
            currentScroll +
            rect.top -
            headerHeight -
            spacing;

          window.scrollTo({
            top: Math.max(0, targetScroll),
            behavior: 'smooth'
          });

        }, 100);
      }


      function updateSelection() {

        const $rowCheckboxes = $('.row-checkbox');
        const total = $rowCheckboxes.length;
        const selected = $rowCheckboxes.filter(':checked').length;


        // ==========================================
        // UPDATE CHECK ALL
        // ==========================================

        $('#checkAll').prop(
          'checked',
          total > 0 && selected === total
        );

        $('#checkAll').prop(
          'indeterminate',
          selected > 0 && selected < total
        );


        // ==========================================
        // TIDAK ADA YANG DIPILIH
        // ==========================================

        if (selected === 0) {

          $('#selectionAlert')
            .stop(true, true)
            .slideUp(250);

          hasFocusedAlert = false;

          return;
        }


        // ==========================================
        // UPDATE JUMLAH SELECTED
        // ==========================================

        $('#selectionTitle').text(
          selected + ' Data Selected'
        );

        $('#selectionMessage').text(
          'You have selected ' +
          selected +
          ' data. Please choose an action to continue.'
        );


        // ==========================================
        // TAMPILKAN ALERT
        // ==========================================

        if (!$('#selectionAlert').is(':visible')) {

          $('#selectionAlert')
            .stop(true, true)
            .slideDown(250, function () {

              // Fokus hanya pada centang pertama
              if (!hasFocusedAlert) {

                hasFocusedAlert = true;

                focusSelectionAlert();

              }

            });

        }
      }


      // ==========================================
      // CHECK ALL
      // ==========================================

      $('#checkAll').on('change', function () {

        const checked = $(this).is(':checked');

        $('.row-checkbox').prop(
          'checked',
          checked
        );

        updateSelection();

      });


      // ==========================================
      // CHECK SATU PER SATU
      // ==========================================

      $(document).on('change', '.row-checkbox', function () {

        updateSelection();

      });


      // ==========================================
      // DISMISS
      // ==========================================

      $('#dismissSelection').on('click', function () {

        $('#selectionAlert')
          .stop(true, true)
          .slideUp(250);

        hasFocusedAlert = false;

      });

    });
</script>

<script>
    function removeFilter(filter) {
        const url = new URL(window.location.href);

        url.searchParams.delete(filter);

        // Reset pagination ketika filter berubah
        url.searchParams.delete('page');

        window.location.href = url.toString();
    }

    function resetFilters() {
        const url = new URL(window.location.href);

        url.searchParams.delete('search');
        url.searchParams.delete('status');
        url.searchParams.delete('page');

        window.location.href = url.toString();
    }
</script>
@endsection