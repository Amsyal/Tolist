<main class=" flex-1 mt-[70px] md:ml-[200px] p-6 md:p-12">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 justify-items-center">
        <?php foreach( $data['notes'] as $note ): ?>
            <a href="<?= HOME_URL . 'detailNote/' . $note['id'] ?>">
                <div class=" w-full max-w-[400px] h-[300px] p-4 rounded-xl border border-gray-200 shadow-xl lg:w-[240px] hover:shadow-2xl/40 transition-shadow">
                    <div class="w-full h-[150px] rounded-lg overflow-hidden mb-4">
                        <img src="<?= BASEURL . $note['file_path']; ?>" alt="catatan" class="w-full h-full object-cover">
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 leading-tight mb-2 line-clamp-2"><?= $note['title']; ?></h3>
                    <span class="text-xs font-medium px-2 py-1 bg-gray-100 rounded text-gray-600 uppercase tracking-wider"><?= $note['tags']; ?></span>
                    <div id="bookmark-btn" class="mt-3 flex justify-end cursor-pointer">
                        <i id="bookmark-icon" data-feather="bookmark" class="w-5 h-5 transition-colors"></i>
                    </div>  
                </div>
            </a>
        <?php endforeach; ?>
    </div>           
</main>

