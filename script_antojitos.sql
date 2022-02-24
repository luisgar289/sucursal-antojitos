create database if not exists  Antojitos;
use Antojitos;
create table if not exists Ingredientes(
idIngrediente int not null,
Costo int not null,
Cantidad int not null,
primary key (idIngrediente)
)engine=InnoDB;
create table if not exists Cliente(
idCliente int not null auto_increment,
Direccion varchar(45),
No_Telefono int(10),
primary key (idCliente)
)engine=InnoDB;
create table if not exists Antojitos(
idAntojito int not null,
Precio int not null,
primary key (idAntojito),
ingrediente_idIngrediente int not null,
constraint fk_antojito_ingrediente
foreign key (ingrediente_idIngrediente)
references Ingredientes(idIngrediente)
)engine=InnoDB;
create table if not exists Pedido(
idPedido int not null auto_increment,
Costo_total int not null,
cliente_idCliente int not null,
antojito_idAntojito int not null,
primary key(idPedido),
constraint fk_pedido_cliente
foreign key (cliente_idCliente)
references Cliente(idCliente),
constraint fk_pedido_antojito
foreign key (antojito_idAntojito)
references Antojitos(idAntojito)
)engine=InnoDB;
create table if not exists Inventario(
idInventario int,
Venta_total int not null,
Inversion int not null,
primary key (idInventario)
)engine=InnoDB;
alter table ingredientes add Ingrediente varchar(20) not null after idIngrediente;
alter table antojitos add Antojitos varchar(30) not null after idAntojito;
alter table cliente modify No_Telefono varchar(10);
