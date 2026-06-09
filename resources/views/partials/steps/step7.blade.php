<div class="space-y-6" x-data="dataKesehatanSiswa()">
    <div class="bg-primary/5 border border-primary/20 rounded-xl p-4 flex items-start gap-3">
        <span class="material-symbols-outlined text-primary text-[22px] mt-0.5">monitor_heart</span>
        <div class="text-sm text-on-surface-variant leading-relaxed">
            <span class="font-bold text-primary">Isian Data Kesehatan & Jasmani:</span> Silakan lengkapi data antropometri dan riwayat kesehatan Anda. Data ini sangat penting bagi tim UKS sekolah untuk memantau perkembangan fisik serta penanganan medis darurat jika diperlukan.
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="space-y-2">
            <label class="block text-sm font-semibold text-on-surface">Golongan Darah <span class="text-rose-600">*</span></label>
            <select name="golongan_darah" class="w-full px-4 py-2.5 bg-surface border border-outline-variant rounded-lg focus:border-primary focus:ring-1 focus:ring-primary text-sm font-medium transition-all" required>
                <option value="" disabled {{ old('golongan_darah') == '' ? 'selected' : '' }}>-- Pilih Golongan Darah --</option>
                <option value="A" {{ old('golongan_darah') == 'A' ? 'selected' : '' }}>A</option>
                <option value="B" {{ old('golongan_darah') == 'B' ? 'selected' : '' }}>B</option>
                <option value="AB" {{ old('golongan_darah') == 'AB' ? 'selected' : '' }}>AB</option>
                <option value="O" {{ old('golongan_darah') == 'O' ? 'selected' : '' }}>O</option>
                <option value="-" {{ old('golongan_darah') == '-' ? 'selected' : '' }}>-</option>
            </select>
        </div>

        <div class="space-y-2">
            <label class="block text-sm font-semibold text-on-surface">Penyakit yang Pernah Diderita <span class="text-rose-600">*</span></label>
            <select name="penyakit_pilihan" 
                    x-model="penyakitSelect"
                    @change="handlePenyakitChange()"
                    class="w-full px-4 py-2.5 bg-surface border border-outline-variant rounded-lg focus:border-primary focus:ring-1 focus:ring-primary text-sm font-medium transition-all" required>
                <option value="" disabled {{ old('penyakit_pilihan') == '' ? 'selected' : '' }}>-- Pilih Riwayat Penyakit --</option>
                <option value="Tidak Ada" {{ old('penyakit_pilihan') == 'Tidak Ada' ? 'selected' : '' }}>Tidak Ada</option>
                <option value="Asma / Gangguan Pernapasan" {{ old('penyakit_pilihan') == 'Asma / Gangguan Pernapasan' ? 'selected' : '' }}>Asma / Gangguan Pernapasan</option>
                <option value="Alergi (Makanan / Obat / Debu / Dingin)" {{ old('penyakit_pilihan') == 'Alergi (Makanan / Obat / Debu / Dingin)' ? 'selected' : '' }}>Alergi (Makanan / Obat / Debu / Dingin)</option>
                <option value="Maag / Gangguan Pencernaan Akut" {{ old('penyakit_pilihan') == 'Maag / Gangguan Pencernaan Akut' ? 'selected' : '' }}>Maag / Gangguan Pencernaan Akut</option>
                <option value="Diabetes Remaja" {{ old('penyakit_pilihan') == 'Diabetes Remaja' ? 'selected' : '' }}>Diabetes Remaja</option>
                <option value="Epilepsi / Kejang" {{ old('penyakit_pilihan') == 'Epilepsi / Kejang' ? 'selected' : '' }}>Epilepsi / Kejang</option>
                <option value="Jantung" {{ old('penyakit_pilihan') == 'Jantung' ? 'selected' : '' }}>Jantung</option>
                <option value="Migrain / Vertigo Kronis" {{ old('penyakit_pilihan') == 'Migrain / Vertigo Kronis' ? 'selected' : '' }}>Migrain / Vertigo Kronis</option>
                <option value="TBC / Flek Paru-Paru" {{ old('penyakit_pilihan') == 'TBC / Flek Paru-Paru' ? 'selected' : '' }}>TBC / Flek Paru-Paru</option>
                <option value="Pernah Patah Tulang" {{ old('penyakit_pilihan') == 'Pernah Patah Tulang' ? 'selected' : '' }}>Pernah Patah Tulang</option>
                <option value="Lainnya" {{ old('penyakit_pilihan') == 'Lainnya' ? 'selected' : '' }}>Lainnya (Sebutkan)</option>
            </select>
        </div>

        <div class="space-y-2">
            <label class="block text-sm font-semibold text-on-surface">Kelainan Jasmani / Disabilitas <span class="text-rose-600">*</span></label>
            <select name="kelainan_pilihan" 
                    x-model="kelainanSelect"
                    @change="handleKelainanChange()"
                    class="w-full px-4 py-2.5 bg-surface border border-outline-variant rounded-lg focus:border-primary focus:ring-1 focus:ring-primary text-sm font-medium transition-all" required>
                <option value="" disabled {{ old('kelainan_pilihan') == '' ? 'selected' : '' }}>-- Pilih Kondisi Jasmani --</option>
                <option value="Tidak Ada" {{ old('kelainan_pilihan') == 'Tidak Ada' ? 'selected' : '' }}>Tidak Ada</option>
                <option value="Rabun Jauh (Miopi) / Pengguna Kacamata" {{ old('kelainan_pilihan') == 'Rabun Jauh (Miopi) / Pengguna Kacamata' ? 'selected' : '' }}>Rabun Jauh (Miopi) / Pengguna Kacamata</option>
                <option value="Rabun Dekat (Hipermetropi)" {{ old('kelainan_pilihan') == 'Rabun Dekat (Hipermetropi)' ? 'selected' : '' }}>Rabun Dekat (Hipermetropi)</option>
                <option value="Silinder (Astigmatisme)" {{ old('kelainan_pilihan') == 'Silinder (Astigmatisme)' ? 'selected' : '' }}>Silinder (Astigmatisme)</option>
                <option value="Buta Warna (Parsial / Total)" {{ old('kelainan_pilihan') == 'Buta Warna (Parsial / Total)' ? 'selected' : '' }}>Buta Warna (Parsial / Total)</option>
                <option value="Gangguan Pendengaran" {{ old('kelainan_pilihan') == 'Gangguan Pendengaran' ? 'selected' : '' }}>Gangguan Pendengaran</option>
                <option value="Gangguan Bicara (Tuna Wicara / Gagap)" {{ old('kelainan_pilihan') == 'Gangguan Bicara (Tuna Wicara / Gagap)' ? 'selected' : '' }}>Gangguan Bicara (Tuna Wicara / Gagap)</option>
                <option value="Keterbatasan Fisik / Daksa (Tangan / Kaki)" {{ old('kelainan_pilihan') == 'Keterbatasan Fisik / Daksa (Tangan / Kaki)' ? 'selected' : '' }}>Keterbatasan Fisik / Daksa (Tangan / Kaki)</option>
                <option value="Lainnya" {{ old('kelainan_pilihan') == 'Lainnya' ? 'selected' : '' }}>Lainnya (Sebutkan)</option>
            </select>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6" x-show="penyakitSelect === 'Lainnya' || kelainanSelect === 'Lainnya'" x-cloak x-transition>
        <div class="hidden md:block"></div>
        
        <div class="space-y-2" x-show="penyakitSelect === 'Lainnya'" x-transition>
            <label class="block text-sm font-semibold text-rose-700">Detail Penyakit Lainnya <span class="text-rose-600">*</span></label>
            <input type="text" 
                   x-model="penyakitCustom"
                   @input="syncPenyakitInput()"
                   oninput="this.value = toProperCase(this.value)"
                   placeholder="Contoh: Anemia Akut" 
                   :required="penyakitSelect === 'Lainnya'"
                   class="w-full px-4 py-2.5 bg-surface border border-rose-300 rounded-lg focus:border-rose-600 focus:ring-1 focus:ring-rose-600 text-sm font-medium transition-all">
        </div>

        <div class="space-y-2" x-show="kelainanSelect === 'Lainnya'" x-transition>
            <label class="block text-sm font-semibold text-rose-700">Detail Kelainan Lainnya <span class="text-rose-600">*</span></label>
            <input type="text" 
                   x-model="kelainanCustom"
                   @input="syncKelainanInput()"
                   oninput="this.value = toProperCase(this.value)"
                   placeholder="Contoh: Skoliosis Ringan" 
                   :required="kelainanSelect === 'Lainnya'"
                   class="w-full px-4 py-2.5 bg-surface border border-rose-300 rounded-lg focus:border-rose-600 focus:ring-1 focus:ring-rose-600 text-sm font-medium transition-all">
        </div>
    </div>

    <input type="hidden" name="penyakit_pernah_diderita" x-model="penyakitFinal">
    <input type="hidden" name="kelainan_jasmani" x-model="kelainanFinal">

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 pt-4 border-t border-outline-variant/60">
        <div class="space-y-2">
            <label class="block text-sm font-semibold text-on-surface">Tinggi Badan (cm) <span class="text-rose-600">*</span></label>
            <div class="relative">
                <input type="number" 
                       name="tinggi_badan" 
                       value="{{ old('tinggi_badan') }}"
                       min="50" 
                       max="250" 
                       placeholder="165" 
                       class="w-full pl-4 pr-12 py-2.5 bg-surface border border-outline-variant rounded-lg focus:border-primary focus:ring-1 focus:ring-primary text-sm font-medium transition-all" 
                       required>
                <span class="absolute right-4 top-1/2 -translate-y-1/2 text-xs font-bold text-slate-400">cm</span>
            </div>
        </div>
        <div class="space-y-2">
            <label class="block text-sm font-semibold text-on-surface">Berat Badan (kg) <span class="text-rose-600">*</span></label>
            <div class="relative">
                <input type="number" 
                       name="berat_badan" 
                       value="{{ old('berat_badan') }}"
                       min="10" 
                       max="200" 
                       placeholder="55" 
                       class="w-full pl-4 pr-12 py-2.5 bg-surface border border-outline-variant rounded-lg focus:border-primary focus:ring-1 focus:ring-primary text-sm font-medium transition-all" 
                       required>
                <span class="absolute right-4 top-1/2 -translate-y-1/2 text-xs font-bold text-slate-400">kg</span>
            </div>
        </div>
        <div class="space-y-2">
            <label class="block text-sm font-semibold text-on-surface">Lingkar Kepala (cm) <span class="text-rose-600">*</span></label>
            <div class="relative">
                <input type="number" 
                       name="lingkar_kepala" 
                       value="{{ old('lingkar_kepala') }}"
                       min="30" 
                       max="100" 
                       placeholder="54" 
                       class="w-full pl-4 pr-12 py-2.5 bg-surface border border-outline-variant rounded-lg focus:border-primary focus:ring-1 focus:ring-primary text-sm font-medium transition-all" 
                       required>
                <span class="absolute right-4 top-1/2 -translate-y-1/2 text-xs font-bold text-slate-400">cm</span>
            </div>
        </div>
    </div>
</div>

<script>
    /**
     * Engine Sinkronisasi Dropdown & Hidden Input + Recovery Data Lama
     */
    function dataKesehatanSiswa() {
        return {
            // Memasang old data Laravel ke variabel Alpine.js agar sinkron saat mental balik
            penyakitSelect: '{{ old("penyakit_pilihan", "") }}',
            penyakitCustom: '{{ old("penyakit_pilihan") === "Lainnya" ? old("penyakit_pernah_diderita") : "" }}',
            penyakitFinal: '{{ old("penyakit_pernah_diderita", "") }}',
            
            kelainanSelect: '{{ old("kelainan_pilihan", "") }}',
            kelainanCustom: '{{ old("kelainan_pilihan") === "Lainnya" ? old("kelainan_jasmani") : "" }}',
            kelainanFinal: '{{ old("kelainan_jasmani", "") }}',

            handlePenyakitChange() {
                if (this.penyakitSelect !== 'Lainnya') {
                    this.penyakitFinal = this.penyakitSelect;
                    this.penyakitCustom = '';
                } else {
                    this.penyakitFinal = this.penyakitCustom;
                }
            },
            syncPenyakitInput() {
                this.penyakitFinal = this.penyakitCustom;
            },

            handleKelainanChange() {
                if (this.kelainanSelect !== 'Lainnya') {
                    this.kelainanFinal = this.kelainanSelect;
                    this.kelainanCustom = '';
                } else {
                    this.kelainanFinal = this.kelainanCustom;
                }
            },
            syncKelainanInput() {
                this.kelainanFinal = this.kelainanCustom;
            }
        }
    }
</script>