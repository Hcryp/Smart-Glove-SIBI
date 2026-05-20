<div id="d-st" class="grid grid-cols-2 gap-4 mb-6" style="display: none;">
    <div onclick="toggleLatencyModal()" class="glass-card rounded-xl p-4 flex items-center gap-4 cursor-pointer hover:bg-slate-800/30 transition-colors">
        <div class="w-10 h-10 rounded-lg bg-blue-500/10 flex items-center justify-center text-blue-400"><i data-lucide="zap" class="w-5 h-5"></i></div>
        <div><p class="text-xs text-slate-400">Sampling Rate</p><p id="pps" class="text-lg font-bold">0 Hz</p></div>
    </div>
    <div onclick="toggleLatencyModal()" class="glass-card rounded-xl p-4 flex items-center gap-4 cursor-pointer hover:bg-slate-800/30 transition-colors">
        <div class="w-10 h-10 rounded-lg bg-emerald-500/10 flex items-center justify-center text-emerald-400"><i data-lucide="box" class="w-5 h-5"></i></div>
        <div><p class="text-xs text-slate-400">Data Packets</p><p id="pk" class="text-lg font-bold font-mono">0</p></div>
    </div>
</div>