-- ========================================
-- SCRIPT DE CORREÇÃO COMPLETO
-- Copie e cole tudo isso no phpMyAdmin -> SQL
-- ========================================

-- 1. Permitir NULL em endpasta (livros)
ALTER TABLE livros MODIFY COLUMN endpasta varchar(250) NULL;

-- 2. Adicionar coluna data_devolucao_prevista (emprestimos)
ALTER TABLE emprestimos ADD COLUMN data_devolucao_prevista DATE AFTER data_emprestimo;

-- ========================================
-- VERIFICAÇÃO - Execute para confirmar
-- ========================================

-- Mostrar estrutura da tabela livros
DESCRIBE livros;

-- Mostrar estrutura da tabela emprestimos
DESCRIBE emprestimos;

-- ========================================
-- FIM DO SCRIPT
-- ========================================
-- Se não teve erros, tudo está pronto! ✅
