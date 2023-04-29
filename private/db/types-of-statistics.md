## Database info that I need to save (remember to add revenue in large int plus 2 decimal points and playlists )

```sql
CREATE TABLE artist_stats (
  id SERIAL PRIMARY KEY,
  total_plays INT DEFAULT 0,
  unique_listeners INT DEFAULT 0,
  followers INT DEFAULT 0,
  followers_30_days_ago INT DEFAULT 0,
  most_played_song VARCHAR DEFAULT '',
  most_liked_song VARCHAR DEFAULT '',
  avg_play_duration NUMERIC(5,2) DEFAULT 0,

  top_country VARCHAR DEFAULT '',
  peak_listening_hours VARCHAR DEFAULT '',
  listener_retention NUMERIC(5,2) DEFAULT 0,
  current_leaderboard_position INT,
  top_leaderboard_position INT,

  most_played_genre VARCHAR DEFAULT '',
  most_liked_genre VARCHAR DEFAULT '',
  biggest_fan_user_id INT REFERENCES users(id),
  biggest_fan_profile_image VARCHAR,
  biggest_fan_display_name VARCHAR,

  last_weeks_plays INT DEFAULT 0,
  this_weeks_plays INT DEFAULT 0,

  num_countries_with_listeners INT DEFAULT 0,
  countries_list JSONB DEFAULT '[]',
  genres_count INT DEFAULT 0,
  genres_list JSONB DEFAULT '[]',
  collaborations_count INT DEFAULT 0,
  collaborators_user_id JSONB DEFAULT '[]',
  collaborators_profile_images JSONB DEFAULT '[]',
  collaborators_display_names JSONB DEFAULT '[]',
  albums_released_count INT DEFAULT 0,
  albums_details JSONB DEFAULT '[]',
  top_song_milestones JSONB DEFAULT '{"100": null, "50": null, "10": null, "1": null}',
  likes_stats JSONB DEFAULT '{"total": 0, "within_24h": 0}'
);

-- Set initial current_leaderboard_position and top_leaderboard_position after INSERT
CREATE OR REPLACE FUNCTION update_leaderboard_position()
  RETURNS trigger AS $$
  BEGIN
    IF NEW.current_leaderboard_position IS NULL THEN
      SELECT COALESCE(MAX(current_leaderboard_position) + 1, 1) INTO NEW.current_leaderboard_position FROM artist_stats;
      NEW.top_leaderboard_position := NEW.current_leaderboard_position;
    END IF;
    RETURN NEW;
  END;
$$ LANGUAGE plpgsql;

CREATE TRIGGER update_leaderboard_position_trigger
  BEFORE INSERT ON artist_stats
  FOR EACH ROW
  EXECUTE FUNCTION update_leaderboard_position();

```

- Total plays (int) Default: 0
- Unique listeners (int) Default: 0
- Followers (int) Default: 0
- Followers 30 days ago (int) Default: 0
- Most played song (string) Default: ""
- Most liked song (string) Default: ""
- Average play duration (numeric(5,2)) Default: 0

- Top country (string) Default: ""
- Peak listening hours (string) Default: ""
- Listener retention (numeric(5,2)) Default: 0
- Current leaderboard position (int) Default: (check the database of the available positions and inserts the worst position ex. The existing one is 2 then set this to 3 if none exists set it to 1)
- Top leaderboard position (int) Default: (the same as the current leaderboard position)

- Most played genre (string) Default: ""
- Most liked genre (string) Default: ""
- Biggest fan user_id (int) Default: (foreign key to that user)
- Biggest fan profile image (string) Default: (foreign key to that user)
- Biggest fan display_name (string) Default: (foreign key to that user)

- Last weeks plays (int) Default: 0
- This weeks plays (int) Default: 0

- Number of countries with listeners (int, default: 0)
- Countries list (jsonb, default: '[]')
- Followers (int, default: 0)
- Genres count (int, default: 0)
- Genres list (jsonb, default: '[]')
- Collaborations count (int, default: 0)
- Collaborators user_id (jsonb, default: '[]')
- Collaborators profile images (jsonb, default: '[]')
- Collaborators display_names (jsonb, default: '[]')
- Albums released count (int, default: 0)
- Albums details (jsonb, default: '[]')
- Top song milestones (jsonb, default: '{"100": null, "50": null, "10": null, "1": null}')
- Likes stats (jsonb, default: '{"total": 0, "within_24h": 0}')

## Types of statistics

- Landing page:

  - Total plays (The number of times your songs have been played across the platform.)
  - Unique listeners (The number of individual users who have listened to your music.)
  - Follower growth in 30 days (The number of new followers you've gained over a specific period.)
  - Most played song
  - Most liked song

- Statistics page:

  - Average play duration (The average amount of time users spend listening to your songs.)
  - Top country
  - Daily plays
  - Peak listening hours (The hours of the day when your music is most frequently played.)
  - Listener retention (The percentage of listeners who return to your music after their first listen.)
  - Current leaderboard position
  - Highest leaderboard position
  - Most played genre
  - Most liked genre
  - Biggest fan (display the profile mage and display name of the user)

  - Acheivement section:

    - Streams/plays:

      - First Stream: Get your first play on the platform.
      - Rising Star: Reach 50 total plays.
      - Breakthrough Artist: Reach 200 total plays.
      - Rockstar: Reach 500 total plays.
      - Superstar: Reach 1000 total plays.
      - Legend: Reach 5000 total plays.
      - Viral Sensation: Have a song with a rapid increase in plays within a short time frame. (doubling in plays after the artists have been at least a month on the platform)
      - Global Reach: Get plays from listeners in 3 different countries.
      - Worldwide Artist: Get plays from listeners in 7 different countries.
      - Universal Appeal: Get plays from listeners in 20 different countries.

    - Followers:

      - First Fan: Gain your first follower.
      - Growing Fanbase: Reach 20 followers.
      - Devoted Listeners: Reach 100 followers.
      - Loyal Army: Reach 250 followers.
      - Mega Fanbase: Reach 500 followers.
      - Elite Club: Reach 1250 followers.

    - Genres:

      - Genre Hopper: Release songs in 3 different genres.
      - Genre Master: Release songs in 5 different genres.

    - Collaborations:

      - Collaboration Novice: Collaborate with 1 other artist.
      - Collaboration Pro: Collaborate with 5 different artists.
      - Collaboration Expert: Collaborate with 10 different artists.

    - Albums:

      - Album Debut: Release your first album.
      - Sophomore Success: Release your second album.
      - Trilogy Complete: Release your third album.
      - Prolific Composer: Release 5 albums.

    - Leaderboard:

      - Top 100 Debut: Enter the platform's top 100 chart with a song.
      - Top 50 Club: Reach the top 50 on the platform's chart with a song.
      - Top of the Charts: Have a song reach the top 10 of a music chart.
      - Chart Dominator: Have a song reach the number 1 spot on a music chart.
      - Enduring Hit: Stay on the platform's top 100 chart for 4 consecutive weeks with a song.
      - Chart Stalwart: Stay on the platform's top 50 chart for 4 consecutive weeks with a song.
      - Top 10 Titan: Stay on the platform's top 10 chart for 4 consecutive weeks with a song.
      - Reigning Supreme: Hold the number 1 spot on the platform's chart for 2 consecutive weeks with a song.
      - Long Live the King/Queen: Hold the number 1 spot on the platform's chart for 4 consecutive weeks with a song.

    - Likes:
      - Likable Tune: Receive your first like on a song.
      - Crowd Pleaser: Collect 20 likes on a song.
      - Fan Favorite: Collect 50 likes on a song.
      - Hit Maker: Collect 100 likes on a song.
      - Chart Topper: Collect 200 likes on a song.
      - Like Magnet: Collect 500 likes on a song.
      - Super Liked: Collect 1000 likes on a song.
      - Love at First Listen: Receive 10 likes on the new song within 24 hours of releasing it.
      - Instant Classic: Receive 50 likes on the new song within 24 hours of releasing it.
