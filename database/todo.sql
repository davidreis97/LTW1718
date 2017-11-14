DROP TABLE IF EXISTS Users;
DROP TABLE IF EXISTS Todos;

CREATE TABLE Users (
	ID INTEGER PRIMARY KEY, 
	name TEXT,
	username TEXT UNIQUE,
	passwordHash TEXT
);

CREATE TABLE Todos (
	ID INTEGER PRIMARY KEY, 
	content TEXT,
	user INTEGER,
	creationTime TEXT, 
	FOREIGN KEY (user) REFERENCES Users(ID)
);
