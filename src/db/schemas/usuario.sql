CREATE TABLE IF NOT EXISTS Usuarios (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    nome TEXT ,
    email TEXT,
    senha TEXT,
    adicionado_em TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
    
)