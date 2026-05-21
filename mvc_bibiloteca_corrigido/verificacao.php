<?php
// ========================================
// ARQUIVO DE VERIFICAÇÃO DO SISTEMA
// ========================================
// Este arquivo testa se tudo está configurado corretamente para o upload de imagens

echo "<!DOCTYPE html>";
echo "<html lang='pt-br'>";
echo "<head>";
echo "<meta charset='UTF-8'>";
echo "<title>Verificação do Sistema</title>";
echo "<style>";
echo "body { font-family: Arial, sans-serif; margin: 20px; background-color: #f4f7fa; }";
echo ".check { margin: 10px 0; padding: 10px; border-radius: 5px; }";
echo ".ok { background-color: #d4edda; border: 1px solid #28a745; color: #155724; }";
echo ".erro { background-color: #f8d7da; border: 1px solid #dc3545; color: #721c24; }";
echo "h2 { color: #2c3e50; }";
echo "</style>";
echo "</head>";
echo "<body>";
echo "<h2>🔍 Verificação do Sistema de Biblioteca</h2>";

// 1. Verificar conexão com banco de dados
echo "<div class='check";
try {
    require_once 'config/conexao.php';
    $conn = Conexao::getConn();
    echo " ok'>";
    echo "✅ Conexão com banco de dados: OK";
} catch (Exception $e) {
    echo " erro'>";
    echo "❌ Conexão com banco de dados: ERRO - " . $e->getMessage();
}
echo "</div>";

// 2. Verificar pasta de imagens
echo "<div class='check";
if (is_dir(__DIR__ . '/img')) {
    echo " ok'>";
    echo "✅ Pasta /img existe";
} else {
    echo " erro'>";
    echo "❌ Pasta /img não existe - criar manualmente";
}
echo "</div>";

// 3. Verificar permissão de escrita na pasta
echo "<div class='check";
if (is_writable(__DIR__ . '/img')) {
    echo " ok'>";
    echo "✅ Pasta /img tem permissão de escrita";
} else {
    echo " erro'>";
    echo "❌ Pasta /img sem permissão de escrita";
}
echo "</div>";

// 4. Verificar tabela livros
echo "<div class='check";
try {
    $sql = "DESCRIBE livros";
    $stmt = $conn->query($sql);
    $colunas = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    $temFoto = false;
    $temEndpasta = false;
    
    foreach ($colunas as $col) {
        if ($col['Field'] === 'foto') $temFoto = true;
        if ($col['Field'] === 'endpasta') $temEndpasta = true;
    }
    
    if ($temFoto && $temEndpasta) {
        echo " ok'>";
        echo "✅ Tabela 'livros' com campos corretos (foto, endpasta)";
    } else {
        echo " erro'>";
        echo "❌ Tabela 'livros' faltando campos";
    }
} catch (Exception $e) {
    echo " erro'>";
    echo "❌ Erro ao verificar tabela: " . $e->getMessage();
}
echo "</div>";

// 4.1 Verificar tabela emprestimos
echo "<div class='check";
try {
    $sql = "DESCRIBE emprestimos";
    $stmt = $conn->query($sql);
    $colunas = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    $temDataDevolucao = false;
    $temDataDevolucaoPrevista = false;
    
    foreach ($colunas as $col) {
        if ($col['Field'] === 'data_devolucao') $temDataDevolucao = true;
        if ($col['Field'] === 'data_devolucao_prevista') $temDataDevolucaoPrevista = true;
    }
    
    if ($temDataDevolucao && $temDataDevolucaoPrevista) {
        echo " ok'>";
        echo "✅ Tabela 'emprestimos' com campos corretos (data_devolucao, data_devolucao_prevista)";
    } else {
        echo " erro'>";
        if (!$temDataDevolucaoPrevista) {
            echo "❌ Coluna 'data_devolucao_prevista' não existe - Execute: ALTER TABLE emprestimos ADD COLUMN data_devolucao_prevista DATE AFTER data_emprestimo;";
        } else {
            echo "⚠️ Tabela 'emprestimos' com alguns campos faltando";
        }
    }
} catch (Exception $e) {
    echo " erro'>";
    echo "❌ Erro ao verificar tabela: " . $e->getMessage();
}
echo "</div>";

// 5. Verificar campo endpasta permite NULL
echo "<div class='check";
try {
    $sql = "DESCRIBE livros";
    $stmt = $conn->query($sql);
    $colunas = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    foreach ($colunas as $col) {
        if ($col['Field'] === 'endpasta') {
            if ($col['Null'] === 'YES') {
                echo " ok'>";
                echo "✅ Campo 'endpasta' permite valores NULL";
            } else {
                echo " erro'>";
                echo "⚠️ Campo 'endpasta' é NOT NULL - Execute: ALTER TABLE livros MODIFY COLUMN endpasta varchar(250) NULL;";
            }
        }
    }
} catch (Exception $e) {
    echo " erro'>";
    echo "❌ Erro ao verificar campo: " . $e->getMessage();
}
echo "</div>";

// 6. Contar livros no banco
echo "<div class='check ok'>";
try {
    $sql = "SELECT COUNT(*) as total FROM livros";
    $stmt = $conn->query($sql);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    echo "📊 Total de livros no banco: " . $result['total'];
} catch (Exception $e) {
    echo "❌ Erro ao contar livros: " . $e->getMessage();
}
echo "</div>";

echo "<hr>";
echo "<h3>📋 Próximos Passos:</h3>";
echo "<ol>";
echo "<li>Se houver ❌, abra <strong>phpMyAdmin</strong>: <code>http://localhost/phpmyadmin</code></li>";
echo "<li>Selecione o banco: <strong>dboBiblioteca</strong></li>";
echo "<li>Clique em <strong>SQL</strong> e execute as migrações necessárias</li>";
echo "<li>Ou verifique: <code>CORRECOES_BANCO_DE_DADOS.txt</code></li>";
echo "<li>Navegue para: <code>index.php?action=listarLivros</code></li>";
echo "<li>Todas as funcionalidades devem estar OK ✅</li>";
echo "</ol>";

echo "</body>";
echo "</html>";
?>
