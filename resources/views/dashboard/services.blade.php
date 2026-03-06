<x-dashboard-layout pageTitle="Service Management">

    <div style="display:grid; grid-template-columns:1fr 340px; gap:24px; align-items:flex-start;">
        
        {{-- List --}}
        <div style="background:#fff; border-radius:24px; padding:32px; box-shadow:0 1px 6px rgba(0,0,0,0.05); border:1px solid #f1f5f9;">
            <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:32px;">
                <div>
                    <h3 style="font-size:18px; font-weight:800; color:#0f172a; margin:0;">Active Services</h3>
                    <p style="font-size:13px; color:#94a3b8; margin:4px 0 0;">{{ $services->count() }} modules currently live</p>
                </div>
            </div>

            <div style="display:grid; gap:12px;">
                @forelse($services as $s)
                    <div style="display:flex; align-items:center; gap:16px; padding:16px; background:#f8fafc; border:1px solid #f1f5f9; border-radius:16px; transition:transform .2s;">
                        <div id="service-icon-{{ $s->id }}" style="width:44px; height:44px; background:linear-gradient(135deg,#6366f1,#8b5cf6); border-radius:12px; display:flex; align-items:center; justify-content:center; color:#fff; font-weight:800; font-size:14px; flex-shrink:0;">
                            {{ $s->icon ?? '00' }}
                        </div>
                        <div style="flex:1; overflow:hidden;">
                            <h4 style="font-size:14px; font-weight:700; color:#1e293b; margin:0;">{{ $s->title }}</h4>
                            <p style="font-size:12px; color:#64748b; margin:2px 0 0; white-space:nowrap; overflow:hidden; text-overflow:ellipsis;">{{ $s->description }}</p>
                        </div>
                        <div style="display:flex; gap:8px;">
                            {{-- Edit Trigger --}}
                            <button onclick="editService({{ json_encode($s) }})" style="background:none; border:none; color:#94a3b8; cursor:pointer; padding:8px; border-radius:8px; transition:all .2s;" onmouseover="this.style.color='#6366f1'; this.style.background='#eef2ff'" onmouseout="this.style.color='#94a3b8'; this.style.background='none'">
                                <svg width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" /></svg>
                            </button>

                            {{-- Delete --}}
                            <form id="delete-service-{{ $s->id }}" action="{{ route('dashboard.services.destroy', $s) }}" method="POST" style="display:none;">
                                @csrf
                                @method('DELETE')
                            </form>
                            <button type="button" onclick="confirmDelete('delete-service-{{ $s->id }}', 'Remove Service?', 'Are you sure you want to delete the \'{{ $s->title }}\' service?')" style="background:none; border:none; color:#94a3b8; cursor:pointer; padding:8px; border-radius:8px; transition:all .2s;" onmouseover="this.style.color='#ef4444'; this.style.background='#fee2e2'" onmouseout="this.style.color='#94a3b8'; this.style.background='none'">
                                <svg width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" /></svg>
                            </button>
                        </div>
                    </div>
                @empty
                    <div style="text-align:center; padding:48px 0; color:#94a3b8;">
                        <svg width="48" height="48" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1" style="margin-bottom:12px; opacity:.3;"><path stroke-linecap="round" stroke-linejoin="round" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" /></svg>
                        <p style="font-size:14px; font-weight:500;">No services found. Add your first expertise module.</p>
                    </div>
                @endforelse
            </div>
        </div>

        {{-- Form Card --}}
        <div style="background:#fff; border-radius:24px; padding:32px; box-shadow:0 1px 6px rgba(0,0,0,0.05); border:1px solid #f1f5f9; position:sticky; top:96px;">
            <h3 id="form-title" style="font-size:17px; font-weight:800; color:#0f172a; margin:0 0 6px;">New Service</h3>
            <p id="form-desc" style="font-size:13px; color:#94a3b8; margin:0 0 24px;">Expand your capabilities.</p>

            <form id="service-form" action="{{ route('dashboard.services.store') }}" method="POST">
                @csrf
                <div id="method-field"></div>
                
                <div style="margin-bottom:16px;">
                    <label style="display:block; font-size:12px; font-weight:700; color:#475569; margin-bottom:6px; text-transform:uppercase;">Title</label>
                    <input type="text" name="title" id="field-title" required placeholder="e.g. Cloud Architecture" style="width:100%; padding:10px 14px; border:1px solid #e2e8f0; border-radius:10px; font-size:14px; outline:none; box-sizing:border-box;">
                </div>
                <div style="margin-bottom:16px;">
                    <label style="display:block; font-size:12px; font-weight:700; color:#475569; margin-bottom:6px; text-transform:uppercase;">Icon/Number</label>
                    <input type="text" name="icon" id="field-icon" placeholder="e.g. 07 or SVG" style="width:100%; padding:10px 14px; border:1px solid #e2e8f0; border-radius:10px; font-size:14px; outline:none; box-sizing:border-box;">
                </div>
                <div style="margin-bottom:24px;">
                    <label style="display:block; font-size:12px; font-weight:700; color:#475569; margin-bottom:6px; text-transform:uppercase;">Description</label>
                    <textarea name="description" id="field-desc" rows="4" placeholder="Briefly describe the expertise..." style="width:100%; padding:10px 14px; border:1px solid #e2e8f0; border-radius:10px; font-size:14px; outline:none; box-sizing:border-box; resize:none;"></textarea>
                </div>
                <button type="submit" id="submit-btn" style="width:100%; background:#6366f1; color:#fff; border:none; padding:12px; border-radius:10px; font-size:13px; font-weight:700; cursor:pointer; box-shadow:0 4px 12px rgba(99,102,241,0.2);">
                    Create Module
                </button>
                <button type="button" id="cancel-btn" onclick="resetForm()" style="display:none; width:100%; background:none; border:none; color:#64748b; padding:12px; font-size:13px; font-weight:600; cursor:pointer; margin-top:8px;">
                    Cancel Edit
                </button>
            </form>
        </div>
    </div>

    <script>
        function editService(service) {
            const form = document.getElementById('service-form');
            const methodField = document.getElementById('method-field');
            const submitBtn = document.getElementById('submit-btn');
            const cancelBtn = document.getElementById('cancel-btn');
            const formTitle = document.getElementById('form-title');
            const formDesc = document.getElementById('form-desc');

            form.action = `/dashboard/services/${service.id}`;
            methodField.innerHTML = '@method("PATCH")';
            formTitle.innerText = 'Edit Service';
            formDesc.innerText = 'Refine your module details.';
            submitBtn.innerText = 'Update Module';
            submitBtn.style.background = 'linear-gradient(135deg,#6366f1,#8b5cf6)';
            cancelBtn.style.display = 'block';

            document.getElementById('field-title').value = service.title;
            document.getElementById('field-icon').value = service.icon;
            document.getElementById('field-desc').value = service.description;
            
            window.scrollTo({ top: 0, behavior: 'smooth' });
        }

        function resetForm() {
            const form = document.getElementById('service-form');
            const methodField = document.getElementById('method-field');
            const submitBtn = document.getElementById('submit-btn');
            const cancelBtn = document.getElementById('cancel-btn');
            const formTitle = document.getElementById('form-title');
            const formDesc = document.getElementById('form-desc');

            form.action = "{{ route('dashboard.services.store') }}";
            methodField.innerHTML = '';
            formTitle.innerText = 'New Service';
            formDesc.innerText = 'Expand your capabilities.';
            submitBtn.innerText = 'Create Module';
            submitBtn.style.background = '#6366f1';
            cancelBtn.style.display = 'none';

            form.reset();
        }
    </script>

</x-dashboard-layout>
