CREATE DATABASE IF NOT EXISTS constructalia;

# Ponemos en uso la bdd
USE constructalia;


# ----------------------------------------------------------------------------
#                                    Estándar
# ----------------------------------------------------------------------------

# Todas las tablas se crearan con el siguiente estándar.

/*CREATE TABLE EXAMPLE(
	
    # 1 - Clave identificatoria autoincremental
	# 2 - Campos de tipo varchar, integer, date/datetime, ENUM
	# 3 - Claves foráneas
	# 4 - Booleanos
    
);*/

# El nombre de las tablas irá en minúsculas y con formato camel_case
# Las fk seguirán un formato camel_case
# Campos de tipo varchar como:
# - name: 50 a excepción de la tabla Rol
# - surname:150
# - description: 250

# ----------------------------------------------------------------------------
#                               Creamos las tablas
# ----------------------------------------------------------------------------


# Tablas del modelo User
# -------------------

# Tabla permission
CREATE TABLE IF NOT EXISTS PERMISSION(
	id INT AUTO_INCREMENT UNIQUE PRIMARY KEY,
    name VARCHAR(250) NOT NULL
);

# Tabla rol
CREATE TABLE IF NOT EXISTS ROL(
	id INT AUTO_INCREMENT UNIQUE PRIMARY KEY,
    name VARCHAR(100) NOT NULL
);

# Tabla user
CREATE TABLE IF NOT EXISTS USER(
	id INT AUTO_INCREMENT UNIQUE PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    pswd VARCHAR(250) NOT NULL,
    name VARCHAR(50) NOT NULL,
    surname VARCHAR(50) NOT NULL,
    email VARCHAR(250) NULL,
    phone VARCHAR(250) NULL,
    rol int,
    permission int,
    FOREIGN KEY (rol) REFERENCES rol(id),
    FOREIGN KEY (permission) REFERENCES permission(id)
);
# -------------------


INSERT INTO ROL(name) VALUES ('superadmin');

INSERT INTO USER(username, pswd, name, surname, email, phone, rol) VALUES ('superadmin',MD5('1234'),'superadmin','superadmin','superadmin@gmail.com','699000000',1);
                                                    


# Tablas del modelo Machinery
# -------------------

# Tabla Warehouse
CREATE TABLE IF NOT EXISTS WAREHOUSE(
	id INT AUTO_INCREMENT UNIQUE PRIMARY KEY,
    name VARCHAR(100),
    address VARCHAR(250)
);


# Tabla Ubication
CREATE TABLE IF NOT EXISTS UBICATION(
	id INT AUTO_INCREMENT UNIQUE PRIMARY KEY,
    warehouse int,
    building_site int,
    FOREIGN KEY (warehouse) REFERENCES warehouse(id)    
);



# Tabla Machinery Family
CREATE TABLE IF NOT EXISTS MACHINERY_FAMILY(
	id INT AUTO_INCREMENT UNIQUE PRIMARY KEY,
    name VARCHAR(250) NOT NULL
);


# Tabla Machinery
CREATE TABLE IF NOT EXISTS MACHINERY(
	id INT AUTO_INCREMENT UNIQUE PRIMARY KEY,
    code VARCHAR(50) NOT NULL,
    name VARCHAR(250) NOT NULL,
    machinery_type ENUM('NONE','TRUCK','OTHER'),    
    total_amount FLOAT (10,3),
    price_day FLOAT (10,3),
    last_revision DATE,
    ubication INT,
    family INT,
    available BOOLEAN,
    FOREIGN KEY (ubication) REFERENCES ubication(id),    
    FOREIGN KEY (family) REFERENCES machinery_family(id)
);



# Tablas del modelo BuildingSite
# -------------------

# Tabla Building Site
CREATE TABLE IF NOT EXISTS BUILDING_SITE(
	id INT AUTO_INCREMENT UNIQUE PRIMARY KEY,
    code VARCHAR(50) NOT NULL,
    name VARCHAR(250) NOT NULL,
    description VARCHAR(250) NOT NULL,    
    responsible int,
    machinery int,
    is_active BOOLEAN,
    FOREIGN KEY (responsible) REFERENCES user(id),
    FOREIGN KEY (machinery) REFERENCES machinery(id)
);


# FK de la tabla Building Site a Ubication
ALTER TABLE UBICATION ADD FOREIGN KEY (building_site) REFERENCES BUILDING_SITE(id);


# Tablas del modelo Staff
# -------------------

# Tabla Category
CREATE TABLE IF NOT EXISTS CATEGORY(
	id INT AUTO_INCREMENT UNIQUE PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    price_hour FLOAT (10,3)    
);


# Tabla Training
CREATE TABLE IF NOT EXISTS TRAINING(
	id INT AUTO_INCREMENT UNIQUE PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    hour int    
);


# Tabla Profession
CREATE TABLE IF NOT EXISTS PROFESSION(
	id INT AUTO_INCREMENT UNIQUE PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    category int,
    FOREIGN KEY (category) REFERENCES category(id)
);


# Tabla m2m entre Building Site y User 
CREATE TABLE IF NOT EXISTS TRAINING_PROFESSION(
    profession int,
    training int
);


# Tabla m2m entre Building Site y User 
CREATE TABLE IF NOT EXISTS BUILDING_SITE_USER(
    building_site int,
    user int
);


# Tabla Documentatio Type 
CREATE TABLE IF NOT EXISTS DOCUMENTATION_TYPE(
	id INT AUTO_INCREMENT UNIQUE PRIMARY KEY,
    name VARCHAR(50) NOT NULL
);


# Tabla Attached 
CREATE TABLE IF NOT EXISTS ATTACHED(
	id INT AUTO_INCREMENT UNIQUE PRIMARY KEY,
    file MEDIUMBLOB,
    created_at DATE,
    upload_at DATE,
    documentation_type int,
    FOREIGN KEY (documentation_type) REFERENCES documentation_type(id)
);


# Tabla Company 
CREATE TABLE IF NOT EXISTS COMPANY(
	id INT AUTO_INCREMENT UNIQUE PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    type ENUM('SOCIETY','CB','RETA'),    
    attached int,
    FOREIGN KEY (attached) REFERENCES attached(id)
);


# Tabla Building Staff
CREATE TABLE IF NOT EXISTS Staff(
	id INT AUTO_INCREMENT UNIQUE PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    dni VARCHAR(15) NOT NULL,
    description VARCHAR(250) NOT NULL,    
    responsible int,
    machinery int,
    medical_examination DATE,
    state ENUM('SUITABLE','PROVISIONAL SUITABLE','UNSUITABLE'),
    has_epi BOOLEAN,
    has_appointment BOOLEAN,
    is_preventive_resource BOOLEAN,
    has_driving_license BOOLEAN,
    FOREIGN KEY (responsible) REFERENCES user(id),
    FOREIGN KEY (machinery) REFERENCES machinery(id)
);


# Tabla m2m entre Profession y Staff 
CREATE TABLE IF NOT EXISTS PROFESSION_STAFF(
    staff int,
    profession int,
    start DATE,
    end DATE
);

# Tabla Own staff
CREATE TABLE IF NOT EXISTS OWN_STAFF(
	id INT AUTO_INCREMENT UNIQUE PRIMARY KEY
);


# Tabla Outsource
CREATE TABLE IF NOT EXISTS OUTSOURCE(
	id INT AUTO_INCREMENT UNIQUE PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    cif VARCHAR(25) NOT NULL,
    phone int,    
    contact VARCHAR(25) NOT NULL,
    description VARCHAR(250) NOT NULL,
    state ENUM('ACTIVE','DEACTIVATED'),
    user int,
    building_site int,
    company int,
    is_informed BOOLEAN,    
    FOREIGN KEY (user) REFERENCES user(id),
    FOREIGN KEY (building_site) REFERENCES building_site(id),
    FOREIGN KEY (company) REFERENCES company(id)
);


# Tabla Outsourced
CREATE TABLE IF NOT EXISTS OUTSOURCED(
	id INT AUTO_INCREMENT UNIQUE PRIMARY KEY,
    ita DATE,
    high_ita DATE,    
    self_employment_discharge DATE,    
    outsource int,
    is_informed BOOLEAN,
    FOREIGN KEY (outsource) REFERENCES outsource(id)
);



# Tablas del modelo Order
# -------------------


# Tabla Ordering
CREATE TABLE IF NOT EXISTS ORDERING(
	id INT AUTO_INCREMENT UNIQUE PRIMARY KEY,
    note VARCHAR(50) NOT NULL,
    carried_out TIMESTAMP,
    state ENUM('COMPLETE','PARTIAL','EARRING'),
    made_by int,
    building_site int,
    modified_by_admin BOOLEAN,    
    is_urgent BOOLEAN,
    FOREIGN KEY (made_by) REFERENCES user(id),
    FOREIGN KEY (building_site) REFERENCES building_site(id)
);


# Tabla Supplier
CREATE TABLE IF NOT EXISTS SUPPLIER(
	id INT AUTO_INCREMENT UNIQUE PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    code VARCHAR(50) NOT NULL,
    email VARCHAR(50) NOT NULL,
    address VARCHAR(50) NOT NULL,
    phone INTEGER
);



# Tabla Material
CREATE TABLE IF NOT EXISTS MATERIAL(
	id INT AUTO_INCREMENT UNIQUE PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    quantity INTEGER,
    amount_quantity INTEGER,
    supplier INTEGER,
    ordering INTEGER,
    FOREIGN KEY (ordering) REFERENCES user(id),
    FOREIGN KEY (supplier) REFERENCES building_site(id)
);


# Tabla Rent
CREATE TABLE IF NOT EXISTS RENT(
	id INT AUTO_INCREMENT UNIQUE PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    quantity INTEGER,
    amortisation INTEGER,
    price FLOAT(10,3),
    start DATE,   
    finish DATE,   
    machinery INTEGER,
    building_site INTEGER,
    FOREIGN KEY (machinery) REFERENCES machinery(id),
    FOREIGN KEY (building_site) REFERENCES building_site(id)
);


# Tabla Documentatio Type 
CREATE TABLE IF NOT EXISTS TRUCK(
	id INT AUTO_INCREMENT UNIQUE PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    plate_number VARCHAR(25) NOT NULL,
    price_hour FLOAT(10,3)
);

# Insertamos datos
-- INSERT INTO CLIENTE(nombreCliente,ciudadCliente,presupuestoCliente) VALUES
-- 														('Marta Ferragut','Palma de Mallorca',5),
-- 														('Monica Genovart','Petra',1),
--                                                         ('Marina Serra','Petra',4),
--                                                         ('Joan Ferragut','Costitx',3),
--                                                         ('Andreu Ferrer','Costitx',2);
--                                                     