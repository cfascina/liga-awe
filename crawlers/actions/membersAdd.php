<?php

require_once '../funcs.php';

$members = file('../members-test.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

foreach($members as $memberId) {
    $memberData = getMemberData($memberId);
    addMember($memberData);
}

