//$ = jQuery
jQuery(document).ready(function($) { 
  $(function() {
    var $dify_posts, fetchEntries, formatDate, difyRetryCount, difyRetryLimit;
    difyRetryCount = 0;
    difyRetryLimit = 5;
    $dify_posts = $('#dify-posts');
    if ($dify_posts.length === 0) {
      return;
    }
    formatDate = function(date_string) {
      var date, day, monthIndex, monthNames, year;
      monthNames = ["Jan", "Feb", "Mar", "Apr", "May", "June", "July", "Aug", "Sept", "Oct", "Nov", "Dec"];
      date = new Date(date_string);
      day = date.getDate();
      monthIndex = date.getMonth();
      year = date.getFullYear();
      return "" + monthNames[monthIndex] + " " + day + ", " + year;
    };
    fetchEntries = function() {
      var page;
      page = parseInt($dify_posts.data('page'));
      return $.ajax({
        url: 'https://my.wpengine.com/dify_posts.json',
        data: {
          show_hidden: $dify_posts.data('show-hidden').toString(),
          page: page,
          source: $dify_posts.data('source'),
          install_name: $dify_posts.data('install-name')
        },
        type: 'GET',
        dataType: 'JSON',
        success: function(json) {
          var $list, li, post, _i, _len, _ref;
          $list = $dify_posts.find('ul');
          _ref = json.posts;
          $('#dify-section-title h2').show();
          for (_i = 0, _len = _ref.length; _i < _len; _i++) {
            post = _ref[_i];
            li = $('<li><div class="content"></div><div class="dify-post-date"></div></li>');
            li.find('.content').html(post.content);
            li.find('.dify-post-date').html(formatDate(post.date));
            if (post.hidden) {
              li.addClass('hidden_post');
            }
            $list.append(li);
          }
          $("#dify-blog-spinner").hide();
          if (json.next_page) {
            $('#dify-posts .show-more a').show();
            return $dify_posts.data('page', json.next_page);
          } else {
            return $('#dify-posts .show-more').hide();
          }
        },
        error: function() {
          difyRetryCount++;
          if (difyRetryCount <= difyRetryLimit) {
            //try again
            setTimeout(fetchEntries, 5000);
          }
          return $("#dify-blog-spinner").hide();
        },
      });
    };
    $('#dify-posts .show-more a').on('click', function(e)
    {
        e.preventDefault();
        $('#dify-posts .show-more a').hide();
        $("#dify-blog-spinner").show();
        fetchEntries();
    });
    fetchEntries();
  });
});