-- Future MySQL schema for ARCS.
-- The current first version uses protected JSONL storage to keep deployment simple.

CREATE TABLE contacts (
  id VARCHAR(40) PRIMARY KEY,
  status VARCHAR(40) NOT NULL DEFAULT 'nouveau',
  first_name VARCHAR(120) NOT NULL,
  last_name VARCHAR(120) NOT NULL,
  email VARCHAR(180) NOT NULL,
  phone VARCHAR(60),
  subject VARCHAR(180) NOT NULL,
  message TEXT NOT NULL,
  created_at DATETIME NOT NULL
);

CREATE TABLE quotes (
  id VARCHAR(40) PRIMARY KEY,
  status VARCHAR(40) NOT NULL DEFAULT 'nouveau',
  first_name VARCHAR(120) NOT NULL,
  last_name VARCHAR(120) NOT NULL,
  email VARCHAR(180) NOT NULL,
  phone VARCHAR(60) NOT NULL,
  profile VARCHAR(120) NOT NULL,
  formation VARCHAR(180) NOT NULL,
  funding VARCHAR(180),
  message TEXT,
  created_at DATETIME NOT NULL
);

CREATE TABLE exam_sessions (
  id INT AUTO_INCREMENT PRIMARY KEY,
  exam VARCHAR(120) NOT NULL,
  starts_at DATETIME NOT NULL,
  location VARCHAR(255) NOT NULL,
  seats_total INT NOT NULL DEFAULT 0,
  seats_reserved INT NOT NULL DEFAULT 0,
  price_cents INT,
  status VARCHAR(40) NOT NULL DEFAULT 'draft'
);

CREATE TABLE reservations (
  id VARCHAR(40) PRIMARY KEY,
  status VARCHAR(40) NOT NULL DEFAULT 'en_attente_paiement',
  payment_status VARCHAR(40) NOT NULL DEFAULT 'a_connecter',
  exam VARCHAR(120) NOT NULL,
  session_label VARCHAR(255) NOT NULL,
  first_name VARCHAR(120) NOT NULL,
  last_name VARCHAR(120) NOT NULL,
  birth_date DATE NOT NULL,
  email VARCHAR(180) NOT NULL,
  phone VARCHAR(60) NOT NULL,
  accessibility TEXT,
  created_at DATETIME NOT NULL
);
