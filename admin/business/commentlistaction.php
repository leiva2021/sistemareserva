<?php

include_once "./commentbusiness.php";

echo json_encode(CommentBusiness::getAllComments());

