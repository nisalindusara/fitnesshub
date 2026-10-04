<?php $pageStyles = ['staff/class_pt_module/classes/_classes', 'staff/class_pt_module/classes/create']; ?>

<section class="cls-page">

    <div class="cls-breadcrumb">
        Classes /
        <strong>Add New Class</strong>
    </div>

    <h1 class="cls-title">Add New Class</h1>

    <div class="cls-form-layout">

        <div>

            <div class="cls-card">

                <div class="cls-field">
                    <label>Class Photo</label>

                    <div class="cls-upload">
                        <strong>Drop a photo here, or browse</strong>
                        PNG, JPG or WEBP up to 5MB
                    </div>
                </div>

                <div class="cls-field">
                    <label>Class Name *</label>
                    <input
                        type="text"
                        placeholder="e.g. Morning Vinyasa Flow"
                    >
                </div>

                <div class="cls-grid-2">

                    <div class="cls-field">
                        <label>Category *</label>

                        <select>
                            <option>Yoga</option>
                            <option>Zumba</option>
                            <option>HIIT</option>
                            <option>Strength Training</option>
                        </select>
                    </div>

                    <div class="cls-field">
                        <label>Difficulty Level *</label>

                        <select>
                            <option>All Levels</option>
                            <option>Beginner</option>
                            <option>Intermediate</option>
                            <option>Advanced</option>
                        </select>
                    </div>

                </div>

                <div class="cls-field">
                    <label>Description</label>

                    <textarea
                        rows="4"
                        placeholder="What can participants expect from this class?"
                    ></textarea>
                </div>

                <div class="cls-grid-2">

                    <div class="cls-field">
                        <label>Location / Room</label>
                        <input
                            type="text"
                            placeholder="e.g. Studio A, Pool Deck"
                        >
                    </div>

                    <div class="cls-field">
                        <label>Duration (Minutes)</label>
                        <input
                            type="number"
                            value="60"
                        >
                    </div>

                </div>

            </div>

            <div class="cls-card">

                <h2>Date & Time</h2>

                <div class="cls-grid-2">

                    <div class="cls-field">
                        <label>Start Date *</label>
                        <input
                            type="text"
                            placeholder="YYYY-MM-DD"
                        >
                    </div>

                    <div class="cls-field">
                        <label>Start Time</label>
                        <input
                            type="text"
                            placeholder="HH:MM AM/PM"
                        >
                    </div>

                </div>

                <div class="cls-field">
                    <label>Duration (Min)</label>
                    <input
                        type="number"
                        value="60"
                    >
                </div>

            </div>

        </div>


        <div>

            <div class="cls-card">

                <h2>Coordinator / Instructor</h2>

                <div class="cls-field">
                    <label>Assign Coordinator *</label>

                    <select>
                        <option>Select coordinator...</option>
                        <option>Sarah Johnson</option>
                        <option>Mike Chen</option>
                    </select>
                </div>

                <div class="cls-field">
                    <label>Or Enter Name</label>
                    <input
                        type="text"
                        placeholder="Type a name..."
                    >
                </div>

            </div>


            <div class="cls-card">

                <h2>Capacity & Enrollment</h2>

                <div class="cls-grid-2">

                    <div class="cls-field">
                        <label>Max Participants</label>
                        <input
                            type="number"
                            placeholder="e.g. 25"
                        >
                    </div>

                    <div class="cls-field">
                        <label>Minimum To Run Class</label>
                        <input
                            type="number"
                            placeholder="e.g. 5"
                        >
                    </div>

                    <div class="cls-field">
                        <label>Booking Deadline (hrs)</label>
                        <input
                            type="number"
                            placeholder="e.g. 2"
                        >
                    </div>

                    <div class="cls-field">
                        <label>Cancellation Deadline (hrs)</label>
                        <input
                            type="number"
                            placeholder="e.g. 12"
                        >
                    </div>

                </div>

            </div>


            <div class="cls-actions">

                <a href="/portal/classes">
                    <button class="cls-btn" type="button">
                        Discard
                    </button>
                </a>

                <button
                    class="cls-btn cls-primary"
                    type="button"
                    onclick="window.location.href='/portal/classes'"
                >
                    Save Class
                </button>

            </div>

        </div>

    </div>

</section>