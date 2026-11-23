<?php
function buscarMaisNova($pessoas)
{
    $nomeMaisNova = '';
    $idadeMaisNova = null;

    foreach ($pessoas as $nome => $idade) {
        if ($idadeMaisNova === null || $idade < $idadeMaisNova) {
            $nomeMaisNova = $nome;
            $idadeMaisNova = $idade;
        }
    }

    return [$nomeMaisNova, $idadeMaisNova];
}

$pessoas = [
    $_POST['nome1'] => $_POST['idade1'],
    $_POST['nome2'] => $_POST['idade2'],
    $_POST['nome3'] => $_POST['idade3'],
];

[$nomeMaisNova, $idadeMaisNova] = buscarMaisNova($pessoas);
?>
<!doctype html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Resultado das Pessoas</title>
    <link rel="stylesheet" href="style.css" />
</head>

<body>
    <main class="cartao tabela">
        <h1>Dados cadastrados</h1>

        <table>
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Idade</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($pessoas as $nome => $idade): ?>
                    <tr>
                        <td><?php echo $nome; ?></td>
                        <td><?php echo number_format($idade, 0, ',', '.'); ?> anos</td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <p class="resultado"><strong>Pessoa mais nova:</strong> <?php echo $nomeMaisNova; ?> - <?php echo number_format($idadeMaisNova, 0, ',', '.'); ?> anos</p>

        <a href="index.html">Cadastrar outras pessoas</a>
    </main>
</body>

</html>
