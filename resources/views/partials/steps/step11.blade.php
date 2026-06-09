<div class="space-y-6">
    <!-- Note Petunjuk Dokumen -->
    <div class="bg-primary/5 border border-primary/20 rounded-xl p-4 flex items-start gap-3">
        <span class="material-symbols-outlined text-primary text-[22px] mt-0.5">cloud_upload</span>
        <div class="text-sm text-on-surface-variant leading-relaxed">
            <span class="font-bold text-primary">Unggah Berkas Pendukung Fisik:</span> Silakan unggah salinan digital berkas administrasi Anda. Format yang didukung adalah <strong>PDF</strong> dengan kapasitas file maksimal <strong>1 MB</strong> per dokumen.
        </div>
    </div>

    <!-- Grid Upload File -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        
        <!-- File 1: Kartu Keluarga -->
        <div class="bg-surface border border-outline-variant rounded-xl p-5 space-y-3 flex flex-col justify-between">
            <div class="space-y-1">
                <label class="block text-sm font-bold text-on-surface">File Kartu Keluarga (KK) <span class="text-rose-600">*</span></label>
                <p class="text-xs text-on-surface-variant">Scan seluruh lembar KK secara jelas dan tidak terpotong.</p>
            </div>
            <input type="file" 
                   name="file_kartu_keluarga" 
                   accept=".pdf, .jpg, .jpeg, .png"
                   class="block w-full text-xs text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-xs file:font-semibold file:bg-primary/10 file:text-primary hover:file:bg-primary/20 cursor-pointer"
                   required>
        </div>

        <!-- File 2: SKL (Surat Keterangan Lulus) -->
        <div class="bg-surface border border-outline-variant rounded-xl p-5 space-y-3 flex flex-col justify-between">
            <div class="space-y-1">
                <label class="block text-sm font-bold text-on-surface">File SKL / Ijazah SMP <span class="text-rose-600">*</span></label>
                <p class="text-xs text-on-surface-variant">Surat keterangan kelulusan resmi bermaterai/dicap dari sekolah asal.</p>
            </div>
            <input type="file" 
                   name="file_skl" 
                   accept=".pdf, .jpg, .jpeg, .png"
                   class="block w-full text-xs text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-xs file:font-semibold file:bg-primary/10 file:text-primary hover:file:bg-primary/20 cursor-pointer"
                   required>
        </div>

        <!-- File 3: Bukti SPMB -->
        <div class="bg-surface border border-outline-variant rounded-xl p-5 space-y-3 flex flex-col justify-between">
            <div class="space-y-1">
                <label class="block text-sm font-bold text-on-surface">File Bukti Pendaftaran SPMB <span class="text-rose-600">*</span></label>
                <p class="text-xs text-on-surface-variant">Bukti cetak kartu ujian atau formulir seleksi sistem masuk.</p>
            </div>
            <input type="file" 
                   name="file_bukti_spmb" 
                   accept=".pdf, .jpg, .jpeg, .png"
                   class="block w-full text-xs text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-xs file:font-semibold file:bg-primary/10 file:text-primary hover:file:bg-primary/20 cursor-pointer"
                   required>
        </div>

        <!-- File 4: Surat Pernyataan -->
        <div class="bg-surface border border-outline-variant rounded-xl p-5 space-y-3 flex flex-col justify-between">
            <div class="space-y-1">
                <label class="block text-sm font-bold text-on-surface">File Surat Pernyataan Siswa/Wali <span class="text-rose-600">*</span></label>
                <p class="text-xs text-on-surface-variant">Lembar dokumen pernyataan mentaati tata tertib sekolah yang ditandatangani.</p>
            </div>
            <input type="file" 
                   name="file_surat_pernyataan" 
                   accept=".pdf, .jpg, .jpeg, .png"
                   class="block w-full text-xs text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-xs file:font-semibold file:bg-primary/10 file:text-primary hover:file:bg-primary/20 cursor-pointer"
                   required>
        </div>

    </div>
</div>