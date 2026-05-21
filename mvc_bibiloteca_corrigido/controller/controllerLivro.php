<?php
require_once __DIR__ . '/../model/livroModel.php';
require_once __DIR__ . '/../model/autorModel.php';
require_once __DIR__ . '/../model/categoriaModel.php';

class controllerLivro {

    public function abrirLivro() {
        $autorModel     = new autorModel();
        $categoriaModel = new categoriaModel();

        $autores    = $autorModel->listarTodos() ?: [];
        $categorias = $categoriaModel->listarTodos() ?: [];

        include __DIR__ . '/../view/livroForm.php';
    }

    // Método para salvar o livro com upload de imagem de capa
    public function salvar() {
        // Obtém os dados do formulário
        $titulo           = $_POST['titulo']          ?? null;
        $ano_publicacao   = $_POST['ano_publicacao']  ?? null;
        $id_autor         = $_POST['id_autor']        ?? null;
        $id_categoria     = $_POST['id_categoria']    ?? null;

        // Verifica se os campos obrigatórios foram preenchidos
        if (!$titulo || !$id_autor || !$id_categoria) {
            echo "Preencha todos os campos obrigatórios!";
            return;
        }

        // Inicializa variáveis para foto e endpasta
        $foto = null;
        $endpasta = null;

        // Verifica se um arquivo de imagem foi enviado
        if (isset($_FILES['imagem']) && $_FILES['imagem']['error'] === UPLOAD_ERR_OK) {
            // Obtém a extensão do arquivo enviado em minúsculas
            $extensao = strtolower(pathinfo($_FILES['imagem']['name'], PATHINFO_EXTENSION));

            // Define quais extensões de imagem são permitidas
            $extensoesPermitidas = ['jpg', 'jpeg', 'png'];

            // Verifica se a extensão está na lista de permitidas
            if (in_array($extensao, $extensoesPermitidas, true)) {
                // Cria um nome único para o arquivo usando hash md5 e uniqid
                $nomeFoto = md5(uniqid('', true)) . '.' . $extensao;
                
                // Cria o caminho da pasta de destino se não existir
                $pastaImg = __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'img';
                if (!is_dir($pastaImg)) {
                    mkdir($pastaImg, 0755, true); // Cria a pasta com permissões
                }
                
                // Define o caminho completo do arquivo de destino
                $caminhoDestino = $pastaImg . DIRECTORY_SEPARATOR . $nomeFoto;

                // Move o arquivo enviado para a pasta de destino
                if (move_uploaded_file($_FILES['imagem']['tmp_name'], $caminhoDestino)) {
                    // Define as variáveis de foto e endpasta com o caminho relativo
                    $foto = $nomeFoto;
                    $endpasta = 'img/' . $nomeFoto;
                } else {
                    // Mostra alerta de erro ao mover o arquivo
                    echo "<script>alert('Erro ao mover o arquivo para a pasta.'); window.history.back();</script>";
                    exit;
                }
            } else {
                // Mostra alerta se a extensão não for permitida
                echo "<script>alert('Apenas JPG, JPEG ou PNG são permitidos!'); window.history.back();</script>";
                exit;
            }
        } else {
            // Mostra alerta se nenhum arquivo foi enviado
            echo "<script>alert('Nenhum arquivo enviado ou ocorreu um erro no upload.'); window.history.back();</script>";
            exit;
        }

        // Cria uma nova instância do modelo de livro
        $model = new livroModel();

        // Tenta inserir o livro com os dados incluindo a imagem
        if ($model->inserir($titulo, $ano_publicacao, $id_autor, $id_categoria, $foto, $endpasta)) {
            // Redireciona para a listagem de livros após o cadastro bem-sucedido
            header("Location: index.php?action=listarLivros");
            exit;
        } else {
            // Mostra mensagem de erro se não conseguir inserir
            echo "Erro ao cadastrar livro.";
        }
    }

    public function listar() {
        $model = new livroModel();
        $lista = $model->listar();
        include __DIR__ . '/../view/livrosLista.php';
    }
}
?>
