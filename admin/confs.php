<?

$pdo = new PDO("mysql:host=localhost;dbname=db98296_inscricoes", "root", "97130084");
if (!$pdo) {
    die('Erro ao criar a conexão');
}

function testeSeletivo($id,$pdo) {
    $stmte = $pdo->prepare("SELECT * FROM testeseletivo WHERE id = :id");
    $stmte->bindParam(':id', $id, PDO::PARAM_INT);
    $stmte->execute();
    $linha = $stmte->fetch(PDO::FETCH_ASSOC);
    
    return $linha;
}
function testeSeletivocursos($id,$pdo) {
    $stmte = $pdo->prepare("SELECT * FROM testeseletivocursos WHERE idEvento = :id");
    $stmte->bindParam(':id', $id, PDO::PARAM_INT);
    $stmte->execute();
    while ($linha = $stmte->fetch(PDO::FETCH_ASSOC)) {
        $array[] = $linha;
    }
    
    return $array;
}

function testeCursoSala($id,$idCurso,$idEvento,$pdo) {
    $stmte = $pdo->prepare("SELECT * FROM testecursossala WHERE idSala = :id and  idCurso = :idCurso and idEvento = :idEvento");
    $stmte->bindParam(':id', $id, PDO::PARAM_INT);
    $stmte->bindParam(':idCurso', $idCurso, PDO::PARAM_INT);
    $stmte->bindParam(':idEvento', $idCurso, PDO::PARAM_INT);
    $stmte->execute();
    $linha = $stmte->fetch(PDO::FETCH_ASSOC);
    
    return $linha;
}

function reusltadoAluno($idAluno,$idProva,$pdo) {
    $stmte = $pdo->prepare("SELECT * FROM resultado WHERE idAluno = :idAluno and idProva = :idProva" );
    $stmte->bindParam(':idAluno', $idAluno, PDO::PARAM_INT);
    $stmte->bindParam(':idProva', $idProva, PDO::PARAM_INT);
    $stmte->execute();
    $linha = $stmte->fetch(PDO::FETCH_ASSOC);
    
    return $idAluno."-".$idProva;
}
function QuantidadePorSala($curso,$id,$pdo) {
    $stmte = $pdo->prepare("SELECT count(idSala)  as sala FROM usuarioteste WHERE idCurso = :idCurso and idSala = :id");
    $stmte->bindParam(':idCurso', $curso, PDO::PARAM_INT);
    $stmte->bindParam(':id', $id, PDO::PARAM_INT);
    $stmte->execute();
    $linha = $stmte->fetch(PDO::FETCH_ASSOC);
    
    return $linha;
}
function cursos($id,$pdo) {
    $stmte = $pdo->prepare("SELECT * FROM ins_curso WHERE id = :id");
    $stmte->bindParam(':id', $id, PDO::PARAM_INT);
    $stmte->execute();
    $linha = $stmte->fetch(PDO::FETCH_ASSOC);
    
    return $linha;
}

function endereco($id,$pdo) {
    $stmte = $pdo->prepare("SELECT * FROM ins_endereco WHERE id = :id");
    $stmte->bindParam(':id', $id, PDO::PARAM_INT);
    $stmte->execute();
    $linha = $stmte->fetch(PDO::FETCH_ASSOC);
    
    return $linha;
}

function informacao($id,$pdo) {
    $stmte = $pdo->prepare("SELECT * FROM ins_informacoes WHERE id = :id");
    $stmte->bindParam(':id', $id, PDO::PARAM_INT);
    $stmte->execute();
    $linha = $stmte->fetch(PDO::FETCH_ASSOC);
    
    return $linha;
}
function sala($id,$pdo) {
    $stmte = $pdo->prepare("SELECT * FROM ins_sala WHERE id = :id");
    $stmte->bindParam(':id', $id, PDO::PARAM_INT);
    $stmte->execute();
    $linha = $stmte->fetch(PDO::FETCH_ASSOC);
    
    return $linha;
}

function usuario($id,$pdo) {
    $stmte = $pdo->prepare("SELECT * FROM usuario WHERE id = :id");
    $stmte->bindParam(':id', $id, PDO::PARAM_INT);
    $stmte->execute();
    $linha = $stmte->fetch(PDO::FETCH_ASSOC);
    
    return $linha;
}

function usuarioEmail($id,$pdo) {
    $stmte = $pdo->prepare("SELECT * FROM usuario WHERE email = :id");
    $stmte->bindParam(':id', $id, PDO::PARAM_INT);
    $stmte->execute();
    $linha = $stmte->fetch(PDO::FETCH_ASSOC);
    
    return $linha;
}

function usuarioTeste($idAluno,$idCurso,$idEvento,$pdo) {
    $stmte = $pdo->prepare("SELECT * FROM usuarioteste WHERE idAluno = :idAluno and idCurso = :idCurso and idEvento = :idEvento limit 1");
    $stmte->bindParam(':idAluno', $idAluno, PDO::PARAM_INT);
    $stmte->bindParam(':idCurso', $idCurso, PDO::PARAM_INT);
    $stmte->bindParam(':idEvento', $idEvento, PDO::PARAM_INT);
    $stmte->execute();
    $linha = $stmte->fetch(PDO::FETCH_ASSOC);
    
    return $linha;
}


function usuarioTesteCadastrado($idAluno,$pdo) {
    $stmte = $pdo->prepare("SELECT * FROM usuarioteste WHERE idAluno = :idAluno limit 1");
    $stmte->bindParam(':idAluno', $idAluno, PDO::PARAM_INT);
    
    $stmte->execute();
    $linha = $stmte->fetch(PDO::FETCH_ASSOC);
    
    return $linha;
}

function usuarioTesteCadastradoEvento($idAluno,$idCurso,$pdo) {
    $stmte = $pdo->prepare("SELECT * FROM usuarioteste WHERE idAluno = :idAluno and idEvento = :idEvento  limit 1");
    $stmte->bindParam(':idAluno', $idAluno, PDO::PARAM_INT);
    $stmte->bindParam(':idEvento', $idCurso, PDO::PARAM_INT);
    
    $stmte->execute();
    $linha = $stmte->fetch(PDO::FETCH_ASSOC);
    
    return $linha;
}

function usuarioTesteCursoSala($idEvento,$idCurso,$idSala,$pdo) {
    $stmte = $pdo->prepare("SELECT count(id) as id FROM usuarioteste WHERE idEvento = :idEvento and idCurso = :idCurso and idSala = :idSala  ");
    #$stmte = $pdo->prepare("SELECT count(id) as id FROM usuarioteste WHERE idEvento = :idEvento and idCurso = :idCurso and idSala = :idSala and idAluno <> 0");
    $stmte->bindParam(':idEvento', $idEvento, PDO::PARAM_INT);
    $stmte->bindParam(':idCurso', $idCurso, PDO::PARAM_INT);
    $stmte->bindParam(':idSala', $idSala, PDO::PARAM_INT);
    $stmte->execute();
    $linha = $stmte->fetch(PDO::FETCH_ASSOC);
     
    return $linha;
}


function usuarioTesteCurso($idEvento,$idCurso,$pdo) {
    $stmte = $pdo->prepare("SELECT count(id) as id FROM usuarioteste WHERE idEvento = :idEvento and idCurso = :idCurso ");
    $stmte->bindParam(':idEvento', $idEvento, PDO::PARAM_INT);
    $stmte->bindParam(':idCurso', $idCurso, PDO::PARAM_INT);
   
    $stmte->execute();
    $linha = $stmte->fetch(PDO::FETCH_ASSOC);
    
    return $linha;
}
function usuarioTesteCursoUnidade($unidade,$idEvento,$idCurso,$pdo) {
    $stmte = $pdo->prepare("SELECT count(id) as id FROM usuarioteste WHERE idEvento = :idEvento and idCurso = :idCurso and unidade = :unidade");
    $stmte->bindParam(':idEvento', $idEvento, PDO::PARAM_INT);
    $stmte->bindParam(':idCurso', $idCurso, PDO::PARAM_INT);
    $stmte->bindParam(':unidade', $unidade, PDO::PARAM_INT);
   
    $stmte->execute();
    $linha = $stmte->fetch(PDO::FETCH_ASSOC);
    
    return $linha;
}

function mostraData($data) {
    if ($data!='') {
        return (substr($data,8,2).'/'.substr($data,5,2).'/'.substr($data,0,4));
    }
    else {
        return '';
    }
}

function gravaData($data) {
    if ($data != '') {
        return (substr($data, 6, 4) . '-' . substr($data, 3, 2) . '-' . substr($data, 0, 2));
    } else {
        return '';
    }
}
function arredonda($valor) {
    if (!empty($valor)) {
        $arredonda = round($valor, 1);
        $arredonda = number_format($arredonda, 1, '.', '');
        return $arredonda;
    }
}

?>