-- Create the vernfm_database and use it
CREATE DATABASE vernfm_database;

USE vernfm_database;

-- Create the website table for storing various logo sizes and version
CREATE TABLE website (
    id INT PRIMARY KEY AUTO_INCREMENT,
    version VARCHAR(255) DEFAULT '3.0.1',
    large_logo_dark VARCHAR(255),
    large_logo_light VARCHAR(255),
    medium_logo_dark VARCHAR(255),
    medium_logo_light VARCHAR(255),
    small_logo_dark VARCHAR(255),
    small_logo_light VARCHAR(255)
);

INSERT INTO
    website (
        version,
        large_logo_dark,
        large_logo_light,
        medium_logo_dark,
        medium_logo_light,
        small_logo_dark,
        small_logo_light
    )
VALUES
    (
        '3.0.1',
        'large_logo_dark',
        'large_logo_light',
        'medium_logo_dark',
        'medium_logo_light',
        'small_logo_dark',
        'small_logo_light'
    );

-- Create the genres table for storing genre names and images
CREATE TABLE genres (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(255) UNIQUE,
    image VARCHAR(255)
);

INSERT INTO
    genres (name, image)
VALUES
    (
        'Lofi',
        '../private/media/general/images/genres/lofi.png'
    ),
    (
        'Chillhop',
        '../private/media/general/images/genres/chillhop.png'
    ),
    (
        'Downtempo',
        '../private/media/general/images/genres/downtempo.png'
    ),
    (
        'EDM',
        '../private/media/general/images/genres/edm.png'
    ),
    (
        'Dance',
        '../private/media/general/images/genres/dance.png'
    ),
    (
        'Hardstyle',
        '../private/media/general/images/genres/hardstyle.png'
    ),
    (
        'Alternative',
        '../private/media/general/images/genres/alternative.png'
    ),
    (
        'Punk',
        '../private/media/general/images/genres/punk.png'
    ),
    (
        'Emo rap',
        '../private/media/general/images/genres/emo_rap.png'
    );

CREATE TABLE users (
    user_id INT PRIMARY KEY AUTO_INCREMENT,
    user_type ENUM('artist', 'regular', 'admin'),
    profile_image VARCHAR(255),
    biography TEXT,
    display_name VARCHAR(255) UNIQUE,
    first_name VARCHAR(255),
    last_name VARCHAR(255),
    email VARCHAR(255) UNIQUE,
    admin_actions TEXT,
    -- New column to display the admin actions made on the user
    notification_messages TEXT,
    password VARBINARY(255),
    theme ENUM('dark', 'light') DEFAULT 'dark',
    verified BOOLEAN DEFAULT FALSE,
    vernfm_pro_member BOOLEAN DEFAULT FALSE,
    newsletter BOOLEAN DEFAULT TRUE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE artist_details (
    id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT,
    leaderboard_position INT,
    rating DECIMAL,
    genres JSON,
    social_media JSON DEFAULT '{"instagram": "", "discord": "", "facebook": "", "twitter": "", "youtube": "", "tiktok": "", "soundcloud": "", "spotify": ""}',
    FOREIGN KEY (user_id) REFERENCES users(user_id),
    UNIQUE (user_id)
);

CREATE TABLE songs (
    id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT,
    title VARCHAR(255),
    background VARCHAR(255),
    album_name VARCHAR(255),
    album_image VARCHAR(255),
    genres JSON,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(user_id)
);

CREATE TABLE likes (
    id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT,
    song_id INT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(user_id),
    FOREIGN KEY (song_id) REFERENCES songs(id)
);

CREATE TABLE artist_stats (
    id INT PRIMARY KEY AUTO_INCREMENT,
    total_plays INT DEFAULT 0,
    unique_listeners INT DEFAULT 0,
    followers INT DEFAULT 0,
    followers_30_days_ago INT DEFAULT 0,
    most_played_song VARCHAR(255) DEFAULT '',
    user_id INT,
    revenue DECIMAL(10, 2) DEFAULT 0,
    most_liked_song VARCHAR(255) DEFAULT '',
    average_play_duration NUMERIC(5, 2) DEFAULT 0,
    top_country VARCHAR(255) DEFAULT '',
    peak_listening_hours VARCHAR(255) DEFAULT '',
    listener_retention NUMERIC(5, 2) DEFAULT 0,
    current_leaderboard_position INT,
    top_leaderboard_position INT,
    most_played_genre VARCHAR(255) DEFAULT '',
    most_liked_genre VARCHAR(255) DEFAULT '',
    FOREIGN KEY (user_id) REFERENCES users(user_id),
    UNIQUE (user_id)
);

CREATE TABLE play_history (
    id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT,
    song_id INT,
    played_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(user_id),
    FOREIGN KEY (song_id) REFERENCES songs(id)
);

-- Messages with is_read and read_at columns
CREATE TABLE messages (
    id INT PRIMARY KEY AUTO_INCREMENT,
    sender_id INT,
    receiver_id INT,
    content TEXT,
    is_read BOOLEAN DEFAULT FALSE,
    read_at TIMESTAMP,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (sender_id) REFERENCES users(user_id),
    FOREIGN KEY (receiver_id) REFERENCES users(user_id)
);

CREATE TABLE follower_relationships (
    id INT PRIMARY KEY AUTO_INCREMENT,
    artist_id INT,
    follower_id INT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (artist_id) REFERENCES users(user_id),
    FOREIGN KEY (follower_id) REFERENCES users(user_id)
);

CREATE TABLE playlists (
    id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT,
    name VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(user_id)
);

CREATE TABLE playlist_songs (
    id INT PRIMARY KEY AUTO_INCREMENT,
    playlist_id INT,
    song_id INT,
    added_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (playlist_id) REFERENCES playlists(id),
    FOREIGN KEY (song_id) REFERENCES songs(id)
);

-- Albums
CREATE TABLE albums (
    id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT,
    title VARCHAR(255),
    release_date DATE,
    cover_image VARCHAR(255),
    FOREIGN KEY (user_id) REFERENCES users(user_id)
);

-- Artist_Features
CREATE TABLE artist_features (
    id INT PRIMARY KEY AUTO_INCREMENT,
    main_artist_id INT,
    featured_artist_id INT,
    song_id INT,
    FOREIGN KEY (main_artist_id) REFERENCES users(user_id),
    FOREIGN KEY (featured_artist_id) REFERENCES users(user_id),
    FOREIGN KEY (song_id) REFERENCES songs(id)
);

-- Notifications
CREATE TABLE notifications (
    id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT,
    content TEXT,
    message_type ENUM('message', 'other'),
    is_read BOOLEAN DEFAULT FALSE,
    read_at TIMESTAMP,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(user_id)
);

-- Song_Metadata
CREATE TABLE song_metadata (
    id INT PRIMARY KEY AUTO_INCREMENT,
    song_id INT,
    duration INT,
    bitrate INT,
    file_format VARCHAR(255),
    file_size INT,
    downloads INT DEFAULT 0,
    added_to_playlists INT DEFAULT 0,
    FOREIGN KEY (song_id) REFERENCES songs(id)
);

-- User_Favorites
CREATE TABLE user_favorites (
    id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT,
    song_id INT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(user_id),
    FOREIGN KEY (song_id) REFERENCES songs(id)
);

-- Reports
CREATE TABLE reports (
    id INT PRIMARY KEY AUTO_INCREMENT,
    reporter_id INT,
    reported_user_id INT,
    content_type ENUM('song', 'user', 'other'),
    content_id INT,
    reason TEXT,
    admin_action ENUM(
        'none',
        'warning',
        'temp_ban',
        'perm_ban',
        'NOT REVIEWED'
    ) DEFAULT 'NOT REVIEWED',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (reporter_id) REFERENCES users(user_id),
    FOREIGN KEY (reported_user_id) REFERENCES users(user_id)
);

-- User_Feedback
CREATE TABLE user_feedback (
    id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT,
    feedback_type ENUM(
        'feature_request',
        'bug_report',
        'general_comment'
    ),
    content TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(user_id)
);

-- Charts
CREATE TABLE charts (
    id INT PRIMARY KEY AUTO_INCREMENT,
    chart_name VARCHAR(255),
    chart_type ENUM('songs', 'albums', 'artists'),
    time_range ENUM('daily', 'weekly', 'monthly'),
    item_id INT,
    position INT,
    duration INT,
    FOREIGN KEY (item_id) REFERENCES songs(id) -- Change the reference table according to the chart_type
);

-- Achievements
CREATE TABLE achievements (
    id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT,
    achievement ENUM('achievement1', 'achievement2', 'achievement3'),
    date_earned TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(user_id)
);

-- Artist_Stats_Extra
CREATE TABLE artist_stats_extra (
    id INT PRIMARY KEY AUTO_INCREMENT,
    artist_id INT,
    biggest_fan_user_id INT,
    biggest_fan_profile_image VARCHAR(255),
    biggest_fan_display_name VARCHAR(255),
    last_weeks_plays INT DEFAULT 0,
    this_weeks_plays INT DEFAULT 0,
    number_of_countries_with_listeners INT DEFAULT 0,
    countries_list JSON DEFAULT '[]',
    genres_count INT DEFAULT 0,
    genres_list JSON DEFAULT '[]',
    collaborations_count INT DEFAULT 0,
    collaborators_user_id JSON DEFAULT '[]',
    collaborators_profile_images JSON DEFAULT '[]',
    collaborators_display_names JSON DEFAULT '[]',
    albums_released_count INT DEFAULT 0,
    albums_details JSON DEFAULT '[]',
    top_song_milestones JSON DEFAULT '{"100": null, "50": null, "10": null, "1": null}',
    likes_stats JSON DEFAULT '{"total": 0, "within_24h": 0}',
    FOREIGN KEY (artist_id) REFERENCES users(user_id),
    FOREIGN KEY (biggest_fan_user_id) REFERENCES users(user_id)
);