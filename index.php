<?php
    require_once './classes/Funcionario.php';
    require_once './models/Funcionario.php';

    $modelFuncionario = new \models\Funcionario();

    $funcionarios = [
        new \classes\Funcionario('Felipe', 'M', 20, 1500),
        new \classes\Funcionario('Luan', 'M', 20, 750.50),
        new \classes\Funcionario('Rafael', 'M', 20, 1200),
        new \classes\Funcionario('Gustavo', 'M', 20, 980.98)
    ];

    foreach ($funcionarios as $funcionario) {
        $modelFuncionario->create($funcionario);
    }

    echo "\nCADASTROS REALIZADOS\n";

    $funcionariosDB = $modelFuncionario->getFuncionarios();

    echo "\nFUNCIONÁRIOS:\n";
    print_r($funcionariosDB);

    foreach ($funcionariosDB as $key=>$funcionario) {
        $funcionarios[$key]->setId($funcionariosDB[$key]['id']);

        $funcionarios[$key]->setNome('Jobson');
        $modelFuncionario->update($funcionarios[$key]);

        $funcionarios[$key]->getId();

        $modelFuncionario->updateSalario($funcionarios[$key]->getId(), 10);
    }

    echo "\nALTERAÇÔES REALIZADAS\n";

    $funcionariosDB = $modelFuncionario->getFuncionarios();

    echo "\nFUNCIONÁRIOS:\n";
    print_r($funcionariosDB);

    $idFuncionario = $funcionarios[2]->getId();

    echo "\nID DO FUNCIONÁRIO: ";
    echo $idFuncionario;

    unset($funcionarios[2]);
    echo "\n\nUNSET FUNCIONÁRIO $idFuncionario REALIZADO\n";

    echo "\nFUNCIONÁRIOS:\n";
    print_r($funcionarios);

    $funcionario = $modelFuncionario->getFuncionario($idFuncionario);

    echo "\nFUNCIONÁRIO: $idFuncionario\n";
    print_r($funcionario);

    $modelFuncionario->delete($idFuncionario);
    echo "\nO FUNCIONÁRIO " . $idFuncionario . " FOI EXCLUÍDO\n";

    echo "\nFUNCIONÁRIOS:\n";
    print_r($modelFuncionario->getFuncionarios());
?>