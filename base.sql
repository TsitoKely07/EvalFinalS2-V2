create database projetS2;
use projetS2;

create table membre(
    id_membre INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100),
    dataNaissance DATE,
    genre VARCHAR(10),
    email VARCHAR(100),
    ville VARCHAR(100),
    mot_de_passe VARCHAR(100),
    image_profil VARCHAR(100)
);

create table categorie_objet(
    id_categorie INT AUTO_INCREMENT PRIMARY KEY,
    nom_categorie VARCHAR(100)
);

create table objet(
    id_objet INT PRIMARY KEY,
    nom_objet VARCHAR(100),
    id_categorie INT,
    id_membre INT,
    FOREIGN KEY(id_categorie) REFERENCES categorie_objet(id_categorie),
    FOREIGN KEY(id_membre) REFERENCES membre(id_membre)
);

create table image_objet(
    id_image INT AUTO_INCREMENT PRIMARY KEY,
    id_objet INT,
    nom_image VARCHAR(150),
    FOREIGN KEY(id_objet) REFERENCES objet(id_objet)
);

create table emprunts(
    id_emprunt INT AUTO_INCREMENT PRIMARY KEY,
    id_objet INT,
    id_membre INT,
    date_emprunt DATE,
    date_retour DATE,
    FOREIGN KEY(id_objet) REFERENCES objet(id_objet),
    FOREIGN KEY(id_membre) REFERENCES membre(id_membre)
);

INSERT INTO membre (nom, dataNaissance, genre, email, ville, mot_de_passe, image_profil) VALUES
('rabe', '1985-04-12', 'M', 'rabe@example.com', 'Paris', 'password1', 'rabe.jpg'),
('zaka', '1990-07-23', 'F', 'zaka@example.com', 'Lyon', 'password2', 'zaka.jpg'),
('zo', '1982-11-05', 'M', 'zo@example.com', 'Marseille', 'password3', 'zo.jpg'),
('Ipsomes', '1995-02-17', 'F', 'Ipsomes@example.com', 'Toulouse', 'password4', 'Ipsomes.jpg');

INSERT INTO categorie_objet (nom_categorie) VALUES
('esthetiques'),
('bricolage'),
('mecanique'),
('cuisine');

INSERT INTO objet (id_objet, nom_objet, id_categorie, id_membre) VALUES
(1, 'vernis', 1, 1),
(2, 'marteaux', 2, 1),
(3, 'echappement', 3, 1),
(4, 'casserole', 4, 1),
(5, 'Seche cheveux', 1, 1),
(6, 'cloux', 2, 1),
(7, 'pneux', 3, 1),
(8, 'poele', 4, 1),
(9, 'Brushing', 1, 1),
(10, 'Scie', 2, 1),

(11, 'Gel', 1, 2),
(12, 'marteaux', 2, 2),
(13, 'echappement', 3, 2),
(14, 'casserole', 4, 2),
(15, 'Gel', 1, 2),
(16, 'marteaux', 2, 2),
(17, 'echappement', 3, 2),
(18, 'casserole', 4, 2),
(19, 'Gel', 1, 2),
(20, 'marteaux', 2, 2),

(21, 'Gel', 1, 3),
(22, 'marteaux', 2, 3),
(23, 'echappement', 3, 3),
(24, 'casserole', 4, 3),
(25, 'Gel', 1, 3),
(26, 'marteaux', 2, 3),
(27, 'echappement', 3, 3),
(28, 'casserole', 4, 3),
(29, 'Gel', 1, 3),
(30, 'marteaux', 2, 3),

(31, 'Gel', 1, 4),
(32, 'marteaux', 2, 4),
(33, 'echappement', 3, 4),
(34, 'casserole', 4, 4),
(35, 'Gel', 1, 4),
(36, 'marteaux', 2, 4),
(37, 'echappement', 3, 4),
(38, 'casserole', 4, 4),
(39, 'Gel', 1, 4),
(40, 'marteaux', 2, 4);

INSERT INTO emprunts (id_objet, id_membre, date_emprunt, date_retour) VALUES
(1, 2, '2024-01-01', '2024-01-10'),
(5, 3, '2024-01-05', '2024-01-15'),
(10, 4, '2024-01-10', '2024-01-20'),
(15, 1, '2024-01-12', '2024-01-22'),
(20, 3, '2024-01-15', '2024-01-25'),
(25, 4, '2024-01-18', '2024-01-28'),
(30, 1, '2024-01-20', '2024-01-30'),
(35, 2, '2024-01-22', '2024-02-01'),
(40, 3, '2024-01-25', '2024-02-04'),
(4, 1, '2024-01-28', '2024-02-07');
