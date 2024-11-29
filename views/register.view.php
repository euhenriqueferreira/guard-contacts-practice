<?php $validacoes = flash()->get('validacoes'); ?>


<div class="w-full text-right">
    <p class="text-sm font-normal text-neutral-200">Já tem uma conta? <a href="/login" class="font-bold text-lime-400 hover:underline">Acessar conta</a></p>
</div>

<div class="grow flex flex-col justify-center">
    <h1 class="text-neutral-200 text-2xl font-bold mb-5">Criar Conta</h1>
    <form class="flex flex-col items-end" method="POST" action="/registrar">

        <label class="form-control  w-full">
            <div class="label">
                <span class="label-text text-neutral-200">Nome</span>
            </div>
            <input type="text" name="nome" class="input input-bordered border-2 border-neutral-800 text-neutral-300 bg-transparent focus:outline-neutral-600" />
            <?php if (isset($validacoes['nome'])): ?>
                <div class="label">
                    <span class="label-text-alt text-error"><?= $validacoes['nome'][0] ?></span>
                </div>
            <?php endif; ?>
        </label>

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

        <label class="form-control w-full">
            <div class="label">
                <span class="label-text text-neutral-200">Repetir a senha</span>
            </div>
            <input type="password" name="senha_confirmacao" class="input input-bordered text-neutral-300 border-2 border-neutral-800 bg-transparent focus:outline-neutral-600" />
        </label>

        <button type="submit" class="rounded-xl bg-lime-400 text-neutral-900 font-bold p-3 mt-9">Criar conta</button>
    </form>
</div>