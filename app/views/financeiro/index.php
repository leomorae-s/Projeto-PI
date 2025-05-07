<h2>Controle Financeiro</h2>
<a href="/financeiro/novo">Novo Lançamento</a><br><br>

<table border="1">
    <tr>
        <th>Tipo</th>
        <th>Descrição</th>
        <th>Valor</th>
        <th>Data</th>
    </tr>
    <?php foreach ($lancamentos as $lancamento): ?>
        <tr>
            <td><?= ucfirst($lancamento['tipo']) ?></td>
            <td><?= $lancamento['descricao'] ?></td>
            <td>R$ <?= number_format($lancamento['valor'], 2, ',', '.') ?></td>
            <td><?= $lancamento['data_lancamento'] ?></td>
        </tr>
    <?php endforeach; ?>
</table>

<h3>Totais:</h3>
<ul>
    <?php foreach ($totais as $total): ?>
        <li><?= ucfirst($total['tipo']) ?>: R$ <?= number_format($total['total'], 2, ',', '.') ?></li>
    <?php endforeach; ?>
</ul>
