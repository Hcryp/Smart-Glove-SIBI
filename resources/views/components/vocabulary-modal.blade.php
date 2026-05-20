<div id="v-md" class="fixed inset-0 bg-slate-950/80 backdrop-blur-sm items-center justify-center z-50 p-4" style="display: none;">
    <div class="bg-slate-900 border border-slate-700 rounded-xl max-w-5xl w-full max-h-[90vh] flex flex-col shadow-2xl">
        <div class="p-5 border-b border-slate-800 flex justify-between items-center bg-slate-900 z-10 rounded-t-xl">
            <h2 class="text-xl font-bold text-white flex items-center gap-2"><i data-lucide="book-open" class="w-5 h-5 text-purple-400"></i> Vocabulary Management</h2>
            <button onclick="toggleVocabularyModal()" class="text-slate-400 hover:text-white transition-colors"><i data-lucide="x" class="w-5 h-5"></i></button>
        </div>
        
        <div class="p-6 overflow-y-auto flex-1 custom-scrollbar">
            <div id="v-list-view">
                <div class="flex justify-between gap-4 mb-5">
                    <div class="relative flex-1">
                        <i data-lucide="search" class="w-4 h-4 absolute left-3 top-2.5 text-slate-500"></i>
                        <input type="text" id="v-search" oninput="renderVocabTable()" placeholder="Search gestures by name or meaning..." class="glass-input w-full rounded-lg pl-9 pr-4 py-2 text-sm focus:ring-2 focus:ring-purple-500">
                    </div>
                    <button onclick="openVocabEditor()" class="bg-purple-600 hover:bg-purple-500 text-white font-medium px-4 py-2 rounded-lg text-sm transition-colors flex items-center gap-2"><i data-lucide="plus" class="w-4 h-4"></i> Add Gesture</button>
                </div>
                <div class="border border-slate-700/50 rounded-lg overflow-hidden bg-slate-900/50">
                    <table class="w-full text-left text-sm whitespace-nowrap">
                        <thead class="bg-slate-800 text-slate-400">
                            <tr><th class="p-3 font-medium">System Name</th><th class="p-3 font-medium">Primary (ID)</th><th class="p-3 font-medium">English</th><th class="p-3 font-medium text-right">Actions</th></tr>
                        </thead>
                        <tbody id="v-tbody" class="divide-y divide-slate-700/50"></tbody>
                    </table>
                </div>
            </div>

            <div id="v-editor-view" style="display:none;" class="space-y-6">
                <input type="hidden" id="v_edit_id">
                <div class="bg-slate-800/50 border border-slate-700/50 p-4 rounded-lg">
                    <h3 class="text-sm font-semibold text-slate-300 mb-3 flex items-center gap-2"><i data-lucide="tag" class="w-4 h-4 text-blue-400"></i> Metadata Constraints</h3>
                    <div class="grid grid-cols-2 gap-4">
                        <div><label class="block text-xs text-slate-400 mb-1">System Name (Identifier)</label><input type="text" id="v_name" class="glass-input w-full rounded py-1.5 px-3 text-sm focus:ring-1 focus:ring-blue-500"></div>
                        <div><label class="block text-xs text-slate-400 mb-1">Meaning (Indonesian)</label><input type="text" id="v_mean_id" class="glass-input w-full rounded py-1.5 px-3 text-sm focus:ring-1 focus:ring-blue-500"></div>
                        <div><label class="block text-xs text-slate-400 mb-1">Meaning (English)</label><input type="text" id="v_mean_en" class="glass-input w-full rounded py-1.5 px-3 text-sm focus:ring-1 focus:ring-blue-500"></div>
                        <div><label class="block text-xs text-slate-400 mb-1">Meaning (Japanese)</label><input type="text" id="v_mean_ja" class="glass-input w-full rounded py-1.5 px-3 text-sm focus:ring-1 focus:ring-blue-500"></div>
                    </div>
                </div>
                
                <div>
                    <h3 class="text-sm font-semibold text-slate-300 mb-3 flex items-center gap-2"><i data-lucide="hand" class="w-4 h-4 text-emerald-400"></i> Flex Sensor Boundaries (%)</h3>
                    <div class="grid grid-cols-5 gap-3">
                        @foreach(['Thumb', 'Index', 'Middle', 'Ring', 'Pinky'] as $i => $finger)
                            <div class="bg-slate-800/50 border border-slate-700/50 p-3 rounded-lg">
                                <p class="text-xs font-medium text-center text-slate-400 mb-2">{{$finger}}</p>
                                <div class="space-y-2">
                                    <div class="relative"><span class="absolute left-2 top-1.5 text-[10px] text-slate-500">MIN</span><input type="number" id="v_f{{$i+1}}_min" class="glass-input w-full rounded text-right pl-8 pr-2 py-1.5 text-xs focus:ring-1 focus:ring-emerald-500"></div>
                                    <div class="relative"><span class="absolute left-2 top-1.5 text-[10px] text-slate-500">MAX</span><input type="number" id="v_f{{$i+1}}_max" class="glass-input w-full rounded text-right pl-8 pr-2 py-1.5 text-xs focus:ring-1 focus:ring-emerald-500"></div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div>
                    <h3 class="text-sm font-semibold text-slate-300 mb-3 flex items-center gap-2"><i data-lucide="move" class="w-4 h-4 text-red-400"></i> Accelerometer Limits (G)</h3>
                    <div class="grid grid-cols-3 gap-3">
                        @foreach(['x' => 'red', 'y' => 'green', 'z' => 'blue'] as $axis => $color)
                            <div class="bg-slate-800/50 border border-slate-700/50 p-3 rounded-lg">
                                <p class="text-xs font-bold text-center text-{{$color}}-400 mb-2 uppercase">{{$axis}} Axis</p>
                                <div class="space-y-2">
                                    <div class="relative"><span class="absolute left-2 top-1.5 text-[10px] text-slate-500">MIN</span><input type="number" step="0.1" id="v_a{{$axis}}_min" class="glass-input w-full rounded text-right pl-8 pr-2 py-1.5 text-xs focus:ring-1 focus:ring-{{$color}}-500"></div>
                                    <div class="relative"><span class="absolute left-2 top-1.5 text-[10px] text-slate-500">MAX</span><input type="number" step="0.1" id="v_a{{$axis}}_max" class="glass-input w-full rounded text-right pl-8 pr-2 py-1.5 text-xs focus:ring-1 focus:ring-{{$color}}-500"></div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="flex justify-end gap-3 pt-4 border-t border-slate-800">
                    <button onclick="closeVocabEditor()" class="bg-slate-700 hover:bg-slate-600 text-white font-medium px-5 py-2 rounded-lg text-sm transition-colors">Return</button>
                    <button onclick="saveVocabChanges()" class="bg-purple-600 hover:bg-purple-500 text-white font-medium px-5 py-2 rounded-lg text-sm transition-colors flex items-center gap-2"><i data-lucide="save" class="w-4 h-4"></i> Commit Changes</button>
                </div>
            </div>
        </div>
    </div>
</div>