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