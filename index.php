<?php
    require_once __DIR__ . '/classes.php/Funcionario.php';
    require_once __DIR__ . '/classes.php/FuncionarioDAO.php';

    $funcionarioDAO = new FuncionarioDAO();

    $funcionarios = [
        new Funcionario('Felipe', 'M', 20, 1500),
        new Funcionario('Luan', 'M', 20, 750.50),
        new Funcionario('Rafael', 'M', 20, 1200),
        new Funcionario('Gustavo', 'M', 20, 980.98)
    ];

    foreach ($funcionarios as $funcionario) {
        $funcionarioDAO->create($funcionario);
    }

    echo "CADASTROS REALIZADOS\n";

    $funcionariosDB = $funcionarioDAO->getFuncionarios();

    echo "FUNCIONÁRIOS:\n";
    print_r($funcionarios);

    foreach ($funcionariosDB as $key=>$funcionario) {
        $funcionarios[$key]->setId($funcionariosDB[$key]['id']); 
    }

    echo "IDS SETADOS\n";

    $funcionarios[2]->setNome('Pedro');
    $funcionarioDAO->update($funcionarios[2]);

    echo "O FUNCIONÁRIO " . $funcionarios[2]->getId() . " FOI ALTERADO\n";

    $funcionarioDAO->updateSalario($funcionarios[2]->getId(), 10);

    $funcionarios = $funcionarioDAO->getFuncionarios();

    echo "FUNCIONÁRIOS:\n";
    print_r($funcionarios);

    $idFuncionario = $funcionarios[2]['id'];

    $funcionario = $funcionarioDAO->getFuncionario($idFuncionario);

    echo "FUNCIONÁRIO: " . $idFuncionario . "\n";

    print_r($funcionario);

    $funcionarioDAO->delete($idFuncionario);

    echo "O FUNCIONÁRIO " . $idFuncionario . " FOI EXCLUÍDO\n";

    echo "FUNCIONÁRIOS:\n";
    print_r($funcionarioDAO->getFuncionarios());
?>