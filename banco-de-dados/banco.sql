
-- Usuarios --
create table SecEdu (
    id int primary key auto_increment,
    nome varchar(64),
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
    nome varchar(64),
    login varchar(64),
    senha varchar(64),
    cpf varchar(11),
    rg varchar(11),
    endereco varchar(255),
    email varchar(255),
    dataDeNascimento date,
    numero varchar(8),
    celular varchar(15),
    escola_id int references Escola(id)
);

create table Aluno (
    id int primary key auto_increment,
    nome varchar(64),
    login varchar(64),
    senha varchar(64),
    dataDeNascimento date,
    secEsc_id int references SecEsc(id),
    anoEscolar_id int references AnoEscolar(id),
    escola_id int references Escola(id)
);

-- Referente A escola e Estoque--

create table Escola (
    id int primary key auto_increment,
    nome varchar(100),
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
    nome varchar(64)
);

create table Estoque (
    id int primary key auto_increment,
    escola_id int references Escola(id),
    produto_id int references Produto(id),
    quantidade int,
    status enum('Adicionado', 'Retirado', 'Transportado')
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

create table Cardapio (
    id int primary key auto_increment,
    mes date,
    nutricionista_id int references Nutricionista(id),
    anoEscolar_id int references AnoEscolar(id)
);

create table Cardapio_has_Refeicao (
    cardapio_id int references Cardapio(id),
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

insert into TipoDePeso values(default, "g");
insert into TipoDePeso values(default, "kg");
insert into TipoDePeso values(default, "ml");
insert into TipoDePeso values(default, "L");

select Estoque.id, Estoque.escola_id, Produto.nomeProduto, TipoDeProduto.nomeTipoProduto, Produto.marca, Produto.peso, TipoDePeso.nomeTipoPeso, Estoque.quantidade from Estoque 
inner join Produto on Estoque.produto_id = Produto.id
inner join TipoDePeso on Produto.tipoDePeso_id = TipoDePeso.id
inner join TipoDeProduto on Produto.tipoDeProduto_id = TipoDeProduto.id where escola_id = 2;

select Estoque.id, Produto.nomeProduto, TipoDeProduto.nomeTipoProduto, Produto.marca, Produto.peso, TipoDePeso.nomeTipoPeso, Estoque.quantidade from Estoque 
inner join Produto on Estoque.produto_id = Produto.id 
inner join TipoDePeso on Produto.tipoDePeso_id = TipoDePeso.id 
inner join TipoDeProduto on Produto.tipoDeProduto_id = TipoDeProduto.id 
where escola_id=2 and status='Adicionado';