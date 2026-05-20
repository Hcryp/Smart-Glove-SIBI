<div class="flex justify-between items-center mb-6">
    <div>
        <h1 class="text-2xl font-bold bg-clip-text text-transparent bg-gradient-to-r from-blue-400 to-emerald-400">Smart Glove SIBI</h1>
        <div class="flex items-center gap-2 text-sm mt-1">
            <div id="s-dot" class="w-2 h-2 rounded-full bg-slate-600 transition-colors duration-300"></div>
            <span id="st-t" class="text-slate-400 font-medium transition-colors duration-300">System Offline</span>
        </div>
    </div>
    <div class="flex items-center gap-3">
        <button onclick="toggleEvaluationModal()" class="bg-slate-800 border border-slate-700 hover:bg-slate-700 text-slate-300 px-4 py-2 rounded-lg flex items-center gap-2 text-sm transition-colors"><i data-lucide="bar-chart-2" class="w-4 h-4 text-emerald-400"></i> Evaluate</button>
        <button onclick="toggleVocabularyModal()" class="bg-slate-800 border border-slate-700 hover:bg-slate-700 text-slate-300 px-4 py-2 rounded-lg flex items-center gap-2 text-sm transition-colors"><i data-lucide="book-open" class="w-4 h-4"></i> Vocabulary</button>
        <button onclick="toggleCalibrationModal()" class="bg-slate-800 border border-slate-700 hover:bg-slate-700 text-slate-300 px-4 py-2 rounded-lg flex items-center gap-2 text-sm transition-colors"><i data-lucide="sliders" class="w-4 h-4"></i> Calibrate</button>
        <button id="b-cn" onclick="toggleWebSocket()" class="bg-slate-800 border border-slate-700 hover:bg-slate-700 text-slate-300 px-4 py-2 rounded-lg flex items-center gap-2 text-sm transition-colors"><i data-lucide="wifi" class="w-4 h-4"></i> Connect</button>
    </div>
</div>