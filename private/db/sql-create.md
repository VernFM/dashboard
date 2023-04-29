# SQL command

```SQL
CREATE DATABASE vernfm_database;
USE vernfm_database;

CREATE TABLE Website (
id INT PRIMARY KEY AUTO_INCREMENT,
website_version VARCHAR(255),
large_logo_dark VARCHAR(255),
large_logo_light VARCHAR(255),
medium_logo_dark VARCHAR(255),
medium_logo_light VARCHAR(255),
small_logo_dark VARCHAR(255),
small_logo_light VARCHAR(255)
);

-- Insert default values to the Website table
INSERT INTO Website (website_version, large_logo_dark, large_logo_light, medium_logo_dark, medium_logo_light, small_logo_dark, small_logo_light)
VALUES ('3.0.1', 'large_logo_dark', 'large_logo_light', 'medium_logo_dark', 'medium_logo_light', 'small_logo_dark', 'small_logo_light');

CREATE TABLE Genres (
id INT PRIMARY KEY AUTO_INCREMENT,
genre_name VARCHAR(255) UNIQUE,
genre_image VARCHAR(255)
);

-- Insert default values to the Genres table
INSERT INTO Genres (genre_name, genre_image)
VALUES
('Lofi', '../private/media/general/images/genres/lofi.png'),
('Chillhop', '../private/media/general/images/genres/chillhop.png'),
('Downtempo', '../private/media/general/images/genres/downtempo.png'),
('EDM', '../private/media/general/images/genres/edm.png'),
('Dance', '../private/media/general/images/genres/dance.png'),
('Hardstyle', '../private/media/general/images/genres/hardstyle.png'),
('Alternative', '../private/media/general/images/genres/alternative.png'),
('Punk', '../private/media/general/images/genres/punk.png'),
('Emo rap', '../private/media/general/images/genres/emo_rap.png');

CREATE TABLE Users (
user_id INT PRIMARY KEY AUTO_INCREMENT,
user_type ENUM('artist', 'regular', 'admin'),
profile_image VARCHAR(255),
biography TEXT,
display_name VARCHAR(255),
first_name VARCHAR(255),
last_name VARCHAR(255),
email VARCHAR(255) UNIQUE,
notification_messages TEXT,
password VARBINARY(255),
theme ENUM('dark', 'light') DEFAULT 'dark',
verified BOOLEAN DEFAULT FALSE,
newsletter BOOLEAN DEFAULT TRUE,
created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE Artist_Details (
id INT PRIMARY KEY AUTO_INCREMENT,
user_id INT,
leaderboard_position INT,
rating DECIMAL,
artist_genres JSON,
social_media JSON,
FOREIGN KEY (user_id) REFERENCES Users(user_id),
UNIQUE (user_id)
);

CREATE TABLE Songs (
id INT PRIMARY KEY AUTO_INCREMENT,
user_id INT,
song_title VARCHAR(255),
background VARCHAR(255),
album_name VARCHAR(255),
album_image VARCHAR(255),
song_genres JSON,
created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
FOREIGN KEY (user_id) REFERENCES Users(user_id)
);

CREATE TABLE Admin_Dashboard_Access (
id INT PRIMARY KEY AUTO_INCREMENT,
user_id INT,
created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
FOREIGN KEY (user_id) REFERENCES Users(user_id)
);

CREATE TABLE Likes (
id INT PRIMARY KEY AUTO_INCREMENT,
user_id INT,
song_id INT,
created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
FOREIGN KEY (user_id) REFERENCES Users(user_id),
FOREIGN KEY (song_id) REFERENCES Songs(id)
);
```
