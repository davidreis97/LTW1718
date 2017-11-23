DROP TABLE IF EXISTS Users;
DROP TABLE IF EXISTS TodoItems;
DROP TABLE IF EXISTS TodoLists;

CREATE TABLE Users (
	name TEXT,
	username TEXT PRIMARY KEY,
	passwordHash TEXT
);

CREATE TABLE TodoItems (
	content TEXT,
	creationTime TEXT,
	todoList INTEGER,
	FOREIGN KEY (todoList) REFERENCES TodoLists(ID)
);

CREATE TABLE TodoLists (
	ID INTEGER PRIMARY KEY,
	title TEXT,
	user INTEGER,
	public TEXT,
	FOREIGN KEY (user) REFERENCES Users(username)
);
