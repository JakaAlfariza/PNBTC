<style>
    .container {
        background-color: white;
        padding: 10px;
        height: 95%;
    }

    .custom-btn {
        background-color: #004789;
        color: #fff;
    }
    
    .card-body-1,.card-body-2,.card-body-3 {
        display: flex;
        align-items: center;
        padding: 0px;
        margin-left: 0px;
    }

    .card-body-1 i {
        margin-right: 20px;
        font-size: 50px;
        background-color: #3A966A;
        height: 80px;
        width: 80px; 
        display: flex;
        align-items: center;
        justify-content: center;
        color: #fff;
    }

    .card-body-2 i {
        margin-right: 20px;
        font-size: 50px;
        background-color: #45B293;
        height: 80px;
        width: 80px; 
        display: flex;
        align-items: center;
        justify-content: center;
        color: #fff;
    }

    .card-title{
        margin-bottom: 0px;
    }
    
    .card-body-3 i {
        margin-right: 20px;
        font-size: 50px;
        background-color: #6BA87C;
        height: 80px; 
        width: 80px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #fff;
    }

    .card-body p {
        margin-top: 0px;
        font-size: 0px;
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
                        <h5 class="card-title">Jumlah Admin</h5>
                        <p class="card-text"><?= $adminCount; ?> Admin</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4 mt-3 mt-md-0">
            <div class="card card-3">
                <div class="card-body-3">
                    <i class="fa-solid fa-calendar-plus"></i>
                    <div>
                        <h5 class="card-title">Jumlah Bank Soal</h5>
                        <p class="card-text"><?= $soalCount; ?> Bank Soal</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
