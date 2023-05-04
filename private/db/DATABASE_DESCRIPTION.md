## Database summary

The database structure is defined by several tables, each of which has its own set of columns and relationships with other tables.

The `website` table is used to store information related to the website, such as various logo sizes and versions. The `genres` table stores the names and images of different music genres.

The `users` table is used to store information about the registered users of the website, such as their profile image, biography, display name, email, password, and other details. The `artist_details` table stores additional details specific to artist users, such as their leaderboard position, rating, and social media links.

The `songs` table is used to store information about individual songs, such as the user who uploaded the song, the title, background, album name, album image, and genres. The `likes` table tracks which users have liked which songs.

The `artist_stats` table stores various statistics related to artist users, such as total plays, unique listeners, followers, revenue, and other metrics. The `play_history` table tracks which songs have been played by which users.

The `messages` table stores messages sent between users, and the `follower_relationships` table tracks which users follow which artists. The `playlists` table is used to store information about user-created playlists, and the `playlist_songs` table tracks which songs are included in which playlists.

The `albums` table stores information about albums uploaded by artist users, and the `artist_features` table tracks which artists have been featured on which songs. The `notifications` table stores notifications sent to users, and the `song_metadata` table tracks metadata about songs, such as duration and file format.

The `user_favorites` table tracks which songs have been favorited by which users, and the `reports` table stores reports made by users about other users or songs. The `user_feedback` table is used to store feedback from users about the website or its features.

The `charts` table stores information about songs, albums, or artists that are currently charting on the website, and the `achievements` table tracks which users have earned which achievements. The `artist_stats_extra` table stores additional statistics related to artist users, such as the number of countries with listeners, collaborations, albums released, and other details.

Overall, this database structure is designed to support a music streaming and social media website, with tables and relationships tailored to specific features and functions of the site.
