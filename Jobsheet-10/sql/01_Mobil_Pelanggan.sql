-- Jobsheet 8: Skema database AutoBekas (PostgreSQL)

CREATE TABLE IF NOT EXISTS mobil (
    id SERIAL PRIMARY KEY,
    merk VARCHAR(100) NOT NULL,
    model VARCHAR(100) NOT NULL,
    tahun INTEGER NOT NULL,
    harga BIGINT NOT NULL DEFAULT 0,
    kilometer INTEGER NOT NULL DEFAULT 0,
    kondisi VARCHAR(50)
);

CREATE TABLE IF NOT EXISTS pelanggan (
    id SERIAL PRIMARY KEY,
    nama VARCHAR(255) NOT NULL,
    no_ktp VARCHAR(50) NOT NULL UNIQUE,
    alamat VARCHAR(255),
    no_hp VARCHAR(30)
);