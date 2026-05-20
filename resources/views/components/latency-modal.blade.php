<div id="lat-md" class="fixed inset-0 z-[70] hidden items-center justify-center bg-black/60 backdrop-blur-sm">
    <div class="bg-slate-900 border border-slate-700 w-full max-w-4xl rounded-xl shadow-2xl flex flex-col overflow-hidden">
        <div class="p-4 border-b border-slate-800 flex justify-between items-center bg-slate-800/50">
            <h3 class="text-lg font-semibold text-white">Processing Latency Analysis</h3>
            <button onclick="toggleLatencyModal()" class="text-slate-400 hover:text-white transition-colors"><i data-lucide="x" class="w-5 h-5"></i></button>
        </div>
        <div class="p-4 flex gap-3 bg-slate-800/30 border-b border-slate-800/50">
            <button id="btn-lat-toggle" onclick="toggleLatencyTrackState()" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded font-medium text-sm transition-colors">Start Tracking</button>
            <button onclick="clearLatencyTrack()" class="bg-red-900/50 hover:bg-red-900/80 text-red-400 px-4 py-2 rounded font-medium text-sm border border-red-800/50 transition-colors">Clear Data</button>
            <button onclick="exportLatencyCSV()" class="bg-emerald-600 hover:bg-emerald-700 text-white px-4 py-2 rounded font-medium text-sm transition-colors ml-auto flex items-center gap-2"><i data-lucide="download" class="w-4 h-4"></i> Export CSV</button>
        </div>
        <div class="p-4 overflow-x-auto max-h-[60vh] overflow-y-auto">
            <table class="w-full text-left border-collapse whitespace-nowrap text-sm">
                <thead class="bg-slate-800/80 sticky top-0">
                    <tr>
                        <th class="p-3 border-b border-slate-700 text-slate-300 font-medium">Packet ID</th>
                        <th class="p-3 border-b border-slate-700 text-slate-300 font-medium">Detected Gesture</th>
                        <th class="p-3 border-b border-slate-700 text-slate-300 font-medium">Receive Time</th>
                        <th class="p-3 border-b border-slate-700 text-slate-300 font-medium">Compute Delay (ms)</th>
                        <th class="p-3 border-b border-slate-700 text-slate-300 font-medium">Synthesis Delay (ms)</th>
                        <th class="p-3 border-b border-slate-700 text-slate-300 font-medium">Total Delay (ms)</th>
                    </tr>
                </thead>
                <tbody id="lat-tbody" class="divide-y divide-slate-800/50 text-slate-400">
                    <tr><td colspan="6" class="p-4 text-center italic">Tracking system is not activated.</td></tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script>
let isLatTracking = false, latData = [];
const toggleLatencyModal = () => { let m = document.getElementById('lat-md'); m.style.display = (m.style.display === 'flex') ? 'none' : 'flex'; lucide.createIcons(); };
const toggleLatencyTrackState = () => { let b = document.getElementById('btn-lat-toggle'); isLatTracking = !isLatTracking; b.innerText = isLatTracking ? 'Stop Tracking' : 'Start Tracking'; b.className = isLatTracking ? 'bg-slate-700 hover:bg-slate-600 text-white px-4 py-2 rounded font-medium text-sm transition-colors' : 'bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded font-medium text-sm transition-colors'; if(typeof showToast === 'function') showToast(isLatTracking ? 'Latency tracking started' : 'Tracking stopped'); };
const clearLatencyTrack = () => { latData = []; renderLatencyTable(); };
const recordLatency = (pkgId, gesture, tRx, tComp, tTTS) => { if(!isLatTracking) return; let d = new Date(Date.now() - (performance.now() - tRx)), timeStr = `${String(d.getHours()).padStart(2,'0')}:${String(d.getMinutes()).padStart(2,'0')}:${String(d.getSeconds()).padStart(2,'0')}.${String(d.getMilliseconds()).padStart(3,'0')}`; latData.push({id: pkgId, g: gesture, rx: timeStr, c: tComp - tRx, t: tTTS - tComp, tot: tTTS - tRx}); renderLatencyTable(); };
const renderLatencyTable = () => { let tb = document.getElementById('lat-tbody'); if(!latData.length) { tb.innerHTML = '<tr><td colspan="6" class="p-4 text-center italic">No data recorded.</td></tr>'; return; } let h = ''; latData.slice().reverse().forEach(d => { h += `<tr class="hover:bg-slate-800/30"><td class="p-3">${d.id}</td><td class="p-3 text-white font-medium">${d.g}</td><td class="p-3">${d.rx}</td><td class="p-3">${d.c.toFixed(3)}</td><td class="p-3">${d.t.toFixed(3)}</td><td class="p-3 text-blue-400 font-semibold">${d.tot.toFixed(3)}</td></tr>`; }); tb.innerHTML = h; };
const exportLatencyCSV = () => { if (latData.length === 0) { if(typeof showToast === 'function') showToast('No data to export', 'error'); return; } let csvContent = "data:text/csv;charset=utf-8,Packet ID,Detected Gesture,Receive Time,Compute Delay (ms),Synthesis Delay (ms),Total Delay (ms)\n"; latData.forEach(d => { let row = [d.id, d.g, d.rx, d.c.toFixed(3), d.t.toFixed(3), d.tot.toFixed(3)]; csvContent += row.join(",") + "\n"; }); let encodedUri = encodeURI(csvContent), link = document.createElement("a"); link.setAttribute("href", encodedUri); link.setAttribute("download", `latency_analysis_log_${new Date().getTime()}.csv`); document.body.appendChild(link); link.click(); document.body.removeChild(link); if(typeof showToast === 'function') showToast('CSV Exported Successfully'); };
</script>