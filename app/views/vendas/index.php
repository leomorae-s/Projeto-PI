<h2>Histórico de Vendas</h2>
<a href="/vendas/nova">Nova Venda</a><br><br>

<table border="1">
    <tr>
        <th>ID</th>
        <th>Vendedor</th>
        <th>Data</th>
        <th>Total</th>
    </tr>
    <?php $vendas = [];
    foreach ($vendas as $venda): ?>
        <tr>
            <td><?= $venda['id'] ?></td>
            <td><?= $venda['vendedor'] ?></td>
            <td><?= $venda['data'] ?></td>
            <td>R$ <?= number_format($venda['total'], 2, ',', '.') ?></td>
        </tr>
    <?php endforeach; ?>
</table>
