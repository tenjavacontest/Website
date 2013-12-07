var loading = false;

jQuery(document).ready(function($) {
    window.setInterval(updateNewsFeed, 30 * 1000);

    updateNewsFeed();
});

function updateNewsFeed() {
    if (loading) {
        return;
    }

    loading = true;
    var feed = $("#newsfeed");
    var maxLength = 20;

    feed.html("Loading...");

    $.get("http://tenjava.lol768.com/api/commits?number=4", function(data) {
        loading = false;
        var html = "";

        for (var index = 0; index < data.length; index++) {
            commit = data[index];
            message = commit.commit_message;

            if (message.length > maxLength - 3) {
                message = message.substring(0, maxLength) + "...";
            }

            html += "<div class=\"commit\">";
            html += ("<p class=\"left\"><img src='http://www.gravatar.com/avatar/" + commit.gravatar_id + "?s=48&d=mm'></p>");
            html += "<p class=\"right\">";
            html += ("<a href=\"https://github.com/tenjavacontest/" + commit.repository + "/\">" + commit.repository + "</a><br />");
            html += ("\"<a href=\"https://github.com/tenjavacontest/" + commit.repository + "/commit/" + commit.commit_id + "\">" + message + "</a>\"<br />");
            html += ("+" + commit.total_additions + "/-" + commit.total_deletions + "<br />");
            html += (commit.created_at + "<br />");
            html += "</p></div>";
        }

        feed.html(html);
    });
}