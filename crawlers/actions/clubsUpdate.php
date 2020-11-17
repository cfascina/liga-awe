<?php

require_once '../funcs.php';

$clubsData = getClubsData();

foreach($clubsData as $clubData) {
    updateClub($clubData);
};

