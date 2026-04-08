    <nav class="fixed top-0 z-[999] w-full h-[70px] bg-[#ddaffc] px-6 flex justify-between items-center shadow-sm">
        <div class="flex items-center gap-4">
            <div id="hamburger" class="cursor-pointer md:hidden group">
                <div class="w-6 h-0.5 bg-gray-600 mb-1.5 transition-all"></div>
                <div class="w-6 h-0.5 bg-gray-600 mb-1.5 transition-all"></div>
                <div class="w-6 h-0.5 bg-gray-600 transition-all"></div>
            </div>
            
            <h1 class="text-2xl font-bold text-gray-800">ToList</h1>
            
            <div class="hidden md:block ml-25 relative w-64">
                <input type="text" 
                       class="w-full py-2 px-5 bg-[#fff] border-2 border-gray-300 rounded-full text-sm outline-none focus:border-purple-500 transition-all" 
                       placeholder="cari catatan">

                <button class="absolute right-1 top-1 bottom-1 px-4 text-purple-900 text-xs rounded-full hover:bg-purple-300 transition-colors">
                    <i data-feather="search"></i>
                </button>
            </div>
        </div>

        <div class="flex items-center">
            <a href="#" class="p-2 hover:bg-white/20 rounded-full transition-all">
                <i data-feather="user"></i>
            </a>
        </div>
    </nav>