<div id="e-md" class="fixed inset-0 bg-slate-950/80 backdrop-blur-sm items-center justify-center z-50 p-4" style="display: none;">
    <div class="bg-slate-900 border border-slate-700 rounded-xl max-w-6xl w-full max-h-[95vh] overflow-hidden shadow-2xl flex flex-col">
        <div class="p-5 border-b border-slate-800 flex justify-between items-center bg-slate-900 z-10">
            <h2 class="text-xl font-bold text-white flex items-center gap-2"><i data-lucide="microscope" class="w-5 h-5 text-emerald-400"></i> Performance Evaluation Lab</h2>
            <button onclick="toggleEvaluationModal()" class="text-slate-400 hover:text-white transition-colors"><i data-lucide="x" class="w-5 h-5"></i></button>
        </div>
        <div class="p-6 overflow-y-auto flex-1 bg-slate-950/50">
            <div class="grid grid-cols-4 gap-6">
                <div class="col-span-1 space-y-4">
                    <div class="bg-slate-800/80 p-5 rounded-xl border border-slate-700">
                        <h3 class="text-sm font-semibold text-slate-300 border-b border-slate-700 pb-3 mb-4 flex items-center gap-2"><i data-lucide="settings" class="w-4 h-4"></i> Configuration</h3>
                        <div class="space-y-4">
                            <div><label class="block text-xs font-medium text-slate-400 mb-1.5">Target Gesture</label><select id="e-target" class="glass-input w-full rounded-lg px-3 py-2 text-sm focus:ring-2 focus:ring-emerald-500"><option value="">Select...</option></select></div>
                            <div><label class="block text-xs font-medium text-slate-400 mb-1.5">Target Samples</label><input type="number" id="e-samples" value="20" min="1" class="glass-input w-full rounded-lg px-3 py-2 text-sm focus:ring-2 focus:ring-emerald-500"></div>
                            <button id="btn-start-eval" onclick="startEvaluation()" class="w-full bg-emerald-600 hover:bg-emerald-500 text-white font-medium py-2.5 rounded-lg text-sm transition-colors shadow-lg shadow-emerald-900/20">Start Tracking</button>
                        </div>
                        <div id="e-status" class="mt-4 p-3 bg-emerald-500/10 border border-emerald-500/20 rounded-lg hidden">
                            <div class="flex items-center gap-2 mb-1"><div class="w-2 h-2 bg-emerald-400 rounded-full animate-pulse"></div><span class="text-xs font-medium text-emerald-400">Recording Active</span></div>
                            <p class="text-xl font-mono font-bold text-white"><span id="e-counter">0</span><span class="text-slate-500 text-sm"> / <span id="e-total">0</span></span></p>
                        </div>
                    </div>
                </div>
                <div class="col-span-3 space-y-6">
                    <div class="grid grid-cols-4 gap-4">
                        <div class="bg-slate-800/80 p-4 rounded-xl border border-slate-700"><p class="text-xs font-medium text-slate-400 mb-1">Global Accuracy</p><p id="m-acc" class="text-2xl font-bold text-emerald-400">0.00%</p></div>
                        <div class="bg-slate-800/80 p-4 rounded-xl border border-slate-700"><p class="text-xs font-medium text-slate-400 mb-1">Total Samples</p><p id="m-tot" class="text-2xl font-bold text-white">0</p></div>
                        <div class="bg-slate-800/80 p-4 rounded-xl border border-slate-700"><p class="text-xs font-medium text-slate-400 mb-1">Errors</p><p id="m-err" class="text-2xl font-bold text-red-400">0</p></div>
                        <div class="bg-slate-800/80 p-4 rounded-xl border border-slate-700"><p class="text-xs font-medium text-slate-400 mb-1">Est. Runtime</p><p class="text-2xl font-bold text-blue-400"><span id="m-time">0.0</span><span class="text-sm text-slate-500 ml-1">s</span></p></div>
                    </div>
                    <div class="grid grid-cols-2 gap-6">
                        <div class="bg-slate-800/80 p-5 rounded-xl border border-slate-700 flex flex-col">
                            <div class="flex justify-between items-center border-b border-slate-700 pb-3 mb-4">
                                <h3 class="text-sm font-semibold text-slate-300 flex items-center gap-2"><i data-lucide="grid" class="w-4 h-4 text-blue-400"></i> Confusion Matrix</h3>
                                <div class="text-[10px] text-slate-500 flex gap-2"><span class="flex items-center gap-1"><div class="w-2 h-2 bg-emerald-500/50 rounded"></div> Correct</span><span class="flex items-center gap-1"><div class="w-2 h-2 bg-red-500/50 rounded"></div> Error</span></div>
                            </div>
                            <div class="overflow-auto flex-1 custom-scrollbar"><div id="matrix-container" class="text-xs w-full"></div></div>
                        </div>
                        <div class="bg-slate-800/80 p-5 rounded-xl border border-slate-700 flex flex-col">
                            <div class="flex justify-between items-center border-b border-slate-700 pb-3 mb-4">
                                <h3 class="text-sm font-semibold text-slate-300 flex items-center gap-2"><i data-lucide="bar-chart" class="w-4 h-4 text-purple-400"></i> Class Metrics</h3>
                                <div class="flex gap-2">
                                    <button onclick="clearEvaluation()" class="text-xs bg-slate-700 hover:bg-slate-600 text-slate-300 px-3 py-1.5 rounded transition-colors">Clear</button>
                                    <button onclick="exportEvaluationCSV()" class="text-xs bg-blue-600 hover:bg-blue-500 text-white px-3 py-1.5 rounded transition-colors flex items-center gap-1"><i data-lucide="download" class="w-3 h-3"></i> CSV</button>
                                </div>
                            </div>
                            <div class="overflow-auto flex-1 custom-scrollbar"><div id="metrics-container" class="text-xs w-full"></div></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<style>.custom-scrollbar::-webkit-scrollbar { height: 6px; width: 6px; } .custom-scrollbar::-webkit-scrollbar-track { background: transparent; } .custom-scrollbar::-webkit-scrollbar-thumb { background: #334155; border-radius: 3px; }</style>