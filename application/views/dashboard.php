<style>
    .container {
        background-color: white;
        margin: 2px;
        padding: 10px; 
    }

    .card-1 {
        background-color: #ffcccb; 
    }

    .card-2 {
        background-color: #c2f0c2; 
    }

    .card-3 {
        background-color: #add8e6;
    }

    .card-body {
        display: flex;
        align-items: center; 
    }

    .card-body i {
        margin-right: 25px;
        font-size: 50px;
    }

    .card-body p {
        font-size: 18px;
    }
</style>

<div class="container">
    <div class="row">
        <div class="col-md-4">
            <div class="card card-1">
                <div class="card-body">
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
                <div class="card-body">
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
                <div class="card-body">
                    <i class="fa-solid fa-calendar-plus"></i>
                    <div>
                        <h5 class="card-title">Jumlah Event</h5>
                        <p class="card-text"><?= $eventCount; ?> Event</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
