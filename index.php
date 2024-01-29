<?php
    require_once __DIR__ . '/classes.php/Funcionario.php';
    require_once __DIR__ . '/classes.php/FuncionarioDAO.php';

    $funcionarioDAO = new FuncionarioDAO();

    $funcionarios = [
        $f1 = new Funcionario('Felipe', 'M', 20, 1500),
        $f2 = new Funcionario('Luan', 'M', 20, 750.50),
        $f3 = new Funcionario('Rafael', 'M', 20, 1200),
        $f4 = new Funcionario('Gustavo', 'M', 20, 980.98)
    ];

    foreach ($funcionarios as $funcionario) {
        $funcionarioDAO->create($funcionario);
    }
/*
    $funcionarios = $funcionarioDAO->getFuncionarios();

    $funcionarios[2]->setNome('Pedro');
    $funcionarioDAO->update($funcionarios[2]);

    $funcionarioDAO->updateSalario($funcionarios[2]->getId(), 10);

    $funcionarios = $funcionarioDAO->getFuncionarios();

    print_r($funcionarios);

    $idFuncionario = $funcionarios[2]->getId();

    $funcionario = $funcionarioDAO->getFuncionario($idFuncionario);

    print_r($funcionario);

    $funcionarioDAO->delete($funcionarios[1]->getId());

    print_r($funcionarioDAO->getFuncionarios());*/
?>