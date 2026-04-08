
<main class="flex-1 mt-[70px] md:ml-[200px] p-6 md:p-12">
<!-- Container Utama -->
<div class="min-h-screen bg-gray-50 py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-3xl mx-auto bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
        
        <!-- Header Gambar (Jika ada file_path) -->
        <div class="relative h-64 w-full bg-gray-200">
            <img src="<?= BASEURL; ?>/<?= $data['note']['file_path']; ?>" 
                 alt="Cover <?= $data['note']['title']; ?>" 
                 class="w-full h-full object-cover">
            <!-- Badge Tag di atas gambar -->
            <span class="absolute top-4 left-4 bg-indigo-600 text-white text-xs font-bold px-3 py-1 rounded-full uppercase tracking-wider">
                <?= $data['note']['tags']; ?>
            </span>
        </div>

        <!-- Konten Utama -->
        <div class="p-8">
            <!-- Meta Info: Tanggal & Course name -->
            <div class="flex items-center text-sm text-gray-500 mb-4">
                <span class="flex items-center">
                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="User8-12 5V12l5 5m7-5a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    <?= date('d M Y', strtotime($data['note']['created_at'])); ?>
                </span>
                <span class="mx-2">•</span>
                <span class="bg-gray-100 text-gray-700 px-2 py-0.5 rounded text-xs font-medium">
                    Course : <?= $data['note']['course_name']; ?>
                </span>
            </div>

            <!-- Judul Catatan -->
            <h1 class="text-3xl font-extrabold text-gray-900 leading-tight mb-6">
                <?= $data['note']['title']; ?>
            </h1>

            <!-- Garis Pembatas Halus -->
            <hr class="border-gray-100 mb-6">

            <!-- Deskripsi / Isi Catatan -->
            <div class="prose prose-indigo max-w-none text-gray-700 leading-relaxed">
                <p class="text-lg">
                    <?= $data['note']['description']; ?>
                </p>
                <!-- Anda bisa menambah teks simulasi jika deskripsi asli pendek -->
                <p class="mt-4 text-gray-500 italic text-sm">
                    Dicatat oleh : <?= $data['note']['username']; ?>
                </p>
            </div>

            <!-- Tombol Aksi -->
            <div class="mt-10 flex items-center justify-between border-t border-gray-100 pt-6">
                <a href="<?= BASEURL; ?>Home" class="inline-flex items-center text-indigo-600 hover:text-indigo-800 font-semibold transition-colors">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                    Kembali ke Daftar
                </a>
                
                <div class="flex space-x-3">
                    <button class="bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700 transition shadow-md shadow-indigo-100 text-sm font-medium">
                        Unduh PDF
                    </button>
                </div>
            </div>
        </div>
    </div>
</div> 
</main>


