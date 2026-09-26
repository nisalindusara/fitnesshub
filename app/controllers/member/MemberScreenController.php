<?php

class MemberScreenController extends Controller
{
    public function showMemberPersonalDetailsScreen(): void
    {
        $this->render('member/personal-details', 'member-layout');
    }
}
