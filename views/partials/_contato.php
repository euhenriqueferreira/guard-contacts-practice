<div class="grid grid-cols-4 items-center py-3 px-3 border-b border-neutral-600">
    <div class="flex items-start gap-3">
        <img src="<?= '../../' . $contato->foto ?>" alt="" class="rounded-xl w-11 h-11 object-cover">
        <div>
            <p class="text-sm text-[#e2e2e2] font-normal mb-1"><?= $contato->nome ?></p>
        </div>
    </div>
    <?php if (isset($_SESSION['mostrar'])): ?>
        <div class="mb-1"><span class="text-sm text-[#e2e2e2] font-normal"><?= $contato->telefone ?></span></div>
        <div class="mb-1"><span class="text-sm text-[#e2e2e2] font-normal"><?= $contato->email ?></span></div>
    <?php else: ?>
        <div class="mb-1"><span class="text-sm text-[#e2e2e2] font-normal"><?= str_repeat('*', 15) ?></span></div>
        <div class="mb-1"><span class="text-sm text-[#e2e2e2] font-normal"><?= str_repeat('*', rand(8, 25)) ?></span></div>
    <?php endif; ?>
    <div class="flex items-center gap-2 justify-end">
        <a href="/dashboard/editar-contato?id=<?= $contato->id ?>" class="flex items-center gap-1 text-white p-2 border-2 border-neutral-800 rounded-lg text-xs">
            <svg class="w-3 h-3" xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#ffffff">
                <path d="M200-200h57l391-391-57-57-391 391v57Zm-40 80q-17 0-28.5-11.5T120-160v-97q0-16 6-30.5t17-25.5l505-504q12-11 26.5-17t30.5-6q16 0 31 6t26 18l55 56q12 11 17.5 26t5.5 30q0 16-5.5 30.5T817-647L313-143q-11 11-25.5 17t-30.5 6h-97Zm600-584-56-56 56 56Zm-141 85-28-29 57 57-29-28Z" />
            </svg>
            Editar
        </a>

        <a href="/dashboard/visualizar" class="border-2 border-neutral-800 rounded-lg flex items-center justify-center w-8 h-8">
            <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#ffffff">
                <path d="M240-80q-33 0-56.5-23.5T160-160v-400q0-33 23.5-56.5T240-640h40v-80q0-83 58.5-141.5T480-920q83 0 141.5 58.5T680-720v80h40q33 0 56.5 23.5T800-560v400q0 33-23.5 56.5T720-80H240Zm0-80h480v-400H240v400Zm240-120q33 0 56.5-23.5T560-360q0-33-23.5-56.5T480-440q-33 0-56.5 23.5T400-360q0 33 23.5 56.5T480-280ZM360-640h240v-80q0-50-35-85t-85-35q-50 0-85 35t-35 85v80ZM240-160v-400 400Z" />
            </svg>
        </a>

        <a href="/dashboard/deletar-contato?id=<?= $contato->id ?>" class="border-2 border-neutral-800 rounded-lg flex items-center justify-center w-8 h-8">
            <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#ffffff">
                <path d="M280-120q-33 0-56.5-23.5T200-200v-520q-17 0-28.5-11.5T160-760q0-17 11.5-28.5T200-800h160q0-17 11.5-28.5T400-840h160q17 0 28.5 11.5T600-800h160q17 0 28.5 11.5T800-760q0 17-11.5 28.5T760-720v520q0 33-23.5 56.5T680-120H280Zm400-600H280v520h400v-520ZM400-280q17 0 28.5-11.5T440-320v-280q0-17-11.5-28.5T400-640q-17 0-28.5 11.5T360-600v280q0 17 11.5 28.5T400-280Zm160 0q17 0 28.5-11.5T600-320v-280q0-17-11.5-28.5T560-640q-17 0-28.5 11.5T520-600v280q0 17 11.5 28.5T560-280ZM280-720v520-520Z" />
            </svg>
        </a>
    </div>
</div>