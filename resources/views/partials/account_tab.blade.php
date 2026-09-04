<nav class="ax-card ax-col--3" role="region" aria-label="Settings sections" style="align-self:start;">
    <div class="ax-card__body" style="padding:var(--ax-space-3);">
        <div role="tablist" aria-orientation="vertical" aria-label="Settings"
            style="display:flex;flex-direction:column;gap:2px;">

            <a href="{{ url('admin-profile') }}" role="tab"
                class="ax-btn ax-btn--ghost ax-btn--block {{ ($title ?? '') === 'My Profile' ? 'is-selected' : '' }}"
                style="justify-content:flex-start; {{ ($title ?? '') === 'My Profile' ? 'background: var(--ax-fill-hover);' : '' }}">
                <svg class="ax-icon ax-dropdown__lead" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                    stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" width="24" height="24"
                    aria-hidden="true">
                    <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0"></path>
                    <path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"></path>
                </svg>
                <span class="ax-btn__label">My Profile</span>
            </a>

            <a href="{{ url('account-setting') }}" role="tab"
                class="ax-btn ax-btn--ghost ax-btn--block {{ ($title ?? '') === 'Account Setting' ? 'is-selected' : '' }}"
                style="justify-content:flex-start; {{ ($title ?? '') === 'Account Setting' ? 'background: var(--ax-fill-hover);' : '' }}">
                <svg class="ax-icon ax-dropdown__lead" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                    stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" width="24" height="24"
                    aria-hidden="true">
                    <path
                        d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 0 0 2.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 0 0 1.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 0 0-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 0 0-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 0 0-2.573-1.066c-1.543.94-3.31.826-2.37 2.37a1.724 1.724 0 0 0-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 0 0 1.066-2.573c-.94-1.543.826-3.31 2.37-2.37a1.724 1.724 0 0 0 2.572-1.065c.426-1.756 2.924-1.756 3.35 0">
                    </path>
                    <path d="M9 12a3 3 0 1 0 6 0a3 3 0 0 0 -6 0"></path>
                </svg>
                <span class="ax-btn__label">Account Setting</span>
            </a>
            <a href="#" role="tab" class="ax-btn ax-btn--ghost ax-btn--block" style="justify-content:flex-start;"
                :aria-selected="tab==='notifications'" :class="{ 'is-selected': tab==='notifications' }"
                @click="tab='notifications'">
                <svg class="ax-icon ax-dropdown__lead" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                    stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" width="24" height="24"
                    aria-hidden="true">
                    <path d="M12 8l0 4l2 2" />
                    <path d="M3.05 11a9 9 0 1 1 .5 4m-.5 5v-5h5" />
                </svg>
                <span class="ax-btn__label">Activity Log</span>
            </a>
            <a href="{{ url("admin-logout") }}" role="tab" class="ax-btn ax-btn--ghost ax-btn--block"
                style="justify-content:flex-start;" :aria-selected="tab==='billing'"
                :class="{ 'is-selected': tab==='billing' }" @click="tab='billing'">
                <svg class="ax-icon ax-dropdown__lead" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                    stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" width="24" height="24"
                    aria-hidden="true">
                    <path d="M14 8v-2a2 2 0 0 0 -2 -2h-7a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h7a2 2 0 0 0 2 -2v-2" />
                    <path d="M9 12h12l-3 -3" />
                    <path d="M18 15l3 -3" />
                </svg>
                <span class="ax-btn__label">Sign Out</span>
            </a>
        </div>
    </div>
</nav>