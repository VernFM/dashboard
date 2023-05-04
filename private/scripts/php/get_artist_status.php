<?php
function get_artist_stats($user_id) {
    global $conn;

    // Get total plays
    $sql = "SELECT total_plays FROM artist_stats WHERE user_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $user_id);
    $stmt->execute();
    $stmt->bind_result($total_plays);
    $stmt->fetch();
    $stmt->close();

    // Get unique listeners
    $sql = "SELECT unique_listeners FROM artist_stats WHERE user_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $user_id);
    $stmt->execute();
    $stmt->bind_result($unique_listeners);
    $stmt->fetch();
    $stmt->close();

    // Get follower growth in 30 days
    $sql = "SELECT followers, followers_30_days_ago FROM artist_stats WHERE user_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $user_id);
    $stmt->execute();
    $stmt->bind_result($followers, $followers_30_days_ago);
    $stmt->fetch();
    $stmt->close();
    $follower_growth = $followers - $followers_30_days_ago;

    // Get most played song
    $sql = "SELECT most_played_song FROM artist_stats WHERE user_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $user_id);
    $stmt->execute();
    $stmt->bind_result($most_played_song);
    $stmt->fetch();
    $stmt->close();

    // Get most liked song
    $sql = "SELECT most_liked_song FROM artist_stats WHERE user_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $user_id);
    $stmt->execute();
    $stmt->bind_result($most_liked_song);
    $stmt->fetch();
    $stmt->close();

    return array($total_plays, $unique_listeners, $follower_growth, $most_played_song, $most_liked_song);
}

?>