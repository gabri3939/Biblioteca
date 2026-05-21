-- ========================================
-- MIGRAÇÃO: Permitir NULL em endpasta e adicionar data_devolucao_prevista
-- ========================================

-- 1. Permitir NULL no campo endpasta
ALTER TABLE livros MODIFY COLUMN endpasta varchar(250) NULL;

-- 2. Adicionar coluna data_devolucao_prevista em emprestimos
ALTER TABLE emprestimos ADD COLUMN data_devolucao_prevista DATE AFTER data_emprestimo;
