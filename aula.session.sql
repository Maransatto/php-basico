describe usuarios;

INSERT INTO usuarios (
    nome,
    email,
    senha
) VALUES (
    'Fernando Silva Maransatto',
    'fernando.maransatto@gmail.com',
    '$2y$10$SpIEUpnbzT8LS74HhZqK1Oac9X8JIITGPou2knqKgfD4saw6X6oca'
);


SELECT * FROM usuarios;

SELECT id_usuario, nome, email, senha FROM usuarios WHERE email = 'fernando.maransatto@gmail.com';

truncate table usuarios;
