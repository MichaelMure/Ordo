CREATE TABLE membre (id BIGINT AUTO_INCREMENT, username VARCHAR(50), passwd VARCHAR(50) NOT NULL, numero_etudiant BIGINT, prenom VARCHAR(255) NOT NULL, nom VARCHAR(255) NOT NULL, sexe VARCHAR(255) NOT NULL, date_naissance DATE NOT NULL, ville_naissance VARCHAR(255) NOT NULL, numero_secu VARCHAR(21), promo BIGINT NOT NULL, filiere VARCHAR(255) NOT NULL, poste VARCHAR(50), adresse_mulhouse TEXT NOT NULL, cp_mulhouse BIGINT NOT NULL, ville_mulhouse VARCHAR(255) NOT NULL, adresse_parents TEXT, cp_parents BIGINT, ville_parents VARCHAR(255), tel_mobile VARCHAR(255), tel_fixe VARCHAR(255), email_interne VARCHAR(255), email_externe VARCHAR(255), carte_id TINYINT(1) DEFAULT '0' NOT NULL, just_domicile TINYINT(1) DEFAULT '0' NOT NULL, quittance TINYINT(1) DEFAULT '0' NOT NULL, cotisation TINYINT(1) DEFAULT '0' NOT NULL, status VARCHAR(255) DEFAULT 'Membre' NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) ENGINE = INNODB;
