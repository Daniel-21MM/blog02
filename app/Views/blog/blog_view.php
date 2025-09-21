<main id="main-content" class="bg-gradient-to-br from-slate-50 via-white to-purple-50">
    <div class="max-w-7xl mx-auto px-6 py-16">
        <div id="hero-section" class="text-center mb-20">
            <div class="inline-flex items-center space-x-2 bg-purple-100 text-purple-800 px-4 py-2 rounded-full text-sm font-medium mb-8">
                <i class="fa-solid fa-newspaper"></i>
                <span>Latest Insights</span>
            </div>

            <a href="/create" class="inline-flex items-center space-x-2 bg-purple-100 text-purple-800 px-4 py-2 rounded-full text-sm font-medium mb-8">
                <i class="fa-solid fa-plus"></i>
                <span>Create Post</span>
            </a>
            <h1 class="text-6xl font-bold text-slate-900 mb-8 leading-tight">
                Our <span class="text-gradient">Blog</span>
            </h1>
            <p class="text-xl text-slate-600 max-w-4xl mx-auto leading-relaxed font-light">
                Discover insights, tips, and stories from our team. Stay updated with the latest trends in technology, design, and innovation that shape the digital world.
            </p>
        </div>

        <div id="blog-grid" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10 mb-20">
            <?php if (!empty($posts)): ?>

                <?php
                $categoriaColors = [
                    1 => 'bg-purple-600',
                    2 => 'bg-emerald-600',
                    3 => 'bg-blue-600',
                    4 => 'bg-orange-600',
                    5 => 'bg-red-600',
                    6 => 'bg-indigo-600',
                ];
                ?>

                <?php foreach ($posts as $post): ?>
                    <article class="bg-white rounded-2xl shadow-luxury overflow-hidden group relative">
                        <div class="relative overflow-hidden">
                            <img class="w-full h-56 object-cover"
                                src="<?= base_url('img_posts/' . esc(basename($post['img_url']))) ?>"
                                alt="<?= esc($post['title']) ?>">

                            <div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent transition-opacity"></div>


                            <?php if (!empty($post['category']) && !empty($post['categorie_id'])):
                                $colorClass = $categoriaColors[$post['categorie_id']] ?? 'bg-gray-600';
                            ?>
                                <div class="absolute top-4 left-4">
                                    <span class="<?= $colorClass ?> text-white px-3 py-1 rounded-full text-xs font-semibold">
                                        <?= esc($post['category']) ?>
                                    </span>
                                </div>
                            <?php endif; ?>


                            <div class="absolute top-4 right-4 flex space-x-2">
                                <a href="<?= base_url('edit/' . $post['id']) ?>"
                                    class="bg-white text-purple-600 p-2 rounded-full shadow hover:bg-purple-600 hover:text-white transition-colors">
                                    <i class="fa-solid fa-pen"></i>
                                </a>
                                <a href="<?= base_url('delete/' . $post['id']) ?>"
                                    data-id="<?= $post['id'] ?>"
                                    class="delete-post bg-white text-red-600 p-2 rounded-full shadow hover:bg-red-600 hover:text-white transition-colors">
                                    <i class="fa-solid fa-trash"></i>
                                </a>

                            </div>

                        </div>

                        <div class="p-8">
                            <h3 class="text-2xl font-bold text-slate-900 mb-4 transition-colors group-hover:text-purple-600">
                                <?= esc($post['title']) ?>
                            </h3>
                            <p class="text-slate-600 mb-6 leading-relaxed">
                                <?= esc($post['description']) ?>
                            </p>
                            <div class="flex items-center justify-between pt-4 border-t border-slate-100">
                                <div class="flex items-center space-x-3">
                                    <?php
                                    $author = $post['author'] ?? 'A';
                                    $initial = strtoupper(substr($author, 0, 1));
                                    ?>
                                    <div class="w-8 h-8 rounded-full bg-purple-600 flex items-center justify-center text-white font-bold">
                                        <?= $initial ?>
                                    </div>
                                    <div>
                                        <span class="text-sm font-semibold text-slate-900">
                                            <?= esc($author) ?>
                                        </span>
                                        <p class="text-xs text-slate-500">
                                            <?= date('F j, Y', strtotime($post['creation_date'])) ?>
                                        </p>
                                    </div>
                                </div>
                                <div class="flex items-center space-x-4 text-sm text-slate-500">
                                    <span class="flex items-center space-x-1">
                                        <i class="fa-solid fa-clock"></i>
                                        <span>5 min read</span>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </article>
                <?php endforeach; ?>

            <?php else: ?>
                <div class="col-span-3 flex justify-center items-center h-64">
                    <p class="text-lg font-bold text-purple-600 text-center">There are no posts to display.</p>
                </div>
            <?php endif; ?>
        </div>

        <div id="pagination" class="flex items-center justify-center space-x-3">
            <button class="px-4 py-3 text-slate-400 bg-white border border-slate-200 rounded-xl hover:bg-slate-50 disabled:opacity-50 shadow-sm" disabled="">
                <i class="fa-solid fa-chevron-left"></i>
            </button>

            <button class="px-5 py-3 text-white gradient-bg border-0 rounded-xl shadow-lg font-semibold">
                1
            </button>

            <button class="px-5 py-3 text-slate-700 bg-white border border-slate-200 rounded-xl hover:bg-slate-50 hover:border-purple-200 transition-all shadow-sm font-medium">
                2
            </button>

            <button class="px-5 py-3 text-slate-700 bg-white border border-slate-200 rounded-xl hover:bg-slate-50 hover:border-purple-200 transition-all shadow-sm font-medium">
                3
            </button>

            <span class="px-3 text-slate-400 font-medium">...</span>

            <button class="px-5 py-3 text-slate-700 bg-white border border-slate-200 rounded-xl hover:bg-slate-50 hover:border-purple-200 transition-all shadow-sm font-medium">
                8
            </button>

            <button class="px-4 py-3 text-slate-700 bg-white border border-slate-200 rounded-xl hover:bg-slate-50 hover:border-purple-200 transition-all shadow-sm">
                <i class="fa-solid fa-chevron-right"></i>
            </button>
        </div>

    </div>
</main>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const deleteButtons = document.querySelectorAll('.delete-post');

        deleteButtons.forEach(btn => {
            btn.addEventListener('click', function(e) {
                e.preventDefault();

                const postId = this.dataset.id;
                const url = this.href;

                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#6B46C1',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!',
                    cancelButtonText: 'Cancel'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = url;
                    }
                });
            });
        });
    });
</script>