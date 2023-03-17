NOM BDD: NomDeLaBDD ---------------------------------------------------
CREATE TABLE
    IF NOT EXISTS `users` (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `username` varchar(50) NOT NULL,
        `password` varchar(255) NOT NULL,
        `email` varchar(100) NOT NULL,
        `role` int(11) NOT NULL,
        `city` varchar(100),
        `country` varchar(100),
        `register_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
        PRIMARY KEY (`id`)
    ) ENGINE = InnoDB AUTO_INCREMENT = 4 DEFAULT CHARSET = utf8;

INSERT INTO
    `users` (
        `id`,
        `username`,
        `password`,
        `role`
    )
VALUES (
        1,
        'admin',
        '$2y$10$j7X0fZOS8sSi8JlnmUqVYeC.wRmHQIe.RRfnSJ2mYKiF7FCu8JeYG',
        3
    ), (
        2,
        'editor',
        '$2y$10$hd2gXIhb3hNfvsEW8A3FZePEVji5NvuuWQHf5hgtiEE.ni9rZ5Ieq',
        2
    ), (
        3,
        'user',
        '$2y$10$bEWWo75azYuF129ZtBcKtOfI2JCCpMIuY6IrXNRDQKxn2xKx8372S',
        1
    );

CREATE TABLE
    IF NOT EXISTS `articles` (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `title` varchar(100) NOT NULL,
        `content` text NOT NULL,
        `slug` text NOT NULL,
        `image_path` text NOT NULL,
        `city` varchar(100),
        `publish_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
        PRIMARY KEY (`id`)
    );

CREATE TABLE
    IF NOT EXISTS `comments` (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `message` text NOT NULL,
        `send_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
        PRIMARY KEY (`id`)
    );