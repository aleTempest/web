CREATE TABLE editorial (
    id_editorial INT PRIMARY KEY AUTO_INCREMENT,
    editorial_name TEXT NOT NULL
);

CREATE TABLE books (
    id_book INT PRIMARY KEY AUTO_INCREMENT,
    id_editorial INT NOT NULL,
    book_name TEXT NOT NULL,
    pages INT NOT NULL,
    topic TEXT NOT NULL,
    author TEXT NOT NULL,
    FOREIGN KEY (id_editorial) REFERENCES editorial (id_editorial) ON DELETE CASCADE
);

CREATE VIEW books_editorial_view as
SELECT b.id_book, b.id_editorial, b.author, b.book_name, b.pages, b.topic, e.editorial_name
FROM books as b
    JOIN editorial e on e.id_editorial = b.id_editorial;

SELECT * FROM books_editorial_view;

INSERT INTO editorial (editorial_name) VALUES
    ('Penguin'),
    ('Nova'),
    ('Tor');

INSERT INTO books (id_editorial, book_name, pages, topic, author) VALUES
    (1,'El nombre del viento',800,'fantasía','Patrik Rothfuss'),
    (1,'El temor de un hombre sabio',1200,'fantasía','Patrick Rothfuss'),
    (2,'El camino de los reyes',1300,'fantasía','Brandon Sanderson')
