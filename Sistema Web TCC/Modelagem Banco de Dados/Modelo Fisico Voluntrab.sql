-- Geração de Modelo físico
-- Sql ANSI 2003 - brModelo.



CREATE TABLE Usuario (
Nome_usuario varchar(100),
Sobrenome varchar(100),
email varchar(100),
cpf_usuario int(50),
Data de nasc int(50),
senha varchar(100),
id_usuario int(50) PRIMARY KEY,
imagem_usuario Varbinary(Max)
)

CREATE TABLE instituição (
Nome da Instituição varchar(100),
E-mail varchar(100),
Estado varchar(100),
Cidade varchar(100),
Endereço varchar(100),
Telefone int(50),
CNPJ int(50),
Descrição varchar(100),
id_instituicao int(50) PRIMARY KEY,
imagem Varbinary(Max)
)

CREATE TABLE Instituição de Voluntários (
Nome da Instituição varchar(100),
E-mail varchar(100),
Estado varchar(100),
Cidade varchar(100),
Endereço varchar(100),
telefone int(50),
CNPJ int(50),
Quantidade de Voluntários int(50),
Descrição varchar(100),
id_instvolunt int(50) PRIMARY KEY,
imagem Varbinary(Max)
)

CREATE TABLE achieviment (
id_achivement int(50) PRIMARY KEY,
descrição varchar(100),
nome varchar(100),
imagem Varbinary(Max)
)

CREATE TABLE trabalho voluntario (
data int(50),
id_trabvolunt int(50) PRIMARY KEY,
descrição varchar(100),
id_instituicao int(50),
FOREIGN KEY(id_instituicao) REFERENCES instituição (id_instituicao)
)

CREATE TABLE usuario_trabvolunt (
id_trabvolunt int(50),
id_usuario int(50),
FOREIGN KEY(id_trabvolunt) REFERENCES trabalho voluntario (id_trabvolunt),
FOREIGN KEY(id_usuario) REFERENCES Usuario (id_usuario)
)

CREATE TABLE instvolunt_trabvolunt (
id_trabvolunt int(50),
id_instvolunt int(50),
FOREIGN KEY(id_trabvolunt) REFERENCES trabalho voluntario (id_trabvolunt),
FOREIGN KEY(id_instvolunt) REFERENCES Instituição de Voluntários (id_instvolunt)
)

CREATE TABLE usuario_achivement (
id_usuario int(50),
id_achivement int(50),
FOREIGN KEY(id_usuario) REFERENCES achieviment (id_achivement),
FOREIGN KEY(id_achivement) REFERENCES Usuario (id_usuario)
)

CREATE TABLE achivement_instvolunt (
id_achivement int(50),
id_instvolunt int(50),
FOREIGN KEY(id_achivement) REFERENCES achieviment (id_achivement),
FOREIGN KEY(id_instvolunt) REFERENCES Instituição de Voluntários (id_instvolunt)
)

