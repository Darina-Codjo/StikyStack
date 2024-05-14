INSERT INTO `note` (`title`, `content`, `creationDate`, `updateDate`)
VALUES
    ('Note 1', 'Contenu de la note 1', NOW(), NOW()),
    ('Note 2', 'Contenu de la note 2', NOW(), NOW()),
    ('Note 3', 'Contenu de la note 3', NOW(), NOW()),
    ('Note 4', 'Contenu de la note 4', NOW(), NOW()),
    ('Note 5', 'Contenu de la note 5', NOW(), NOW()),
    ('Note 6', 'Contenu de la note 6', NOW(), NOW()),
    ('Note 7', 'Contenu de la note 7', NOW(), NOW()),
    ('Note 8', 'Contenu de la note 8', NOW(), NOW()),
    ('Note 9', 'Contenu de la note 9', NOW(), NOW()),
    ('Note 10', 'Contenu de la note 10', NOW(), NOW());


INSERT INTO `link` (`idUser`, `idNote`)
VALUES
    (1, 1),
    (2, 2),
    (3, 3),
    (4, 4),
    (5, 5),
    (6, 6),
    (7, 7),
    (8, 8),
    (9, 9),
    (10, 10);


INSERT INTO `user` (`idUser`, `firstName`, `lastName`, `userName`, `email`, `creationDate`, `updateDate`, `password`)
VALUES
    (1, 'John', 'Doe', 'john_doe', 'john.doe@example.com', NOW(), NOW(), 'motdepasse1'),
    (2, 'Alice', 'Smith', 'alice_smith', 'alice.smith@example.com', NOW(), NOW(), 'motdepasse2'),
    (3, 'Bob', 'Johnson', 'bob_johnson', 'bob.johnson@example.com', NOW(), NOW(), 'motdepasse3'),
    (4, 'Emily', 'Brown', 'emily_brown', 'emily.brown@example.com', NOW(), NOW(), 'motdepasse4'),
    (5, 'Michael', 'Davis', 'michael_davis', 'michael.davis@example.com', NOW(), NOW(), 'motdepasse5'),
    (6, 'Emma', 'Wilson', 'emma_wilson', 'emma.wilson@example.com', NOW(), NOW(), 'motdepasse6'),
    (7, 'James', 'Taylor', 'james_taylor', 'james.taylor@example.com', NOW(), NOW(), 'motdepasse7'),
    (8, 'Sophia', 'Martinez', 'sophia_martinez', 'sophia.martinez@example.com', NOW(), NOW(), 'motdepasse8'),
    (9, 'Oliver', 'Anderson', 'oliver_anderson', 'oliver.anderson@example.com', NOW(), NOW(), 'motdepasse9'),
    (10, 'Chloe', 'Thompson', 'chloe_thompson', 'chloe.thompson@example.com', NOW(), NOW(), 'motdepasse10');

