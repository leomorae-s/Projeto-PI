<h2>Nova Venda</h2>

<form action="/vendas/salvar" method="post">
    <div id="itens">
        <div class="item">
            <select name="produto_id[]">
                <?php foreach ($produtos as $produto): ?>
                    <option value="<?= $produto['id'] ?>" data-preco="<?= $produto['preco'] ?>">
                        <?= $produto['nome'] ?> - R$ <?= number_format($produto['preco'], 2, ',', '.') ?>
                    </option>
                <?php endforeach; ?>
            </select>

            Quantidade: <input type="number" name="quantidade[]" value="1" min="1">
            <input type="hidden" name="preco[]" value="0">
        </div>
    </div>

    <button type="submit">Salvar Venda</button>
</form>
