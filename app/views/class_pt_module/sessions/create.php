<?php $pageStyles = ['staff/class_pt_module/sessions/_sessions', 'staff/class_pt_module/sessions/create']; ?>


<section class="cs-page">

    <div class="cs-breadcrumb">
        Classes /
        Sessions /
        <strong>Schedule Session</strong>
    </div>


    <h1 class="cs-title">
        Schedule Class Session
    </h1>

    <p class="cs-subtitle">
        Add a new occurrence to the class schedule.
    </p>


    <div class="cs-layout">


        <div class="cs-card">

            <div class="cs-card-head">

                <h2>
                    Session information
                </h2>

                <p>
                    Choose the class, time, instructor,
                    and booking capacity.
                </p>

            </div>


            <div class="cs-form">

                <div class="cs-field">

                    <label>
                        Class *
                    </label>

                    <select>
                        <option>Yoga Flow</option>
                        <option>HIIT Express</option>
                        <option>Core Pilates</option>
                        <option>Power Cycle</option>
                    </select>

                </div>


                <div class="cs-grid-3">

                    <div class="cs-field">

                        <label>
                            Date *
                        </label>

                        <input
                            type="text"
                            value="Oct 22, 2026"
                        >

                    </div>


                    <div class="cs-field">

                        <label>
                            Start Time *
                        </label>

                        <input
                            type="text"
                            value="8:00 AM"
                        >

                    </div>


                    <div class="cs-field">

                        <label>
                            End Time *
                        </label>

                        <input
                            type="text"
                            value="9:00 AM"
                        >

                    </div>

                </div>


                <div class="cs-grid-2">

                    <div>

                        <div class="cs-field">

                            <label>
                                Instructor *
                            </label>

                            <select>
                                <option>Sarah Johnson</option>
                                <option>Mike Chen</option>
                                <option>Emma Wilson</option>
                            </select>

                        </div>


                        <div class="cs-availability">

                            <span>
                                Instructor availability
                            </span>

                            <div>

                                <span class="cs-badge cs-available">
                                    ● Available
                                </span>

                                <span class="cs-badge cs-conflict">
                                    ● Conflict
                                </span>

                            </div>

                        </div>

                    </div>


                    <div class="cs-field">

                        <label>
                            Capacity *
                        </label>

                        <input
                            type="number"
                            value="20"
                        >

                        <small>
                            Maximum bookings for this session.
                        </small>

                    </div>

                </div>

            </div>


            <div class="cs-actions">

                <button
                    type="button"
                    class="cs-btn"
                    onclick="window.location.href='/portal/classes/sessions'"
                >
                    Cancel
                </button>


                <button
                    type="button"
                    class="cs-btn cs-primary"
                    onclick="window.location.href='/portal/classes/sessions'"
                >
                    Schedule Session
                </button>

            </div>

        </div>
    </div>

</section>