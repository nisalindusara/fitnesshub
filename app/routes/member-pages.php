<?php

$router->get('/membership-page', [MemberPageController::class, 'showMembershipPage'], '@auth');
