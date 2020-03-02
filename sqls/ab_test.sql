CREATE TABLE designs
(
    id               INT AUTO_INCREMENT PRIMARY KEY COMMENT 'Primary key.',
    name             VARCHAR(100) NOT NULL COMMENT 'Name of the design.',
    split_percentage FLOAT        NOT NULL COMMENT 'Define the percentage to show the page.',
    total_access     INT DEFAULT 0 COMMENT 'Total of access on this template.'
)
    COMMENT 'Table with different designs';

INSERT INTO designs (name, split_percentage)
VALUES ('Design 1', 50.0),
       ('Design 2', 25.0),
       ('Design 3', 25.0)

