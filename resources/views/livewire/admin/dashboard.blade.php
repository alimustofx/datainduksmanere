<div class="flex min-h-screen w-full bg-slate-50 text-slate-800 antialiased" x-data="{ currentTab: @entangle('currentTab') }">
    
    <nav class="hidden md:flex flex-col h-screen w-64 bg-white border-r border-slate-200 py-6 sticky top-0 shrink-0 justify-between">
        <div>
            <div class="px-6 mb-8 flex flex-col items-center">
                <div class="w-14 h-14 bg-blue-50 rounded-2xl flex items-center justify-center mb-3 border border-blue-100 shadow-sm">
                    <span class="material-symbols-outlined text-blue-600 text-3xl" style="font-variation-settings: 'FILL' 1;">school</span>
                </div>
                <h1 class="text-lg font-bold text-slate-900 text-center leading-tight">Admin Panel</h1>
                <p class="text-[11px] font-semibold text-slate-400 mt-0.5 tracking-wider uppercase">SMAN 1 Turen</p>
            </div>
            
            <div class="px-4 mb-2">
                <span class="text-[10px] font-bold text-slate-400 uppercase tracking-widest pl-3">Menu Utama</span>
            </div>
            <ul class="flex flex-col gap-1 px-3">
                <li>
                    <button wire:click="switchTab('dashboard')" class="w-full flex items-center gap-3 px-3 py-2.5 rounded-xl text-left transition-all font-semibold relative" :class="currentTab === 'dashboard' ? 'text-blue-600 bg-blue-50/70' : 'text-slate-500 hover:text-slate-800 hover:bg-slate-100'">
                        <div x-show="currentTab === 'dashboard'" class="absolute left-0 top-1/2 -translate-y-1/2 w-1 h-6 bg-blue-600 rounded-r-full"></div>
                        <span class="material-symbols-outlined text-[22px]" :style="currentTab === 'dashboard' ? 'font-variation-settings: \'FILL\' 1;' : ''">dashboard</span>
                        <span class="text-sm">Dashboard</span>
                    </button>
                </li>
                <li>
                    <button wire:click="switchTab('manajemen')" class="w-full flex items-center gap-3 px-3 py-2.5 rounded-xl text-left transition-all font-semibold relative" :class="currentTab === 'manajemen' ? 'text-blue-600 bg-blue-50/70' : 'text-slate-500 hover:text-slate-800 hover:bg-slate-100'">
                        <div x-show="currentTab === 'manajemen'" class="absolute left-0 top-1/2 -translate-y-1/2 w-1 h-6 bg-blue-600 rounded-r-full"></div>
                        <span class="material-symbols-outlined text-[22px]" :style="currentTab === 'manajemen' ? 'font-variation-settings: \'FILL\' 1;' : ''">group</span>
                        <span class="text-sm">Manajemen Siswa</span>
                    </button>
                </li>
            </ul>
        </div>

        <div class="px-4 flex flex-col gap-2">
            <div class="bg-slate-50 p-3 rounded-xl flex items-center gap-3 border border-slate-200/60">
                <div class="w-9 h-9 bg-blue-600 rounded-full flex items-center justify-center text-white font-bold text-xs shadow-sm">
                    {{ auth('admin')->check() ? strtoupper(substr(auth('admin')->user()->name, 0, 2)) : 'AD' }}
                </div>
                <div class="flex-1 min-w-0">
                    <p class="text-xs font-bold text-slate-800 truncate">{{ auth('admin')->check() ? auth('admin')->user()->name : 'Admin Utama' }}</p>
                    <p class="text-[11px] text-slate-400 truncate">{{ auth('admin')->check() ? auth('admin')->user()->email : 'admin@sman1turen.sch.id' }}</p>
                </div>
            </div>
            
            <form method="POST" action="{{ route('admin.logout') }}">
                @csrf
                <button type="submit" class="w-full flex items-center gap-3 px-3 py-2.5 rounded-xl text-rose-600 hover:bg-rose-50 hover:text-rose-700 font-medium text-left transition-all text-sm">
                    <span class="material-symbols-outlined text-[22px]">logout</span>
                    <span>Keluar Sistem</span>
                </button>
            </form>
        </div>
    </nav>

    <main class="flex-grow w-full md:max-w-[calc(100vw-16rem)] p-6 md:p-8 overflow-y-auto">
        
        @if (session()->has('message'))
            <div class="mb-5 p-4 bg-emerald-50 border border-emerald-200 text-emerald-800 rounded-xl text-xs font-semibold flex items-center gap-2 shadow-sm">
                <span class="material-symbols-outlined text-emerald-500">check_circle</span>
                {{ session('message') }}
            </div>
        @endif

        <div x-show="currentTab === 'dashboard'" x-cloak>
            <div class="mb-8 flex justify-between items-center flex-wrap gap-4 border-b border-slate-200 pb-5">
                <div>
                    <h2 class="text-2xl font-bold text-slate-900 tracking-tight">Dashboard Overview</h2>
                    <p class="text-sm text-slate-500 mt-0.5">Pantau ringkasan berkas fisik riil dan statistik progres verifikasi pendaftar.</p>
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5 mb-8">
                <div class="bg-white rounded-2xl p-5 border border-slate-200 shadow-sm flex items-center justify-between">
                    <div>
                        <p class="text-[11px] font-bold text-slate-400 uppercase tracking-wider mb-1">Total Pendaftar</p>
                        <div class="text-3xl font-bold text-slate-900 tracking-tight">{{ number_format($stats['totalSiswa'] ?? 0) }}</div>
                    </div>
                    <div class="w-11 h-11 bg-blue-50 text-blue-600 rounded-xl flex items-center justify-center border border-blue-100 shadow-sm">
                        <span class="material-symbols-outlined text-[24px]" style="font-variation-settings: 'FILL' 1;">groups</span>
                    </div>
                </div>
                
                <div class="bg-white rounded-2xl p-5 border border-slate-200 shadow-sm flex items-center justify-between">
                    <div>
                        <p class="text-[11px] font-bold text-slate-400 uppercase tracking-wider mb-1">Berkas Valid (SKL)</p>
                        <div class="text-3xl font-bold text-slate-900 tracking-tight">{{ number_format($stats['totalBerkas'] ?? 0) }}</div>
                    </div>
                    <div class="w-11 h-11 bg-indigo-50 text-indigo-600 rounded-xl flex items-center justify-center border border-indigo-100 shadow-sm">
                        <span class="material-symbols-outlined text-[24px]" style="font-variation-settings: 'FILL' 1;">description</span>
                    </div>
                </div>
                
                <div class="bg-white rounded-2xl p-5 border border-slate-200 shadow-sm flex items-center justify-between">
                    <div>
                        <p class="text-[11px] font-bold text-slate-400 uppercase tracking-wider mb-1">Sedang Diverifikasi</p>
                        <div class="text-3xl font-bold text-amber-600 tracking-tight">{{ number_format($stats['menungguProses'] ?? 0) }}</div>
                    </div>
                    <div class="w-11 h-11 bg-amber-50 text-amber-600 rounded-xl flex items-center justify-center border border-amber-100 shadow-sm">
                        <span class="material-symbols-outlined text-[24px]" style="font-variation-settings: 'FILL' 1;">pending_actions</span>
                    </div>
                </div>
                
                <div class="bg-white rounded-2xl p-5 border border-slate-200 shadow-sm flex flex-col justify-between gap-2">
                    <div class="flex items-center justify-between w-full">
                        <div>
                            <p class="text-[11px] font-bold text-slate-400 uppercase tracking-wider mb-1">Sudah Diverifikasi</p>
                            <div class="text-3xl font-bold text-emerald-600 tracking-tight">{{ number_format($stats['selesaiVerifikasi'] ?? 0) }}</div>
                        </div>
                        <div class="w-11 h-11 bg-emerald-50 text-emerald-600 rounded-xl flex items-center justify-center border border-emerald-100 shadow-sm">
                            <span class="material-symbols-outlined text-[24px]" style="font-variation-settings: 'FILL' 1;">verified</span>
                        </div>
                    </div>
                    <div class="w-full flex items-center gap-2 mt-1">
                        <div class="flex-1 bg-slate-100 rounded-full h-1.5 overflow-hidden">
                            <div class="bg-emerald-500 h-1.5 rounded-full transition-all duration-500" style="width: {{ $stats['persentaseSelesai'] ?? 0 }}%"></div>
                        </div>
                        <span class="text-slate-500 font-semibold text-xs whitespace-nowrap">{{ $stats['persentaseSelesai'] ?? 0 }}%</span>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-2xl p-6 border border-slate-200 shadow-sm mb-8">
                <div class="mb-4">
                    <h3 class="text-base font-bold text-slate-900">Grafik Pendaftaran Harian</h3>
                    <p class="text-xs text-slate-400 mt-0.5">Total pendaftar baru dalam rentang waktu 7 hari terakhir.</p>
                </div>
                <div class="h-44 w-full flex items-end justify-between gap-3 pt-6 border-b border-slate-100 px-2">
                    @foreach(range(6, 0) as $i)
                        @php 
                            $dateStr = now()->subDays($i)->format('Y-m-d');
                            $count = $stats['grafikData'][$dateStr] ?? 0;
                            $maxCount = isset($stats['grafikData']) && count($stats['grafikData']) > 0 ? max($stats['grafikData']->toArray()) : 1;
                            $heightPercent = $maxCount > 0 ? ($count / $maxCount) * 100 : 0;
                        @endphp
                        <div class="flex-1 flex flex-col items-center h-full justify-end group cursor-pointer relative">
                            <div class="absolute -top-7 bg-slate-900 text-white text-[10px] font-bold py-1 px-2 rounded-md opacity-0 group-hover:opacity-100 transition-all z-10 shadow-sm">
                                {{ $count }} Siswa
                            </div>
                            <div class="w-full sm:w-12 bg-blue-500/80 rounded-t-lg group-hover:bg-blue-600 transition-all duration-300 min-h-[4px]" style="height: {{ max($heightPercent, 4) }}%"></div>
                            <span class="text-[10px] text-slate-400 font-semibold mt-2 whitespace-nowrap">
                                {{ now()->subDays($i)->isoFormat('D MMM') }}
                            </span>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <div x-show="currentTab === 'manajemen'" x-cloak>
            <div class="mb-6 flex justify-between items-center flex-wrap gap-4 border-b border-slate-200 pb-5">
                <div>
                    <h2 class="text-2xl font-bold text-slate-900 tracking-tight">Manajemen Data Pendaftar</h2>
                    <p class="text-sm text-slate-500 mt-0.5">Kelola verifikasi, ubah status validitas berkas, dan unduh data induk lengkap siswa.</p>
                </div>
                <div>
                    <button wire:click="exportExcel" class="bg-emerald-600 text-white hover:bg-emerald-700 py-2 px-4 rounded-xl text-xs font-semibold flex items-center gap-1.5 transition-all shadow-sm active:scale-95">
                        <span class="material-symbols-outlined text-[18px]">download_for_offline</span> Export ke Excel Terformat Kolom
                    </button>
                </div>
            </div>

            <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">
                <div class="p-6 border-b border-slate-100 flex flex-col lg:flex-row justify-between gap-4 items-start lg:items-center bg-slate-50/50">
                    <div class="relative w-full sm:w-72">
                        <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-slate-400 text-[18px]">search</span>
                        <input wire:model.live.debounce.300ms="search" class="w-full pl-9 pr-4 py-1.5 bg-white border border-slate-200 rounded-xl text-xs focus:border-blue-500 outline-none text-slate-700 shadow-sm" placeholder="Cari Nama, NISN, atau SMP..." type="text"/>
                    </div>
                    
                    <div class="flex flex-wrap gap-2 w-full lg:w-auto">
                        <select wire:model.live="filterStage" class="border border-slate-200 rounded-xl px-3 py-1.5 text-xs bg-white text-slate-600 font-medium focus:border-blue-500 outline-none shadow-sm cursor-pointer">
                            <option value="">Semua Tahap</option>
                            <option value="Tahap 1">Tahap 1</option>
                            <option value="Tahap 2">Tahap 2</option>
                            <option value="Tahap 3">Tahap 3</option>
                        </select>

                        <select wire:model.live="filterStatus" class="border border-slate-200 rounded-xl px-3 py-1.5 text-xs bg-white text-slate-600 font-medium focus:border-blue-500 outline-none shadow-sm cursor-pointer">
                            <option value="">Semua Status Verifikasi</option>
                            <option value="Proses">Sedang Diverifikasi</option>
                            <option value="Selesai">Sudah Diverifikasi</option>
                            <option value="Ditolak">Ditolak</option>
                        </select>
                    </div>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse whitespace-nowrap">
                        <thead>
                            <tr class="bg-slate-50 text-slate-400 text-[10px] font-bold uppercase tracking-wider border-b border-slate-200">
                                <th class="px-6 py-3.5">Informasi Calon Siswa</th>
                                <th class="px-6 py-3.5">Asal Sekolah</th>
                                <th class="px-6 py-3.5">Tahap Seleksi</th>
                                <th class="px-6 py-3.5">Status Verifikasi</th>
                                <th class="px-6 py-3.5">Aksi Validasi</th>
                                <th class="px-6 py-3.5 text-center font-bold text-blue-600">Baca Detail & Berkas</th>
                            </tr>
                        </thead>
                        <tbody class="text-xs text-slate-700 divide-y divide-slate-100">
                            @forelse($students as $student)
                                <tr class="hover:bg-slate-50/80 transition-colors group">
                                    <td class="px-6 py-4.5">
                                        <div class="font-bold text-slate-900 group-hover:text-blue-600 text-sm">{{ $student->nama_lengkap }}</div>
                                        <div class="text-[10px] text-slate-400 mt-0.5 font-mono">NISN • {{ $student->nisn }}</div>
                                    </td>
                                    <td class="px-6 py-4.5">
                                        <div class="font-semibold text-slate-800 text-sm">{{ $student->nama_smp }}</div>
                                        <div class="text-[10px] text-slate-400 mt-0.5 font-mono">NPSN • {{ $student->npsn_smp }}</div>
                                    </td>
                                    <td class="px-6 py-4.5">
                                        <span class="inline-flex items-center px-2 py-0.5 rounded-md text-[10px] font-bold bg-slate-100 text-slate-600 border border-slate-200/50">
                                            {{ $student->passed_stage }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4.5">
                                        @if($student->status_verifikasi == 'Selesai')
                                            <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full text-[10px] font-bold bg-emerald-50 text-emerald-700 border border-emerald-200/40">
                                                <span class="w-1 h-1 rounded-full bg-emerald-500"></span> Sudah Diverifikasi
                                            </span>
                                        @elseif($student->status_verifikasi == 'Proses')
                                            <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full text-[10px] font-bold bg-amber-50 text-amber-700 border border-amber-200/40">
                                                <span class="w-1 h-1 rounded-full bg-amber-500 animate-pulse"></span> Sedang Diverifikasi
                                            </span>
                                        @else
                                            <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full text-[10px] font-bold bg-rose-50 text-rose-700 border border-rose-200/40">
                                                <span class="w-1 h-1 rounded-full bg-rose-500"></span> {{ $student->status_verifikasi }}
                                            </span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4.5">
                                        <button wire:click="toggleVerifikasi({{ $student->id }})" class="inline-flex items-center gap-1 px-3 py-1.5 rounded-xl text-[11px] font-bold transition-all border shadow-sm {{ $student->status_verifikasi === 'Proses' ? 'bg-blue-600 text-white border-blue-600 hover:bg-blue-700 shadow-blue-100' : 'bg-white text-slate-600 border-slate-200 hover:bg-slate-50' }}">
                                            <span class="material-symbols-outlined text-[14px]">published_with_changes</span>
                                            {{ $student->status_verifikasi === 'Proses' ? 'Setujui Validasi' : 'Kembalikan ke Proses' }}
                                        </button>
                                    </td>
                                    <td class="px-6 py-4.5 text-center">
                                        <button wire:click="showDetail({{ $student->id }})" class="text-blue-600 bg-blue-50 hover:bg-blue-100 p-2 rounded-xl transition-all inline-flex items-center" title="Buka Data & Berkas">
                                            <span class="material-symbols-outlined text-[18px]">visibility</span>
                                        </button>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="px-6 py-12 text-center text-sm text-slate-400 font-medium bg-slate-50/20">
                                        <span class="material-symbols-outlined text-3xl text-slate-300 block mb-2">folder_open</span>
                                        Tidak ada data pendaftar yang cocok.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="p-4 border-t border-slate-100 flex flex-col sm:flex-row justify-between items-center gap-4 bg-slate-50/40">
                    <div class="flex items-center gap-2 text-xs text-slate-500 font-semibold">
                        <span>Tampilkan</span>
                        <select wire:model.live="perPage" class="bg-white border border-slate-200 rounded-lg py-1 px-2 text-xs font-bold text-slate-600 outline-none">
                            <option value="10">10</option>
                            <option value="25">25</option>
                            <option value="50">50</option>
                        </select>
                        <span>Entri Data</span>
                    </div>
                    <div class="text-xs">
                        {{ $students->links() }}
                    </div>
                </div>
            </div>
        </div>
    </main>

    @if($showModal && $selectedStudent)
        <div class="fixed inset-0 z-50 overflow-hidden flex items-center justify-center p-4 bg-slate-900/70 backdrop-blur-sm" x-data="{ activeFileTab: 'kk' }">
            <div class="bg-white rounded-2xl max-w-[95vw] w-full h-[90vh] flex flex-col shadow-2xl border border-slate-200 overflow-hidden">
                
                <div class="p-5 border-b border-slate-200 flex justify-between items-center bg-slate-50">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 bg-blue-600 rounded-xl flex items-center justify-center text-white font-bold text-sm shadow-sm">
                            {{ strtoupper(substr($selectedStudent->nama_lengkap, 0, 2)) }}
                        </div>
                        <div>
                            <h3 class="text-base font-bold text-slate-900">{{ $selectedStudent->nama_lengkap }}</h3>
                            <p class="text-xs text-slate-400 font-semibold">NISN: {{ $selectedStudent->nisn }} • NIK: {{ $selectedStudent->nik }}</p>
                        </div>
                    </div>
                    <button wire:click="closeModal" class="w-9 h-9 rounded-full bg-slate-200 hover:bg-slate-300 flex items-center justify-center text-slate-700 transition-all">
                        <span class="material-symbols-outlined text-sm">close</span>
                    </button>
                </div>

                <div class="flex flex-1 overflow-hidden divide-x divide-slate-200">
                    
                    <div class="w-1/2 p-6 overflow-y-auto space-y-6 text-xs text-slate-700 bg-white">
                        
                        <div class="bg-blue-50/50 p-4 rounded-xl border border-blue-100">
                            <h4 class="text-blue-700 font-bold uppercase tracking-wider mb-2.5 text-[10px] flex items-center gap-1">
                                <span class="material-symbols-outlined text-sm">verified_user</span> SECTION 1: Verifikasi Validasi
                            </h4>
                            <div class="grid grid-cols-2 gap-4">
                                <div><span class="text-slate-400 block">Tahap Seleksi (Passed Stage):</span> <p class="font-bold text-slate-800 text-sm">{{ $selectedStudent->passed_stage }}</p></div>
                                <div><span class="text-slate-400 block">Status Lolos Sistem (Is Passed):</span> <p class="font-bold text-slate-800 text-sm">{{ $selectedStudent->is_passed ? 'YA (Memenuhi Syarat)' : 'TIDAK / DALAM PROSES' }}</p></div>
                                <div class="col-span-2"><span class="text-slate-400 block">Status Verifikasi Admin:</span> <p class="font-bold text-slate-900">{{ $selectedStudent->status_verifikasi }}</p></div>
                            </div>
                        </div>

                        <div>
                            <h4 class="text-blue-600 font-bold uppercase tracking-wider mb-3 text-[10px] border-b border-slate-100 pb-1">SECTION 2: Data Pribadi Siswa</h4>
                            <div class="grid grid-cols-2 gap-x-4 gap-y-3">
                                <div><span class="text-slate-400 block">Nama Lengkap</span> <span class="font-bold text-slate-900 text-sm">{{ $selectedStudent->nama_lengkap }}</span></div>
                                <div><span class="text-slate-400 block">Nama Panggilan</span> <span class="font-semibold text-slate-800">{{ $selectedStudent->nama_panggilan }}</span></div>
                                <div><span class="text-slate-400 block">Jenis Kelamin</span> <span class="font-semibold text-slate-800">{{ $selectedStudent->jenis_kelamin }}</span></div>
                                <div><span class="text-slate-400 block">Tempat, Tanggal Lahir</span> <span class="font-semibold text-slate-800">{{ $selectedStudent->tempat_lahir }}, {{ $selectedStudent->tanggal_lahir ? \Carbon\Carbon::parse($selectedStudent->tanggal_lahir)->isoFormat('D MMMM Y') : '-' }}</span></div>
                                <div><span class="text-slate-400 block">NISN</span> <span class="font-mono text-slate-900 font-bold">{{ $selectedStudent->nisn }}</span></div>
                                <div><span class="text-slate-400 block">NIK Siswa</span> <span class="font-mono text-slate-800 font-semibold">{{ $selectedStudent->nik }}</span></div>
                                <div><span class="text-slate-400 block">No. Kartu Keluarga (KK)</span> <span class="font-mono text-slate-800 font-semibold">{{ $selectedStudent->no_kk }}</span></div>
                                <div><span class="text-slate-400 block">No. Akta Kelahiran</span> <span class="font-semibold text-slate-800">{{ $selectedStudent->no_akta_kelahiran }}</span></div>
                                <div><span class="text-slate-400 block">Agama</span> <span class="font-semibold text-slate-800">{{ $selectedStudent->agama }}</span></div>
                                <div><span class="text-slate-400 block">Kewarganegaraan</span> <span class="font-semibold text-slate-800">{{ $selectedStudent->kewarganegaraan }}</span></div>
                                <div><span class="text-slate-400 block">Bahasa Harian</span> <span class="font-semibold text-slate-800">{{ $selectedStudent->bahasa_harian }}</span></div>
                                <div><span class="text-slate-400 block">Email</span> <span class="font-semibold text-slate-800 text-blue-600">{{ $selectedStudent->email }}</span></div>
                                <div><span class="text-slate-400 block">No. HP Siswa</span> <span class="font-bold text-slate-800">{{ $selectedStudent->no_hp }}</span></div>
                                <div><span class="text-slate-400 block">Status Hubungan Keluarga</span> <span class="font-semibold text-slate-800">{{ $selectedStudent->status_keluarga }}</span></div>
                                <div class="col-span-2 bg-slate-50 p-2.5 rounded-lg border border-slate-200/40 grid grid-cols-4 text-center gap-1">
                                    <div><span class="text-slate-400 text-[10px] block">Anak Ke</span><span class="font-bold text-slate-800">{{ $selectedStudent->anak_ke }}</span></div>
                                    <div><span class="text-slate-400 text-[10px] block">Sdr. Kandung</span><span class="font-bold text-slate-800">{{ $selectedStudent->jumlah_saudara_kandung }}</span></div>
                                    <div><span class="text-slate-400 text-[10px] block">Sdr. Tiri</span><span class="font-bold text-slate-800">{{ $selectedStudent->jumlah_saudara_tiri }}</span></div>
                                    <div><span class="text-slate-400 text-[10px] block">Sdr. Angkat</span><span class="font-bold text-slate-800">{{ $selectedStudent->jumlah_saudara_angkat }}</span></div>
                                </div>
                            </div>
                        </div>

                        <div>
                            <h4 class="text-blue-600 font-bold uppercase tracking-wider mb-3 text-[10px] border-b border-slate-100 pb-1">SECTION 3: Data Ayah Kandung</h4>
                            @if($selectedStudent->ayah_nama)
                                <div class="grid grid-cols-2 gap-x-4 gap-y-2.5">
                                    <div><span class="text-slate-400 block">Nama Ayah</span> <span class="font-semibold text-slate-800">{{ $selectedStudent->ayah_nama }}</span></div>
                                    <div><span class="text-slate-400 block">NIK Ayah</span> <span class="font-mono text-slate-800">{{ $selectedStudent->ayah_nik }}</span></div>
                                    <div><span class="text-slate-400 block">Tempat, Tgl Lahir Ayah</span> <span class="font-semibold text-slate-800">{{ $selectedStudent->ayah_tempat_lahir }}, {{ $selectedStudent->ayah_tanggal_lahir }}</span></div>
                                    <div><span class="text-slate-400 block">Kewarganegaraan / Agama</span> <span class="font-semibold text-slate-800">{{ $selectedStudent->ayah_kewarganegaraan }} / {{ $selectedStudent->ayah_agama }}</span></div>
                                    <div><span class="text-slate-400 block">Pendidikan / Pekerjaan</span> <span class="font-semibold text-slate-800">{{ $selectedStudent->ayah_pendidikan }} / {{ $selectedStudent->ayah_pekerjaan }} {{ $selectedStudent->ayah_pekerjaan_lainnya ? '('.$selectedStudent->ayah_pekerjaan_lainnya.')' : '' }}</span></div>
                                    <div><span class="text-slate-400 block">Penghasilan Bulanan</span> <span class="font-bold text-emerald-600">{{ $selectedStudent->ayah_penghasilan }}</span></div>
                                    <div><span class="text-slate-400 block">No. HP Ayah</span> <span class="font-semibold text-slate-800">{{ $selectedStudent->ayah_no_hp }}</span></div>
                                    <div><span class="text-slate-400 block">Status Hidup</span> <span class="font-semibold text-slate-800">{{ $selectedStudent->ayah_status_hidup }}</span></div>
                                    <div class="col-span-2"><span class="text-slate-400 block">Alamat Rumah Lengkap Ayah</span> <span class="font-semibold text-slate-800">{{ $selectedStudent->ayah_alamat_jalan }}, RT {{ $selectedStudent->ayah_rt }}/RW {{ $selectedStudent->ayah_rw }}, {{ $selectedStudent->ayah_desa_kelurahan }}, {{ $selectedStudent->ayah_kecamatan }}, {{ $selectedStudent->ayah_kabupaten_kota }}, {{ $selectedStudent->ayah_provinsi }}, {{ $selectedStudent->ayah_kode_pos }}</span></div>
                                </div>
                            @else
                                <p class="text-slate-400 italic">Data Ayah Tidak Diisi</p>
                            @endif
                        </div>

                        <div>
                            <h4 class="text-blue-600 font-bold uppercase tracking-wider mb-3 text-[10px] border-b border-slate-100 pb-1">SECTION 4: Data Ibu Kandung</h4>
                            @if($selectedStudent->ibu_nama)
                                <div class="grid grid-cols-2 gap-x-4 gap-y-2.5">
                                    <div><span class="text-slate-400 block">Nama Ibu</span> <span class="font-semibold text-slate-800">{{ $selectedStudent->ibu_nama }}</span></div>
                                    <div><span class="text-slate-400 block">NIK Ibu</span> <span class="font-mono text-slate-800">{{ $selectedStudent->ibu_nik }}</span></div>
                                    <div><span class="text-slate-400 block">Tempat, Tgl Lahir Ibu</span> <span class="font-semibold text-slate-800">{{ $selectedStudent->ibu_tempat_lahir }}, {{ $selectedStudent->ibu_tanggal_lahir }}</span></div>
                                    <div><span class="text-slate-400 block">Kewarganegaraan / Agama</span> <span class="font-semibold text-slate-800">{{ $selectedStudent->ibu_kewarganegaraan }} / {{ $selectedStudent->ibu_agama }}</span></div>
                                    <div><span class="text-slate-400 block">Pendidikan / Pekerjaan</span> <span class="font-semibold text-slate-800">{{ $selectedStudent->ibu_pendidikan }} / {{ $selectedStudent->ibu_pekerjaan }} {{ $selectedStudent->ibu_pekerjaan_lainnya ? '('.$selectedStudent->ibu_pekerjaan_lainnya.')' : '' }}</span></div>
                                    <div><span class="text-slate-400 block">Penghasilan Bulanan</span> <span class="font-bold text-emerald-600">{{ $selectedStudent->ibu_penghasilan }}</span></div>
                                    <div><span class="text-slate-400 block">No. HP Ibu</span> <span class="font-semibold text-slate-800">{{ $selectedStudent->ibu_no_hp }}</span></div>
                                    <div><span class="text-slate-400 block">Status Hidup</span> <span class="font-semibold text-slate-800">{{ $selectedStudent->ibu_status_hidup }}</span></div>
                                    <div class="col-span-2"><span class="text-slate-400 block">Alamat Rumah Lengkap Ibu</span> <span class="font-semibold text-slate-800">{{ $selectedStudent->ibu_alamat_jalan }}, RT {{ $selectedStudent->ibu_rt }}/RW {{ $selectedStudent->ibu_rw }}, {{ $selectedStudent->ibu_desa_kelurahan }}, {{ $selectedStudent->ibu_kecamatan }}, {{ $selectedStudent->ibu_kabupaten_kota }}, {{ $selectedStudent->ibu_provinsi }}, {{ $selectedStudent->ibu_kode_pos }}</span></div>
                                </div>
                            @else
                                <p class="text-slate-400 italic">Data Ibu Tidak Diisi</p>
                            @endif
                        </div>

                        <div>
                            <h4 class="text-blue-600 font-bold uppercase tracking-wider mb-3 text-[10px] border-b border-slate-100 pb-1">SECTION 5: Kondisional Wali</h4>
                            <p class="mb-2"><span class="text-slate-400">Ada Wali Siswa? (Status Keberadaan Wali):</span> <span class="font-bold text-slate-900 text-sm">{{ $selectedStudent->status_keberadaan_wali }}</span></p>
                            @if($selectedStudent->wali_nama)
                                <div class="grid grid-cols-2 gap-x-4 gap-y-2.5 bg-slate-50 p-3 rounded-xl border border-slate-200/50">
                                    <div><span class="text-slate-400 block">Nama Wali</span> <span class="font-semibold text-slate-800">{{ $selectedStudent->wali_nama }}</span></div>
                                    <div><span class="text-slate-400 block">NIK Wali</span> <span class="font-mono text-slate-800">{{ $selectedStudent->wali_nik }}</span></div>
                                    <div><span class="text-slate-400 block">Hubungan Keluarga</span> <span class="font-semibold text-slate-800">{{ $selectedStudent->wali_hubungan }}</span></div>
                                    <div><span class="text-slate-400 block">No. HP Wali</span> <span class="font-bold text-blue-600">{{ $selectedStudent->wali_no_hp }}</span></div>
                                    <div><span class="text-slate-400 block">Pendidikan / Pekerjaan</span> <span class="font-semibold text-slate-800">{{ $selectedStudent->wali_pendidikan }} / {{ $selectedStudent->wali_pekerjaan }}</span></div>
                                    <div><span class="text-slate-400 block">Penghasilan Bulanan</span> <span class="font-bold text-emerald-600">{{ $selectedStudent->wali_penghasilan }}</span></div>
                                    <div class="col-span-2"><span class="text-slate-400 block">Alamat Tinggal Wali</span> <span class="font-semibold text-slate-800 text-[11px]">{{ $selectedStudent->wali_alamat_jalan }}, RT {{ $selectedStudent->wali_rt }}/RW {{ $selectedStudent->wali_rw }}, {{ $selectedStudent->wali_desa_kelurahan }}, {{ $selectedStudent->wali_kecamatan }}, {{ $selectedStudent->wali_kabupaten_kota }}, {{ $selectedStudent->wali_provinsi }}, {{ $selectedStudent->wali_kode_pos }}</span></div>
                                </div>
                            @else
                                <p class="text-slate-400 italic">Siswa Tidak Menggunakan Wali (Ikut Orang Tua)</p>
                            @endif
                        </div>

                        <div>
                            <h4 class="text-blue-600 font-bold uppercase tracking-wider mb-3 text-[10px] border-b border-slate-100 pb-1">SECTION 6: Data Tempat Tinggal (Siswa)</h4>
                            <div class="space-y-2.5">
                                <p><span class="text-slate-400 block">Alamat Rumah Lengkap Domisili Siswa:</span> <span class="font-semibold text-slate-900 text-sm leading-relaxed">{{ $selectedStudent->siswa_alamat_jalan }}, RT {{ $selectedStudent->siswa_rt }}/RW {{ $selectedStudent->siswa_rw }}, Kel. {{ $selectedStudent->siswa_desa_kelurahan }}, Kec. {{ $selectedStudent->siswa_kecamatan }}, {{ $selectedStudent->siswa_kabupaten_kota }}, Provinsi {{ $selectedStudent->siswa_provinsi }}, Kode Pos {{ $selectedStudent->siswa_kode_pos }}</span></p>
                                <div class="grid grid-cols-3 gap-2 text-center bg-slate-50 p-2.5 rounded-xl border border-slate-200/60">
                                    <div><span class="text-slate-400 text-[10px] block">Tinggal Bersama</span><span class="font-bold text-slate-800 text-[11px]">{{ $selectedStudent->siswa_tinggal_bersama }}</span></div>
                                    <div><span class="text-slate-400 text-[10px] block">Jarak ke Sekolah</span><span class="font-bold text-slate-800 text-[11px]">{{ $selectedStudent->siswa_jarak_sekolah }}</span></div>
                                    <div><span class="text-slate-400 text-[10px] block">Mode Transportasi</span><span class="font-bold text-slate-800 text-[11px]">{{ $selectedStudent->siswa_transportasi }}</span></div>
                                </div>
                            </div>
                        </div>

                        <div>
                            <h4 class="text-blue-600 font-bold uppercase tracking-wider mb-3 text-[10px] border-b border-slate-100 pb-1">SECTION 7: Data Kesehatan Jasmani</h4>
                            <div class="grid grid-cols-4 gap-2 text-center bg-slate-50 p-2.5 rounded-xl border border-slate-200/50 mb-2.5">
                                <div><span class="text-slate-400 block">Gol. Darah</span><span class="text-sm font-bold text-slate-900">{{ $selectedStudent->golongan_darah }}</span></div>
                                <div><span class="text-slate-400 block">Tinggi</span><span class="text-sm font-bold text-slate-900">{{ $selectedStudent->tinggi_badan }} cm</span></div>
                                <div><span class="text-slate-400 block">Berat</span><span class="text-sm font-bold text-slate-900">{{ $selectedStudent->berat_badan }} kg</span></div>
                                <div><span class="text-slate-400 block">Lkr. Kepala</span><span class="text-sm font-bold text-slate-900">{{ $selectedStudent->lingkar_kepala }} cm</span></div>
                            </div>
                            <div class="space-y-1 bg-slate-50/50 p-2.5 rounded-lg border border-slate-100">
                                <p><span class="text-slate-400">Penyakit Pilihan Sistem:</span> <span class="font-semibold text-slate-800">{{ $selectedStudent->penyakit_pilihan }}</span></p>
                                <p><span class="text-slate-400">Kelainan Pilihan Sistem:</span> <span class="font-semibold text-slate-800">{{ $selectedStudent->kelainan_pilihan }}</span></p>
                                <p><span class="text-slate-400">Detail Penyakit Pernah Diderita:</span> <span class="font-semibold text-slate-900">{{ $selectedStudent->penyakit_pernah_diderita ?? 'Tidak Ada' }}</span></p>
                                <p><span class="text-slate-400">Detail Kelainan Jasmani Tambahan:</span> <span class="font-semibold text-slate-900">{{ $selectedStudent->kelainan_jasmani ?? 'Tidak Ada' }}</span></p>
                            </div>
                        </div>

                        <div>
                            <h4 class="text-blue-600 font-bold uppercase tracking-wider mb-3 text-[10px] border-b border-slate-100 pb-1">SECTION 8: Data Pendidikan Sebelumnya (Asal Sekolah)</h4>
                            <div class="grid grid-cols-2 gap-3 bg-slate-50 p-3 rounded-xl border border-slate-200/40">
                                <div class="col-span-2"><span class="text-slate-400 block">Nama SMP Asal</span> <span class="font-bold text-slate-900 text-sm">{{ $selectedStudent->nama_smp }} (NPSN: {{ $selectedStudent->npsn_smp }})</span></div>
                                <div><span class="text-slate-400 block">Nomor Ijazah SMP</span> <span class="font-mono text-slate-800 font-bold">{{ $selectedStudent->nomor_ijazah ?? 'Belum Keluar / Diisi' }}</span></div>
                                <div><span class="text-slate-400 block">Tanggal Keluar Ijazah</span> <span class="font-semibold text-slate-800">{{ $selectedStudent->tanggal_ijazah ?? '-' }}</span></div>
                                <div class="col-span-2"><span class="text-slate-400">Lama Waktu Belajar di SMP:</span> <span class="font-bold text-slate-800">{{ $selectedStudent->lama_belajar_smp }} Tahun</span></div>
                            </div>
                        </div>

                        <div>
                            <h4 class="text-blue-600 font-bold uppercase tracking-wider mb-3 text-[10px] border-b border-slate-100 pb-1">SECTION 9: Kegemaran & Cita-Cita</h4>
                            <div class="space-y-1.5 bg-slate-50/70 p-3 rounded-xl border border-slate-100">
                                <p><span class="text-slate-400">Cita-Cita Masa Depan:</span> <span class="font-bold text-blue-700 text-[13px]">{{ $selectedStudent->cita_cita }}</span></p>
                                <div class="grid grid-cols-2 gap-2 mt-2 pt-2 border-t border-slate-200/60">
                                    <div><span class="text-slate-400 text-[10px] block">Hobi Kesenian:</span><span class="font-semibold text-slate-800">{{ $selectedStudent->hobi_kesenian ?? '-' }}</span></div>
                                    <div><span class="text-slate-400 text-[10px] block">Hobi Olahraga:</span><span class="font-semibold text-slate-800">{{ $selectedStudent->hobi_olahraga ?? '-' }}</span></div>
                                    <div><span class="text-slate-400 text-[10px] block">Hobi Organisasi:</span><span class="font-semibold text-slate-800">{{ $selectedStudent->hobi_organisasi ?? '-' }}</span></div>
                                    <div><span class="text-slate-400 text-[10px] block">Hobi Lainnya:</span><span class="font-semibold text-slate-800">{{ $selectedStudent->hobi_lainnya ?? '-' }}</span></div>
                                </div>
                            </div>
                        </div>

                        <div>
                            <h4 class="text-blue-600 font-bold uppercase tracking-wider mb-3 text-[10px] border-b border-slate-100 pb-1">SECTION 10: Data Tambahan Kesejahteraan</h4>
                            <div class="p-3 bg-amber-50/40 rounded-xl border border-amber-200/60 flex items-center justify-between">
                                <div>
                                    <span class="text-slate-400 font-semibold text-[10px] block">Mempunyai Kartu KIP / PKH / KKS?</span>
                                    <span class="font-bold text-slate-800 text-sm">{{ $selectedStudent->mempunyai_kip_pkh_kks ? 'YA, MEMILIKI' : 'TIDAK MEMILIKI' }}</span>
                                </div>
                                @if($selectedStudent->mempunyai_kip_pkh_kks)
                                    <div class="text-right">
                                        <span class="text-slate-400 text-[10px] block">Nomor Kartu Kesejahteraan:</span>
                                        <span class="font-mono font-bold text-amber-700 text-sm bg-amber-100/80 px-2 py-0.5 rounded border border-amber-200">{{ $selectedStudent->nomor_kartu_kesejahteraan }}</span>
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div>
                            <h4 class="text-blue-600 font-bold uppercase tracking-wider mb-1 text-[10px]">SECTION 11: Nama File Berkas Fisik</h4>
                            <p class="text-[10px] text-slate-400 mb-2">Nama file berkas digital yang terunggah di repositori cloud pendaftaran.</p>
                            <div class="space-y-1 font-mono text-[10px] bg-slate-50 p-2.5 rounded-lg text-slate-500 border border-slate-200/50">
                                <div class="truncate"><span class="font-bold text-slate-700">KK:</span> {{ $selectedStudent->file_kartu_keluarga }}</div>
                                <div class="truncate"><span class="font-bold text-slate-700">SKL:</span> {{ $selectedStudent->file_skl }}</div>
                                <div class="truncate"><span class="font-bold text-slate-700">SPMB:</span> {{ $selectedStudent->file_bukti_spmb }}</div>
                                <div class="truncate"><span class="font-bold text-slate-700">SP:</span> {{ $selectedStudent->file_surat_pernyataan }}</div>
                            </div>
                        </div>

                    </div>

                <!-- PANEL KANAN: PRATINJAU DOKUMEN (w-1/2) -->
                <div class="w-1/2 flex flex-col bg-slate-100 overflow-hidden">
                                        
                    <!-- Navigasi Tab -->
                    <div class="p-2.5 bg-slate-200/80 border-b border-slate-300 flex items-center gap-1">
                        <button @click="activeFileTab = 'kk'" :class="activeFileTab === 'kk' ? 'bg-blue-600 text-white font-bold' : 'bg-white hover:bg-slate-50 text-slate-700 font-medium'" class="flex-1 py-2 px-3 text-center rounded-xl text-[11px] shadow-sm transition-all flex items-center justify-center gap-1">
                            <span class="material-symbols-outlined text-[14px]">table_rows</span> Kartu Keluarga
                        </button>
                        <button @click="activeFileTab = 'skl'" :class="activeFileTab === 'skl' ? 'bg-blue-600 text-white font-bold' : 'bg-white hover:bg-slate-50 text-slate-700 font-medium'" class="flex-1 py-2 px-3 text-center rounded-xl text-[11px] shadow-sm transition-all flex items-center justify-center gap-1">
                            <span class="material-symbols-outlined text-[14px]">description</span> SKL
                        </button>
                        <button @click="activeFileTab = 'spmb'" :class="activeFileTab === 'spmb' ? 'bg-blue-600 text-white font-bold' : 'bg-white hover:bg-slate-50 text-slate-700 font-medium'" class="flex-1 py-2 px-3 text-center rounded-xl text-[11px] shadow-sm transition-all flex items-center justify-center gap-1">
                            <span class="material-symbols-outlined text-[14px]">confirmation_number</span> Bukti SPMB
                        </button>
                        <button @click="activeFileTab = 'pernyataan'" :class="activeFileTab === 'pernyataan' ? 'bg-blue-600 text-white font-bold' : 'bg-white hover:bg-slate-50 text-slate-700 font-medium'" class="flex-1 py-2 px-3 text-center rounded-xl text-[11px] shadow-sm transition-all flex items-center justify-center gap-1">
                            <span class="material-symbols-outlined text-[14px]">assignment_turned_in</span> Surat Pernyataan
                        </button>
                        <button @click="activeFileTab = 'ijazah'" :class="activeFileTab === 'ijazah' ? 'bg-blue-600 text-white font-bold' : 'bg-white hover:bg-slate-50 text-slate-700 font-medium'" class="flex-1 py-2 px-3 text-center rounded-xl text-[11px] shadow-sm transition-all flex items-center justify-center gap-1">
                            <span class="material-symbols-outlined text-[14px]">school</span> Ijazah
                        </button>
                    </div>

                    <!-- Wadah Render File iFrame -->
                    <div class="flex-1 p-4 flex flex-col justify-center items-center relative overflow-hidden h-full">

                        <!-- TAB 1: KARTU KELUARGA -->
                        <div class="w-full h-full" x-show="activeFileTab === 'kk'" x-cloak>
                            @if($selectedStudent->file_kartu_keluarga)
                                <div class="bg-white px-3 py-1.5 border border-slate-200 text-[10px] text-slate-500 rounded-t-lg truncate font-mono flex justify-between items-center">
                                    <span>Nama Berkas: {{ $selectedStudent->file_kartu_keluarga }}</span>
                                    <span class="text-emerald-600 font-bold flex items-center gap-0.5"><span class="material-symbols-outlined text-[12px]">lock</span> Terproteksi</span>
                                </div>
                                <iframe src="{{ route('admin.download.berkas', ['id' => $selectedStudent->id, 'jenis_berkas' => 'file_kartu_keluarga']) }}" class="w-full h-[92%] bg-white rounded-b-lg shadow-inner border border-slate-200"></iframe>
                            @else
                                <div class="text-center text-slate-400 py-12"><span class="material-symbols-outlined block text-3xl">warning</span> File Tidak Tersedia</div>
                            @endif
                        </div>

                        <!-- TAB 2: SKL -->
                        <div class="w-full h-full" x-show="activeFileTab === 'skl'" x-cloak>
                            @if($selectedStudent->file_skl)
                                <div class="bg-white px-3 py-1.5 border border-slate-200 text-[10px] text-slate-500 rounded-t-lg truncate font-mono flex justify-between items-center">
                                    <span>Nama Berkas: {{ $selectedStudent->file_skl }}</span>
                                    <span class="text-emerald-600 font-bold flex items-center gap-0.5"><span class="material-symbols-outlined text-[12px]">lock</span> Terproteksi</span>
                                </div>
                                <iframe src="{{ route('admin.download.berkas', ['id' => $selectedStudent->id, 'jenis_berkas' => 'file_skl']) }}" class="w-full h-[92%] bg-white rounded-b-lg shadow-inner border border-slate-200"></iframe>
                            @else
                                <div class="text-center text-slate-400 py-12"><span class="material-symbols-outlined block text-3xl">warning</span> File Tidak Tersedia</div>
                            @endif
                        </div>

                        <!-- TAB 3: BUKTI SPMB -->
                        <div class="w-full h-full" x-show="activeFileTab === 'spmb'" x-cloak>
                            @if($selectedStudent->file_bukti_spmb)
                                <div class="bg-white px-3 py-1.5 border border-slate-200 text-[10px] text-slate-500 rounded-t-lg truncate font-mono flex justify-between items-center">
                                    <span>Nama Berkas: {{ $selectedStudent->file_bukti_spmb }}</span>
                                    <span class="text-emerald-600 font-bold flex items-center gap-0.5"><span class="material-symbols-outlined text-[12px]">lock</span> Terproteksi</span>
                                </div>
                                <iframe src="{{ route('admin.download.berkas', ['id' => $selectedStudent->id, 'jenis_berkas' => 'file_bukti_spmb']) }}" class="w-full h-[92%] bg-white rounded-b-lg shadow-inner border border-slate-200"></iframe>
                            @else
                                <div class="text-center text-slate-400 py-12"><span class="material-symbols-outlined block text-3xl">warning</span> File Tidak Tersedia</div>
                            @endif
                        </div>

                        <!-- TAB 4: SURAT PERNYATAAN -->
                        <div class="w-full h-full" x-show="activeFileTab === 'pernyataan'" x-cloak>
                            @if($selectedStudent->file_surat_pernyataan)
                                <div class="bg-white px-3 py-1.5 border border-slate-200 text-[10px] text-slate-500 rounded-t-lg truncate font-mono flex justify-between items-center">
                                    <span>Nama Berkas: {{ $selectedStudent->file_surat_pernyataan }}</span>
                                    <span class="text-emerald-600 font-bold flex items-center gap-0.5"><span class="material-symbols-outlined text-[12px]">lock</span> Terproteksi</span>
                                </div>
                                <iframe src="{{ route('admin.download.berkas', ['id' => $selectedStudent->id, 'jenis_berkas' => 'file_surat_pernyataan']) }}" class="w-full h-[92%] bg-white rounded-b-lg shadow-inner border border-slate-200"></iframe>
                            @else
                                <div class="text-center text-slate-400 py-12"><span class="material-symbols-outlined block text-3xl">warning</span> File Tidak Tersedia</div>
                            @endif
                        </div>

                        <!-- TAB 5: IJAZAH ASLI -->
                        <div class="w-full h-full" x-show="activeFileTab === 'ijazah'" x-cloak>
                            @if($selectedStudent->file_ijazah)
                                <div class="bg-white px-3 py-1.5 border border-slate-200 text-[10px] text-slate-500 rounded-t-lg truncate font-mono flex justify-between items-center">
                                    <span>Nama Berkas: {{ $selectedStudent->file_ijazah }}</span>
                                    <span class="text-emerald-600 font-bold flex items-center gap-0.5"><span class="material-symbols-outlined text-[12px]">lock</span> Terproteksi</span>
                                </div>
                                <iframe src="{{ route('admin.download.berkas', ['id' => $selectedStudent->id, 'jenis_berkas' => 'file_ijazah']) }}" class="w-full h-[92%] bg-white rounded-b-lg shadow-inner border border-slate-200"></iframe>
                            @else
                                <div class="text-center text-slate-400 py-12">
                                    <span class="material-symbols-outlined block text-3xl mb-1">warning</span> 
                                    Ijazah Belum Diperbarui / Tidak Tersedia
                                </div>
                            @endif
                        </div>

                    </div> <!-- Tutup Wadah Render File (flex-1) -->
                </div> <!-- Tutup Panel Kanan (w-1/2) -->

            </div> <!-- Tutup Kontainer Tengah Flexrow Modal Body (Jika ada) -->

            <!-- FOOTER BAWAH: LUAS HORIZONTAL PENUH -->
            <div class="p-4 border-t border-slate-200 flex justify-between items-center bg-slate-50 w-full">
                <div class="text-xs text-slate-500 font-medium">
                    Periksa kembali kesesuaian berkas digital pendaftar sebelum menyelesaikan peninjauan.
                </div>
                <div class="flex gap-2">
                    <button wire:click="toggleVerifikasi({{ $selectedStudent->id }})" class="py-2 px-5 rounded-xl font-bold text-xs transition-all border shadow-sm {{ $selectedStudent->status_verifikasi === 'Proses' ? 'bg-blue-600 text-white border-blue-600 hover:bg-blue-700' : 'bg-white text-slate-700 border-slate-300 hover:bg-slate-100' }}">
                        {{ $selectedStudent->status_verifikasi === 'Proses' ? 'Setujui Validasi' : 'Kembalikan ke Proses' }}
                    </button>
                    <button wire:click="closeModal" class="bg-slate-800 text-white font-bold py-2 px-5 rounded-xl hover:bg-slate-900 text-xs transition-colors">
                        Tutup Detail
                    </button>
                </div>
            </div>

        </div> <!-- Tutup Dialog Modal Card -->
    </div> <!-- Tutup Background Overlay Backdrop -->
    @endif
</div>