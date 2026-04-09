<div class="min-h-screen flex items-center justify-center bg-purple-100">
<div class="w-full max-w-5xl min-h-[550px] bg-white rounded-3xl shadow-2xl grid grid-cols-1 md:grid-cols-2 overflow-hidden">

    <!-- KIRI (TEKS) -->
    <div class="bg-purple-300 flex flex-col items-center justify-center text-white p-10 text-center">
        
    <h1 class="text-6xl md:text-7xl font-bold mb-6 text-[#191944]">
        TOLIST
    </h1>

    <p class="text-base md:text-2xl font-bold text-[#191944] leading-relaxed">
        Start writing your notes <br>
        and save them to your <br>
        <span class="text-white font-bold">TOLIST</span>
    </p>

</div>

    <!-- KANAN (FORM) -->
    <div class="flex items-center justify-center p-8 sm:p-10 bg-purple-200">
        <div class="w-full max-w-sm">

            <div class="w-14 h-14 mx-auto mb-3 flex items-center justify-center bg-[#191944] rounded-full">
                 <i class="fa-solid fa-user text-white text-xl"></i>
            </div>

            <h2 class="text-2xl font-bold mb-6 text-center text-[#191944]">Login</h2>

            <!-- Username -->
            <form action="<?= BASEURL ?>Auth/prosesLogin" method="post">
                <!-- Username -->
                <input type="text" placeholder="Username" name="username"
                    class="w-full mb-4 px-4 py-3 border-2 border-[#191944] rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-600">

                <!-- Password -->
                <input type="password" placeholder="Password" name="password"
                    class="w-full mb-2 px-4 py-3 border-2 border-[#191944] rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-600">

                <!-- Forget -->
                <div class="text-right mb-6">
                    <a href="#" class="text-sm text-[#191944] font-bold :underline">
                        Forgot Password?
                    </a>
                </div>

                <!-- Button -->
                <button type="submit" class="w-full bg-[#191944] hover:bg-purple-600 transition text-white py-3 rounded-lg font-semibold">
                    Login
                </button>

            </form>

            <!-- Sign Up -->
            <p class="text-center text-sm mt-4 text-[#191944] font-semibold">
                   don't have an account? 
                <a href="<?= BASEURL ?>auth/regis" class="text-purple-600 font-semibold hover:underline">
                   Sign Up
                </a>
            </p>

        </div>
    </div>

</div>
</div>

