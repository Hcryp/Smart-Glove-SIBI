<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
    <div class="lg:col-span-2 space-y-6">
        <div class="glass-card rounded-xl p-5">
            <h3 class="text-sm font-semibold text-slate-400 mb-4 flex items-center gap-2" aria-label="Flex Sensors Data"><i data-lucide="activity" class="w-4 h-4"></i> Flex Sensors</h3>
            <div class="space-y-4">
                @foreach(['Thumb', 'Index', 'Middle', 'Ring', 'Pinky'] as $idx => $finger)
                    <div class="flex items-center gap-4">
                        <span class="text-xs font-medium text-slate-400 w-12">{{ $finger }}</span>
                        <div class="flex-1 bg-slate-800 rounded-full h-3 overflow-hidden relative">
                            <div id="fw{{$idx+1}}" class="data-bar absolute top-0 left-0 h-full rounded-full bg-gradient-to-r from-blue-500 to-emerald-400" style="width: 0%" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <span id="f{{$idx+1}}" class="text-sm font-mono w-10 text-right">0%</span>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="glass-card rounded-xl p-5 h-[300px]">
            <canvas id="chrt" aria-label="Sensor Data Chart" role="img"></canvas>
        </div>
    </div>
    <div class="space-y-6">
        <div class="glass-card rounded-xl p-5">
            <h3 class="text-sm font-semibold text-slate-400 mb-4 flex items-center gap-2"><i data-lucide="languages" class="w-4 h-4"></i> Translation Engine</h3>
            <div class="bg-slate-800/50 border border-slate-700/50 rounded-lg p-4 mb-4">
                <p class="text-xs text-slate-500 mb-1">Detected Gesture</p>
                <p id="current-sign" class="text-3xl font-bold text-emerald-400 transition-opacity duration-300"></p>
            </div>
            <div class="grid grid-cols-2 gap-3 mb-4">
                <div>
                    <label for="t-lang" class="text-xs text-slate-500 mb-1 block">Language</label>
                    <select id="t-lang" class="glass-input w-full rounded-lg px-3 py-2 text-sm">
                        <option value="id">Indonesian</option>
                        <option value="en">English</option>
                        <option value="ja">Japanese</option>
                    </select>
                </div>
                <div>
                    <label for="v-gender" class="text-xs text-slate-500 mb-1 block">Voice Gender</label>
                    <select id="v-gender" class="glass-input w-full rounded-lg px-3 py-2 text-sm">
                        <option value="female">Female</option>
                        <option value="male">Male</option>
                    </select>
                </div>
            </div>
            <div class="bg-blue-500/10 border border-blue-500/20 rounded-lg p-4 mb-4">
                <div class="flex justify-between items-center mb-2">
                    <p class="text-xs text-blue-400">Audio Output</p>
                    <button onclick="playTTS(uiElements['tr-out'].innerText, e('t-lang').value)" class="bg-blue-500/20 hover:bg-blue-500/30 text-blue-300 text-xs px-3 py-1.5 rounded transition-colors flex items-center gap-2 focus:ring-2 focus:ring-blue-400 focus:outline-none"><i data-lucide="volume-2" class="w-3 h-3"></i> Speak</button>
                </div>
                <p id="tr-out" class="text-lg font-medium text-slate-300 min-h-[1.75rem]" aria-live="polite"></p>
            </div>
            <div class="mb-4">
                <p class="text-xs text-slate-500 mb-2">History Log</p>
                <div id="hist" class="h-28 overflow-y-auto bg-slate-900/50 border border-slate-700/50 rounded-lg p-2 space-y-1"></div>
            </div>
            <button onclick="clearHistory()" class="w-full bg-slate-800 hover:bg-slate-700 text-slate-300 text-sm font-medium py-2.5 rounded-lg transition-colors border border-slate-700 focus:ring-2 focus:ring-slate-400 focus:outline-none">Clear History</button>
        </div>
        <div class="glass-card rounded-xl p-5 flex flex-col justify-between">
            <h3 class="text-sm font-semibold text-slate-400 mb-4 flex items-center gap-2"><i data-lucide="compass" class="w-4 h-4"></i> IMU Orientation</h3>
            <div class="flex justify-center items-center mb-6 flex-1">
                <div id="th-c" class="w-[160px] h-[160px] bg-slate-800/40 rounded-2xl border border-slate-700/50 shadow-inner flex items-center justify-center overflow-hidden relative [&>canvas]:mt-6"></div>
            </div>
            <div class="grid grid-cols-2 gap-4">
                <div class="bg-slate-800/30 p-3 rounded-lg border border-slate-700/30">
                    <p class="text-[10px] uppercase tracking-wider text-slate-500 mb-2 font-semibold text-center">Accelerometer</p>
                    <div class="space-y-2">
                        <div class="flex justify-between items-center text-xs"><span class="text-red-400 font-medium bg-red-400/10 px-1.5 py-0.5 rounded">X</span><span id="ax" class="font-mono text-slate-300">0.00</span></div>
                        <div class="flex justify-between items-center text-xs"><span class="text-green-400 font-medium bg-green-400/10 px-1.5 py-0.5 rounded">Y</span><span id="ay" class="font-mono text-slate-300">0.00</span></div>
                        <div class="flex justify-between items-center text-xs"><span class="text-blue-400 font-medium bg-blue-400/10 px-1.5 py-0.5 rounded">Z</span><span id="az" class="font-mono text-slate-300">0.00</span></div>
                    </div>
                </div>
                <div class="bg-slate-800/30 p-3 rounded-lg border border-slate-700/30">
                    <p class="text-[10px] uppercase tracking-wider text-slate-500 mb-2 font-semibold text-center">Gyroscope</p>
                    <div class="space-y-2">
                        <div class="flex justify-between items-center text-xs"><span class="text-red-400 font-medium bg-red-400/10 px-1.5 py-0.5 rounded">X</span><span id="gx" class="font-mono text-slate-300">0.00</span></div>
                        <div class="flex justify-between items-center text-xs"><span class="text-green-400 font-medium bg-green-400/10 px-1.5 py-0.5 rounded">Y</span><span id="gy" class="font-mono text-slate-300">0.00</span></div>
                        <div class="flex justify-between items-center text-xs"><span class="text-blue-400 font-medium bg-blue-400/10 px-1.5 py-0.5 rounded">Z</span><span id="gz" class="font-mono text-slate-300">0.00</span></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>