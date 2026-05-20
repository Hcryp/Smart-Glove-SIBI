<div id="c-md" class="fixed inset-0 bg-slate-950/80 backdrop-blur-sm items-center justify-center z-50 p-4" style="display: none;">
    <div class="bg-slate-900 border border-slate-700 rounded-xl p-6 max-w-2xl w-full max-h-[90vh] overflow-y-auto shadow-2xl">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-xl font-bold text-white flex items-center gap-2"><i data-lucide="settings-2" class="w-5 h-5 text-blue-400"></i> Application Calibration</h2>
            <button onclick="toggleCalibrationModal()" class="text-slate-400 hover:text-white transition-colors"><i data-lucide="x" class="w-5 h-5"></i></button>
        </div>
        <div class="flex gap-3 mb-6 items-center">
            <select id="p-select" class="glass-input flex-1 rounded-lg px-4 py-2 text-sm focus:ring-2 focus:ring-blue-500"><option value="">Select Preset...</option></select>
            <button onclick="loadPreset()" class="bg-slate-700 hover:bg-slate-600 text-white font-medium px-5 py-2 rounded-lg text-sm transition-colors flex items-center gap-2"><i data-lucide="download" class="w-4 h-4"></i> Apply</button>
            <div class="w-px h-6 bg-slate-700 mx-1"></div>
            <input type="text" id="p-nm" placeholder="New Profile Name" class="glass-input w-40 rounded-lg px-4 py-2 text-sm focus:ring-2 focus:ring-blue-500">
            <button onclick="saveProfile()" class="bg-blue-600 hover:bg-blue-500 text-white font-medium px-5 py-2 rounded-lg text-sm transition-colors flex items-center gap-2"><i data-lucide="save" class="w-4 h-4"></i> Save</button>
        </div>
        <div class="space-y-6">
            <div>
                <h3 class="text-sm font-semibold text-slate-300 mb-3 flex items-center gap-2"><i data-lucide="hand" class="w-4 h-4 text-emerald-400"></i> Flex Sensor Thresholds (ADC)</h3>
                <div class="grid grid-cols-5 gap-3">
                    @foreach(['Thumb', 'Index', 'Middle', 'Ring', 'Pinky'] as $i => $finger)
                        <div class="bg-slate-800/50 border border-slate-700/50 p-3 rounded-lg">
                            <div class="flex justify-between items-center mb-2">
                                <p class="text-xs font-medium text-slate-400">{{$finger}}</p>
                                <span id="raw_adc_{{$i}}" class="text-[10px] font-mono bg-slate-900 border border-slate-700 text-emerald-400 px-1.5 py-0.5 rounded shadow-inner" title="Live Raw ADC">---</span>
                            </div>
                            <div class="space-y-2">
                                <div class="relative"><span class="absolute left-2 top-1.5 text-[10px] text-slate-500">MIN</span><input type="number" id="cf{{$i}}" value="0" onchange="updateActiveCalibration()" class="glass-input w-full rounded text-right pl-8 pr-2 py-1.5 text-xs focus:ring-1 focus:ring-blue-500"></div>
                                <div class="relative"><span class="absolute left-2 top-1.5 text-[10px] text-slate-500">MAX</span><input type="number" id="cb{{$i}}" value="4095" onchange="updateActiveCalibration()" class="glass-input w-full rounded text-right pl-8 pr-2 py-1.5 text-xs focus:ring-1 focus:ring-blue-500"></div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="grid grid-cols-2 gap-4">
                <div class="bg-slate-800/50 border border-slate-700/50 p-4 rounded-lg">
                    <div class="flex justify-between items-center mb-3">
                        <h3 class="text-sm font-semibold text-slate-300 flex items-center gap-2"><i data-lucide="move" class="w-4 h-4 text-red-400"></i> Accelerometer Offsets</h3>
                        <div class="text-[10px] font-mono bg-slate-900 border border-slate-700 px-2 py-0.5 rounded text-slate-400 flex gap-2"><span>X:<span id="r_ax" class="text-red-400 ml-1">---</span></span><span>Y:<span id="r_ay" class="text-green-400 ml-1">---</span></span><span>Z:<span id="r_az" class="text-blue-400 ml-1">---</span></span></div>
                    </div>
                    <div class="grid grid-cols-3 gap-2">
                        <div class="relative"><span class="absolute left-2 top-1.5 text-xs font-bold text-red-400">X</span><input type="number" step="0.01" id="ax_d" value="0" onchange="updateActiveCalibration()" class="glass-input w-full rounded text-right pl-6 pr-2 py-1.5 text-xs focus:ring-1 focus:ring-red-500"></div>
                        <div class="relative"><span class="absolute left-2 top-1.5 text-xs font-bold text-green-400">Y</span><input type="number" step="0.01" id="ay_d" value="0" onchange="updateActiveCalibration()" class="glass-input w-full rounded text-right pl-6 pr-2 py-1.5 text-xs focus:ring-1 focus:ring-green-500"></div>
                        <div class="relative"><span class="absolute left-2 top-1.5 text-xs font-bold text-blue-400">Z</span><input type="number" step="0.01" id="az_d" value="0" onchange="updateActiveCalibration()" class="glass-input w-full rounded text-right pl-6 pr-2 py-1.5 text-xs focus:ring-1 focus:ring-blue-500"></div>
                    </div>
                </div>
                <div class="bg-slate-800/50 border border-slate-700/50 p-4 rounded-lg">
                    <div class="flex justify-between items-center mb-3">
                        <h3 class="text-sm font-semibold text-slate-300 flex items-center gap-2"><i data-lucide="rotate-3d" class="w-4 h-4 text-purple-400"></i> Gyroscope Drifts</h3>
                        <div class="text-[10px] font-mono bg-slate-900 border border-slate-700 px-2 py-0.5 rounded text-slate-400 flex gap-2"><span>X:<span id="r_gx" class="text-red-400 ml-1">---</span></span><span>Y:<span id="r_gy" class="text-green-400 ml-1">---</span></span><span>Z:<span id="r_gz" class="text-blue-400 ml-1">---</span></span></div>
                    </div>
                    <div class="grid grid-cols-3 gap-2">
                        <div class="relative"><span class="absolute left-2 top-1.5 text-xs font-bold text-red-400">X</span><input type="number" step="0.01" id="gx_d" value="0" onchange="updateActiveCalibration()" class="glass-input w-full rounded text-right pl-6 pr-2 py-1.5 text-xs focus:ring-1 focus:ring-purple-500"></div>
                        <div class="relative"><span class="absolute left-2 top-1.5 text-xs font-bold text-green-400">Y</span><input type="number" step="0.01" id="gy_d" value="0" onchange="updateActiveCalibration()" class="glass-input w-full rounded text-right pl-6 pr-2 py-1.5 text-xs focus:ring-1 focus:ring-purple-500"></div>
                        <div class="relative"><span class="absolute left-2 top-1.5 text-xs font-bold text-blue-400">Z</span><input type="number" step="0.01" id="gz_d" value="0" onchange="updateActiveCalibration()" class="glass-input w-full rounded text-right pl-6 pr-2 py-1.5 text-xs focus:ring-1 focus:ring-purple-500"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>