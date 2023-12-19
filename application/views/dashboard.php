<style>
    .container {
        background-color: white;
        padding: 10px;
    }

    .card-1 {
    }

    .card-2 {
    }

    .card-3 {
    }

    .card-body-1,.card-body-2,.card-body-3 {
        display: flex;
        align-items: center;
        padding: 0px;
        margin-left: 0px;
    }

    .card-body-1 i {
        margin-right: 25px;
        font-size: 50px;
        background-color: #04bade;
        height: 80px; /* Adjust the height as needed */
        width: 80px; /* Adjust the width as needed */
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 5px; /* Optional: Add border-radius for rounded corners */
        color: #fff;
    }

    .card-body-2 i {
        margin-right: 25px;
        font-size: 50px;
        background-color: #0496c7;
        height: 80px; /* Adjust the height as needed */
        width: 80px; /* Adjust the width as needed */
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 5px; /* Optional: Add border-radius for rounded corners */
        color: #fff;
    }
    
    .card-body-3 i {
        margin-right: 25px;
        font-size: 50px;
        background-color: #009ca5;
        height: 80px; /* Adjust the height as needed */
        width: 80px; /* Adjust the width as needed */
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 5px; /* Optional: Add border-radius for rounded corners */
        color: #fff;
    }

    .card-body p {
        font-size: 18px;
    }
</style>

<div class="container">
    <div class="row">
        <div class="col-md-4">
            <div class="card card-1">
                <div class="card-body-1">
                    <i class="fa-solid fa-user"></i>
                    <div>
                        <h5 class="card-title">Jumlah User</h5>
                        <p class="card-text"><?= $userCount; ?> User</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4 mt-3 mt-md-0">
            <div class="card card-2">
                <div class="card-body-2">
                    <i class="fa-solid fa-user-tie"></i>
                    <div>
                        <h5 class="card-title">Jumlah Panitia</h5>
                        <p class="card-text"><?= $panitiaCount; ?> Panitia</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4 mt-3 mt-md-0">
            <div class="card card-3">
                <div class="card-body-3">
                    <i class="fa-solid fa-calendar-plus"></i>
                    <div>
                        <h5 class="card-title">Jumlah Event</h5>
                        <p class="card-text"><?= $eventCount; ?> Event</p>
                    </div>
                </div>
            </div>
        </div>

        <br>CRUD CAROUSEL, COMING SOON!
    </div>
</div>
