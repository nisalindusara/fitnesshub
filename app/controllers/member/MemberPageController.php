<?php

class MemberPageController extends Controller
{
    public function showMembershipPage(): void
    {
        $this->render('member/membership-page', 'member-layout');
    }
}
