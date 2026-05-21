# 🔧 Instruções de Correção - Upload de Capa de Livro

## ✅ Verificação Rápida

Acesse: `http://localhost/mvc_biblioteca%20v5%20(2)/mvc_bibiloteca_corrigido/verificacao.php`

Este arquivo verifica automaticamente se tudo está configurado corretamente.

---

## 🛠️ Problema Encontrado e Corrigido

### Problema: Campo `endpasta` NOT NULL
- **Causa**: O banco de dados tinha o campo `endpasta` como `NOT NULL`, mas o código permitia valores NULL
- **Solução**: Alterar para permitir NULL

---

## 📝 Como Executar a Correção

### Opção 1: Recriar Banco (PERDARÁ DADOS)
```sql
-- Arquivo: docs/banco_dados.sql
-- Abra phpMyAdmin e execute todo o conteúdo deste arquivo
```

### Opção 2: Migração (RECOMENDADO - Preserva dados)
```sql
-- Arquivo: docs/migracao_permitir_null_endpasta.sql
-- Execute apenas este comando no phpMyAdmin:

ALTER TABLE livros MODIFY COLUMN endpasta varchar(250) NULL;
```

### Passo a Passo no phpMyAdmin:
1. Abra **phpMyAdmin**: `http://localhost/phpmyadmin`
2. Selecione o banco: **dboBiblioteca**
3. Clique em **SQL**
4. Cole o comando da migração
5. Clique em **Executar**

---

## 📂 Arquivos Modificados

### 1. **model/livroModel.php** ✅
- Adicionados parâmetros `$foto` e `$endpasta` ao método `inserir()`
- Agora insere imagem no banco de dados

### 2. **controller/controllerLivro.php** ✅
- Implementado upload com validação (JPG, JPEG, PNG)
- Cria pasta `/img` automaticamente
- Gera nomes únicos com `md5(uniqid())`

### 3. **view/livrosLista.php** ✅
- Adicionada coluna "Imagem Capa"
- Exibe imagem 50px com efeito hover
- Layout: ID | Imagem | Título | Ano | Autor | Categoria | Ações

### 4. **view/livroForm.php** ✅
- Adicionados comentários em todos os campos
- Campo de upload já configurado

### 5. **css/estilo.css** ✅
- Adicionados estilos para coluna de imagem
- Efeito hover (zoom 1.1x)
- Corrigidos comentários inválidos (`//` → `/* */`)

### 6. **docs/banco_dados.sql** ✅
- Campo `endpasta` agora permite NULL

---

## 🚀 Teste o Sistema

### 1. Verificar instalação
```
http://localhost/mvc_biblioteca%20v5%20(2)/mvc_bibiloteca_corrigido/verificacao.php
```

### 2. Acessar lista de livros
```
http://localhost/mvc_biblioteca%20v5%20(2)/mvc_bibiloteca_corrigido/index.php?action=listarLivros
```

### 3. Cadastrar novo livro
- Clique em **+ Novo Livro**
- Preencha os campos:
  - ✅ Título (obrigatório)
  - ✅ Ano de Publicação (opcional)
  - ✅ Capa do Livro (obrigatório - JPG/PNG)
  - ✅ Autor (obrigatório)
  - ✅ Categoria (obrigatório)
- Clique em **Salvar Livro**

### 4. Verificar resultado
- Volte para a lista
- A imagem deve aparecer na coluna "Imagem Capa"

---

## 🐛 Troubleshooting

### Erro: "Apenas JPG, JPEG ou PNG são permitidos!"
- Verifique o formato do arquivo
- Formatos aceitos: `.jpg`, `.jpeg`, `.png`

### Erro: "Erro ao mover o arquivo para a pasta"
- Verifique permissões da pasta `/img`
- Execute em Windows: `icacls "C:\xampp\htdocs\mvc_biblioteca v5 (2)\mvc_bibiloteca_corrigido\img" /grant Everyone:(OI)(CI)F`

### Imagem não aparece na lista
- Verifique se foi salvo no banco: `SELECT * FROM livros;`
- Procure pelo arquivo em: `/img/`

### Erro de banco de dados
- Execute a migração: `migracao_permitir_null_endpasta.sql`
- Confirme: `DESCRIBE livros;` (coluna endpasta deve ser "YES" em Null)

---

## 📋 Checklist Final

- ✅ CSS corrigido (comentários)
- ✅ Pasta `/img` criada
- ✅ Banco de dados atualizado (endpasta permite NULL)
- ✅ Todos os arquivos comentados
- ✅ Upload validado (extensão, tamanho)
- ✅ Imagens exibem na lista com efeito hover

---

**Status**: ✅ Pronto para usar!
