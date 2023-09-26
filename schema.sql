DROP TABLE IF EXISTS Comments;

CREATE TABLE Comments (
	id INTEGER CONSTRAINT PK_Comments PRIMARY KEY AUTOINCREMENT,
	account_id INTEGER NOT NULL,
	document_id INTEGER NOT NULL,
	parent_id INTEGER,
	content TEXT,
	CONSTRAINT FK_Comments_Accounts FOREIGN KEY (account_id) REFERENCES Accounts(id),
	CONSTRAINT FK_Comments_Documents FOREIGN KEY (document_id) REFERENCES Documents(id),
	CONSTRAINT FK_Comments_Comments FOREIGN KEY (parent_id) REFERENCES Comments(id)
);

DROP TABLE IF EXISTS Documents;

CREATE TABLE Documents (
	id INTEGER CONSTRAINT PK_Documents PRIMARY KEY AUTOINCREMENT,
	uri TEXT NOT NULL
);

DROP TABLE IF EXISTS Accounts;

CREATE TABLE Accounts (
	id INTEGER CONSTRAINT PK_Documents PRIMARY KEY AUTOINCREMENT,
	username TEXT NOT NULL UNIQUE,
	password TEXT NOT NULL
);

PRAGMA FOREIGN_KEYS = 0;

INSERT INTO Accounts (id, username, password) VALUES (1, 'account1', '$2a$10$wPnWdMXqvcKzlgwF2cNFAu6UDCo5SKWaZU8FHN7jR/8.ciWi/0HSi');
INSERT INTO Accounts (id, username, password) VALUES (2, 'account2', '$2a$10$wPnWdMXqvcKzlgwF2cNFAu6UDCo5SKWaZU8FHN7jR/8.ciWi/0HSi');

INSERT INTO Documents (id, uri) VALUES (1, '/');
INSERT INTO Documents (id, uri) VALUES (2, '/home');

INSERT INTO Comments (id, account_id, document_id, parent_id, content) VALUES (1, 1, 1, NULL, 'foo1');
INSERT INTO Comments (id, account_id, document_id, parent_id, content) VALUES (2, 1, 1, 1, 'foo1-1');
INSERT INTO Comments (id, account_id, document_id, parent_id, content) VALUES (3, 1, 1, 2, 'foo2-1');
INSERT INTO Comments (id, account_id, document_id, parent_id, content) VALUES (4, 1, 1, 1, 'foo1-2');
INSERT INTO Comments (id, account_id, document_id, parent_id, content) VALUES (5, 1, 2, NULL, 'foo1');

PRAGMA FOREIGN_KEYS = 1;