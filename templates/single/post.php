<?php
echo '<main>';
    the_content();

if (comments_open()) {
    comments_template();
    comment_form();
}

echo '</main>';
