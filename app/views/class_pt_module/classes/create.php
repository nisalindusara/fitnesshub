<style>
.cls-page{
    padding:24px 28px 40px;
    background:#f7f9fb;
    min-height:100vh;
    font-family:Inter,Arial,sans-serif;
    color:#292c33;
}

.cls-breadcrumb{
    font-size:12px;
    color:#98a2b3;
    margin-bottom:25px;
}

.cls-breadcrumb strong{
    color:#344054;
}

.cls-title{
    font-size:28px;
    margin:0 0 22px;
}

.cls-form-layout{
    display:grid;
    grid-template-columns:minmax(0,1.7fr) minmax(280px,.9fr);
    gap:20px;
    align-items:start;
}

.cls-card{
    background:#fff;
    border:1px solid #e4e7ec;
    border-radius:10px;
    padding:20px;
    margin-bottom:18px;
}

.cls-card h2{
    font-size:13px;
    margin:0 0 18px;
}

.cls-field{
    margin-bottom:15px;
}

.cls-field label{
    display:block;
    margin-bottom:6px;
    font-size:10px;
    text-transform:uppercase;
    font-weight:600;
    color:#344054;
}

.cls-field input,
.cls-field textarea,
.cls-field select{
    width:100%;
    box-sizing:border-box;
    border:1px solid #d0d5dd;
    border-radius:6px;
    padding:10px 11px;
    font:inherit;
    font-size:12px;
    background:#fff;
}

.cls-field textarea{
    resize:none;
}

.cls-grid-2{
    display:grid;
    grid-template-columns:1fr 1fr;
    gap:14px;
}

.cls-upload{
    height:95px;
    border:1px dashed #d0d5dd;
    border-radius:8px;
    display:flex;
    flex-direction:column;
    align-items:center;
    justify-content:center;
    color:#98a2b3;
    font-size:11px;
    margin-bottom:20px;
}

.cls-upload strong{
    color:#475467;
    margin-bottom:4px;
    font-weight:500;
}

.cls-actions{
    display:flex;
    justify-content:flex-end;
    gap:10px;
}

.cls-btn{
    height:36px;
    padding:0 15px;
    border-radius:7px;
    border:1px solid #d0d5dd;
    background:#fff;
    color:#667085;
    font-size:12px;
    font-weight:600;
    cursor:pointer;
}

.cls-primary{
    background:#292c33;
    color:#fff;
    border-color:#292c33;
}
</style>

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

                <a href="/classes">
                    <button class="cls-btn" type="button">
                        Discard
                    </button>
                </a>

                <button
                    class="cls-btn cls-primary"
                    type="button"
                    onclick="window.location.href='/classes'"
                >
                    Save Class
                </button>

            </div>

        </div>

    </div>

</section>