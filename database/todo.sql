DROP TABLE IF EXISTS Users;
DROP TABLE IF EXISTS TodoItems;
DROP TABLE IF EXISTS TodoLists;

CREATE TABLE Users (
	name TEXT NOT NULL,
	username TEXT PRIMARY KEY,
	passwordHash TEXT NOT NULL,
	sessionId TEXT UNIQUE
);

CREATE TABLE TodoItems (
	ID INTEGER PRIMARY KEY AUTOINCREMENT,
	content TEXT NOT NULL,
	creationTime TEXT NOT NULL,
	todoList INTEGER NOT NULL,
	status TEXT NOT NULL,
	FOREIGN KEY (todoList) REFERENCES TodoLists(ID) ON DELETE CASCADE
);

CREATE TABLE TodoLists (
	ID INTEGER PRIMARY KEY AUTOINCREMENT,
	title TEXT NOT NULL,
	user INTEGER NOT NULL,
	public TEXT NOT NULL,
	FOREIGN KEY (user) REFERENCES Users(username) ON DELETE CASCADE
);

PRAGMA foreign_keys = ON;

INSERT INTO Users (name, username, passwordHash, sessionId)
VALUES ('David','davidreis97','12345','sessId');

INSERT INTO TodoLists (ID, title, user, public)
VALUES (NULL,'Lista de Teste','davidreis97','1');

INSERT INTO TodoItems (ID,content, creationTime, todoList, status)
VALUES (NULL,'Teste, isto é um item','now','1', 'notdone'),
       (NULL,'Teste1, isto é um item1','now','1', 'ongoing'),
       (NULL,'Teste2, isto é um item2','now','1', 'done');