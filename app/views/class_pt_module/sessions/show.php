<?php $pageStyles = ['staff/class_pt_module/sessions/_sessions', 'staff/class_pt_module/sessions/show']; ?>


<section class="cs-page">

    <div class="cs-breadcrumb">

        Classes /
        Sessions /
        <strong>
            <?= htmlspecialchars($session['class_name']) ?>
        </strong>

    </div>


    <div class="cs-head">

        <div>

            <h1>
                Class Session Details
            </h1>

            <p>
                <?= htmlspecialchars($session['class_name']) ?>
                ·
                <?= htmlspecialchars($session['day']) ?>,
                <?= htmlspecialchars($session['date']) ?>
            </p>

        </div>


        <div class="cs-actions">

            <a href="/portal/classes/sessions/create?id=<?= (int) $session['id'] ?>" class="cs-btn">
                Edit Session
            </a>

            <a href="#" class="cs-btn cs-danger">
                Cancel Session
            </a>

        </div>

    </div>


    <div class="cs-card">

        <div class="cs-card-title">
            Session overview
        </div>


        <div class="cs-overview">

            <div>
                <span>Class</span>

                <strong>
                    <?= htmlspecialchars($session['class_name']) ?>
                </strong>
            </div>


            <div>
                <span>Date</span>

                <strong>
                    <?= htmlspecialchars($session['date']) ?>
                </strong>
            </div>


            <div>
                <span>Time</span>

                <strong>
                    <?= htmlspecialchars($session['start_time']) ?>
                    –
                    <?= htmlspecialchars($session['end_time']) ?>
                </strong>
            </div>


            <div>
                <span>Instructor</span>

                <strong>
                    <?= htmlspecialchars($session['instructor']) ?>
                </strong>
            </div>


            <div>
                <span>Capacity</span>

                <strong>
                    <?= (int)$session['capacity'] ?>
                    members
                </strong>
            </div>


            <div>
                <span>Bookings</span>

                <strong>
                    <?= (int)$session['bookings'] ?>
                    confirmed
                </strong>
            </div>


            <div>
                <span>Status</span>

                <strong class="cs-status">
                    ● Scheduled
                </strong>
            </div>


            <div>
                <span>Location</span>

                <strong>
                    <?= htmlspecialchars($session['location']) ?>
                </strong>
            </div>

        </div>

    </div>


    <div class="cs-members-head">

        <h2>
            Booked Members
            (<?= (int)$session['bookings'] ?>)
        </h2>

        <span>
            <?= (int)$session['capacity'] -
                (int)$session['bookings'] ?>
            spots remaining
        </span>

    </div>


    <div class="cs-table-wrap">

        <table class="cs-table">

            <thead>

            <tr>
                <th>Member</th>
                <th>Booked Date</th>
                <th>Booking Status</th>
            </tr>

            </thead>


            <tbody>

            <?php foreach ($members as $member): ?>

                <tr>

                    <td>

                        <div class="cs-member">

                            <div class="cs-avatar"></div>

                            <div class="cs-member-name">

                                <strong>
                                    <?= htmlspecialchars($member['name']) ?>
                                </strong>

                                <small>
                                    <?= htmlspecialchars($member['email']) ?>
                                </small>

                            </div>

                        </div>

                    </td>


                    <td>
                        <?= htmlspecialchars($member['booked_date']) ?>
                    </td>


                    <td>

                        <?php if (
                            $member['status'] === 'WAITLISTED'
                        ): ?>

                            <span class="cs-waitlisted">
                                ● Waitlisted
                            </span>

                        <?php else: ?>

                            <span class="cs-confirmed">
                                ● Confirmed
                            </span>

                        <?php endif; ?>

                    </td>

                </tr>

            <?php endforeach; ?>

            </tbody>

        </table>


        <div class="cs-footer">
            Showing <?= count($members) ?> results
        </div>

    </div>

</section>