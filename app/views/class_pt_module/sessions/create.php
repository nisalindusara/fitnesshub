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

.cs-title{
    margin:0;
    font-size:28px;
}

.cs-subtitle{
    margin:7px 0 24px;
    color:#8b93a1;
    font-size:13px;
}

.cs-layout{
    display:block;
}

.cs-card{
    background:#fff;
    border:1px solid #e4e7ec;
    border-radius:10px;
}

.cs-card-head{
    padding:18px 20px;
    border-bottom:1px solid #eaecf0;
}

.cs-card-head h2{
    margin:0;
    font-size:14px;
}

.cs-card-head p{
    margin:5px 0 0;
    font-size:11px;
    color:#8b93a1;
}

.cs-form{
    padding:20px;
}

.cs-field{
    margin-bottom:16px;
}

.cs-field label{
    display:block;
    margin-bottom:7px;
    font-size:11px;
    font-weight:600;
}

.cs-field input,
.cs-field select{
    width:100%;
    box-sizing:border-box;
    height:38px;
    border:1px solid #d0d5dd;
    border-radius:6px;
    padding:0 11px;
    background:#fff;
    font-size:12px;
}

.cs-grid-3{
    display:grid;
    grid-template-columns:repeat(3,1fr);
    gap:14px;
}

.cs-grid-2{
    display:grid;
    grid-template-columns:1fr 1fr;
    gap:14px;
}

.cs-availability{
    display:flex;
    align-items:center;
    justify-content:space-between;
    min-height:40px;
    padding:0 12px;
    border:1px solid #d0d5dd;
    border-radius:6px;
    font-size:11px;
}

.cs-badge{
    display:inline-flex;
    padding:4px 8px;
    border-radius:999px;
    font-size:10px;
}

.cs-available{
    background:#e8f7ef;
    color:#15965b;
}

.cs-conflict{
    background:#fff0f0;
    color:#d92d20;
    margin-left:6px;
}

.cs-actions{
    display:flex;
    justify-content:flex-end;
    gap:10px;
    padding:14px 20px;
    border-top:1px solid #eaecf0;
}

.cs-btn{
    min-height:36px;
    padding:0 15px;
    border:1px solid #d0d5dd;
    border-radius:7px;
    background:#fff;
    font-size:12px;
    cursor:pointer;
}

.cs-primary{
    background:#24272d;
    border-color:#24272d;
    color:#fff;
}

</style>


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
                    onclick="window.location.href='/classes/sessions'"
                >
                    Cancel
                </button>


                <button
                    type="button"
                    class="cs-btn cs-primary"
                    onclick="window.location.href='/classes/sessions'"
                >
                    Schedule Session
                </button>

            </div>

        </div>
    </div>

</section>