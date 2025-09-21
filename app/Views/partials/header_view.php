<header id="header" class="glass-effect border-b border-white/20 px-6 py-5 shadow-sm sticky top-0 z-50">
    <div class="max-w-7xl mx-auto flex items-center justify-between">
        <div class="flex items-center space-x-8">
            <div class="flex items-center space-x-4">
                <div class="w-12 h-12 gradient-bg rounded-xl flex items-center justify-center text-white shadow-lg">
                    <span class="text-xl font-bold">B</span>
                </div>
                <span class="text-2xl font-bold text-gradient">BlogSpace</span>
            </div>
            <nav class="text-slate-600 flex items-center space-x-2 text-sm font-medium">
                <span class="hover:text-slate-900 transition-colors cursor-pointer">Home</span>
                <i class="fa-solid fa-chevron-right text-xs text-slate-400"></i>
                <span class="text-slate-900 font-semibold">Blog</span>
            </nav>
        </div>

        <div class="flex items-center space-x-4">

            <button class="w-10 h-10 bg-slate-100 hover:bg-slate-200 rounded-xl flex items-center justify-center transition-colors group">
                <i class="fa-solid fa-search text-slate-600 group-hover:text-slate-800"></i>
            </button>

            <button class="w-10 h-10 bg-slate-100 hover:bg-slate-200 rounded-xl flex items-center justify-center transition-colors group relative">
                <i class="fa-solid fa-bell text-slate-600 group-hover:text-slate-800"></i>
                <span class="absolute -top-1 -right-1 w-3 h-3 bg-red-500 rounded-full"></span>
            </button>

            <div class="flex items-center space-x-3 pl-4 border-l border-slate-200">
                <img src="https://storage.googleapis.com/uxpilot-auth.appspot.com/avatars/avatar-2.jpg"
                    alt="User Avatar" class="w-10 h-10 rounded-xl object-cover ring-2 ring-purple-100">
                <span class="font-semibold text-slate-800">
                    <?= esc(session('userName')) ?>
                </span>
            </div>
        </div>

    </div>
</header>