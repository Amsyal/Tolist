<?php 
    $url = isset($_GET['url']) ? explode('/', rtrim($_GET['url'], '/')) : ['home'];
    $active_controller = strtolower($url[0]); 
?>


<aside id="nav-links" 
        class="fixed top-[70px] left-0 z-[888] w-[200px] h-[calc(100vh-70px)] bg-[#191944] p-4 flex flex-col justify-between transition-transform duration-300 transform md:translate-x-0 -translate-x-full">
    
    <ul class="space-y-4">
        <li>
            <a href="<?= BASEURL ?>Home/index/" class="flex w-full py-2 px-4 text-center font-bold rounded-lg <?= ($active_controller == 'home') ? 'text-purple-900 bg-[#ddaffc]' :  'text-gray-800 bg-[#fff]' ?>">
                <i data-feather="home" class="mr-2"></i>home
            </a>
        </li>
        <li>
            <a href="<?= BASEURL ?>Upload/index/" class="flex w-full py-2 px-4 text-center font-bold rounded-lg  <?= ($active_controller == 'upload') ? 'text-purple-900 bg-[#ddaffc]' :  'text-gray-800 bg-[#fff]' ?>">
                <i data-feather="edit" class="mr-2"></i>upload
            </a>
        </li>
        <li>
            <a href="#" class="flex w-full py-2 px-4 text-center font-bold rounded-lg <?= ($active_controller == 'tp-do') ? 'text-purple-900 bg-[#ddaffc]' :  'text-gray-800 bg-[#fff]' ?>">
                <i data-feather="list" class="mr-2"></i>to-do list
            </a>
        </li>
        <li>
            <a href="saved.html" class="flex w-full py-2 px-4 text-center font-bold rounded-lg <?= ($active_controller == 'bookmarked') ? 'text-purple-900 bg-[#ddaffc]' :  'text-gray-800 bg-[#fff]' ?>">
                <i data-feather="book" class="mr-2"></i> bookmarked
            </a>    
        </li>
    </ul>

    <div class="mb-4">
        <a href="<?= BASEURL ?>Auth/logout" class="flex w-full py-2 px-4 bg-[#ddaffc] text-center font-bold rounded-lg text-gray-800 hover:opacity-90 transition-opacity">
            <i data-feather="log-out" class="mr-2"></i> logout
        </a>
    </div>
</aside>