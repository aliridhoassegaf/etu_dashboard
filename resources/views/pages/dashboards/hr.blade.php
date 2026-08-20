@extends('layouts.app')

@section('content')
        <!-- ════════════════ PAGE HEAD ════════════════ -->
        <div class="ax-page-head">
          <div class="ax-page-head__row">
            <div>
              <nav class="ax-breadcrumb" data-ax-breadcrumb aria-label="Breadcrumb"></nav>
              <h1 class="ax-page-head__title">HR &amp; Payroll</h1>
              <p class="ax-page-head__subtitle">1,284 people across 9 departments — attendance at 96.2%.</p>
            </div>
            <div class="ax-page-head__actions">
              <button type="button" class="ax-btn ax-btn--secondary ax-btn--pill">
                <svg class="ax-btn__icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M4 7a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12"/><path d="M16 3v4"/><path d="M8 3v4"/><path d="M4 11h16"/></svg>
                <span class="ax-btn__label">This month</span>
                <svg class="ax-btn__icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M6 9l6 6l6 -6"/></svg>
              </button>
              <button type="button" class="ax-btn ax-btn--ghost">
                <svg class="ax-btn__icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M4 17v2a2 2 0 0 0 2 2h12a2 2 0 0 0 2 -2v-2"/><path d="M7 11l5 5l5 -5"/><path d="M12 4l0 12"/></svg>
                <span class="ax-btn__label">Run Payroll</span>
              </button>
              <button type="button" class="ax-btn ax-btn--primary">
                <svg class="ax-btn__icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0"/><path d="M16 19h6"/><path d="M19 16v6"/><path d="M6 21v-2a4 4 0 0 1 4 -4h4"/></svg>
                <span class="ax-btn__label">Add Employee</span>
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
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M10 13a2 2 0 1 0 4 0a2 2 0 0 0 -4 0"/><path d="M8 21v-1a2 2 0 0 1 2 -2h4a2 2 0 0 1 2 2v1"/><path d="M15 5a2 2 0 1 0 4 0a2 2 0 0 0 -4 0"/><path d="M17 10h2a2 2 0 0 1 2 2v1"/><path d="M5 5a2 2 0 1 0 4 0a2 2 0 0 0 -4 0"/><path d="M3 13v-1a2 2 0 0 1 2 -2h2"/></svg>
                  </span>
                  <span class="ax-statgroup__text">
                    <span class="ax-statgroup__label">Total Employees</span>
                    <span class="ax-statgroup__value ax-num">1,284</span>
                  </span>
                  <span class="ax-statgroup__delta ax-statgroup__delta--up">+2.4%</span>
                </div>
                <div class="ax-statgroup__cell">
                  <span class="ax-statgroup__icon ax-statgroup__icon--c2">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M11.795 21h-6.795a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v4"/><path d="M14 18a4 4 0 1 0 8 0a4 4 0 1 0 -8 0"/><path d="M15 3v4"/><path d="M7 3v4"/><path d="M3 11h16"/><path d="M18 16.5v1.5l1 1"/></svg>
                  </span>
                  <span class="ax-statgroup__text">
                    <span class="ax-statgroup__label">Attendance Rate</span>
                    <span class="ax-statgroup__value ax-num">96.2%</span>
                  </span>
                  <span class="ax-statgroup__delta ax-statgroup__delta--up">+0.6%</span>
                </div>
                <div class="ax-statgroup__cell">
                  <span class="ax-statgroup__icon ax-statgroup__icon--c3">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M3 7a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2v-12"/><path d="M8 5v-1a2 2 0 0 1 2 -2h4a2 2 0 0 1 2 2v1"/><path d="M12 12l0 .01"/><path d="M3 13a20 20 0 0 0 18 0"/></svg>
                  </span>
                  <span class="ax-statgroup__text">
                    <span class="ax-statgroup__label">Open Positions</span>
                    <span class="ax-statgroup__value ax-num">58</span>
                  </span>
                </div>
                <div class="ax-statgroup__cell">
                  <span class="ax-statgroup__icon ax-statgroup__icon--c4">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M20 11a8.1 8.1 0 0 0 -15.5 -2m-.5 -4v4h4"/><path d="M4 13a8.1 8.1 0 0 0 15.5 2m.5 4v-4h-4"/></svg>
                  </span>
                  <span class="ax-statgroup__text">
                    <span class="ax-statgroup__label">Turnover Rate</span>
                    <span class="ax-statgroup__value ax-num">7.8%</span>
                  </span>
                  <span class="ax-statgroup__delta ax-statgroup__delta--up">+1.2%</span>
                </div>
              </div>
            </div>
          </section>


          <!-- ───── HERO: Headcount Trend (8) + Department Distribution (4) ───── -->
          <section class="ax-card ax-card--chart ax-col--8" role="region" aria-label="Headcount trend">
            <div class="ax-card__header">
              <div class="ax-card__titles">
                <span class="ax-card__eyebrow">Workforce</span>
                <h2 class="ax-card__title">Headcount Trend</h2>
                <p class="ax-card__subtitle">Joiners vs. leavers, with net headcount</p>
              </div>
              <div class="ax-card__actions">
                <div class="ax-btn-group ax-btn-group--segmented" role="radiogroup" aria-label="Date range">
                  <button type="button" class="ax-btn ax-btn--sm" role="radio" aria-checked="false">6M</button>
                  <button type="button" class="ax-btn ax-btn--sm is-selected" role="radio" aria-checked="true">12M</button>
                  <button type="button" class="ax-btn ax-btn--sm" role="radio" aria-checked="false">All</button>
                </div>
              </div>
            </div>
            <div class="ax-card__body" style="padding-top:0;">
              <div class="ax-cluster" style="gap:var(--ax-space-5);margin-block-end:var(--ax-space-3);">
                <span class="ax-cluster" style="gap:var(--ax-space-2);"><i style="width:9px;height:9px;border-radius:3px;background:var(--ax-viz-emerald);"></i><small style="color:var(--ax-text-muted);font-size:var(--ax-text-sm);">Joiners</small></span>
                <span class="ax-cluster" style="gap:var(--ax-space-2);"><i style="width:9px;height:9px;border-radius:3px;background:var(--ax-viz-red);"></i><small style="color:var(--ax-text-muted);font-size:var(--ax-text-sm);">Leavers</small></span>
                <span class="ax-cluster" style="gap:var(--ax-space-2);"><i style="width:9px;height:9px;border-radius:3px;background:var(--ax-accent);"></i><small style="color:var(--ax-text-muted);font-size:var(--ax-text-sm);">Net headcount</small></span>
              </div>
              <div id="ax-headcount" aria-label="Mixed chart of monthly joiners and leavers with net headcount line"></div>
            </div>
          </section>

          <!-- Department Distribution (4) -->
          <section class="ax-card ax-col--4" role="region" aria-label="Department distribution">
            <div class="ax-card__header">
              <div class="ax-card__titles">
                <h2 class="ax-card__title">By Department</h2>
              </div>
              <button type="button" class="ax-btn ax-btn--ghost ax-btn--icon ax-btn--sm" aria-label="Department options">
                <svg class="ax-btn__icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M4 12a1 1 0 1 0 2 0a1 1 0 1 0 -2 0"/><path d="M11 12a1 1 0 1 0 2 0a1 1 0 1 0 -2 0"/><path d="M18 12a1 1 0 1 0 2 0a1 1 0 1 0 -2 0"/></svg>
              </button>
            </div>
            <div class="ax-card__body" style="padding-top:0;">
              <div id="ax-dept-donut" aria-label="Donut chart of headcount by department"></div>
              <ul class="ax-list ax-list--compact" style="margin-top:var(--ax-space-2);">
                <li class="ax-list__row" style="border:0;padding-inline:0;"><span class="ax-list__leading"><i style="width:9px;height:9px;border-radius:3px;background:#38BDF8;display:inline-block;"></i></span><span class="ax-list__content"><span class="ax-list__title" style="font-weight:var(--ax-weight-medium);">Engineering</span></span><span class="ax-list__trailing ax-num" style="color:var(--ax-text-strong);">412</span></li>
                <li class="ax-list__row" style="border:0;padding-inline:0;"><span class="ax-list__leading"><i style="width:9px;height:9px;border-radius:3px;background:#A78BFA;display:inline-block;"></i></span><span class="ax-list__content"><span class="ax-list__title" style="font-weight:var(--ax-weight-medium);">Sales</span></span><span class="ax-list__trailing ax-num" style="color:var(--ax-text-strong);">286</span></li>
                <li class="ax-list__row" style="border:0;padding-inline:0;"><span class="ax-list__leading"><i style="width:9px;height:9px;border-radius:3px;background:#F472B6;display:inline-block;"></i></span><span class="ax-list__content"><span class="ax-list__title" style="font-weight:var(--ax-weight-medium);">Support</span></span><span class="ax-list__trailing ax-num" style="color:var(--ax-text-strong);">214</span></li>
                <li class="ax-list__row" style="border:0;padding-inline:0;"><span class="ax-list__leading"><i style="width:9px;height:9px;border-radius:3px;background:#FBBF24;display:inline-block;"></i></span><span class="ax-list__content"><span class="ax-list__title" style="font-weight:var(--ax-weight-medium);">Marketing</span></span><span class="ax-list__trailing ax-num" style="color:var(--ax-text-strong);">198</span></li>
                <li class="ax-list__row" style="border:0;padding-inline:0;"><span class="ax-list__leading"><i style="width:9px;height:9px;border-radius:3px;background:#34D399;display:inline-block;"></i></span><span class="ax-list__content"><span class="ax-list__title" style="font-weight:var(--ax-weight-medium);">Operations</span></span><span class="ax-list__trailing ax-num" style="color:var(--ax-text-strong);">174</span></li>
              </ul>
            </div>
          </section>

          <!-- ───── ATTENDANCE (8) + PAYROLL SUMMARY (4) ───── -->
          <section class="ax-card ax-card--chart ax-col--8" role="region" aria-label="Attendance overview">
            <div class="ax-card__header">
              <div class="ax-card__titles">
                <h2 class="ax-card__title">Attendance Overview</h2>
                <p class="ax-card__subtitle">Present, remote, leave &amp; absent — this week</p>
              </div>
              <div class="ax-card__actions">
                <span class="ax-cluster" style="gap:var(--ax-space-2);"><i style="width:9px;height:9px;border-radius:3px;background:var(--ax-viz-emerald);"></i><small style="color:var(--ax-text-muted);font-size:var(--ax-text-xs);">Present</small></span>
                <span class="ax-cluster" style="gap:var(--ax-space-2);"><i style="width:9px;height:9px;border-radius:3px;background:var(--ax-viz-cyan);"></i><small style="color:var(--ax-text-muted);font-size:var(--ax-text-xs);">Remote</small></span>
                <span class="ax-cluster" style="gap:var(--ax-space-2);"><i style="width:9px;height:9px;border-radius:3px;background:var(--ax-viz-amber);"></i><small style="color:var(--ax-text-muted);font-size:var(--ax-text-xs);">Leave</small></span>
                <span class="ax-cluster" style="gap:var(--ax-space-2);"><i style="width:9px;height:9px;border-radius:3px;background:var(--ax-viz-red);"></i><small style="color:var(--ax-text-muted);font-size:var(--ax-text-xs);">Absent</small></span>
              </div>
            </div>
            <div class="ax-card__body" style="padding-top:0;">
              <div id="ax-attendance" aria-label="Stacked column chart of weekly attendance breakdown"></div>
            </div>
          </section>

          <!-- Payroll Summary (4) -->
          <section class="ax-card ax-col--4" role="region" aria-label="Payroll summary">
            <div class="ax-card__header">
              <div class="ax-card__titles">
                <h2 class="ax-card__title">Payroll Summary</h2>
              </div>
            </div>
            <div class="ax-card__body" style="padding-top:0;display:flex;flex-direction:column;gap:var(--ax-space-5);">
              <div style="position:relative;overflow:hidden;border-radius:var(--ax-radius-lg);padding:var(--ax-space-5);background:var(--ax-gradient-plate);box-shadow:var(--ax-shadow-md);color:#fff;">
                <span aria-hidden="true" style="position:absolute;top:-40px;right:-30px;width:140px;height:140px;border-radius:50%;background:rgba(255,255,255,.18);filter:blur(6px);"></span>
                <div style="position:relative;">
                  <div style="font-size:var(--ax-text-xs);opacity:.85;">Net pay — June run</div>
                  <div class="ax-num" style="font-family:var(--ax-font-display);font-size:var(--ax-text-2xl);font-weight:700;line-height:1.1;">$3,184,920</div>
                  <div style="font-size:var(--ax-text-xs);opacity:.85;margin-top:var(--ax-space-3);">Next pay run · Jun 30, 2026</div>
                </div>
              </div>
              <div style="display:flex;flex-direction:column;gap:var(--ax-space-3);">
                <div class="ax-cluster" style="justify-content:space-between;"><span style="font-size:var(--ax-text-sm);color:var(--ax-text-muted);">Gross payroll</span><b class="ax-num" style="font-family:var(--ax-font-mono);color:var(--ax-text-strong);">$4,128,400</b></div>
                <div class="ax-cluster" style="justify-content:space-between;"><span style="font-size:var(--ax-text-sm);color:var(--ax-text-muted);">Tax &amp; deductions</span><b class="ax-num" style="font-family:var(--ax-font-mono);color:var(--ax-text);">−$786,210</b></div>
                <div class="ax-cluster" style="justify-content:space-between;"><span style="font-size:var(--ax-text-sm);color:var(--ax-text-muted);">Benefits</span><b class="ax-num" style="font-family:var(--ax-font-mono);color:var(--ax-text);">−$157,270</b></div>
                <div class="ax-divider"></div>
                <div class="ax-cluster" style="justify-content:space-between;"><span style="font-size:var(--ax-text-sm);color:var(--ax-text-strong);font-weight:var(--ax-weight-semibold);">Net payable</span><b class="ax-num" style="font-family:var(--ax-font-mono);color:var(--ax-viz-emerald);">$3,184,920</b></div>
              </div>
            </div>
          </section>

          <!-- ───── LEAVE REQUESTS (4) + NEW HIRES (8) ───── -->
          <section class="ax-card ax-col--4" role="region" aria-label="Leave requests" x-data="{ rows: [
            {n:'Priya Nair', r:'Annual leave', d:'Jul 1 – Jul 5', c:'#A78BFA', s:'pending'},
            {n:'Marcus Lee', r:'Sick leave', d:'Jun 28', c:'#34D399', s:'pending'},
            {n:'Ava Sutton', r:'Work from home', d:'Jun 27', c:'#38BDF8', s:'approved'},
            {n:'Tomás Herrera', r:'Parental leave', d:'Aug 1 – Sep 1', c:'#FBBF24', s:'pending'}
          ] }">
            <div class="ax-card__header">
              <div class="ax-card__titles">
                <h2 class="ax-card__title">Leave Requests</h2>
              </div>
              <span class="ax-badge ax-badge--soft ax-badge--warning ax-badge--pill">3 pending</span>
            </div>
            <div class="ax-card__body" style="padding-top:0;display:flex;flex-direction:column;gap:var(--ax-space-3);">
              <template x-for="(row, i) in rows" :key="i">
                <div class="ax-cluster" style="gap:var(--ax-space-3);flex-wrap:nowrap;padding:var(--ax-space-3);border-radius:var(--ax-radius-md);background:var(--ax-surface-subtle);">
                  <span class="ax-avatar ax-avatar--sm ax-avatar--squircle" :style="`background:color-mix(in oklab,${row.c} 18%,transparent);color:${row.c};`"><svg class="ax-avatar__icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0"/><path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"/></svg></span>
                  <div style="flex:1;min-width:0;">
                    <div style="font-weight:var(--ax-weight-medium);color:var(--ax-text-strong);" x-text="row.n"></div>
                    <div style="font-size:var(--ax-text-xs);color:var(--ax-text-subtle);"><span x-text="row.r"></span> · <span class="ax-num" x-text="row.d"></span></div>
                  </div>
                  <div class="ax-cluster" style="gap:var(--ax-space-1);" x-show="row.s==='pending'">
                    <button type="button" class="ax-btn ax-btn--ghost ax-btn--icon ax-btn--sm" aria-label="Approve request" @click="row.s='approved'"><svg class="ax-btn__icon" viewBox="0 0 24 24" fill="none" stroke="var(--ax-viz-emerald)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M5 12l5 5l10 -10"/></svg></button>
                    <button type="button" class="ax-btn ax-btn--ghost ax-btn--icon ax-btn--sm" aria-label="Reject request" @click="row.s='rejected'"><svg class="ax-btn__icon" viewBox="0 0 24 24" fill="none" stroke="var(--ax-viz-red)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M18 6l-12 12"/><path d="M6 6l12 12"/></svg></button>
                  </div>
                  <span class="ax-badge ax-badge--soft ax-badge--success ax-badge--pill" x-show="row.s==='approved'">Approved</span>
                  <span class="ax-badge ax-badge--soft ax-badge--danger ax-badge--pill" x-show="row.s==='rejected'">Rejected</span>
                </div>
              </template>
            </div>
          </section>

          <!-- New Hires (8) -->
          <section class="ax-card ax-col--8" role="region" aria-label="Recent hires">
            <div class="ax-card__header">
              <div class="ax-card__titles">
                <h2 class="ax-card__title">Recent Hires</h2>
                <p class="ax-card__subtitle">Joined this month</p>
              </div>
              <a class="ax-btn ax-btn--link" href="#">View all</a>
            </div>
            <div class="ax-table-wrap">
              <table class="ax-table ax-table--hover">
                <thead class="ax-table__head">
                  <tr>
                    <th class="ax-table__th" scope="col">Employee</th>
                    <th class="ax-table__th" scope="col">Role</th>
                    <th class="ax-table__th" scope="col">Department</th>
                    <th class="ax-table__th" scope="col">Start date</th>
                    <th class="ax-table__th" scope="col">Status</th>
                  </tr>
                </thead>
                <tbody>
                  <tr class="ax-table__row">
                    <td class="ax-table__td"><div class="ax-cluster" style="gap:var(--ax-space-3);flex-wrap:nowrap;"><span class="ax-avatar ax-avatar--sm ax-avatar--squircle" style="background:color-mix(in oklab,#38BDF8 18%,transparent);color:#38BDF8;"><svg class="ax-avatar__icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0"/><path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"/></svg></span><div><div style="font-weight:var(--ax-weight-medium);color:var(--ax-text-strong);">Eli Whitman</div><div style="font-size:var(--ax-text-xs);color:var(--ax-text-subtle);">eli.w@vireo.co</div></div></div></td>
                    <td class="ax-table__td" style="color:var(--ax-text-muted);">Frontend Engineer</td>
                    <td class="ax-table__td"><span class="ax-badge ax-badge--soft ax-badge--info ax-badge--pill">Engineering</span></td>
                    <td class="ax-table__td ax-num" style="font-family:var(--ax-font-mono);color:var(--ax-text-muted);">Jun 2</td>
                    <td class="ax-table__td"><span class="ax-badge ax-badge--soft ax-badge--success ax-badge--pill"><span class="ax-badge__dot"></span>Active</span></td>
                  </tr>
                  <tr class="ax-table__row">
                    <td class="ax-table__td"><div class="ax-cluster" style="gap:var(--ax-space-3);flex-wrap:nowrap;"><span class="ax-avatar ax-avatar--sm ax-avatar--squircle" style="background:color-mix(in oklab,#A78BFA 18%,transparent);color:#A78BFA;"><svg class="ax-avatar__icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0"/><path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"/></svg></span><div><div style="font-weight:var(--ax-weight-medium);color:var(--ax-text-strong);">Sofia Marin</div><div style="font-size:var(--ax-text-xs);color:var(--ax-text-subtle);">sofia.m@vireo.co</div></div></div></td>
                    <td class="ax-table__td" style="color:var(--ax-text-muted);">Account Executive</td>
                    <td class="ax-table__td"><span class="ax-badge ax-badge--soft ax-badge--accent ax-badge--pill">Sales</span></td>
                    <td class="ax-table__td ax-num" style="font-family:var(--ax-font-mono);color:var(--ax-text-muted);">Jun 5</td>
                    <td class="ax-table__td"><span class="ax-badge ax-badge--soft ax-badge--success ax-badge--pill"><span class="ax-badge__dot"></span>Active</span></td>
                  </tr>
                  <tr class="ax-table__row">
                    <td class="ax-table__td"><div class="ax-cluster" style="gap:var(--ax-space-3);flex-wrap:nowrap;"><span class="ax-avatar ax-avatar--sm ax-avatar--squircle" style="background:color-mix(in oklab,#FBBF24 18%,transparent);color:#FBBF24;"><svg class="ax-avatar__icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0"/><path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"/></svg></span><div><div style="font-weight:var(--ax-weight-medium);color:var(--ax-text-strong);">Jordan Blake</div><div style="font-size:var(--ax-text-xs);color:var(--ax-text-subtle);">jordan.b@vireo.co</div></div></div></td>
                    <td class="ax-table__td" style="color:var(--ax-text-muted);">Product Designer</td>
                    <td class="ax-table__td"><span class="ax-badge ax-badge--soft ax-badge--neutral ax-badge--pill">Design</span></td>
                    <td class="ax-table__td ax-num" style="font-family:var(--ax-font-mono);color:var(--ax-text-muted);">Jun 9</td>
                    <td class="ax-table__td"><span class="ax-badge ax-badge--soft ax-badge--warning ax-badge--pill"><span class="ax-badge__dot"></span>Onboarding</span></td>
                  </tr>
                  <tr class="ax-table__row">
                    <td class="ax-table__td"><div class="ax-cluster" style="gap:var(--ax-space-3);flex-wrap:nowrap;"><span class="ax-avatar ax-avatar--sm ax-avatar--squircle" style="background:color-mix(in oklab,#34D399 18%,transparent);color:#34D399;"><svg class="ax-avatar__icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0"/><path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"/></svg></span><div><div style="font-weight:var(--ax-weight-medium);color:var(--ax-text-strong);">Hana Suzuki</div><div style="font-size:var(--ax-text-xs);color:var(--ax-text-subtle);">hana.s@vireo.co</div></div></div></td>
                    <td class="ax-table__td" style="color:var(--ax-text-muted);">Support Specialist</td>
                    <td class="ax-table__td"><span class="ax-badge ax-badge--soft ax-badge--info ax-badge--pill">Support</span></td>
                    <td class="ax-table__td ax-num" style="font-family:var(--ax-font-mono);color:var(--ax-text-muted);">Jun 12</td>
                    <td class="ax-table__td"><span class="ax-badge ax-badge--soft ax-badge--warning ax-badge--pill"><span class="ax-badge__dot"></span>Onboarding</span></td>
                  </tr>
                </tbody>
              </table>
            </div>
          </section>

          <!-- ───── DIVERSITY BREAKDOWN (4) + BIRTHDAYS (4) + EMPLOYEE OF MONTH (4) ───── -->
          <section class="ax-card ax-col--4" role="region" aria-label="Diversity breakdown">
            <div class="ax-card__header">
              <div class="ax-card__titles"><h2 class="ax-card__title">Diversity</h2></div>
            </div>
            <div class="ax-card__body" style="padding-top:0;display:flex;flex-direction:column;gap:var(--ax-space-4);">
              <div>
                <div class="ax-cluster" style="justify-content:space-between;margin-bottom:6px;"><span style="font-size:var(--ax-text-sm);color:var(--ax-text);">Women</span><b class="ax-num" style="color:var(--ax-text-strong);font-size:var(--ax-text-sm);">47%</b></div>
                <div class="ax-progress ax-progress--sm"><div class="ax-progress__track"><div class="ax-progress__fill" style="width:47%;background:var(--ax-viz-violet);"></div></div></div>
              </div>
              <div>
                <div class="ax-cluster" style="justify-content:space-between;margin-bottom:6px;"><span style="font-size:var(--ax-text-sm);color:var(--ax-text);">Men</span><b class="ax-num" style="color:var(--ax-text-strong);font-size:var(--ax-text-sm);">51%</b></div>
                <div class="ax-progress ax-progress--sm"><div class="ax-progress__track"><div class="ax-progress__fill" style="width:51%;background:var(--ax-viz-cyan);"></div></div></div>
              </div>
              <div>
                <div class="ax-cluster" style="justify-content:space-between;margin-bottom:6px;"><span style="font-size:var(--ax-text-sm);color:var(--ax-text);">Non-binary / other</span><b class="ax-num" style="color:var(--ax-text-strong);font-size:var(--ax-text-sm);">2%</b></div>
                <div class="ax-progress ax-progress--sm"><div class="ax-progress__track"><div class="ax-progress__fill" style="width:2%;background:var(--ax-viz-amber);"></div></div></div>
              </div>
              <div class="ax-divider"></div>
              <div class="ax-cluster" style="justify-content:space-between;"><span style="font-size:var(--ax-text-sm);color:var(--ax-text-muted);">Avg. tenure</span><b class="ax-num" style="color:var(--ax-text-strong);">3.8 yrs</b></div>
              <div class="ax-cluster" style="justify-content:space-between;"><span style="font-size:var(--ax-text-sm);color:var(--ax-text-muted);">Median age</span><b class="ax-num" style="color:var(--ax-text-strong);">32</b></div>
            </div>
          </section>

          <!-- Birthdays & Anniversaries (4) -->
          <section class="ax-card ax-col--4" role="region" aria-label="Birthdays and anniversaries">
            <div class="ax-card__header">
              <div class="ax-card__titles"><h2 class="ax-card__title">Celebrations</h2></div>
            </div>
            <div class="ax-card__body" style="padding-top:0;display:flex;flex-direction:column;gap:var(--ax-space-4);">
              <div class="ax-cluster" style="gap:var(--ax-space-3);flex-wrap:nowrap;">
                <span class="ax-avatar ax-avatar--squircle" style="background:color-mix(in oklab,#F472B6 18%,transparent);color:#F472B6;"><svg class="ax-avatar__icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M3 20h18v-8a3 3 0 0 0 -3 -3h-12a3 3 0 0 0 -3 3v8"/><path d="M3 14.8c.3 .1 .65 .2 1 .2a2.4 2.4 0 0 0 2 -1a2.4 2.4 0 0 1 2 -1a2.4 2.4 0 0 1 2 1a2.4 2.4 0 0 0 2 1a2.4 2.4 0 0 0 2 -1a2.4 2.4 0 0 1 2 -1a2.4 2.4 0 0 1 2 1a2.4 2.4 0 0 0 2 1c.35 0 .7 -.1 1 -.2"/><path d="M12 4l1.5 1.6a2 2 0 1 1 -3 .1l1.5 -1.7"/></svg></span>
                <div style="flex:1;min-width:0;"><div style="font-weight:var(--ax-weight-medium);color:var(--ax-text-strong);">Camila Rossi</div><div style="font-size:var(--ax-text-xs);color:var(--ax-text-subtle);">Birthday today</div></div>
                <span class="ax-badge ax-badge--soft ax-badge--accent ax-badge--pill">🎂</span>
              </div>
              <div class="ax-cluster" style="gap:var(--ax-space-3);flex-wrap:nowrap;">
                <span class="ax-avatar ax-avatar--squircle" style="background:color-mix(in oklab,#FBBF24 18%,transparent);color:#FBBF24;"><svg class="ax-avatar__icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873l-6.158 -3.245"/></svg></span>
                <div style="flex:1;min-width:0;"><div style="font-weight:var(--ax-weight-medium);color:var(--ax-text-strong);">Devon Okafor</div><div style="font-size:var(--ax-text-xs);color:var(--ax-text-subtle);">5 years · Jun 28</div></div>
                <span class="ax-badge ax-badge--soft ax-badge--warning ax-badge--pill">5 yrs</span>
              </div>
              <div class="ax-cluster" style="gap:var(--ax-space-3);flex-wrap:nowrap;">
                <span class="ax-avatar ax-avatar--squircle" style="background:color-mix(in oklab,#38BDF8 18%,transparent);color:#38BDF8;"><svg class="ax-avatar__icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M3 20h18v-8a3 3 0 0 0 -3 -3h-12a3 3 0 0 0 -3 3v8"/><path d="M12 4l1.5 1.6a2 2 0 1 1 -3 .1l1.5 -1.7"/></svg></span>
                <div style="flex:1;min-width:0;"><div style="font-weight:var(--ax-weight-medium);color:var(--ax-text-strong);">Lena Brandt</div><div style="font-size:var(--ax-text-xs);color:var(--ax-text-subtle);">Birthday Jun 30</div></div>
                <span class="ax-badge ax-badge--soft ax-badge--neutral ax-badge--pill">in 3d</span>
              </div>
              <div class="ax-cluster" style="gap:var(--ax-space-3);flex-wrap:nowrap;">
                <span class="ax-avatar ax-avatar--squircle" style="background:color-mix(in oklab,#34D399 18%,transparent);color:#34D399;"><svg class="ax-avatar__icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873l-6.158 -3.245"/></svg></span>
                <div style="flex:1;min-width:0;"><div style="font-weight:var(--ax-weight-medium);color:var(--ax-text-strong);">Marcus Lee</div><div style="font-size:var(--ax-text-xs);color:var(--ax-text-subtle);">2 years · Jul 1</div></div>
                <span class="ax-badge ax-badge--soft ax-badge--warning ax-badge--pill">2 yrs</span>
              </div>
            </div>
          </section>

          <!-- Employee of the Month (4) -->
          <section class="ax-card ax-card--accent-edge ax-col--4" role="region" aria-label="Employee of the month">
            <div class="ax-card__header">
              <div class="ax-card__titles"><span class="ax-card__eyebrow">Recognition</span><h2 class="ax-card__title">Employee of the Month</h2></div>
            </div>
            <div class="ax-card__body" style="padding-top:0;text-align:center;display:flex;flex-direction:column;align-items:center;gap:var(--ax-space-3);">
              <span class="ax-avatar ax-avatar--xl ax-avatar--ringed" style="background:linear-gradient(135deg,var(--ax-accent),var(--ax-viz-violet));"></span>
              <div>
                <div style="font-family:var(--ax-font-display);font-weight:700;font-size:var(--ax-text-lg);color:var(--ax-text-strong);">Devon Okafor</div>
                <div style="font-size:var(--ax-text-sm);color:var(--ax-text-muted);">Senior Engineer · Engineering</div>
              </div>
              <p style="margin:0;font-size:var(--ax-text-sm);color:var(--ax-text-muted);">Shipped the new billing pipeline 2 weeks early and mentored 4 new hires.</p>
              <div class="ax-cluster" style="gap:var(--ax-space-5);justify-content:center;margin-top:var(--ax-space-2);">
                <div><div class="ax-num" style="font-family:var(--ax-font-mono);font-size:var(--ax-text-lg);font-weight:700;color:var(--ax-text-strong);">98%</div><small style="color:var(--ax-text-subtle);font-size:var(--ax-text-xs);">Goals</small></div>
                <div><div class="ax-num" style="font-family:var(--ax-font-mono);font-size:var(--ax-text-lg);font-weight:700;color:var(--ax-text-strong);">5.0</div><small style="color:var(--ax-text-subtle);font-size:var(--ax-text-xs);">Peer rating</small></div>
              </div>
            </div>
          </section>

        </div>
@endsection

@push('scripts')
  @vite(['resources/js/pages/dashboards-hr.js'])
@endpush
