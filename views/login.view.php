<?php $validacoes = flash()->get('validacoes'); ?>


<div class="w-full text-right">
    <p class="text-sm font-normal text-neutral-200">Não tem uma conta? <a href="/registrar" class="font-bold text-lime-400 hover:underline">Criar conta</a></p>
</div>

<div class="grow flex flex-col justify-center">
    <h1 class="text-neutral-200 text-2xl font-bold mb-5">Acessar Conta</h1>

    <?php if ($sucesso = flash()->get('sucesso')): ?>
        <div role="alert" class="alert alert-success">
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

    <form action="/login" class="flex flex-col items-end" method="POST">
        <label class="form-control  w-full">
            <div class="label">
                <span class="label-text text-neutral-200">E-mail</span>
            </div>
            <input type="text" name="email" class="input input-bordered border-2 border-neutral-800 text-neutral-300 bg-transparent focus:outline-neutral-600" />
            <?php if (isset($validacoes['email'])): ?>
                <div class="label">
                    <span class="label-text-alt text-error"><?= $validacoes['email'][0] ?></span>
                </div>
            <?php endif; ?>
        </label>

        <label class="form-control w-full">
            <div class="label">
                <span class="label-text text-neutral-200">Senha</span>
            </div>
            <input type="password" name="senha" class="input input-bordered text-neutral-300 border-2 border-neutral-800 bg-transparent focus:outline-neutral-600" />
            <?php if (isset($validacoes['senha'])): ?>
                <div class="label">
                    <span class="label-text-alt text-error"><?= $validacoes['senha'][0] ?></span>
                </div>
            <?php endif; ?>
        </label>

        <button type="submit" class="rounded-xl bg-lime-400 text-neutral-900 font-bold p-3 mt-9">Acessar conta</button>
    </form>
</div>