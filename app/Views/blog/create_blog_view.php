<main id="main-content" class="bg-gradient-to-br from-slate-50 via-white to-purple-50 min-h-screen py-16">
    <div class="max-w-4xl mx-auto px-6">
        <div class="text-center mb-12">
            <a href="/home" class="inline-flex items-center space-x-2 bg-purple-100 text-purple-800 px-4 py-2 rounded-full text-sm font-medium mb-6">
                <i class="fa-solid fa-arrow-left"></i>
                <span>Back To Posts</span>
            </a>

            <h1 class="text-4xl font-bold text-slate-900 mb-4 leading-tight">
                Create <span class="text-gradient">New Post</span>
            </h1>
            <p class="text-lg text-slate-600 max-w-2xl mx-auto leading-relaxed font-light">
                Share your insights, tips, and stories with our community. Fill out the form below to create your new blog post.
            </p>
        </div>

        <div class="bg-white rounded-2xl shadow-luxury overflow-hidden">
            <div class="gradient-bg p-8 text-center">
                <i class="fa-solid fa-pen-nib text-white text-4xl mb-4"></i>
                <h2 class="text-2xl font-bold text-white">Compose Your Masterpiece</h2>
            </div>

            <form class="p-8" action="/create" method="POST" enctype="multipart/form-data" novalidate>
                <?= csrf_field() ?>
                <div class="space-y-8">

                    <div>
                        <label for="title" class="block text-sm font-medium text-slate-700 mb-2">
                            <i class="fa-solid fa-heading text-purple-500 mr-2"></i>
                            Title
                        </label>
                        <input
                            type="text"
                            id="title"
                            name="title"
                            value="<?= old('title') ?>"
                            required
                            class="py-3 px-4 block w-full border border-slate-200 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-purple-500"
                            placeholder="Enter a captivating title for your post">
                        <?php if (session('errors.title')): ?>
                            <p class="mt-1 text-sm text-red-600"><?= session('errors.title') ?></p>
                        <?php endif; ?>
                    </div>

                    <div>
                        <label for="categorie_id" class="block text-sm font-medium text-slate-700 mb-2">
                            <i class="fa-solid fa-tag text-purple-500 mr-2"></i>
                            Category
                        </label>
                        <select
                            id="categorie_id"
                            name="categorie_id"
                            required
                            class="py-3 px-4 block w-full border border-slate-200 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-purple-500">
                            <option value="">-- Select a category --</option>
                            <?php foreach ($categories as $category): ?>
                                <option value="<?= $category['id'] ?>" <?= old('categorie_id') == $category['id'] ? 'selected' : '' ?>>
                                    <?= esc($category['name']) ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                        <?php if (session('errors')['categorie_id'] ?? false): ?>
                            <p class="mt-1 text-sm text-red-600"><?= session('errors')['categorie_id'] ?></p>
                        <?php endif; ?>
                    </div>

                    <div>
                        <label for="description" class="block text-sm font-medium text-slate-700 mb-2">
                            <i class="fa-solid fa-align-left text-purple-500 mr-2"></i>
                            Description
                        </label>
                        <textarea
                            id="description"
                            name="description"
                            rows="4"
                            required
                            class="py-3 px-4 block w-full border border-slate-200 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-purple-500"
                            placeholder="Write a compelling description that will make readers want to explore your full post..."><?= old('description') ?></textarea>
                        <?php if (session('errors.description')): ?>
                            <p class="mt-1 text-sm text-red-600"><?= session('errors.description') ?></p>
                        <?php endif; ?>
                    </div>

                    <div>
                        <label for="creation-date" class="block text-sm font-medium text-slate-700 mb-2">
                            <i class="fa-solid fa-calendar-days text-purple-500 mr-2"></i>
                            Creation Date
                        </label>
                        <input
                            type="date"
                            id="creation-date"
                            name="creation-date"
                            value="<?= old('creation-date') ?>"
                            required
                            class="py-3 px-4 block w-full border border-slate-200 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-purple-500">
                        <?php if (session('errors')['creation-date'] ?? false): ?>
                            <p class="mt-1 text-sm text-red-600"><?= session('errors')['creation-date'] ?></p>
                        <?php endif; ?>
                    </div>

                    <div>
                        <label for="img_url" class="block text-sm font-medium text-slate-700 mb-2">
                            <i class="fa-solid fa-image text-purple-500 mr-2"></i>
                            Featured Image
                        </label>
                        <input
                            type="file"
                            id="img_url"
                            name="img_url"
                            accept=".jpg,.jpeg,.png,.webp"
                            required
                            class="py-3 px-4 block w-full border border-slate-200 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-purple-500">
                        <?php if (session('errors')['img_url'] ?? false): ?>
                            <p class="mt-1 text-sm text-red-600"><?= session('errors')['img_url'] ?></p>
                        <?php endif; ?>
                    </div>

                    <div class="flex items-center justify-between pt-8 border-t border-slate-200">
                        <button type="submit" class="w-full px-6 py-3 gradient-bg text-white rounded-xl shadow-lg hover:shadow-xl transition-all font-medium">
                            <i class="fa-solid fa-plus mr-2"></i>
                            Create Post
                        </button>
                    </div>

                </div>
            </form>

        </div>

    </div>
</main>