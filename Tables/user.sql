DROP TABLE IF EXISTS user;

CREATE TABLE user (
    id int(11) NOT NULL AUTO_INCREMENT,
    lastname varchar(100) NOT NULL,
    firstname varchar(50) NOT NULL,
    email varchar(150) NOT NULL,
    password varchar(255) NOT NULL,
    PRIMARY KEY (id)
);

INSERT INTO user VALUES
(1, 'Rébecca', 'Armand', 'armand@mail.com', '$2y$10$iz0Kzb7IWpJEylyX5dDp2eH6XNVLTCBhhKfAOq8pIR65Rk0XJC63K'),
(2, 'Aimée', 'Hebert', 'herbet@mail.com', '$2y$10$iz0Kzb7IWpJEylyX5dDp2eH6XNVLTCBhhKfAOq8pIR65Rk0XJC63K'),
(3, 'Marielle', 'Ribeiro', 'ribeiro@mail.com', '$2y$10$iz0Kzb7IWpJEylyX5dDp2eH6XNVLTCBhhKfAOq8pIR65Rk0XJC63K'),
(4, 'Hilaire', 'Savary', 'savary@mail.com', '$2y$10$iz0Kzb7IWpJEylyX5dDp2eH6XNVLTCBhhKfAOq8pIR65Rk0XJC63K');
