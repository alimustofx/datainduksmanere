<div class="space-y-6">
    <div class="bg-primary/5 border border-primary/20 rounded-xl p-4 flex items-start gap-3">
        <span class="material-symbols-outlined text-primary text-[22px] mt-0.5">star</span>
        <div class="text-sm text-on-surface-variant leading-relaxed">
            <span class="font-bold text-primary">Isian Kegemaran & Cita-Cita:</span> Silakan pilih minat, bakat, dan impian masa depan Anda melalui menu pilihan di bawah ini. Data ini digunakan sekolah untuk pemetaan kelompok ekstrakurikuler serta bimbingan konseling karier siswa.
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        
        <div class="space-y-2">
            <label class="block text-sm font-semibold text-on-surface">Hobi Kesenian <span class="text-rose-600">*</span></label>
            <select name="hobi_kesenian" class="w-full px-4 py-2.5 bg-surface border border-outline-variant rounded-lg focus:border-primary focus:ring-1 focus:ring-primary text-sm font-medium transition-all" required>
                <option value="" disabled {{ old('hobi_kesenian') == '' ? 'selected' : '' }}>-- Pilih Bidang Seni --</option>
                <option value="Tidak Ada" {{ old('hobi_kesenian') == 'Tidak Ada' ? 'selected' : '' }}>Tidak Ada</option>
                <option value="Seni Musik (Menyanyi / Paduan Suara)" {{ old('hobi_kesenian') == 'Seni Musik (Menyanyi / Paduan Suara)' ? 'selected' : '' }}>Seni Musik (Menyanyi / Paduan Suara)</option>
                <option value="Bermain Alat Musik (Gitar, Piano, Drum, dll)" {{ old('hobi_kesenian') == 'Bermain Alat Musik (Gitar, Piano, Drum, dll)' ? 'selected' : '' }}>Bermain Alat Musik (Gitar, Piano, Drum, dll)</option>
                <option value="Seni Rupa (Menggambar / Melukis / Desain Grafis)" {{ old('hobi_kesenian') == 'Seni Rupa (Menggambar / Melukis / Desain Grafis)' ? 'selected' : '' }}>Seni Rupa (Menggambar / Melukis / Desain Grafis)</option>
                <option value="Seni Tari (Tradisional / Modern Dance)" {{ old('hobi_kesenian') == 'Seni Tari (Tradisional / Modern Dance)' ? 'selected' : '' }}>Seni Tari (Tradisional / Modern Dance)</option>
                <option value="Seni Peran (Teater / Drama / Sinematografi)" {{ old('hobi_kesenian') == 'Seni Peran (Teater / Drama / Sinematografi)' ? 'selected' : '' }}>Seni Peran (Teater / Drama / Sinematografi)</option>
                <option value="Seni Sastra (Menulis Puisi / Cerpen / Novel)" {{ old('hobi_kesenian') == 'Seni Sastra (Menulis Puisi / Cerpen / Novel)' ? 'selected' : '' }}>Seni Sastra (Menulis Puisi / Cerpen / Novel)</option>
                <option value="Seni Kriya (Kerajinan Tangan / Rajut / Ukir)" {{ old('hobi_kesenian') == 'Seni Kriya (Kerajinan Tangan / Rajut / Ukir)' ? 'selected' : '' }}>Seni Kriya (Kerajinan Tangan / Rajut / Ukir)</option>
            </select>
        </div>

        <div class="space-y-2">
            <label class="block text-sm font-semibold text-on-surface">Hobi Olahraga <span class="text-rose-600">*</span></label>
            <select name="hobi_olahraga" class="w-full px-4 py-2.5 bg-surface border border-outline-variant rounded-lg focus:border-primary focus:ring-1 focus:ring-primary text-sm font-medium transition-all" required>
                <option value="" disabled {{ old('hobi_olahraga') == '' ? 'selected' : '' }}>-- Pilih Cabang Olahraga --</option>
                <option value="Tidak Ada" {{ old('hobi_olahraga') == 'Tidak Ada' ? 'selected' : '' }}>Tidak Ada</option>
                <option value="Sepak Bola / Futsal" {{ old('hobi_olahraga') == 'Sepak Bola / Futsal' ? 'selected' : '' }}>Sepak Bola / Futsal</option>
                <option value="Bulu Tangkis (Badminton)" {{ old('hobi_olahraga') == 'Bulu Tangkis (Badminton)' ? 'selected' : '' }}>Bulu Tangkis (Badminton)</option>
                <option value="Bola Voli" {{ old('hobi_olahraga') == 'Bola Voli' ? 'selected' : '' }}>Bola Voli</option>
                <option value="Bola Basket" {{ old('hobi_olahraga') == 'Bola Basket' ? 'selected' : '' }}>Bola Basket</option>
                <option value="Tenis Meja" {{ old('hobi_olahraga') == 'Tenis Meja' ? 'selected' : '' }}>Tenis Meja</option>
                <option value="Atletik (Lari / Lompat / Lempar)" {{ old('hobi_olahraga') == 'Atletik (Lari / Lompat / Lempar)' ? 'selected' : '' }}>Atletik (Lari / Lompat / Lempar)</option>
                <option value="Berenang" {{ old('hobi_olahraga') == 'Berenang' ? 'selected' : '' }}>Berenang</option>
                <option value="Seni Bela Diri (Pencak Silat / Taekwondo / Karate)" {{ old('hobi_olahraga') == 'Seni Bela Diri (Pencak Silat / Taekwondo / Karate)' ? 'selected' : '' }}>Seni Bela Diri (Pencak Silat / Taekwondo / Karate)</option>
                <option value="Catur" {{ old('hobi_olahraga') == 'Catur' ? 'selected' : '' }}>Catur</option>
                <option value="Senam / Fitness" {{ old('hobi_olahraga') == 'Senam / Fitness' ? 'selected' : '' }}>Senam / Fitness</option>
            </select>
        </div>

        <div class="space-y-2">
            <label class="block text-sm font-semibold text-on-surface">Minat / Pengalaman Organisasi <span class="text-rose-600">*</span></label>
            <select name="hobi_organisasi" class="w-full px-4 py-2.5 bg-surface border border-outline-variant rounded-lg focus:border-primary focus:ring-1 focus:ring-primary text-sm font-medium transition-all" required>
                <option value="" disabled {{ old('hobi_organisasi') == '' ? 'selected' : '' }}>-- Pilih Kelompok Organisasi --</option>
                <option value="Tidak Ada" {{ old('hobi_organisasi') == 'Tidak Ada' ? 'selected' : '' }}>Tidak Ada</option>
                <option value="OSIS / MPK" {{ old('hobi_organisasi') == 'OSIS / MPK' ? 'selected' : '' }}>OSIS / MPK</option>
                <option value="Pramuka" {{ old('hobi_organisasi') == 'Pramuka' ? 'selected' : '' }}>Pramuka</option>
                <option value="PMR (Palang Merah Remaja)" {{ old('hobi_organisasi') == 'PMR (Palang Merah Remaja)' ? 'selected' : '' }}>PMR (Palang Merah Remaja)</option>
                <option value="Paskibra / Paskibraka" {{ old('hobi_organisasi') == 'Paskibra / Paskibraka' ? 'selected' : '' }}>Paskibra / Paskibraka</option>
                <option value="Patroli Keamanan Sekolah (PKS)" {{ old('hobi_organisasi') == 'Patroli Keamanan Sekolah (PKS)' ? 'selected' : '' }}>Patroli Keamanan Sekolah (PKS)</option>
                <option value="Remaja Masjid (Remas) / Pemuda Gereja" {{ old('hobi_organisasi') == 'Remaja Masjid (Remas) / Pemuda Gereja' ? 'selected' : '' }}>Remaja Masjid (Remas) / Pemuda Gereja</option>
                <option value="Jurnalistik / Majalah Dinding (Mading)" {{ old('hobi_organisasi') == 'Jurnalistik / Majalah Dinding (Mading)' ? 'selected' : '' }}>Jurnalistik / Majalah Dinding (Mading)</option>
                <option value="Klub Bahasa (English Club / Japanese Club, dll)" {{ old('hobi_organisasi') == 'Klub Bahasa (English Club / Japanese Club, dll)' ? 'selected' : '' }}>Klub Bahasa (English Club / Japanese Club, dll)</option>
                <option value="Karya Ilmiah Remaja (KIR)" {{ old('hobi_organisasi') == 'Karya Ilmiah Remaja (KIR)' ? 'selected' : '' }}>Karya Ilmiah Remaja (KIR)</option>
                <option value="Pecinta Alam" {{ old('hobi_organisasi') == 'Pecinta Alam' ? 'selected' : '' }}>Pecinta Alam</option>
            </select>
        </div>

    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 pt-4 border-t border-outline-variant/60">
        
        <div class="space-y-2">
            <label class="block text-sm font-semibold text-on-surface">Hobi / Kegemaran Lainnya <span class="text-rose-600">*</span></label>
            <select name="hobi_lainnya" class="w-full px-4 py-2.5 bg-surface border border-outline-variant rounded-lg focus:border-primary focus:ring-1 focus:ring-primary text-sm font-medium transition-all" required>
                <option value="" disabled {{ old('hobi_lainnya') == '' ? 'selected' : '' }}>-- Pilih Kegemaran --</option>
                <option value="Tidak Ada" {{ old('hobi_lainnya') == 'Tidak Ada' ? 'selected' : '' }}>Tidak Ada</option>
                <option value="Membaca Buku / Novel / Komik" {{ old('hobi_lainnya') == 'Membaca Buku / Novel / Komik' ? 'selected' : '' }}>Membaca Buku / Novel / Komik</option>
                <option value="Memasak / Tata Boga" {{ old('hobi_lainnya') == 'Memasak / Tata Boga' ? 'selected' : '' }}>Memasak / Tata Boga</option>
                <option value="Fotografi / Videografi / Editing Video" {{ old('hobi_lainnya') == 'Fotografi / Videografi / Editing Video' ? 'selected' : '' }}>Fotografi / Videografi / Editing Video</option>
                <option value="Coding / Pemrograman / Robotik" {{ old('hobi_lainnya') == 'Coding / Pemrograman / Robotik' ? 'selected' : '' }}>Coding / Pemrograman / Robotik</option>
                <option value="Bermain Game (E-Sports)" {{ old('hobi_lainnya') == 'Bermain Game (E-Sports)' ? 'selected' : '' }}>Bermain Game (E-Sports)</option>
                <option value="Berkebun / Mencintai Tanaman" {{ old('hobi_lainnya') == 'Berkebun / Mencintai Tanaman' ? 'selected' : '' }}>Berkebun / Mencintai Tanaman</option>
                <option value="Otomotif (Modifikasi / Perawatan Kendaraan)" {{ old('hobi_lainnya') == 'Otomotif (Modifikasi / Perawatan Kendaraan)' ? 'selected' : '' }}>Otomotif (Modifikasi / Perawatan Kendaraan)</option>
                <option value="Mengoleksi Barang (Kolektor)" {{ old('hobi_lainnya') == 'Mengoleksi Barang (Kolektor)' ? 'selected' : '' }}>Mengoleksi Barang (Kolektor)</option>
                <option value="Traveling / Menjelajah Alam" {{ old('hobi_lainnya') == 'Traveling / Menjelajah Alam' ? 'selected' : '' }}>Traveling / Menjelajah Alam</option>
            </select>
        </div>

        <div class="space-y-2">
            <label class="block text-sm font-semibold text-on-surface">Cita-Cita Masa Depan <span class="text-rose-600">*</span></label>
            <select name="cita_cita" class="w-full px-4 py-2.5 bg-surface border border-outline-variant rounded-lg focus:border-primary focus:ring-1 focus:ring-primary text-sm font-medium transition-all" required>
                <option value="" disabled {{ old('cita_cita') == '' ? 'selected' : '' }}>-- Pilih Impian Profesi --</option>
                <option value="PNS / Aparatur Sipil Negara (ASN)" {{ old('cita_cita') == 'PNS / Aparatur Sipil Negara (ASN)' ? 'selected' : '' }}>PNS / Aparatur Sipil Negara (ASN)</option>
                <option value="TNI (Angkatan Darat / Laut / Udara)" {{ old('cita_cita') == 'TNI (Angkatan Darat / Laut / Udara)' ? 'selected' : '' }}>TNI (Angkatan Darat / Laut / Udara)</option>
                <option value="POLRI (Polisi)" {{ old('cita_cita') == 'POLRI (Polisi)' ? 'selected' : '' }}>POLRI (Polisi)</option>
                <option value="Guru / Dosen / Akademisi" {{ old('cita_cita') == 'Guru / Dosen / Akademisi' ? 'selected' : '' }}>Guru / Dosen / Akademisi</option>
                <option value="Dokter / Tenaga Medis (Perawat / Bidan / Apoteker)" {{ old('cita_cita') == 'Dokter / Tenaga Medis (Perawat / Bidan / Apoteker)' ? 'selected' : '' }}>Dokter / Tenaga Medis (Perawat / Bidan / Apoteker)</option>
                <option value="Programmer / Software Engineer / Data Scientist" {{ old('cita_cita') == 'Programmer / Software Engineer / Data Scientist' ? 'selected' : '' }}>Programmer / Software Engineer / Data Scientist</option>
                <option value="Pengusaha / Wiraswasta / CEO" {{ old('cita_cita') == 'Pengusaha / Wiraswasta / CEO' ? 'selected' : '' }}>Pengusaha / Wiraswasta / CEO</option>
                <option value="Arsitek / Sipil / Insinyur Teknik" {{ old('cita_cita') == 'Arsitek / Sipil / Insinyur Teknik' ? 'selected' : '' }}>Arsitek / Sipil / Insinyur Teknik</option>
                <option value="Akuntan / Ahli Keuangan / Bankir" {{ old('cita_cita') == 'Akuntan / Ahli Keuangan / Bankir' ? 'selected' : '' }}>Akuntan / Ahli Keuangan / Bankir</option>
                <option value="Hukum (Hakim / Jaksa / Pengacara)" {{ old('cita_cita') == 'Hukum (Hakim / Jaksa / Pengacara)' ? 'selected' : '' }}>Hukum (Hakim / Jaksa / Pengacara)</option>
                <option value="Seniman / Desainer / Animator / Content Creator" {{ old('cita_cita') == 'Seniman / Desainer / Animator / Content Creator' ? 'selected' : '' }}>Seniman / Desainer / Animator / Content Creator</option>
                <option value="Pilot / Pramugari / Masinis / Kapten Kapal" {{ old('cita_cita') == 'Pilot / Pramugari / Masinis / Kapten Kapal' ? 'selected' : '' }}>Pilot / Pramugari / Masinis / Kapten Kapal</option>
                <option value="Atlet Profesional" {{ old('cita_cita') == 'Atlet Profesional' ? 'selected' : '' }}>Atlet Profesional</option>
            </select>
        </div>

    </div>
</div>