create database gereesc collate utf8_general_ci;
use gereesc;

-- Usuarios --
create table SecEdu (
    id int primary key auto_increment,
    nome varchar(64),
    email varchar(255),
    login varchar(64),
    senha varchar(64)
);

create table Nutricionista (
    id int primary key auto_increment,
    nome varchar(64),
    login varchar(64),
    senha varchar(64),
    cpf varchar(11),
    rg varchar(11),
    endereco varchar(255),
    email varchar(255),
    dataDeNascimento date,
    numero varchar(8),
    celular varchar(15)
);

create table SecEsc (
    id int primary key auto_increment,
    nomeSecEsc varchar(64),
    login varchar(64),
    senha varchar(64),
    cpf varchar(11),
    rg varchar(11),
    endereco varchar(255),
    email varchar(255),
    dataDeNascimento date,
    numero varchar(8),
    celular varchar(15),
    cargo enum('Diretor', 'Secretario'),
    escola_id int references Escola(id)
);

create table Aluno (
    id int primary key auto_increment,
    nomeAluno varchar(64),
    login varchar(64),
    senha varchar(64),
    dataDeNascimento date,
    anoEscolar_id int references AnoEscolar(id),
    escola_id int references Escola(id)
);

-- Referente A escola e Estoque--

create table Escola (
    id int primary key auto_increment,
    nomeEscola varchar(100),
    endereco varchar(255),
    cnpj varchar(12),
    email varchar(255),
    numero varchar(8),
    telefone varchar(12),
    alunosEnsInfantil integer,
    alunosEnsFundamental integer
);

create table AnoEscolar (
    id int primary key auto_increment,
    nomeAnoEscolar varchar(64)
);

create table Estoque (
    estoque_id int primary key auto_increment,
    escola_id int references Escola(id),
    produto_id int references Produto(id),
    estoqueTransf_id int,
    quantidade int,
    quantAlterada int,
    data datetime,
    usuario_id int,
    tipoUsuario enum('SecEdu', 'SecEsc', 'Nut'),
    acao enum('Adicionado', 'Retirado', 'TransfRed', 'TransfAdd'),
    status boolean
);

create table Produto (
    id int primary key auto_increment,
    nomeProduto varchar(64),
    marca varchar(64),
    peso decimal,
    tipoDePeso_id int references TipoDePeso(id),
    tipoDeProduto_id int references TipoDeProduto(id)
);

create table TipoDePeso(
    id int primary key auto_increment,
    nomeTipoPeso varchar(64)
);

create table TipoDeProduto(
    id int primary key auto_increment,
    nomeTipoProduto varchar(64)
);

-- Referente ao Cardapio etc... ---

create table Cardapio_Refeicao (
    id int primary key auto_increment,
    data date,
    anoEscolar_id int references AnoEscolar(id),
    refeicao_id int references Refeicao(id)
);

create table Refeicao (
    id int primary key auto_increment,
    nome varchar(64)
);

-- Referente aos Relatorios e afins...--

create table Pedido (
    id int primary key auto_increment,
    data date,
    escola_id int references Escola(id),
    nutricionista_id int references Nutricionista(id)
);

create table Itens (
    pedido_id int references Pedido(id),
    produto_id int references Produto(id),
    quantidade int
);

-- Inserts e afins --

insert into SecEdu values(default, "SecEdu", "secEdu", "123");

insert into TipoDePeso values
(default, "g"),
(default, "kg"),
(default, "ml"),
(default, "L");

insert into AnoEscolar values
(default, "Ensino Infantil"),
(default, "Ensino Fundamental");
