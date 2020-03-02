CREATE TABLE exads_test
(
    id       INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    name     varchar(150)    NOT NULL COMMENT 'User name.',
    age      INT             NOT NULL COMMENT 'User age.',
    job_tile VARCHAR(150)    NOT NULL COMMENT 'Job title.'
);

INSERT INTO exads_test (name, age, job_tile)
VALUES ('Gabriel Anhaia', 27, 'Software Developer'),
       ('Christian Zorzi', 27, 'Manager'),
       ('Gabriel Anhaia', 27, 'Software Developer'),
       ('Luciano Oliveira', 27, 'Software Developer 2'),
       ('Advogado de Exemplo', 27, 'Lawyer'),
       ('Paulo Roberto', 27, 'CTO'),
       ('John Kones', 27, 'CEO');