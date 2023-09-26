#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


#------------------------------------------------------------
# Table: A5cy8_Books
#------------------------------------------------------------

CREATE TABLE A5cy8_Books(
        id      Int  Auto_increment  NOT NULL ,
        name    Varchar (50) NOT NULL ,
        year    Varchar (4) NOT NULL ,
        image   Varchar (1) NOT NULL ,
        Summary Text NOT NULL
	,CONSTRAINT Books_PK PRIMARY KEY (id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: A5cy8_Usersroles
#------------------------------------------------------------

CREATE TABLE A5cy8_usersRoles(
        id   Int  Auto_increment  NOT NULL ,
        name Varchar (50) NOT NULL
	,CONSTRAINT usersRoles_PK PRIMARY KEY (id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: A5cy8_Users
#------------------------------------------------------------

CREATE TABLE A5cy8_users(
        id                  Int  Auto_increment  NOT NULL ,
        username            Varchar (25) NOT NULL ,
        email               Varchar (25) NOT NULL ,
        password            Varchar (250) NOT NULL ,
        birthdate           Date NOT NULL ,
        id_usersRoles Int NOT NULL
	,CONSTRAINT users_PK PRIMARY KEY (id)

	,CONSTRAINT users_usersRoles_FK FOREIGN KEY (id_usersRoles) REFERENCES A5cy8_usersRoles(id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: A5cy8_Bookskind
#------------------------------------------------------------

CREATE TABLE A5cy8_bookskind(
        id   Int  Auto_increment  NOT NULL ,
        name Varchar (50) NOT NULL
	,CONSTRAINT bookskind_PK PRIMARY KEY (id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: A5cy8_scans
#------------------------------------------------------------

CREATE TABLE A5cy8_scans(
        id             Int  Auto_increment  NOT NULL ,
        chapter        Int NOT NULL ,
        id_books Int NOT NULL ,
        id_users Int NOT NULL
	
        ,CONSTRAINT scans_PK PRIMARY KEY (id)
	,CONSTRAINT scans_books_FK FOREIGN KEY (id_Bbooks) REFERENCES A5cy8_Books(id)
	,CONSTRAINT scans_users0_FK FOREIGN KEY (id_users) REFERENCES A5cy8_Users(id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: A5cy8_comments
#------------------------------------------------------------

CREATE TABLE A5cy8_comments(
        id             Int  Auto_increment  NOT NULL ,
        date           Date NOT NULL ,
        contents       Text NOT NULL ,
        id_users Int NOT NULL ,
        id_scans Int NOT NULL
	,CONSTRAINT comments_PK PRIMARY KEY (id)

	,CONSTRAINT comments_users_FK FOREIGN KEY (id_users) REFERENCES A5cy8_Users(id)
	,CONSTRAINT comments_scans0_FK FOREIGN KEY (id_scans) REFERENCES A5cy8_scans(id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: A5cy8_BooksHaveKinds
#------------------------------------------------------------

CREATE TABLE A5cy8_booksHaveKinds(
        id             Int NOT NULL ,
        id_Books Int NOT NULL
	,CONSTRAINT booksHaveKinds_PK PRIMARY KEY (id,id_books)

	,CONSTRAINT booksHaveKinds_Bookskind_FK FOREIGN KEY (id) REFERENCES A5cy8_bookskind(id)
	,CONSTRAINT booksHaveKinds_Books0_FK FOREIGN KEY (id_books) REFERENCES A5cy8_books(id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: A5cy8_Likes
#------------------------------------------------------------

CREATE TABLE A5cy8_Likes(
        id_posts             Int NOT NULL ,
        id_users Int NOT NULL
	,CONSTRAINT likes_PK PRIMARY KEY (id_posts,id_users)

	,CONSTRAINT likes_scans_FK FOREIGN KEY (id_posts) REFERENCES A5cy8_scans(id)
	,CONSTRAINT likes_users0_FK FOREIGN KEY (id_users) REFERENCES A5cy8_users(id)
)ENGINE=InnoDB;

/*#------------------------------------------------------------
# Table: A5cy8_images
#------------------------------------------------------------

CREATE TABLE A5cy8_images(
        images   Varchar(200) NOT NULL ,
        id_scans Int NOT NULL
	,CONSTRAINT images_PK PRIMARY KEY (id_scans)

	,CONSTRAINT images_scans_FK FOREIGN KEY (id_scans) REFERENCES A5cy8_scans(id)
)ENGINE=InnoDB;*/