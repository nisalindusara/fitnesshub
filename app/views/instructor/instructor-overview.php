<?php $pageStyles = ['staff/instructor/instructor-overview']; ?>
<div class="ins-dashboard">

    <!-- My day at a glance -->
    <div class="ins-metrics-row">
        <div class="ins-metric-card ins-bg-blue">
            <div class="ins-metric-label">Sessions Today</div>
            <div class="ins-metric-val">4</div>
            <div class="ins-metric-sub">2 done, next at 12:30 PM</div>
        </div>
        <div class="ins-metric-card ins-bg-gray">
            <div class="ins-metric-label">My Clients</div>
            <div class="ins-metric-val">15</div>
            <div class="ins-metric-sub">2 new this week</div>
        </div>
        <div class="ins-metric-card ins-bg-blue">
            <div class="ins-metric-label">Need a Follow-Up</div>
            <div class="ins-metric-val">2</div>
            <div class="ins-metric-sub">Flagged by the system</div>
        </div>
        <div class="ins-metric-card ins-bg-gray">
            <div class="ins-metric-label">Unread Messages</div>
            <div class="ins-metric-val">3</div>
            <div class="ins-metric-sub">Oldest from this morning</div>
        </div>
    </div>


    <!-- Today's schedule + follow-ups -->
    <div class="ins-row">
        <div class="ins-section ins-wide">
            <div class="ins-heading-row">
                <div class="ins-section-title">Today's Schedule</div>
                <span class="ins-heading-note">Monday, 28 September</span>
            </div>

            <div class="ins-timeline">
                <div class="ins-slot">
                    <div class="ins-slot-time">7:00 AM</div>
                    <div class="ins-slot-card is-done">
                        <div class="ins-slot-info">
                            <div class="ins-slot-title">PT session with Nimali Perera</div>
                            <div class="ins-slot-detail">1 hour · Weights area</div>
                        </div>
                        <div class="ins-slot-status ins-text-muted">Done</div>
                    </div>
                </div>
                <div class="ins-slot">
                    <div class="ins-slot-time">10:00 AM</div>
                    <div class="ins-slot-card is-done">
                        <div class="ins-slot-info">
                            <div class="ins-slot-title">Power Yoga class</div>
                            <div class="ins-slot-detail">Studio A · 8 of 12 attended</div>
                        </div>
                        <div class="ins-slot-status ins-text-muted">Done</div>
                    </div>
                </div>
                <div class="ins-slot">
                    <div class="ins-slot-time">12:30 PM</div>
                    <div class="ins-slot-card is-next">
                        <div class="ins-slot-info">
                            <div class="ins-slot-title">PT session with Kasun Wijesinghe</div>
                            <div class="ins-slot-detail">1 hour · First session, goal is muscle gain</div>
                        </div>
                        <div class="ins-slot-status ins-text-green">Up next</div>
                    </div>
                </div>
                <div class="ins-slot">
                    <div class="ins-slot-time">2:00 PM</div>
                    <div class="ins-slot-card">
                        <div class="ins-slot-info">
                            <div class="ins-slot-title">PT session with Hasini Rathnayake</div>
                            <div class="ins-slot-detail">45 minutes · Weights area</div>
                        </div>
                        <div class="ins-slot-status ins-text-soft">Later</div>
                    </div>
                </div>
                <div class="ins-slot">
                    <div class="ins-slot-time">3:00 PM</div>
                    <div class="ins-slot-card is-duty">
                        <div class="ins-slot-info">
                            <div class="ins-slot-title">Floor duty until 9:00 PM</div>
                            <div class="ins-slot-detail">Cardio area</div>
                        </div>
                        <div class="ins-slot-status ins-text-soft">Later</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="ins-section ins-narrow">
            <div class="ins-heading-row">
                <div class="ins-section-title">Clients to Follow Up</div>
            </div>

            <div class="ins-alert">
                <div class="ins-alert-top">
                    <span class="ins-alert-name">Dinithi Ekanayake</span>
                    <span class="ins-alert-date">Flagged 26 Sep</span>
                </div>
                <div class="ins-alert-reason">Completed only 30% of her workout plan over the last 2 weeks.</div>
                <div class="ins-alert-actions">
                    <button type="button" class="ins-btn" onclick="window.location.href='/portal/messages'">Message</button>
                    <button type="button" class="ins-btn ins-btn-outline" onclick="window.location.href='/portal/adherence'">View progress</button>
                </div>
            </div>

            <div class="ins-alert is-warning">
                <div class="ins-alert-top">
                    <span class="ins-alert-name">Madhavi Wickramasinghe</span>
                    <span class="ins-alert-date">Flagged today</span>
                </div>
                <div class="ins-alert-reason">Missed her last 3 booked sessions and hasn't visited since 25 Sep.</div>
                <div class="ins-alert-actions">
                    <button type="button" class="ins-btn" onclick="window.location.href='/portal/messages'">Message</button>
                    <button type="button" class="ins-btn ins-btn-outline" onclick="window.location.href='/portal/adherence'">View progress</button>
                </div>
            </div>

            <div class="ins-alert-footnote">Clients are flagged automatically when they miss 3 sessions in a row, fall below 40% plan adherence, or go 10 days without a visit.</div>
        </div>
    </div>


    <!-- My clients -->
    <div class="ins-section ins-scroll-x">
        <div class="ins-heading-row">
            <div class="ins-section-title">My Clients</div>
            <div class="ins-list-side">
                <a href="/portal/clients" class="ins-link">View all 15</a>
                <button type="button" class="ins-btn" onclick="window.location.href='/portal/clients'">Create workout plan</button>
            </div>
        </div>

        <div class="ins-table-head">
            <div class="ins-col-name">Client</div>
            <div class="ins-col-plan">Membership</div>
            <div class="ins-col-goal">Goal</div>
            <div class="ins-col-visits">Visits (30 days)</div>
            <div class="ins-col-workout">Workout plan</div>
            <div class="ins-col-meals">Meal plan</div>
            <div class="ins-col-last">Last visit</div>
        </div>

        <div class="ins-table-body">
            <div class="ins-table-row">
                <div class="ins-col-name ins-text-dark ins-text-medium">Nimali Perera</div>
                <div class="ins-col-plan ins-text-soft">Regular</div>
                <div class="ins-col-goal ins-text-muted">Weight loss</div>
                <div class="ins-col-visits ins-text-dark">14</div>
                <div class="ins-col-workout ins-text-green">88%</div>
                <div class="ins-col-meals ins-text-green">82%</div>
                <div class="ins-col-last ins-text-soft">Today</div>
            </div>
            <div class="ins-table-row">
                <div class="ins-col-name ins-text-dark ins-text-medium">Hasini Rathnayake</div>
                <div class="ins-col-plan ins-text-soft">Regular</div>
                <div class="ins-col-goal ins-text-muted">Endurance</div>
                <div class="ins-col-visits ins-text-dark">11</div>
                <div class="ins-col-workout ins-text-green">76%</div>
                <div class="ins-col-meals ins-text-amber">70%</div>
                <div class="ins-col-last ins-text-soft">Yesterday</div>
            </div>
            <div class="ins-table-row">
                <div class="ins-col-name ins-text-dark ins-text-medium">Kasun Wijesinghe</div>
                <div class="ins-col-plan ins-text-soft">Regular</div>
                <div class="ins-col-goal ins-text-muted">Muscle gain</div>
                <div class="ins-col-visits ins-text-dark">1</div>
                <div class="ins-col-workout ins-text-muted">Not assigned</div>
                <div class="ins-col-meals ins-text-muted">Requested</div>
                <div class="ins-col-last ins-text-soft">Today</div>
            </div>
            <div class="ins-table-row">
                <div class="ins-col-name ins-text-dark ins-text-medium">Madhavi Wickramasinghe</div>
                <div class="ins-col-plan ins-text-soft">Regular</div>
                <div class="ins-col-goal ins-text-muted">Flexibility</div>
                <div class="ins-col-visits ins-text-dark">6</div>
                <div class="ins-col-workout ins-text-amber">58%</div>
                <div class="ins-col-meals ins-text-muted">No meal plan</div>
                <div class="ins-col-last ins-text-red">25 Sep</div>
            </div>
            <div class="ins-table-row">
                <div class="ins-col-name ins-text-dark ins-text-medium">Dinithi Ekanayake</div>
                <div class="ins-col-plan ins-text-soft">Regular</div>
                <div class="ins-col-goal ins-text-muted">Weight loss</div>
                <div class="ins-col-visits ins-text-dark">8</div>
                <div class="ins-col-workout ins-text-red">30%</div>
                <div class="ins-col-meals ins-text-red">41%</div>
                <div class="ins-col-last ins-text-soft">Yesterday</div>
            </div>
            <div class="ins-table-row">
                <div class="ins-col-name ins-text-dark ins-text-medium">Sachini Herath</div>
                <div class="ins-col-plan ins-text-soft">Day pass</div>
                <div class="ins-col-goal ins-text-muted">General fitness</div>
                <div class="ins-col-visits ins-text-dark">1</div>
                <div class="ins-col-workout ins-text-muted">Not available</div>
                <div class="ins-col-meals ins-text-muted">Not available</div>
                <div class="ins-col-last ins-text-soft">Today</div>
            </div>
        </div>
    </div>


    <!-- Messages + requests -->
    <div class="ins-row">
        <div class="ins-section">
            <div class="ins-heading-row">
                <div class="ins-section-title">Messages</div>
                <a href="/portal/messages" class="ins-link">Open messages</a>
            </div>

            <div class="ins-list">
                <a href="/portal/messages" class="ins-msg is-unread">
                    <span class="ins-msg-dot" aria-hidden="true"></span>
                    <span class="ins-msg-body">
                        <span class="ins-msg-top">
                            <span class="ins-msg-name">Kasun Wijesinghe</span>
                            <span class="ins-msg-time">10:48 AM</span>
                        </span>
                        <span class="ins-msg-preview">Should I eat before our session at 12:30 or after?</span>
                    </span>
                </a>
                <a href="/portal/messages" class="ins-msg is-unread">
                    <span class="ins-msg-dot" aria-hidden="true"></span>
                    <span class="ins-msg-body">
                        <span class="ins-msg-top">
                            <span class="ins-msg-name">Hasini Rathnayake</span>
                            <span class="ins-msg-time">9:15 AM</span>
                        </span>
                        <span class="ins-msg-preview">My knee felt a bit sore after squats yesterday. Can we swap them today?</span>
                    </span>
                </a>
                <a href="/portal/messages" class="ins-msg is-unread">
                    <span class="ins-msg-dot" aria-hidden="true"></span>
                    <span class="ins-msg-body">
                        <span class="ins-msg-top">
                            <span class="ins-msg-name">Nimali Perera</span>
                            <span class="ins-msg-time">8:05 AM</span>
                        </span>
                        <span class="ins-msg-preview">Thanks for this morning! Ticked off everything on today's plan.</span>
                    </span>
                </a>
                <a href="/portal/messages" class="ins-msg">
                    <span class="ins-msg-dot" aria-hidden="true"></span>
                    <span class="ins-msg-body">
                        <span class="ins-msg-top">
                            <span class="ins-msg-name">Dinithi Ekanayake</span>
                            <span class="ins-msg-time">Yesterday</span>
                        </span>
                        <span class="ins-msg-preview">You: How's the new routine going? Let me know if it's too much.</span>
                    </span>
                </a>
            </div>
        </div>

        <div class="ins-section">
            <div class="ins-subheading">New Clients</div>

            <div class="ins-list">
                <div class="ins-list-item">
                    <div class="ins-list-info">
                        <div class="ins-list-name">Kasun Wijesinghe</div>
                        <div class="ins-list-note">Chose you as his instructor</div>
                        <div class="ins-list-detail">Regular · Muscle gain · 26 Sep</div>
                    </div>
                    <div class="ins-list-side">
                        <button type="button" class="ins-btn" onclick="window.location.href='/portal/clients'">Create workout plan</button>
                    </div>
                </div>
                <div class="ins-list-item">
                    <div class="ins-list-info">
                        <div class="ins-list-name">Sachini Herath</div>
                        <div class="ins-list-note">Booked a PT session on her day pass</div>
                        <div class="ins-list-detail">Day pass · Friday 2 Oct, 5:00 PM</div>
                    </div>
                    <div class="ins-list-side">
                        <button type="button" class="ins-btn ins-btn-outline" onclick="window.location.href='/portal/schedule'">View booking</button>
                    </div>
                </div>
            </div>

            <!-- Meal plan requests: render this block only for certified nutrition instructors -->
            <div class="ins-divider"></div>

            <div class="ins-subheading">Meal Plan Requests</div>

            <div class="ins-list">
                <div class="ins-list-item">
                    <div class="ins-list-info">
                        <div class="ins-list-name">Kasun Wijesinghe</div>
                        <div class="ins-list-note">New meal plan for muscle gain</div>
                        <div class="ins-list-detail">Requested today, 10:30 AM</div>
                    </div>
                    <div class="ins-list-side">
                        <button type="button" class="ins-btn" onclick="window.location.href='/portal/meal-plan-requests'">Create meal plan</button>
                    </div>
                </div>
                <div class="ins-list-item">
                    <div class="ins-list-info">
                        <div class="ins-list-name">Hasini Rathnayake</div>
                        <div class="ins-list-note">Update her current plan, now vegetarian</div>
                        <div class="ins-list-detail">Requested 27 Sep</div>
                    </div>
                    <div class="ins-list-side">
                        <button type="button" class="ins-btn ins-btn-outline" onclick="window.location.href='/portal/meal-plan-requests'">Edit meal plan</button>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- This week -->
    <div class="ins-section">
        <div class="ins-heading-row">
            <div class="ins-section-title">My Week</div>
            <button type="button" class="ins-btn ins-btn-outline" onclick="window.location.href='/portal/schedule'">Manage schedule</button>
        </div>

        <div class="ins-week-scroll">
            <div class="ins-week">
                <div class="ins-day is-today">
                    <span class="ins-day-name">Mon (today)</span>
                    <span class="ins-day-date">28</span>
                    <span class="ins-day-shift">Floor 3–9 PM</span>
                    <span class="ins-day-pt">3 PT sessions</span>
                </div>
                <div class="ins-day">
                    <span class="ins-day-name">Tue</span>
                    <span class="ins-day-date">29</span>
                    <span class="ins-day-shift">Floor 6 AM–12 PM</span>
                    <span class="ins-day-pt">2 PT sessions</span>
                </div>
                <div class="ins-day">
                    <span class="ins-day-name">Wed</span>
                    <span class="ins-day-date">30</span>
                    <span class="ins-day-shift">Floor 3–9 PM</span>
                    <span class="ins-day-pt">4 PT sessions</span>
                </div>
                <div class="ins-day">
                    <span class="ins-day-name">Thu</span>
                    <span class="ins-day-date">1</span>
                    <span class="ins-day-shift">Floor 6 AM–12 PM</span>
                    <span class="ins-day-pt">1 PT session</span>
                </div>
                <div class="ins-day">
                    <span class="ins-day-name">Fri</span>
                    <span class="ins-day-date">2</span>
                    <span class="ins-day-shift">Floor 3–9 PM</span>
                    <span class="ins-day-pt">3 PT sessions</span>
                </div>
                <div class="ins-day">
                    <span class="ins-day-name">Sat</span>
                    <span class="ins-day-date">3</span>
                    <span class="ins-day-shift">Floor 7 AM–1 PM</span>
                    <span class="ins-day-pt">5 PT sessions</span>
                </div>
                <div class="ins-day is-off">
                    <span class="ins-day-name">Sun</span>
                    <span class="ins-day-date">4</span>
                    <span class="ins-day-shift">Day off</span>
                    <span class="ins-day-pt">No sessions</span>
                </div>
            </div>
        </div>
    </div>
</div>