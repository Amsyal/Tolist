<main class="flex-1 mt-[70px] md:ml-[200px] p-6 md:p-12 flex justify-center">
    <div class="bg-white w-full max-w-2xl p-8 rounded-2xl shadow-xl border border-purple-100">
        <div class="mb-8">
            <h2 class="text-2xl font-bold text-gray-800">Upload Catatan Baru</h2>
            <p class="text-gray-500">Bagikan catatan kuliahmu dengan mahasiswa lainnya.</p>
        </div>

        <!-- Pastikan ACTION mengarah ke method uploadAction di Controller Home -->
        <form action="<?= BASEURL; ?>Upload/prosesUpload" method="POST" enctype="multipart/form-data" class="space-y-6">
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Judul Catatan</label>
                <input type="text" name="title" placeholder="Contoh: Algoritma Minggu 1 - Sorting" required
                    class="w-full px-4 py-3 rounded-xl border-2 border-gray-100 focus:border-[#ddaffc] focus:outline-none transition-all bg-[#fff6eb]/30">
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Mata Kuliah</label>
                    <input list="course-options" name="course_name" id="course_choice" required
                        placeholder="Cari atau ketik baru..."
                        class="w-full px-4 py-3 rounded-xl border-2 border-gray-100 focus:border-[#ddaffc] focus:outline-none transition-all bg-[#fff6eb]/30 text-gray-700">
                    <datalist id="course-options">
                        <?php foreach($data['courses'] as $course) : ?>
                            <option value="<?= $course['course_name']; ?>">
                        <?php endforeach; ?>
                    </datalist>
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Tag</label>
                    <input type="text" name="tag" placeholder="data, coding, rumus" 
                        class="w-full px-4 py-3 rounded-xl border-2 border-gray-100 focus:border-[#ddaffc] focus:outline-none transition-all bg-[#fff6eb]/30">
                </div>
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">File Catatan (PDF/Gambar)</label>
                <div id="drop-area" class="border-3 border-dashed border-purple-200 rounded-2xl p-10 flex flex-col items-center justify-center bg-purple-50/30 hover:bg-purple-50 transition-colors cursor-pointer group">
                    <div class="p-4 bg-white rounded-full shadow-sm mb-4 group-hover:scale-110 transition-transform">
                        <i data-feather="upload-cloud" class="text-purple-500 w-8 h-8"></i>
                    </div>
                    <p id="file-label" class="text-sm text-gray-600"><span class="font-bold text-purple-600">Klik untuk upload</span> atau drag and drop</p>
                    <p class="text-xs text-gray-400 mt-1">Maksimal 10MB (PDF, JPG, PNG)</p>
                    <!-- Input file yang sebenarnya hidden -->
                    <input type="file" name="file_catatan" class="hidden" id="file-input" accept=".pdf,image/*" required>
                </div>
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Catatan</label>
                <textarea name="description" rows="3" placeholder="Apa yang dipelajari?" 
                    class="w-full px-4 py-3 rounded-xl border-2 border-gray-100 focus:border-[#ddaffc] focus:outline-none transition-all bg-[#fff6eb]/30 resize-none"></textarea>
            </div>

            <div class="flex gap-4 pt-4">
                <a href="<?= BASEURL; ?>Home" class="flex-1 py-3 px-6 border-2 border-gray-100 text-gray-500 font-bold rounded-xl hover:bg-gray-50 text-center">Batal</a>
                <button type="submit" class="flex-1 py-3 px-6 bg-[#ddaffc] text-purple-900 font-bold rounded-xl hover:shadow-lg cursor-pointer hover:opacity-90 transition-all">
                    Upload Sekarang
                </button>
            </div>
        </form>
    </div>
</main>

<script>
    const dropArea = document.getElementById('drop-area');
    const fileInput = document.getElementById('file-input');
    const fileLabel = document.getElementById('file-label');

    dropArea.addEventListener('click', () => fileInput.click());

    fileInput.addEventListener('change', function() {
        if (this.files.length > 0) {
            fileLabel.innerHTML = `File terpilih: <span class="font-bold text-purple-600">${this.files[0].name}</span>`;
            dropArea.classList.add('bg-purple-100');
        }
    });

    // Fitur Drag and Drop Sederhana
    dropArea.addEventListener('dragover', (e) => {
        e.preventDefault();
        dropArea.classList.add('border-purple-500');
    });

    dropArea.addEventListener('dragleave', () => {
        dropArea.classList.remove('border-purple-500');
    });

    dropArea.addEventListener('drop', (e) => {
        e.preventDefault();
        fileInput.files = e.dataTransfer.files;
        fileLabel.innerHTML = `File terpilih: <span class="font-bold text-purple-600">${e.dataTransfer.files[0].name}</span>`;
    });

    const form = document.querySelector('form');
    const submitBtn = form.querySelector('button[type="submit"]');

    form.addEventListener('submit', function() {
        submitBtn.innerHTML = 'Sedang Mengupload...';
        submitBtn.disabled = true; // Mencegah user klik dua kali
        submitBtn.classList.add('opacity-50', 'cursor-not-allowed');
    });
</script>