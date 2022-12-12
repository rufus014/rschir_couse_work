CREATE TABLE IF NOT EXISTS carousel
(
  page_id SERIAL UNIQUE PRIMARY KEY,
  page_link VARCHAR(100) NOT NULL
);

CREATE TABLE IF NOT EXISTS author
(
  author_id SERIAL PRIMARY KEY,
  author TEXT NOT NULL
);

CREATE TABLE IF NOT EXISTS publisher
(
  pub_id SERIAL PRIMARY KEY,
  pub_name TEXT NOT NULL
);

CREATE TABLE IF NOT EXISTS series
(
  series_id SERIAL PRIMARY KEY,
  series_name TEXT NOT NULL
);

CREATE TABLE IF NOT EXISTS book_year
(
  year_id SERIAL PRIMARY KEY,
  book_year VARCHAR(4) NOT NULL
);

CREATE TABLE IF NOT EXISTS cover_type
(
  cover_id SERIAL PRIMARY KEY,
  cover_name TEXT NOT NULL
);

CREATE TABLE IF NOT EXISTS book
(
    book_id SERIAL UNIQUE PRIMARY KEY,
    image VARCHAR(100) NOT NULL,
    name TEXT NOT NULL,
    author_id INT NOT NULL REFERENCES author
      ON UPDATE CASCADE
      ON DELETE RESTRICT,
    annotation TEXT NOT NULL,
    pub_id INT NOT NULL REFERENCES publisher
      ON UPDATE CASCADE
      ON DELETE RESTRICT,
    series_id INT NOT NULL REFERENCES series
      ON UPDATE CASCADE
      ON DELETE RESTRICT,
    year_id INT NOT NULL REFERENCES book_year
      ON UPDATE CASCADE
      ON DELETE RESTRICT,
    book_format VARCHAR(40) NOT NULL,
    cover_id INT NOT NULL REFERENCES cover_type
      ON UPDATE CASCADE
      ON DELETE RESTRICT,
    pages INT NOT NULL, 
    weight INT NOT NULL,
    edition INT NOT NULL,
    price INT NOT NULL
);


CREATE TABLE IF NOT EXISTS users (
  users_id SERIAL PRIMARY KEY,
  full_name varchar(355) DEFAULT NULL,
  login varchar(100) UNIQUE DEFAULT NULL,
  email varchar(255) UNIQUE DEFAULT NULL,
  password varchar(500) DEFAULT NULL,
  avatar varchar(500) DEFAULT NULL
);

CREATE TABLE IF NOT EXISTS cart (
  users_id INT NOT NULL REFERENCES users,
  book_id INT NOT NULL REFERENCES book,
  book_count INT NOT NULL
);

CREATE TABLE IF NOT EXISTS comments
(
  users_id INT NOT NULL REFERENCES users
    ON UPDATE CASCADE
    ON DELETE RESTRICT,
  book_id INT NOT NULL REFERENCES book
    ON UPDATE CASCADE
    ON DELETE RESTRICT,
  grade INT NOT NULL,
  book_com TEXT NOT NULL
);

INSERT INTO carousel (page_link)
VALUES
('../carouselPages/new.jpg'),
('../carouselPages/sale.jpg');

INSERT INTO author (author)
VALUES
('Нилл Гейман'),
('Борис Акунин');

INSERT INTO publisher (pub_name)
VALUES
('АСТ');

INSERT INTO series (series_name)
VALUES
('Шедевры магического реализма'),
('Просто Маса. Детектив Бориса Акунина');

INSERT INTO book_year (book_year)
VALUES
('2018'),
('2019'),
('2020'),
('2021'),
('2022');

INSERT INTO cover_type (cover_name)
VALUES
('Твердая обложка');

INSERT INTO book (image, name, author_id, annotation, pub_id, series_id, year_id, book_format, cover_id, pages, weight, edition, price)
VALUES
('./bookPhoto/americanGods.jpg', 'Американсикие боги', 1, 'Американские боги" - одно из самых известных произведений Геймана. Это роман о богах, привезенных в Америку людьми из разных уголков мира, почитаемых, а потом забытых, и о том, к чему не может остаться равнодушным ни один мужчина: о поисках отца, родины, возлюбленной, о символической и реальной смерти.',1, 1, 3, '20.7 x 13.1 x 3.7', 1, 704, 600, 5000, 825),
('./bookPhoto/prostoMassa.jpg', 'Просто Масса', 2, '«Просто Маса» — это Масахиро Сибата один, без Фандорина. Осиротевший помощник великого сыщика возвращается в родную Японию, которая очень сильно изменилась за время странствий своего блудного сына — и осталась вечно неизменной. Открывшего детективное агентство Масу ожидают невероятные потрясения, невероятные приключения, невероятные женщины и невероятные открытия.', 1, 2, 4, '21.9 x 14.4 x 3.1', 1, 448, 580, 4000, 740);

INSERT INTO users (full_name, login, email, password, avatar) VALUES
('Фирсов Данил', 'ded', 'firsoff.fir@gmail.com', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4', 'uploads/1670630480ava_2.jpeg');

INSERT INTO cart (users_id, book_id, book_count)
VALUES
(1, 1, 3);

INSERT INTO comments (users_id, book_id, grade, book_com)
VALUES 
(1, 1, 8, 'Оформление понравилось, но вот коней было скучно!');