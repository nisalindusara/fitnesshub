<style>

.cs-page{
    padding:26px 28px 40px;
    min-height:100vh;
    background:#f7f9fb;
    font-family:Inter,Arial,sans-serif;
    color:#24272d;
}

.cs-breadcrumb{
    margin-bottom:30px;
    font-size:12px;
    color:#98a2b3;
}

.cs-breadcrumb strong{
    color:#344054;
}

.cs-head{
    display:flex;
    justify-content:space-between;
    align-items:flex-start;
    margin-bottom:24px;
}

.cs-head h1{
    margin:0;
    font-size:28px;
}

.cs-head p{
    margin:7px 0 0;
    color:#8b93a1;
    font-size:13px;
}

.cs-actions{
    display:flex;
    gap:10px;
}

.cs-btn{
    display:inline-flex;
    align-items:center;
    justify-content:center;
    min-height:36px;
    padding:0 15px;
    border:1px solid #d0d5dd;
    border-radius:7px;
    background:#fff;
    color:#344054;
    font-size:12px;
    text-decoration:none;
}

.cs-danger{
    color:#d92d20;
    border-color:#ef4444;
}

.cs-card{
    background:#fff;
    border:1px solid #e4e7ec;
    border-radius:10px;
    margin-bottom:25px;
}

.cs-card-title{
    padding:17px 18px;
    font-size:14px;
    font-weight:600;
    border-bottom:1px solid #eaecf0;
}

.cs-overview{
    display:grid;
    grid-template-columns:repeat(4,1fr);
    gap:25px;
    padding:22px 18px;
}

.cs-overview div{
    display:flex;
    flex-direction:column;
    gap:6px;
}

.cs-overview span{
    font-size:10px;
    text-transform:uppercase;
    color:#98a2b3;
}

.cs-overview strong{
    font-size:13px;
    font-weight:500;
}

.cs-status{
    display:inline-flex;
    width:max-content;
    padding:4px 8px;
    border-radius:999px;
    background:#eef4ff;
    color:#3973c6;
    font-size:10px;
}

.cs-members-head{
    display:flex;
    justify-content:space-between;
    align-items:center;
    margin-bottom:12px;
}

.cs-members-head h2{
    margin:0;
    font-size:16px;
}

.cs-members-head span{
    font-size:11px;
    color:#667085;
}

.cs-table-wrap{
    background:#fff;
    border:1px solid #e4e7ec;
    border-radius:10px;
    overflow:hidden;
}

.cs-table{
    width:100%;
    border-collapse:collapse;
    font-size:12px;
}

.cs-table th{
    padding:13px 15px;
    text-align:left;
    background:#f8fafc;
    color:#667085;
    text-transform:uppercase;
    font-size:10px;
}

.cs-table td{
    padding:14px 15px;
    border-top:1px solid #eaecf0;
}

.cs-member{
    display:flex;
    align-items:center;
    gap:10px;
}

.cs-avatar{
    width:28px;
    height:28px;
    background:#f0f2f5;
    border-radius:50%;
}

.cs-member-name strong{
    display:block;
    font-size:11px;
}

.cs-member-name small{
    color:#98a2b3;
}

.cs-confirmed,
.cs-waitlisted{
    display:inline-flex;
    padding:4px 9px;
    border-radius:999px;
    font-size:10px;
}

.cs-confirmed{
    background:#e8f7ef;
    color:#15965b;
}

.cs-waitlisted{
    background:#fff5e5;
    color:#c67a00;
}

.cs-footer{
    padding:13px 15px;
    font-size:11px;
    color:#8b93a1;
    border-top:1px solid #eaecf0;
}

</style>


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

            <a href="#" class="cs-btn">
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