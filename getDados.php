<?php
    $conexao = new mysqli("localhost", "root", "", "endpoint"); //conexão com banco de dados - nome do banco: endpoint

    if (mysqli_connect_errno()) trigger_error(mysqli_connect_error());

    $qryLista = mysqli_query($conexao, "SELECT mov.name as nome_mov, usr.name as nome, max(per.value) as valor, per.date as data, DENSE_RANK() OVER (PARTITION BY mov.name ORDER BY per.value ASC) as ranking FROM personal_record per 
        LEFT JOIN movement mov ON per.movement_id = mov.id LEFT JOIN user usr ON per.user_id = usr.id 
        GROUP BY usr.name, mov.name ORDER BY mov.name, per.value");    
    
    while($resultado = mysqli_fetch_assoc($qryLista)){
        
        $vetor[] = array_map('utf8_encode', $resultado); 
    }    
    
    echo json_encode($vetor);

