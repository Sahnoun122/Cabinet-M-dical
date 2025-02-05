CREATE TABLE rendez_vous (
    id_rdv SERIAL PRIMARY KEY,
    id_medcins INT NOT NULL,
    id_patients INT NOT NULL,
    date_creation TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (id_medcins) REFERENCES users(id_user),
    FOREIGN KEY (id_patients) REFERENCES users(id_user)
);

CREATE TABLE utilisateurs (
    id_user SERIAL PRIMARY KEY,
    Nom VARCHAR(255) NOT NULL,
    Prenom VARCHAR(255) NOT NULL,
    email VARCHAR(255) UNIQUE NOT NULL,
    Password VARCHAR(255) NOT NULL,
    role VARCHAR(50) NOT NULL CHECK (role IN ('patient', 'medecin'))
);