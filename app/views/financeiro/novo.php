<h2>Novo Lançamento Financeiro</h2>

<form method="post" action="/financeiro/salvar">
    Tipo:
    <select name="tipo" required>
        <option value="receita">Receita</option>
        <option value="despesa">Despesa</option>
    </select><br><br>

    Descrição: <input type="text" name="descricao" required><br><br>
    Valor: <input type="number" step="0.01" name="valor" required><br><br>
    Data: <input type="date" name="data" required><br><br>

    <button type="submit">Salvar</button>
</form>
