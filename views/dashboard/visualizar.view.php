<?php $validacoes = flash()->get('validacoes'); ?>

<?php require base_path('views/dashboard/index.view.php'); ?>

<div class="w-screen h-screen fixed left-0 top-0 bg-gray-700/50 backdrop-blur-sm flex items-center justify-center">
    <div class="bg-[#111111] rounded-2xl p-6 w-[345px] h-fit">
        <div class="flex justify-between mb-5">
            <h2 class="text-xl font-bold text-white grow">Visualizar Informações</h2>
            <a href="/dashboard">
                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#5e5e5e">
                    <path d="m256-200-56-56 224-224-224-224 56-56 224 224 224-224 56 56-224 224 224 224-56 56-224-224-224 224Z" />
                </svg>
            </a>
        </div>

        <form action="/dashboard/visualizar" class="px-4 py-5 flex flex-col gap-3" method="post">
            <label class="form-control  w-full">
                <div class="label">
                    <span class="label-text text-neutral-200">Senha</span>
                </div>
                <input type="password" name="senha" class="input input-bordered border-2 border-neutral-800 text-neutral-300 bg-transparent focus:outline-neutral-600" />
                <?php if (isset($validacoes['senha'])): ?>
                    <div class="label">
                        <span class="label-text-alt text-error"><?= $validacoes['senha'][0] ?></span>
                    </div>
                <?php endif; ?>
            </label>

            <div class="flex items-center justify-end gap-3 mt-4">
                <a href="/dashboard" class="rounded-xl bg-[#303030] text-white font-bold p-3 w-fit block">Voltar</a>
                <button type="submit" class="rounded-xl bg-lime-400 text-neutral-900 font-bold p-3">Confirmar</button>
            </div>
        </form>
    </div>
</div>