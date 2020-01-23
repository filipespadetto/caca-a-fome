USE caca_fome_db;

INSERT INTO localidade
(logadouro, numero_local, cep_local, cidade_id_cidade, bairro_id_bairro)
VALUES ("Shopping Mestre Álvaro", "S/N", "29092-105", 1, 2);

INSERT INTO restaurante 
(nome_restaurante, descricao_restaurante, hora_inicio, hora_fim, dia_inicio, dia_fim, 
telefone_restaurante, celular_restaurante, email_restaurante, esp_restaurante, localidade_id_local)
VALUES ("Rick's Burger", "Hamburgueria artesanal serve versões encorpadas de 
sandubas em espaço estilizado e descontraído com boemia.", "12:00", "22:00", "Segunda-feira", "Segunda-feira",
"(27)3072-9461", "", "", 1, (SELECT LAST_INSERT_ID()));

INSERT INTO res_ambiente
(res_id_restaurante, amb_id_ambiente) VALUES ((SELECT id_restaurante FROM restaurante ORDER BY id_restaurante DESC), 8);
INSERT INTO res_ambiente
(res_id_restaurante, amb_id_ambiente) VALUES ((SELECT id_restaurante FROM restaurante ORDER BY id_restaurante DESC), 4);

INSERT INTO res_comida 
(res_id_restaurante_fk, com_id_tipo_comida) VALUES ((SELECT id_restaurante FROM restaurante ORDER BY id_restaurante DESC), 8);
INSERT INTO res_comida 
(res_id_restaurante_fk, com_id_tipo_comida) VALUES ((SELECT id_restaurante FROM restaurante ORDER BY id_restaurante DESC), 2);

INSERT INTO res_preco (id_res, id_preco)
VALUES ((SELECT id_restaurante FROM restaurante ORDER BY id_restaurante DESC), 2);
INSERT INTO res_preco (id_res, id_preco)
VALUES ((SELECT id_restaurante FROM restaurante ORDER BY id_restaurante DESC), 11);