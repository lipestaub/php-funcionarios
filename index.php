<?php
    require_once './classes/Funcionario.php';
    require_once './models/Funcionario.php';

    $modelFuncionario = new \models\Funcionario();

    $modelFuncionario->truncate();

    $funcionarios = [
        new \classes\Funcionario(null, 'Felipe', 'M', 20, 1500),
        new \classes\Funcionario(null, 'Luan', 'M', 20, 750.50),
        new \classes\Funcionario(null, 'Rafael', 'M', 20, 1200),
        new \classes\Funcionario(null, 'Gustavo', 'M', 20, 980.98)
    ];

    foreach ($funcionarios as $funcionario) {
        try {
            $modelFuncionario->create($funcionario);
        }
        catch (Exception $exception) {
            echo "{$exception->getMessage()}\n";
        }
    }

    echo "\nCADASTROS REALIZADOS\n";

    $funcionariosDB = $modelFuncionario->getFuncionarios();

    echo "\nFUNCIONÁRIOS:\n";
    print_r($funcionariosDB);

    foreach ($funcionariosDB as $key=>$funcionario) {
        $funcionarios[$key]->setId($funcionariosDB[$key]['id']);

        $funcionarios[$key]->setNome('Jobson');

        try {
            $modelFuncionario->update($funcionarios[$key]);
        }
        catch (Exception $exception) {
            echo "{$exception->getMessage()}\n";
        }

        $funcionarios[$key]->getId();

        try {
            $modelFuncionario->updateSalario($funcionarios[$key]->getId(), 10);
        }
        catch (Exception $exception) {
            echo "{$exception->getMessage()}\n";
        }
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

    try {
        $funcionarioDB = $modelFuncionario->getFuncionario($idFuncionario);
    }
    catch (Exception $exception) {
        echo "{$exception->getMessage()}\n";
    }

    $funcionario = new \classes\Funcionario($funcionarioDB['id'], $funcionarioDB['nome'], $funcionarioDB['genero'], $funcionarioDB['idade'], $funcionarioDB['salario']);

    echo "\nFUNCIONÁRIO: $idFuncionario\n";
    var_dump($funcionario);

    try {
        $modelFuncionario->delete($idFuncionario);
    }
    catch (Exception $exception) {
        echo "{$exception->getMessage()}\n";
    }
    echo "\nO FUNCIONÁRIO " . $idFuncionario . " FOI EXCLUÍDO\n";

    echo "\nFUNCIONÁRIOS:\n";
    print_r($modelFuncionario->getFuncionarios());
?>