<?php $validacoes = flash()->get('validacoes'); ?>

<?php require base_path('views/dashboard/index.view.php');  ?>


<div class="w-screen h-screen fixed left-0 top-0 bg-gray-700/50 backdrop-blur-sm flex items-center justify-center">
    <div class="bg-[#111111] rounded-2xl p-6 w-[345px] h-fit">
        <div class="flex justify-between mb-5">
            <h2 class="text-xl font-bold text-white grow">Editar Contato</h2>
            <a href="/dashboard">
                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#5e5e5e">
                    <path d="m256-200-56-56 224-224-224-224 56-56 224 224 224-224 56 56-224 224 224 224-56 56-224-224-224 224Z" />
                </svg>
            </a>
        </div>

        <form action="/dashboard/editar-contato" class="px-4 py-5 flex flex-col gap-3" method="post" enctype="multipart/form-data">
            <input type="hidden" name="contato_id" value="<?= $contatoEdit->id ?>">

            <div class="flex flex-col items-center">
                <div class="flex items-center justify-center w-16 h-16 rounded-xl bg-[#1b1b1b] mb-3 relative">
                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#5e5e5e" class="w-10 h-10">
                        <path d="M234-276q51-39 114-61.5T480-360q69 0 132 22.5T726-276q35-41 54.5-93T800-480q0-133-93.5-226.5T480-800q-133 0-226.5 93.5T160-480q0 59 19.5 111t54.5 93Zm246-164q-59 0-99.5-40.5T340-580q0-59 40.5-99.5T480-720q59 0 99.5 40.5T620-580q0 59-40.5 99.5T480-440Zm0 360q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Zm0-80q53 0 100-15.5t86-44.5q-39-29-86-44.5T480-280q-53 0-100 15.5T294-220q39 29 86 44.5T480-160Zm0-360q26 0 43-17t17-43q0-26-17-43t-43-17q-26 0-43 17t-17 43q0 26 17 43t43 17Zm0-60Zm0 360Z" />
                    </svg>
                    <?php if ($contatoEdit->foto): ?>
                        <img src="../<?= $contatoEdit->foto ?>" id="preview" alt="" class="w-full z-10 h-full object-cover absolute left-0 top-0 rounded-xl">
                    <?php else: ?>
                        <img id="preview" src="" alt="" class="hidden w-full z-10 h-full object-cover absolute left-0 top-0 rounded-xl">
                    <?php endif; ?>
                </div>
                <label for="foto" class="cursor-pointer text-xs text-white flex items-center gap-1 border-2 border-[#1b1b1b] rounded-xl w-fit p-2">
                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#ffffff">
                        <path d="M240-160q-33 0-56.5-23.5T160-240v-80q0-17 11.5-28.5T200-360q17 0 28.5 11.5T240-320v80h480v-80q0-17 11.5-28.5T760-360q17 0 28.5 11.5T800-320v80q0 33-23.5 56.5T720-160H240Zm200-486-75 75q-12 12-28.5 11.5T308-572q-11-12-11.5-28t11.5-28l144-144q6-6 13-8.5t15-2.5q8 0 15 2.5t13 8.5l144 144q12 12 11.5 28T652-572q-12 12-28.5 12.5T595-571l-75-75v286q0 17-11.5 28.5T480-320q-17 0-28.5-11.5T440-360v-286Z" />
                    </svg>
                    Substituir
                </label>
                <input type="file" id="foto" name="foto" class="hidden">
                <?php if (isset($validacoes['foto'])): ?>
                    <div class="label">
                        <span class="label-text-alt text-error"><?= $validacoes['foto'][0] ?></span>
                    </div>
                <?php endif; ?>
            </div>

            <label class="form-control  w-full">
                <div class="label">
                    <span class="label-text text-neutral-200">Nome</span>
                </div>
                <input value="<?= $contatoEdit->nome ?>" type="text" name="nome" class="input input-bordered border-2 border-neutral-800 text-neutral-300 bg-transparent focus:outline-neutral-600" />
                <?php if (isset($validacoes['nome'])): ?>
                    <div class="label">
                        <span class="label-text-alt text-error"><?= $validacoes['nome'][0] ?></span>
                    </div>
                <?php endif; ?>
            </label>

            <label class="form-control  w-full">
                <div class="label">
                    <span class="label-text text-neutral-200">Telefone</span>
                </div>
                <input value="<?= $contatoEdit->telefone ?>" type="text" name="telefone" class="input input-bordered border-2 border-neutral-800 text-neutral-300 bg-transparent focus:outline-neutral-600" />
                <?php if (isset($validacoes['telefone'])): ?>
                    <div class="label">
                        <span class="label-text-alt text-error"><?= $validacoes['telefone'][0] ?></span>
                    </div>
                <?php endif; ?>
            </label>

            <label class="form-control w-full">
                <div class="label">
                    <span class="label-text text-neutral-200">E-mail</span>
                </div>
                <input value="<?= $contatoEdit->email ?>" type="text" name="email" class="input input-bordered border-2 border-neutral-800 text-neutral-300 bg-transparent focus:outline-neutral-600" />
                <?php if (isset($validacoes['email'])): ?>
                    <div class="label">
                        <span class="label-text-alt text-error"><?= $validacoes['email'][0] ?></span>
                    </div>
                <?php endif; ?>
            </label>

            <div class="flex items-center justify-end gap-3 mt-4">
                <a href="/dashboard" class="rounded-xl bg-[#303030] text-white font-bold p-3 w-fit block">Cancelar</a>
                <button type="submit" class="rounded-xl bg-lime-400 text-neutral-900 font-bold p-3">Salvar</button>
            </div>
        </form>
    </div>
</div>


<script>
    const fileInput = document.getElementById('foto');
    const imagePreview = document.getElementById('preview');

    fileInput.addEventListener('change', function(event) {
        const file = event.target.files[0]; // Obtém o primeiro arquivo
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                imagePreview.src = e.target.result;
                imagePreview.style.display = 'block';
            };
            reader.readAsDataURL(file);
        } else {
            imagePreview.style.display = 'none';
        }
    });
</script>