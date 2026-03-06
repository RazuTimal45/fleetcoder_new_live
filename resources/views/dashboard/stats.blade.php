<x-dashboard-layout pageTitle="Stat Management">

    <div style="display:grid; grid-template-columns:1fr 340px; gap:24px; align-items:flex-start;">
        
        {{-- List --}}
        <div style="background:#fff; border-radius:24px; padding:32px; box-shadow:0 1px 6px rgba(0,0,0,0.05); border:1px solid #f1f5f9;">
            <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:32px;">
                <div>
                    <h3 style="font-size:18px; font-weight:800; color:#0f172a; margin:0;">Platform Stats</h3>
                    <p style="font-size:13px; color:#94a3b8; margin:4px 0 0;">{{ $stats->count() }} metrics displayed on landing page</p>
                </div>
            </div>

            <div style="display:grid; grid-template-columns: repeat(auto-fill, minmax(200px, 1fr)); gap:16px;">
                @forelse($stats as $s)
                    <div style="padding:24px; background:#f8fafc; border:1px solid #f1f5f9; border-radius:20px; text-align:center; position:relative; overflow:hidden; group">
                        <div style="font-size:32px; font-weight:900; color:#6366f1; letter-spacing:-1px;">{{ $s->number }}</div>
                        <div style="font-size:11px; font-weight:700; color:#94a3b8; text-transform:uppercase; letter-spacing:1px; margin-top:4px;">{{ $s->label }}</div>
                        
                        <div style="position:absolute; top:8px; right:8px; display:flex; gap:4px;">
                            {{-- Edit Trigger --}}
                            <button onclick="editStat({{ json_encode($s) }})" style="background:rgba(99,102,241,0.05); border:none; color:#6366f1; border-radius:6px; padding:4px; cursor:pointer; transition:all .2s;">
                                <svg width="14" height="14" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" /></svg>
                            </button>

                            {{-- Delete Trigger --}}
                            <form id="delete-stat-{{ $s->id }}" action="{{ route('dashboard.stats.destroy', $s) }}" method="POST" style="display:none;">
                                @csrf
                                @method('DELETE')
                            </form>
                            <button type="button" onclick="confirmDelete('delete-stat-{{ $s->id }}', 'Remove Metric?', 'Are you sure you want to delete the \'{{ $s->label }}\' metric?')" style="background:rgba(239,68,68,0.05); border:none; color:#ef4444; border-radius:6px; padding:4px; cursor:pointer; transition:all .2s;">
                                <svg width="14" height="14" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" /></svg>
                            </button>
                        </div>
                    </div>
                @empty
                    <div style="grid-column: 1 / -1; text-align:center; padding:48px 0; color:#94a3b8;">
                        <p style="font-size:14px; font-weight:500;">No stats found. Display your success metrics.</p>
                    </div>
                @endforelse
            </div>
        </div>

        {{-- Form Card --}}
        <div style="background:#fff; border-radius:24px; padding:32px; box-shadow:0 1px 6px rgba(0,0,0,0.05); border:1px solid #f1f5f9; position:sticky; top:96px;">
            <h3 id="form-title" style="font-size:17px; font-weight:800; color:#0f172a; margin:0 0 6px;">Add Metric</h3>
            <p id="form-desc" style="font-size:13px; color:#94a3b8; margin:0 0 24px;">Numerical proof of excellence.</p>

            <form id="stat-form" action="{{ route('dashboard.stats.store') }}" method="POST">
                @csrf
                <div id="method-field"></div>
                
                <div style="margin-bottom:16px;">
                    <label style="display:block; font-size:12px; font-weight:700; color:#475569; margin-bottom:6px; text-transform:uppercase;">Metric Value</label>
                    <input type="text" name="number" id="field-number" required placeholder="e.g. 500+ or 99.9%" style="width:100%; padding:10px 14px; border:1px solid #e2e8f0; border-radius:10px; font-size:14px; outline:none; box-sizing:border-box;">
                </div>
                <div style="margin-bottom:24px;">
                    <label style="display:block; font-size:12px; font-weight:700; color:#475569; margin-bottom:6px; text-transform:uppercase;">Label</label>
                    <input type="text" name="label" id="field-label" required placeholder="e.g. Solutions Built" style="width:100%; padding:10px 14px; border:1px solid #e2e8f0; border-radius:10px; font-size:14px; outline:none; box-sizing:border-box;">
                </div>
                <button type="submit" id="submit-btn" style="width:100%; background:#6366f1; color:#fff; border:none; padding:12px; border-radius:10px; font-size:13px; font-weight:700; cursor:pointer; box-shadow:0 4px 12px rgba(99,102,241,0.2);">
                    Append Metric
                </button>
                <button type="button" id="cancel-btn" onclick="resetForm()" style="display:none; width:100%; background:none; border:none; color:#64748b; padding:12px; font-size:13px; font-weight:600; cursor:pointer; margin-top:8px;">
                    Cancel Edit
                </button>
            </form>
        </div>
    </div>

    <script>
        function editStat(stat) {
            const form = document.getElementById('stat-form');
            const methodField = document.getElementById('method-field');
            const submitBtn = document.getElementById('submit-btn');
            const cancelBtn = document.getElementById('cancel-btn');
            const formTitle = document.getElementById('form-title');
            const formDesc = document.getElementById('form-desc');

            form.action = `/dashboard/stats/${stat.id}`;
            methodField.innerHTML = '@method("PATCH")';
            formTitle.innerText = 'Edit Metric';
            formDesc.innerText = 'Update your success data.';
            submitBtn.innerText = 'Update Metric';
            submitBtn.style.background = 'linear-gradient(135deg,#6366f1,#8b5cf6)';
            cancelBtn.style.display = 'block';

            document.getElementById('field-number').value = stat.number;
            document.getElementById('field-label').value = stat.label;
            
            window.scrollTo({ top: 0, behavior: 'smooth' });
        }

        function resetForm() {
            const form = document.getElementById('stat-form');
            const methodField = document.getElementById('method-field');
            const submitBtn = document.getElementById('submit-btn');
            const cancelBtn = document.getElementById('cancel-btn');
            const formTitle = document.getElementById('form-title');
            const formDesc = document.getElementById('form-desc');

            form.action = "{{ route('dashboard.stats.store') }}";
            methodField.innerHTML = '';
            formTitle.innerText = 'Add Metric';
            formDesc.innerText = 'Numerical proof of excellence.';
            submitBtn.innerText = 'Append Metric';
            submitBtn.style.background = '#6366f1';
            cancelBtn.style.display = 'none';

            form.reset();
        }
    </script>

</x-dashboard-layout>
