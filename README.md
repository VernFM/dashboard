## Start

SCSS command - `sass --watch ./private/styles/main.scss ./public/style.css`

## Fun colors

https://coolors.co/9381ff-b8b8ff-f8f7ff-ffeedd-ffd8be

## Notes

- Fix the message formatting when the message is clicked. The logo should be in the center above the person title. and the time should stay at the right side.
- Fix the error where the profile and soon more won't work when you reload the page, maybe save the data in sessionstorage/localstorage?

## Database planning

The things needed for the database.

- Website
  - Version
  - Logo
- Users
  - Artists (every artist should have their own of these)
    - User id (auto incremented from 0)
    - Profile image
    - Display name
    - First name
    - Last name
    - Email
    - Password
    - Theme (can be "dark" or "light")
    - Rating
    - Verified (true or false)
    - Created at (timestamp)
    - Updated at (timestamp)
    - Artist tags: (can be up to three but the tags could be multiple words each)
      - EXAMPLE: "Lofi", "Chillhop", "Downtempo"
    - Social media:
      - EXAMPLE: "instagram": "vernfmcom","discord": "","facebook": "","twitter": "vernfmcom","youtube": "vernfm","tiktok": "","soundcloud": "","spotify": ""
    - Songs (This will repeat for each song):
      - Song title
      - Song background (image or video that will be used as background when the song is playing)
      - Album name
      - Album image
      - Song tags: (can be up to three but the tags could be multiple words each)
      - EXAMPLE: "Lofi", "Chillhop", "Downtempo"
      - Created at (timestamp)
      - Updated at (timestamp)
  - Regular
    - Password
    - User id (auto incremented from 0)
    - Created at (timestamp)
    - Updated at (timestamp)
    - Profile image
    - Display name
    - First name
    - Last name
    - Email
    - Theme (can be "dark" or "light")
    - Verified (true or false)
  - Admin
    - Password (single sign-on so this password can also be used when the admin logs into another artists dashboard thorugh the admin dashboard)
    - User id (auto incremented from 0)
    - Created at (timestamp)
    - Updated at (timestamp)
    - Profile image
    - Display name
    - First name
    - Last name
    - Email
    - Theme (can be "dark" or "light")
    - Verified (true or false)

## GPT database schema

- Website

  - id (Primary Key, AUTO_INCREMENT)
  - website_version
  - logo

- Genres

  - id (Primary Key, AUTO_INCREMENT)
  - genre_name (Unique)

- Users

  - id (Primary Key, AUTO_INCREMENT)
  - user_id (Primary Key, AUTO_INCREMENT)
  - user_type (Enum: "artist", "regular", "admin")
  - profile_image
  - biography (Text, up to 500 words)
  - display_name
  - first_name
  - last_name
  - email (Unique)
  - notification_messages (Text, messages sent by admins to artists and users)
  - password (Encrypted, not decryptable by admin)
  - theme (Enum: "dark", "light")
  - verified (Boolean)
  - created_at (Timestamp)
  - updated_at (Timestamp)

- ArtistDetails (One-to-One relationship with Users)

  - id (Primary Key, AUTO_INCREMENT)
  - user_id (Foreign Key referencing Users)
  - rating (Decimal)
  - artist_genres (JSONB, up to 3 string values)
  - social_media (JSONB, up to 10 string values)

- Songs (only artists and admins can have songs)

  - id (Primary Key, AUTO_INCREMENT)
  - user_id (Foreign Key referencing Users)
  - song_title
  - background (URL, image or video)
  - album_name
  - album_image (URL)
  - song_genres (JSONB, up to 3 string values)
  - created_at (Timestamp)
  - updated_at (Timestamp)

- AdminDashboardAccess

  - id (Primary Key, AUTO_INCREMENT)
  - user_id (Foreign Key referencing Users)
  - created_at (Timestamp)
  - updated_at (Timestamp)

- Likes
  - id (Primary Key, AUTO_INCREMENT)
  - user_id (Foreign Key referencing Users, the person who liked the song)
  - song_id (Foreign Key referencing Songs, the liked song)
  - created_at (Timestamp)
