<div class="flex items-center justify-between">
    <h1 class="text-2xl font-bold text-white">Lista de Contatos</h1>

    <div class="flex items-center gap-3">
        <form class="mb-0">
            <label class="input input-bordered flex items-center gap-2 w-[320px] bg-transparent border-2 border-[#303030]">
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 16 16"
                    fill="#777777"
                    class="h-5 w-5 opacity-70">
                    <path
                        fill-rule="evenodd"
                        d="M9.965 11.026a5 5 0 1 1 1.06-1.06l2.755 2.754a.75.75 0 1 1-1.06 1.06l-2.755-2.754ZM10.5 7a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0Z"
                        clip-rule="evenodd" />
                </svg>
                <input type="text" name="pesquisa" class="grow placeholder:text-[#777777] text-neutral-200" placeholder="Pesquisar..." />
            </label>
        </form>

        <a href="/dashboard/criar-contato" class="text-sm font-bold text-white bg-[#303030] rounded-lg p-3 flex items-center gap-1">
            <svg xmlns=" http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#ffffff">
                <path d="M440-440H240q-17 0-28.5-11.5T200-480q0-17 11.5-28.5T240-520h200v-200q0-17 11.5-28.5T480-760q17 0 28.5 11.5T520-720v200h200q17 0 28.5 11.5T760-480q0 17-11.5 28.5T720-440H520v200q0 17-11.5 28.5T480-200q-17 0-28.5-11.5T440-240v-200Z" />
            </svg>
            Adicionar contato
        </a>
        <?php if (isset($_SESSION['mostrar'])): ?>
            <a href="/dashboard/visualizar" class="rounded-lg border-2 border-[#303030] p-2">
                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#ffffff">
                    <path d="M240-80q-33 0-56.5-23.5T160-160v-400q0-33 23.5-56.5T240-640h360v-80q0-50-35-85t-85-35q-42 0-73.5 25.5T364-751q-4 14-16.5 22.5T320-720q-17 0-28.5-11t-8.5-26q14-69 69-116t128-47q83 0 141.5 58.5T680-720v80h40q33 0 56.5 23.5T800-560v400q0 33-23.5 56.5T720-80H240Zm0-80h480v-400H240v400Zm240-120q33 0 56.5-23.5T560-360q0-33-23.5-56.5T480-440q-33 0-56.5 23.5T400-360q0 33 23.5 56.5T480-280ZM240-160v-400 400Z" />
                </svg>
            </a>
        <?php else: ?>
            <a href="/dashboard/visualizar" class="rounded-lg border-2 border-[#303030] p-2">
                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#ffffff">
                    <path d="M240-80q-33 0-56.5-23.5T160-160v-400q0-33 23.5-56.5T240-640h40v-80q0-83 58.5-141.5T480-920q83 0 141.5 58.5T680-720v80h40q33 0 56.5 23.5T800-560v400q0 33-23.5 56.5T720-80H240Zm0-80h480v-400H240v400Zm240-120q33 0 56.5-23.5T560-360q0-33-23.5-56.5T480-440q-33 0-56.5 23.5T400-360q0 33 23.5 56.5T480-280ZM360-640h240v-80q0-50-35-85t-85-35q-50 0-85 35t-35 85v80ZM240-160v-400 400Z" />
                </svg>
            </a>
        <?php endif; ?>
    </div>
</div>

<div class="mt-8">
    <div class="w-full">
        <p class="text-sm font-bold text-white">C</p>

        <div class="mt-5 mb-3 bg-neutral-600 w-full h-px"></div>

        <div class="">
            <div class="grid grid-cols-4 mb-4">
                <div class="text-xs font-bold opacity-40 text-white">NOME</div>
                <div class="text-xs font-bold opacity-40 text-white">TELEFONE</div>
                <div class="text-xs font-bold opacity-40 text-white">EMAIL</div>
                <div></div>
            </div>

            <?php if ($sucesso = flash()->get('sucesso')): ?>
                <div role="alert" class="alert alert-success mb-3 mt-2">
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="h-6 w-6 shrink-0 stroke-current"
                        fill="none"
                        viewBox="0 0 24 24">
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span><?= $sucesso ?></span>
                </div>
            <?php endif; ?>

            <?php foreach ($contatos as $contato) {
                require base_path('views/partials/_contato.php');
            } ?>


        </div>
    </div>

</div>