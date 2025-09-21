<main id="main-content" class="bg-gradient-to-br from-slate-50 via-white to-purple-50 min-h-screen flex items-center justify-center py-16">
    <div class="max-w-md w-full mx-auto px-6">
        <div class="bg-white rounded-2xl shadow-luxury overflow-hidden card-hover">
            <div class="gradient-bg p-8 text-center">
                <div class="w-16 h-16 gradient-bg rounded-xl flex items-center justify-center text-white shadow-lg mx-auto mb-4">
                    <span class="text-2xl font-bold">B</span>
                </div>
                <h1 class="text-3xl font-bold text-white mb-2">Welcome Back</h1>
                <p class="text-purple-100">Sign in to your BlogSpace account</p>
            </div>

            <div class="p-8">

                <?php if (session()->has('errors')): ?>
                    <div class="mb-4 p-4 bg-red-100 text-red-700 rounded-xl">
                        <ul class="list-disc pl-5">
                            <?php foreach (session('errors') as $error): ?>
                                <li><?= esc($error) ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php endif; ?>

                <?php if (session()->has('success')): ?>
                    <div class="mb-4 p-4 bg-green-100 text-green-700 rounded-xl">
                        <?= esc(session('success')) ?>
                    </div>
                <?php endif; ?>


                <form class="space-y-6" action="/store" method="POST" novalidate>
                    <?= csrf_field() ?>
                    <div>
                        <label for="email" class="block text-sm font-medium text-slate-700 mb-2">Email Address</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fa-solid fa-envelope text-slate-400"></i>
                            </div>
                            <input id="email" name="email" type="email" autocomplete="email" required
                                value="<?= old('email') ?>"
                                class="py-3 px-4 pl-10 block w-full border border-slate-200 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-purple-500"
                                placeholder="you@example.com">
                        </div>
                    </div>

                    <div>
                        <div class="flex items-center justify-between mb-2">
                            <label for="password" class="block text-sm font-medium text-slate-700">Password</label>
                            <a href="#" class="text-sm text-purple-600 hover:text-purple-500 font-medium">Forgot password?</a>
                        </div>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fa-solid fa-lock text-slate-400"></i>
                            </div>
                            <input id="password" name="password" type="password" autocomplete="current-password" required
                                class="py-3 px-4 pl-10 block w-full border border-slate-200 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-purple-500"
                                placeholder="••••••••">
                        </div>
                    </div>

                    <div>
                        <button type="submit"
                            class="w-full flex justify-center py-3 px-4 border border-transparent rounded-xl shadow-sm text-sm font-medium text-white gradient-bg hover:opacity-90 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500 transition-all">
                            Sign in
                        </button>
                    </div>
                </form>

                <div class="mt-6">
                    <div class="relative">
                        <div class="absolute inset-0 flex items-center">
                            <div class="w-full border-t border-slate-200"></div>
                        </div>
                        <div class="relative flex justify-center text-sm">
                            <span class="px-2 bg-white text-slate-500">Or continue with</span>
                        </div>
                    </div>

                    <div class="mt-6 grid grid-cols-2 gap-3">
                        <div>
                            <a href="#" class="w-full inline-flex justify-center py-2 px-4 border border-slate-200 rounded-xl shadow-sm bg-white text-sm font-medium text-slate-700 hover:bg-slate-50">
                                <i class="fa-brands fa-google text-red-500"></i>
                                <span class="ml-2">Google</span>
                            </a>
                        </div>
                        <div>
                            <a href="#" class="w-full inline-flex justify-center py-2 px-4 border border-slate-200 rounded-xl shadow-sm bg-white text-sm font-medium text-slate-700 hover:bg-slate-50">
                                <i class="fa-brands fa-github text-slate-900"></i>
                                <span class="ml-2">GitHub</span>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="mt-6 text-center">
                    <p class="text-sm text-slate-600">
                        Don't have an account?
                        <a href="#" class="font-medium text-purple-600 hover:text-purple-500">Sign up now</a>
                    </p>
                </div>
            </div>
        </div>

        <div class="mt-8 text-center">
            <p class="text-xs text-slate-500">
                © 2025 BlogSpace. By signing in, you agree to our
                <a href="#" class="text-purple-600 hover:text-purple-500">Terms of Service</a> and
                <a href="#" class="text-purple-600 hover:text-purple-500">Privacy Policy</a>.
            </p>
        </div>
    </div>
</main>