@extends('layouts.app')

{{-- nft dashboard — faithful re-expression of the HTML reference
     src/html/dashboards/nft.html. Same DOM/classes/ARIA; charts via the
     shared ApexCharts wrapper (page module in @push('scripts')). --}}

@section('content')

        <!-- ════════════════ PAGE HEAD ════════════════ -->
        <div class="ax-page-head">
          <div class="ax-page-head__row">
            <div>
              <nav class="ax-breadcrumb" data-ax-breadcrumb aria-label="Breadcrumb"></nav>
              <h1 class="ax-page-head__title">NFT Marketplace</h1>
              <p class="ax-page-head__subtitle">Trading volume climbed 14% this week across 5,210 owners.</p>
            </div>
            <div class="ax-page-head__actions">
              <button type="button" class="ax-btn ax-btn--secondary ax-btn--pill">
                <svg class="ax-btn__icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M4 7a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12"/><path d="M16 3v4"/><path d="M8 3v4"/><path d="M4 11h16"/></svg>
                <span class="ax-btn__label">Last 7 days</span>
                <svg class="ax-btn__icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M6 9l6 6l6 -6"/></svg>
              </button>
              <button type="button" class="ax-btn ax-btn--ghost">
                <svg class="ax-btn__icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M9 14c0 1.657 2.686 3 6 3s6 -1.343 6 -3s-2.686 -3 -6 -3s-6 1.343 -6 3"/><path d="M9 14v4c0 1.656 2.686 3 6 3s6 -1.344 6 -3v-4"/><path d="M3 6c0 1.072 1.144 2.062 3 2.598s4.144 .536 6 0s3 -1.526 3 -2.598s-1.144 -2.062 -3 -2.598s-4.144 -.536 -6 0s-3 1.526 -3 2.598"/><path d="M3 6v10c0 .888 .772 1.45 2 2"/></svg>
                <span class="ax-btn__label">My Wallet</span>
              </button>
              <button type="button" class="ax-btn ax-btn--primary">
                <svg class="ax-btn__icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M6 5h12l3 5l-8.5 9.5a.7 .7 0 0 1 -1 0l-8.5 -9.5l3 -5"/><path d="M10 12l-2 -2.2l.6 -1"/></svg>
                <span class="ax-btn__label">Create NFT</span>
              </button>
            </div>
          </div>
        </div>

        <!-- ════════════════ DASHBOARD GRID ════════════════ -->
        <div class="ax-dash-grid">

          <!-- ───── KEY FIGURES — one band, not a row of four separate tiles ───── -->
          <section class="ax-card ax-card--filled ax-col--12" role="region" aria-label="Key figures">
            <div class="ax-card__header">
              <div class="ax-card__titles">
                <h2 class="ax-card__title">Key figures</h2>
              </div>
            </div>
            <div class="ax-card__body" style="padding-top:0;">
              <div class="ax-statgroup">
                <div class="ax-statgroup__cell">
                  <span class="ax-statgroup__icon">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M6 12l6 -9l6 9l-6 9l-6 -9"/><path d="M6 12l6 -3l6 3l-6 2l-6 -2"/></svg>
                  </span>
                  <span class="ax-statgroup__text">
                    <span class="ax-statgroup__label">Total Volume</span>
                    <span class="ax-statgroup__value ax-num">1,284 ETH</span>
                  </span>
                  <span class="ax-statgroup__delta ax-statgroup__delta--up">+14.0%</span>
                </div>
                <div class="ax-statgroup__cell">
                  <span class="ax-statgroup__icon ax-statgroup__icon--c2">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M6 5h12l3 5l-8.5 9.5a.7 .7 0 0 1 -1 0l-8.5 -9.5l3 -5"/><path d="M10 12l-2 -2.2l.6 -1"/></svg>
                  </span>
                  <span class="ax-statgroup__text">
                    <span class="ax-statgroup__label">Floor Price</span>
                    <span class="ax-statgroup__value ax-num">2.4 ETH</span>
                  </span>
                  <span class="ax-statgroup__delta ax-statgroup__delta--up">+3.2%</span>
                </div>
                <div class="ax-statgroup__cell">
                  <span class="ax-statgroup__icon ax-statgroup__icon--c3">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M5 5m0 2a2 2 0 0 1 2 -2h10a2 2 0 0 1 2 2v10a2 2 0 0 1 -2 2h-10a2 2 0 0 1 -2 -2z"/><path d="M9 9l6 6"/><path d="M15 9l-6 6"/></svg>
                  </span>
                  <span class="ax-statgroup__text">
                    <span class="ax-statgroup__label">Items Sold (24h)</span>
                    <span class="ax-statgroup__value ax-num">318</span>
                  </span>
                  <span class="ax-statgroup__delta ax-statgroup__delta--up">+6.1%</span>
                </div>
                <div class="ax-statgroup__cell">
                  <span class="ax-statgroup__icon ax-statgroup__icon--c4">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M10 13a2 2 0 1 0 4 0a2 2 0 0 0 -4 0"/><path d="M8 21v-1a2 2 0 0 1 2 -2h4a2 2 0 0 1 2 2v1"/><path d="M15 5a2 2 0 1 0 4 0a2 2 0 0 0 -4 0"/><path d="M17 10h2a2 2 0 0 1 2 2v1"/><path d="M5 5a2 2 0 1 0 4 0a2 2 0 0 0 -4 0"/><path d="M3 13v-1a2 2 0 0 1 2 -2h2"/></svg>
                  </span>
                  <span class="ax-statgroup__text">
                    <span class="ax-statgroup__label">Unique Owners</span>
                    <span class="ax-statgroup__value ax-num">5,210</span>
                  </span>
                  <span class="ax-statgroup__delta ax-statgroup__delta--up">+1.0%</span>
                </div>
              </div>
            </div>
          </section>


          <!-- ───── HERO: Volume & Floor Trend (8) + Sales by Category (4) ───── -->
          <section class="ax-card ax-card--chart ax-col--8" role="region" aria-label="Volume and floor trend">
            <div class="ax-card__header">
              <div class="ax-card__titles">
                <span class="ax-card__eyebrow">Marketplace</span>
                <h2 class="ax-card__title">Volume &amp; Floor Trend</h2>
                <p class="ax-card__subtitle">Daily volume (ETH) vs. floor price</p>
              </div>
              <div class="ax-card__actions">
                <div class="ax-btn-group ax-btn-group--segmented" role="radiogroup" aria-label="Date range">
                  <button type="button" class="ax-btn ax-btn--sm" role="radio" aria-checked="false">7D</button>
                  <button type="button" class="ax-btn ax-btn--sm is-selected" role="radio" aria-checked="true">30D</button>
                  <button type="button" class="ax-btn ax-btn--sm" role="radio" aria-checked="false">90D</button>
                </div>
              </div>
            </div>
            <div class="ax-card__body" style="padding-top:0;">
              <div class="ax-cluster" style="gap:var(--ax-space-5);margin-block-end:var(--ax-space-3);">
                <span class="ax-cluster" style="gap:var(--ax-space-2);"><i style="width:9px;height:9px;border-radius:3px;background:var(--ax-accent);"></i><small style="color:var(--ax-text-muted);font-size:var(--ax-text-sm);">Volume (ETH)</small></span>
                <span class="ax-cluster" style="gap:var(--ax-space-2);"><i style="width:9px;height:9px;border-radius:3px;background:var(--ax-viz-violet);"></i><small style="color:var(--ax-text-muted);font-size:var(--ax-text-sm);">Floor (ETH)</small></span>
              </div>
              <div id="ax-vol-floor" aria-label="Mixed chart of daily volume columns with floor price line"></div>
            </div>
          </section>

          <!-- Sales by Category (4) -->
          <section class="ax-card ax-col--4" role="region" aria-label="Sales by category">
            <div class="ax-card__header">
              <div class="ax-card__titles">
                <h2 class="ax-card__title">Sales by Category</h2>
              </div>
              <button type="button" class="ax-btn ax-btn--ghost ax-btn--icon ax-btn--sm" aria-label="Category options">
                <svg class="ax-btn__icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M4 12a1 1 0 1 0 2 0a1 1 0 1 0 -2 0"/><path d="M11 12a1 1 0 1 0 2 0a1 1 0 1 0 -2 0"/><path d="M18 12a1 1 0 1 0 2 0a1 1 0 1 0 -2 0"/></svg>
              </button>
            </div>
            <div class="ax-card__body" style="padding-top:0;">
              <div id="ax-cat-donut" aria-label="Donut chart of sales by category: art 42%, collectibles 26%, gaming 20%, music 12%"></div>
              <ul class="ax-list ax-list--compact" style="margin-top:var(--ax-space-2);">
                <li class="ax-list__row" style="border:0;padding-inline:0;"><span class="ax-list__leading"><i style="width:9px;height:9px;border-radius:3px;background:#38BDF8;display:inline-block;"></i></span><span class="ax-list__content"><span class="ax-list__title" style="font-weight:var(--ax-weight-medium);">Art</span></span><span class="ax-list__trailing ax-num" style="color:var(--ax-text-strong);">42%</span></li>
                <li class="ax-list__row" style="border:0;padding-inline:0;"><span class="ax-list__leading"><i style="width:9px;height:9px;border-radius:3px;background:#A78BFA;display:inline-block;"></i></span><span class="ax-list__content"><span class="ax-list__title" style="font-weight:var(--ax-weight-medium);">Collectibles</span></span><span class="ax-list__trailing ax-num" style="color:var(--ax-text-strong);">26%</span></li>
                <li class="ax-list__row" style="border:0;padding-inline:0;"><span class="ax-list__leading"><i style="width:9px;height:9px;border-radius:3px;background:#F472B6;display:inline-block;"></i></span><span class="ax-list__content"><span class="ax-list__title" style="font-weight:var(--ax-weight-medium);">Gaming</span></span><span class="ax-list__trailing ax-num" style="color:var(--ax-text-strong);">20%</span></li>
                <li class="ax-list__row" style="border:0;padding-inline:0;"><span class="ax-list__leading"><i style="width:9px;height:9px;border-radius:3px;background:#FBBF24;display:inline-block;"></i></span><span class="ax-list__content"><span class="ax-list__title" style="font-weight:var(--ax-weight-medium);">Music</span></span><span class="ax-list__trailing ax-num" style="color:var(--ax-text-strong);">12%</span></li>
              </ul>
            </div>
          </section>

          <!-- ───── LIVE AUCTIONS (full width tile grid) ───── -->
          <section class="ax-card ax-col--12" role="region" aria-label="Live auctions" x-data="{ tick: '00:42:18' }">
            <div class="ax-card__header">
              <div class="ax-card__titles">
                <h2 class="ax-card__title">Live Auctions</h2>
                <p class="ax-card__subtitle">Ending soon — current highest bids</p>
              </div>
              <a class="ax-btn ax-btn--link" href="#">Browse all</a>
            </div>
            <div class="ax-card__body" style="padding-top:0;display:grid;grid-template-columns:repeat(auto-fill,minmax(220px,1fr));gap:var(--ax-space-4);">
              <!-- auction tile -->
              <article class="ax-card ax-card--interactive" style="overflow:hidden;">
                <div style="aspect-ratio:1/1;background:linear-gradient(135deg, color-mix(in oklab,var(--ax-viz-violet) 60%,transparent), color-mix(in oklab,var(--ax-viz-cyan) 55%,transparent));position:relative;display:flex;align-items:flex-end;padding:var(--ax-space-3);">
                  <span class="ax-badge ax-badge--solid ax-badge--accent ax-badge--pill" style="position:absolute;top:var(--ax-space-3);left:var(--ax-space-3);"><span class="ax-badge__dot"></span>Live</span>
                  <span class="ax-badge ax-badge--soft ax-badge--neutral ax-badge--pill ax-num" style="font-family:var(--ax-font-mono);"><svg viewBox="0 0 24 24" width="12" height="12" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M3 12a9 9 0 1 0 18 0a9 9 0 1 0 -18 0"/><path d="M12 7v5l3 3"/></svg><span x-text="tick">00:42:18</span></span>
                </div>
                <div class="ax-card__body" style="padding:var(--ax-space-3);">
                  <div style="font-weight:var(--ax-weight-semibold);color:var(--ax-text-strong);">Neon Drifter #218</div>
                  <div style="font-size:var(--ax-text-xs);color:var(--ax-text-subtle);margin-bottom:var(--ax-space-2);">by Vortex Labs</div>
                  <div class="ax-cluster" style="justify-content:space-between;"><span style="font-size:var(--ax-text-xs);color:var(--ax-text-muted);">Current bid</span><b class="ax-num" style="font-family:var(--ax-font-mono);color:var(--ax-accent);">3.8 ETH</b></div>
                </div>
              </article>
              <article class="ax-card ax-card--interactive" style="overflow:hidden;">
                <div style="aspect-ratio:1/1;background:linear-gradient(135deg, color-mix(in oklab,var(--ax-viz-pink) 60%,transparent), color-mix(in oklab,var(--ax-viz-amber) 55%,transparent));position:relative;display:flex;align-items:flex-end;padding:var(--ax-space-3);">
                  <span class="ax-badge ax-badge--solid ax-badge--accent ax-badge--pill" style="position:absolute;top:var(--ax-space-3);left:var(--ax-space-3);"><span class="ax-badge__dot"></span>Live</span>
                  <span class="ax-badge ax-badge--soft ax-badge--neutral ax-badge--pill ax-num" style="font-family:var(--ax-font-mono);"><svg viewBox="0 0 24 24" width="12" height="12" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M3 12a9 9 0 1 0 18 0a9 9 0 1 0 -18 0"/><path d="M12 7v5l3 3"/></svg>01:14:05</span>
                </div>
                <div class="ax-card__body" style="padding:var(--ax-space-3);">
                  <div style="font-weight:var(--ax-weight-semibold);color:var(--ax-text-strong);">Pastel Voyage #07</div>
                  <div style="font-size:var(--ax-text-xs);color:var(--ax-text-subtle);margin-bottom:var(--ax-space-2);">by Mira Aoki</div>
                  <div class="ax-cluster" style="justify-content:space-between;"><span style="font-size:var(--ax-text-xs);color:var(--ax-text-muted);">Current bid</span><b class="ax-num" style="font-family:var(--ax-font-mono);color:var(--ax-accent);">2.1 ETH</b></div>
                </div>
              </article>
              <article class="ax-card ax-card--interactive" style="overflow:hidden;">
                <div style="aspect-ratio:1/1;background:linear-gradient(135deg, color-mix(in oklab,var(--ax-viz-emerald) 60%,transparent), color-mix(in oklab,var(--ax-viz-cyan) 55%,transparent));position:relative;display:flex;align-items:flex-end;padding:var(--ax-space-3);">
                  <span class="ax-badge ax-badge--solid ax-badge--accent ax-badge--pill" style="position:absolute;top:var(--ax-space-3);left:var(--ax-space-3);"><span class="ax-badge__dot"></span>Live</span>
                  <span class="ax-badge ax-badge--soft ax-badge--neutral ax-badge--pill ax-num" style="font-family:var(--ax-font-mono);"><svg viewBox="0 0 24 24" width="12" height="12" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M3 12a9 9 0 1 0 18 0a9 9 0 1 0 -18 0"/><path d="M12 7v5l3 3"/></svg>00:09:51</span>
                </div>
                <div class="ax-card__body" style="padding:var(--ax-space-3);">
                  <div style="font-weight:var(--ax-weight-semibold);color:var(--ax-text-strong);">Glyph Engine #44</div>
                  <div style="font-size:var(--ax-text-xs);color:var(--ax-text-subtle);margin-bottom:var(--ax-space-2);">by Helio Studio</div>
                  <div class="ax-cluster" style="justify-content:space-between;"><span style="font-size:var(--ax-text-xs);color:var(--ax-text-muted);">Current bid</span><b class="ax-num" style="font-family:var(--ax-font-mono);color:var(--ax-accent);">5.4 ETH</b></div>
                </div>
              </article>
              <article class="ax-card ax-card--interactive" style="overflow:hidden;">
                <div style="aspect-ratio:1/1;background:linear-gradient(135deg, color-mix(in oklab,var(--ax-viz-amber) 60%,transparent), color-mix(in oklab,var(--ax-viz-pink) 55%,transparent));position:relative;display:flex;align-items:flex-end;padding:var(--ax-space-3);">
                  <span class="ax-badge ax-badge--solid ax-badge--accent ax-badge--pill" style="position:absolute;top:var(--ax-space-3);left:var(--ax-space-3);"><span class="ax-badge__dot"></span>Live</span>
                  <span class="ax-badge ax-badge--soft ax-badge--neutral ax-badge--pill ax-num" style="font-family:var(--ax-font-mono);"><svg viewBox="0 0 24 24" width="12" height="12" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M3 12a9 9 0 1 0 18 0a9 9 0 1 0 -18 0"/><path d="M12 7v5l3 3"/></svg>02:31:40</span>
                </div>
                <div class="ax-card__body" style="padding:var(--ax-space-3);">
                  <div style="font-weight:var(--ax-weight-semibold);color:var(--ax-text-strong);">Iron Bloom #99</div>
                  <div style="font-size:var(--ax-text-xs);color:var(--ax-text-subtle);margin-bottom:var(--ax-space-2);">by Kojima.eth</div>
                  <div class="ax-cluster" style="justify-content:space-between;"><span style="font-size:var(--ax-text-xs);color:var(--ax-text-muted);">Current bid</span><b class="ax-num" style="font-family:var(--ax-font-mono);color:var(--ax-accent);">1.7 ETH</b></div>
                </div>
              </article>
            </div>
          </section>

          <!-- ───── TRENDING COLLECTIONS (8) + TOP CREATORS (4) ───── -->
          <section class="ax-card ax-col--8" role="region" aria-label="Trending collections">
            <div class="ax-card__header">
              <div class="ax-card__titles">
                <h2 class="ax-card__title">Trending Collections</h2>
                <p class="ax-card__subtitle">Ranked by 24h volume</p>
              </div>
              <a class="ax-btn ax-btn--link" href="#">View all</a>
            </div>
            <div class="ax-table-wrap">
              <table class="ax-table ax-table--hover">
                <thead class="ax-table__head">
                  <tr>
                    <th class="ax-table__th" scope="col">#</th>
                    <th class="ax-table__th" scope="col">Collection</th>
                    <th class="ax-table__th ax-table__th--num" scope="col">Floor</th>
                    <th class="ax-table__th ax-table__th--num" scope="col">Volume</th>
                    <th class="ax-table__th ax-table__th--num" scope="col">24h</th>
                  </tr>
                </thead>
                <tbody>
                  <tr class="ax-table__row">
                    <td class="ax-table__td ax-num" style="font-family:var(--ax-font-mono);color:var(--ax-text-subtle);">1</td>
                    <td class="ax-table__td">
                      <div class="ax-cluster" style="gap:var(--ax-space-3);flex-wrap:nowrap;">
                        <span class="ax-avatar ax-avatar--sm ax-avatar--squircle" style="background:linear-gradient(135deg,#A78BFA,#38BDF8);"></span>
                        <div><div style="font-weight:var(--ax-weight-medium);color:var(--ax-text-strong);">Aurora Genesis</div><div style="font-size:var(--ax-text-xs);color:var(--ax-text-subtle);">10,000 items</div></div>
                      </div>
                    </td>
                    <td class="ax-table__td ax-table__td--num ax-num" style="font-family:var(--ax-font-mono);color:var(--ax-text);">4.20 ETH</td>
                    <td class="ax-table__td ax-table__td--num ax-num" style="font-family:var(--ax-font-mono);color:var(--ax-text-strong);font-weight:var(--ax-weight-semibold);">812 ETH</td>
                    <td class="ax-table__td ax-table__td--num" style="color:var(--ax-viz-emerald);">+22.4%</td>
                  </tr>
                  <tr class="ax-table__row">
                    <td class="ax-table__td ax-num" style="font-family:var(--ax-font-mono);color:var(--ax-text-subtle);">2</td>
                    <td class="ax-table__td">
                      <div class="ax-cluster" style="gap:var(--ax-space-3);flex-wrap:nowrap;">
                        <span class="ax-avatar ax-avatar--sm ax-avatar--squircle" style="background:linear-gradient(135deg,#F472B6,#FBBF24);"></span>
                        <div><div style="font-weight:var(--ax-weight-medium);color:var(--ax-text-strong);">Pixel Nomads</div><div style="font-size:var(--ax-text-xs);color:var(--ax-text-subtle);">6,000 items</div></div>
                      </div>
                    </td>
                    <td class="ax-table__td ax-table__td--num ax-num" style="font-family:var(--ax-font-mono);color:var(--ax-text);">1.85 ETH</td>
                    <td class="ax-table__td ax-table__td--num ax-num" style="font-family:var(--ax-font-mono);color:var(--ax-text-strong);font-weight:var(--ax-weight-semibold);">540 ETH</td>
                    <td class="ax-table__td ax-table__td--num" style="color:var(--ax-viz-emerald);">+11.7%</td>
                  </tr>
                  <tr class="ax-table__row">
                    <td class="ax-table__td ax-num" style="font-family:var(--ax-font-mono);color:var(--ax-text-subtle);">3</td>
                    <td class="ax-table__td">
                      <div class="ax-cluster" style="gap:var(--ax-space-3);flex-wrap:nowrap;">
                        <span class="ax-avatar ax-avatar--sm ax-avatar--squircle" style="background:linear-gradient(135deg,#34D399,#38BDF8);"></span>
                        <div><div style="font-weight:var(--ax-weight-medium);color:var(--ax-text-strong);">Chrome Spirits</div><div style="font-size:var(--ax-text-xs);color:var(--ax-text-subtle);">8,888 items</div></div>
                      </div>
                    </td>
                    <td class="ax-table__td ax-table__td--num ax-num" style="font-family:var(--ax-font-mono);color:var(--ax-text);">2.40 ETH</td>
                    <td class="ax-table__td ax-table__td--num ax-num" style="font-family:var(--ax-font-mono);color:var(--ax-text-strong);font-weight:var(--ax-weight-semibold);">428 ETH</td>
                    <td class="ax-table__td ax-table__td--num" style="color:var(--ax-viz-red);">−4.1%</td>
                  </tr>
                  <tr class="ax-table__row">
                    <td class="ax-table__td ax-num" style="font-family:var(--ax-font-mono);color:var(--ax-text-subtle);">4</td>
                    <td class="ax-table__td">
                      <div class="ax-cluster" style="gap:var(--ax-space-3);flex-wrap:nowrap;">
                        <span class="ax-avatar ax-avatar--sm ax-avatar--squircle" style="background:linear-gradient(135deg,#FBBF24,#FB7185);"></span>
                        <div><div style="font-weight:var(--ax-weight-medium);color:var(--ax-text-strong);">Solar Beasts</div><div style="font-size:var(--ax-text-xs);color:var(--ax-text-subtle);">4,200 items</div></div>
                      </div>
                    </td>
                    <td class="ax-table__td ax-table__td--num ax-num" style="font-family:var(--ax-font-mono);color:var(--ax-text);">0.92 ETH</td>
                    <td class="ax-table__td ax-table__td--num ax-num" style="font-family:var(--ax-font-mono);color:var(--ax-text-strong);font-weight:var(--ax-weight-semibold);">316 ETH</td>
                    <td class="ax-table__td ax-table__td--num" style="color:var(--ax-viz-emerald);">+8.9%</td>
                  </tr>
                  <tr class="ax-table__row">
                    <td class="ax-table__td ax-num" style="font-family:var(--ax-font-mono);color:var(--ax-text-subtle);">5</td>
                    <td class="ax-table__td">
                      <div class="ax-cluster" style="gap:var(--ax-space-3);flex-wrap:nowrap;">
                        <span class="ax-avatar ax-avatar--sm ax-avatar--squircle" style="background:linear-gradient(135deg,#38BDF8,#A78BFA);"></span>
                        <div><div style="font-weight:var(--ax-weight-medium);color:var(--ax-text-strong);">Echo Wardens</div><div style="font-size:var(--ax-text-xs);color:var(--ax-text-subtle);">3,333 items</div></div>
                      </div>
                    </td>
                    <td class="ax-table__td ax-table__td--num ax-num" style="font-family:var(--ax-font-mono);color:var(--ax-text);">1.10 ETH</td>
                    <td class="ax-table__td ax-table__td--num ax-num" style="font-family:var(--ax-font-mono);color:var(--ax-text-strong);font-weight:var(--ax-weight-semibold);">204 ETH</td>
                    <td class="ax-table__td ax-table__td--num" style="color:var(--ax-viz-emerald);">+3.5%</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </section>

          <!-- Top Creators (4) -->
          <section class="ax-card ax-col--4" role="region" aria-label="Top creators">
            <div class="ax-card__header">
              <div class="ax-card__titles">
                <h2 class="ax-card__title">Top Creators</h2>
              </div>
              <a class="ax-btn ax-btn--link" href="#">View all</a>
            </div>
            <div class="ax-card__body" style="padding-top:0;display:flex;flex-direction:column;gap:var(--ax-space-4);">
              <div class="ax-cluster" style="gap:var(--ax-space-3);flex-wrap:nowrap;">
                <b class="ax-num" style="font-family:var(--ax-font-mono);color:var(--ax-warning-500);width:18px;text-align:center;">1</b>
                <span class="ax-avatar ax-avatar--squircle" style="background:linear-gradient(135deg,#A78BFA,#F472B6);"></span>
                <div style="flex:1 1 auto;min-width:0;"><div style="font-weight:var(--ax-weight-medium);color:var(--ax-text-strong);">Vortex Labs</div><div style="font-size:var(--ax-text-xs);color:var(--ax-text-subtle);">@vortex</div></div>
                <b class="ax-num" style="font-family:var(--ax-font-mono);color:var(--ax-text-strong);">312 ETH</b>
              </div>
              <div class="ax-cluster" style="gap:var(--ax-space-3);flex-wrap:nowrap;">
                <b class="ax-num" style="font-family:var(--ax-font-mono);color:var(--ax-text-muted);width:18px;text-align:center;">2</b>
                <span class="ax-avatar ax-avatar--squircle" style="background:linear-gradient(135deg,#34D399,#38BDF8);"></span>
                <div style="flex:1 1 auto;min-width:0;"><div style="font-weight:var(--ax-weight-medium);color:var(--ax-text-strong);">Mira Aoki</div><div style="font-size:var(--ax-text-xs);color:var(--ax-text-subtle);">@miraink</div></div>
                <b class="ax-num" style="font-family:var(--ax-font-mono);color:var(--ax-text-strong);">248 ETH</b>
              </div>
              <div class="ax-cluster" style="gap:var(--ax-space-3);flex-wrap:nowrap;">
                <b class="ax-num" style="font-family:var(--ax-font-mono);color:var(--ax-text-subtle);width:18px;text-align:center;">3</b>
                <span class="ax-avatar ax-avatar--squircle" style="background:linear-gradient(135deg,#FBBF24,#FB7185);"></span>
                <div style="flex:1 1 auto;min-width:0;"><div style="font-weight:var(--ax-weight-medium);color:var(--ax-text-strong);">Helio Studio</div><div style="font-size:var(--ax-text-xs);color:var(--ax-text-subtle);">@helio</div></div>
                <b class="ax-num" style="font-family:var(--ax-font-mono);color:var(--ax-text-strong);">196 ETH</b>
              </div>
              <div class="ax-cluster" style="gap:var(--ax-space-3);flex-wrap:nowrap;">
                <b class="ax-num" style="font-family:var(--ax-font-mono);color:var(--ax-text-subtle);width:18px;text-align:center;">4</b>
                <span class="ax-avatar ax-avatar--squircle" style="background:linear-gradient(135deg,#38BDF8,#34D399);"></span>
                <div style="flex:1 1 auto;min-width:0;"><div style="font-weight:var(--ax-weight-medium);color:var(--ax-text-strong);">Kojima.eth</div><div style="font-size:var(--ax-text-xs);color:var(--ax-text-subtle);">@kojima</div></div>
                <b class="ax-num" style="font-family:var(--ax-font-mono);color:var(--ax-text-strong);">154 ETH</b>
              </div>
              <div class="ax-cluster" style="gap:var(--ax-space-3);flex-wrap:nowrap;">
                <b class="ax-num" style="font-family:var(--ax-font-mono);color:var(--ax-text-subtle);width:18px;text-align:center;">5</b>
                <span class="ax-avatar ax-avatar--squircle" style="background:linear-gradient(135deg,#F472B6,#A78BFA);"></span>
                <div style="flex:1 1 auto;min-width:0;"><div style="font-weight:var(--ax-weight-medium);color:var(--ax-text-strong);">Nova Reyes</div><div style="font-size:var(--ax-text-xs);color:var(--ax-text-subtle);">@novart</div></div>
                <b class="ax-num" style="font-family:var(--ax-font-mono);color:var(--ax-text-strong);">121 ETH</b>
              </div>
            </div>
          </section>

          <!-- ───── RECENT ACTIVITY (full width) ───── -->
          <section class="ax-card ax-col--12" role="region" aria-label="Recent activity">
            <div class="ax-card__header">
              <div class="ax-card__titles">
                <h2 class="ax-card__title">Recent Activity</h2>
                <p class="ax-card__subtitle">Latest sales, bids &amp; transfers</p>
              </div>
              <a class="ax-btn ax-btn--link" href="#">View all</a>
            </div>
            <div class="ax-table-wrap">
              <table class="ax-table ax-table--hover">
                <thead class="ax-table__head">
                  <tr>
                    <th class="ax-table__th" scope="col">Item</th>
                    <th class="ax-table__th" scope="col">Event</th>
                    <th class="ax-table__th ax-table__th--num" scope="col">Price</th>
                    <th class="ax-table__th" scope="col">From → To</th>
                    <th class="ax-table__th" scope="col">Time</th>
                  </tr>
                </thead>
                <tbody>
                  <tr class="ax-table__row">
                    <td class="ax-table__td"><div class="ax-cluster" style="gap:var(--ax-space-3);flex-wrap:nowrap;"><span class="ax-avatar ax-avatar--sm ax-avatar--squircle" style="background:linear-gradient(135deg,#A78BFA,#38BDF8);"></span><div style="font-weight:var(--ax-weight-medium);color:var(--ax-text-strong);">Aurora Genesis #1822</div></div></td>
                    <td class="ax-table__td"><span class="ax-badge ax-badge--soft ax-badge--success ax-badge--pill">Sale</span></td>
                    <td class="ax-table__td ax-table__td--num ax-num" style="font-family:var(--ax-font-mono);color:var(--ax-text-strong);">4.20 ETH</td>
                    <td class="ax-table__td ax-num" style="font-family:var(--ax-font-mono);color:var(--ax-text-muted);font-size:var(--ax-text-xs);">0x8a2f → 0x14bd</td>
                    <td class="ax-table__td" style="color:var(--ax-text-subtle);">2m ago</td>
                  </tr>
                  <tr class="ax-table__row">
                    <td class="ax-table__td"><div class="ax-cluster" style="gap:var(--ax-space-3);flex-wrap:nowrap;"><span class="ax-avatar ax-avatar--sm ax-avatar--squircle" style="background:linear-gradient(135deg,#F472B6,#FBBF24);"></span><div style="font-weight:var(--ax-weight-medium);color:var(--ax-text-strong);">Pixel Nomads #441</div></div></td>
                    <td class="ax-table__td"><span class="ax-badge ax-badge--soft ax-badge--info ax-badge--pill">Bid</span></td>
                    <td class="ax-table__td ax-table__td--num ax-num" style="font-family:var(--ax-font-mono);color:var(--ax-text-strong);">2.05 ETH</td>
                    <td class="ax-table__td ax-num" style="font-family:var(--ax-font-mono);color:var(--ax-text-muted);font-size:var(--ax-text-xs);">0x77c1 → —</td>
                    <td class="ax-table__td" style="color:var(--ax-text-subtle);">6m ago</td>
                  </tr>
                  <tr class="ax-table__row">
                    <td class="ax-table__td"><div class="ax-cluster" style="gap:var(--ax-space-3);flex-wrap:nowrap;"><span class="ax-avatar ax-avatar--sm ax-avatar--squircle" style="background:linear-gradient(135deg,#34D399,#38BDF8);"></span><div style="font-weight:var(--ax-weight-medium);color:var(--ax-text-strong);">Chrome Spirits #309</div></div></td>
                    <td class="ax-table__td"><span class="ax-badge ax-badge--soft ax-badge--neutral ax-badge--pill">Transfer</span></td>
                    <td class="ax-table__td ax-table__td--num" style="color:var(--ax-text-subtle);">—</td>
                    <td class="ax-table__td ax-num" style="font-family:var(--ax-font-mono);color:var(--ax-text-muted);font-size:var(--ax-text-xs);">0x2def → 0x9a01</td>
                    <td class="ax-table__td" style="color:var(--ax-text-subtle);">14m ago</td>
                  </tr>
                  <tr class="ax-table__row">
                    <td class="ax-table__td"><div class="ax-cluster" style="gap:var(--ax-space-3);flex-wrap:nowrap;"><span class="ax-avatar ax-avatar--sm ax-avatar--squircle" style="background:linear-gradient(135deg,#FBBF24,#FB7185);"></span><div style="font-weight:var(--ax-weight-medium);color:var(--ax-text-strong);">Solar Beasts #88</div></div></td>
                    <td class="ax-table__td"><span class="ax-badge ax-badge--soft ax-badge--success ax-badge--pill">Sale</span></td>
                    <td class="ax-table__td ax-table__td--num ax-num" style="font-family:var(--ax-font-mono);color:var(--ax-text-strong);">0.95 ETH</td>
                    <td class="ax-table__td ax-num" style="font-family:var(--ax-font-mono);color:var(--ax-text-muted);font-size:var(--ax-text-xs);">0x55ab → 0xc3f2</td>
                    <td class="ax-table__td" style="color:var(--ax-text-subtle);">23m ago</td>
                  </tr>
                  <tr class="ax-table__row">
                    <td class="ax-table__td"><div class="ax-cluster" style="gap:var(--ax-space-3);flex-wrap:nowrap;"><span class="ax-avatar ax-avatar--sm ax-avatar--squircle" style="background:linear-gradient(135deg,#38BDF8,#A78BFA);"></span><div style="font-weight:var(--ax-weight-medium);color:var(--ax-text-strong);">Echo Wardens #1201</div></div></td>
                    <td class="ax-table__td"><span class="ax-badge ax-badge--soft ax-badge--warning ax-badge--pill">List</span></td>
                    <td class="ax-table__td ax-table__td--num ax-num" style="font-family:var(--ax-font-mono);color:var(--ax-text-strong);">1.20 ETH</td>
                    <td class="ax-table__td ax-num" style="font-family:var(--ax-font-mono);color:var(--ax-text-muted);font-size:var(--ax-text-xs);">0xb0de → —</td>
                    <td class="ax-table__td" style="color:var(--ax-text-subtle);">38m ago</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </section>

        </div>
@endsection

@push('scripts')
  @vite(['resources/js/pages/dashboards-nft.js'])
@endpush
